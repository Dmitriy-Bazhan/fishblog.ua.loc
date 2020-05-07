<?php

namespace App\Http\Controllers;

use App\Fish;
use App\Lake;
use App\Fish_data;
use App\Lake_data;
use Elasticsearch\Client;
use Elasticsearch\Connections\Connection;
use Elasticsearch\Transport;
use http\Env\Response;
use Illuminate\Http\Request;
use Elasticsearch\ClientBuilder;
use mysql_xdevapi\Exception;

class SearchController extends Controller
{
    public function buildAllIndex()
    {
        $elastic = ClientBuilder::create()->build();

        $fishDatas = Fish_data::cursor();
        $lakeDatas = Lake_data::cursor();

        foreach ($fishDatas as $fishData) {
            $params = [
                'index' => 'fishblog_index',
                'id' => 'fish_id_' . $fishData->fish_id,
                'body' => [
                    'fish_id' => $fishData->fish_id,
                    'name' => $fishData->name,
                    'language' => $fishData->language,
                    'short_description' => $fishData->short_description,
                    'description' => $fishData->description
                ]
            ];
            $elastic->index($params);
        }

        foreach ($lakeDatas as $lakeData) {
            $params = [
                'index' => 'fishblog_index',
                'id' => 'lake_id_' . $lakeData->lake_id,
                'body' => [
                    'lake_id' => $lakeData->lake_id,
                    'name' => $lakeData->name,
                    'language' => $lakeData->language,
                    'short_description' => $lakeData->short_description,
                    'description' => $lakeData->description
                ]
            ];
            $elastic->index($params);
        }
        dd('Complete');
    }

    public function show()
    {
        $query = str_replace(' ', '+', $_GET['q']);

        $this->data = self::necessarily();
        $this->data['title'] = 'search';
        $this->data['lang'] = lang_number();

        $host = 'localhost:9200';

        $defaultHandler = ClientBuilder::defaultHandler();
        $elastic = ClientBuilder::create()->setHosts([$host])
            ->setConnectionPool('\Elasticsearch\ConnectionPool\SniffingConnectionPool', [])
            ->setHandler($defaultHandler)->build();

        $URL = 'http://' . $host;

        if (isSiteAvailible($URL)) {
            $connect = true;
        } else {
            $connect = false;
        }

        if ($connect) {

            $params = [
                'index' => 'fishblog_index',
                'body' => [
                    'query' => [
                        'multi_match' => [
                            'fields' => ['name'],
                            'query' => $query,
                            'fuzziness' => '1',
                            'type' => 'most_fields',
                            'operator' => 'or'
                        ],
                    ]
                ]
            ];

            $response = $elastic->search($params);

//            $param =
//                [
//                    'index' => 'fishblog_index',
//                    'id' => 'fish_id_100'
//                ];
//
//            $get = $elastic->get($param);
//
//            dd($get);

            $fishIds = $lakeIds = [];

            foreach ($response['hits']['hits'] as $item) {
                if (!empty($item['_source']['fish_id'])) {
                    $fishIds[] = $item['_source']['fish_id'];
                }
                if (!empty($item['_source']['lake_id'])) {
                    $lakeIds[] = $item['_source']['lake_id'];
                }
            }


            if (!empty($fishIds)) {
                foreach (array_unique($fishIds) as $id) {
                    $fish = Fish::where('id', $id)->withData()->first();
                    $this->data['results'][] = $fish;
                }
            }

            if (!empty($lakeIds)) {
                foreach (array_unique($lakeIds) as $id) {
                    $lake = Lake::where('id', $id)->withData()->first();
                    $this->data['results'][] = $lake;
                }
            }
        }

        return view('site.search.show', $this->data);
    }

    public function searchQuery(Request $request)
    {
        $query = str_replace(' ', '+', $request->post('search_value'));
        return redirect(url_with_locale('/search?q=' . $query));
    }

    public function life(Request $request)
    {
        $products = Product::withAlias()->joinData()->wherePublished(true)
            ->whereSearchString($request->input('val'))->take(15)->get();
        return response()->json([
            'life_search' => view('site.search.life', ['products' => $products])->render()
        ], 200);
    }
}
