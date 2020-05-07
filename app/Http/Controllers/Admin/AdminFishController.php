<?php

namespace App\Http\Controllers\Admin;

use App\Fish;
use App\Fish_data;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Elasticsearch\ClientBuilder;

class AdminFishController extends Controller
{
    public function create()
    {

        return view('admin.fish.create');
    }


    public function create_new_fish(Request $request)
    {
        $post = $request->post();

        $fish = new Fish();
        $fish->alias = Str::slug($post['name']['ru'] . Carbon::now(), '-');
        $fish->enabled = $post['enabled'];
        $fish->category_id = $post['category_id'];
        $fish->save();
        $id = Fish::select('id')->get()->last()->id;

        $languages = ['ua','ru','en'];

        $elastic = ClientBuilder::create()->build();

        foreach ($languages as $lang)
        {
            $fishData = new Fish_data();
            $fishData->fish_id = $id;
            $fishData->language = $lang;
            $fishData->name = $post['name'][$lang];
            $fishData->short_description = $post['short_description'][$lang];
            $fishData->description = $post['description'][$lang];
            $fishData->save();

            $params = [
                'index' => 'fishblog_index',
                'body' => [
                    'fish_id' => $id,
                    'name' => $post['name'][$lang],
                    'language' => $lang,
                    'short_description' => $post['short_description'][$lang],
                    'description' => $post['description'][$lang]
                ]
            ];
            $elastic->index($params);

        }

        return redirect('admin');
    }
}

//$table->increments('id');
//$table->string('alias');
//$table->boolean('enabled')->default(true);
//$table->integer('category_id');
//$table->integer('views')->default(0);
//$table->string('photo')->default('none');
//
//$table->increments('id');
//$table->integer('fish_id')->unsigned();
//$table->string('language', 2);
//$table->string('name');
//$table->string('short_description', 200);
//$table->text('description');
//$table->foreign('fish_id')->references('id')->on('fish');
