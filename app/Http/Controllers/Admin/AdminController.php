<?php

namespace App\Http\Controllers\Admin;

use App\Fish;
use App\Http\Controllers\Controller;
use App\User;
use App\Lake;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

class AdminController extends Controller
{
    public function mainpage()
    {
        session()->put('attribute', 'id-desc');

        $pages = (int)ceil(User::all()->count() / 10);
        session()->put('pages', $pages);
        $users = User::take(10)->get();

        $data = [
            'users' => $users,
            'pages' => $pages,
            'currentPage' => 1,
            'model' => 'User'
        ];

        return view('admin.admin', $data);
    }

    public function fishTable()
    {
        session()->put('attribute', 'id-desc');

        $pages = (int)ceil(Fish::all()->count() / 10);
        session()->put('pages', $pages);
        $fishes = Fish::take(10)->withData()->get();

        $data = [
            'fishes' => $fishes,
            'lang' => 1,
            'pages' => $pages,
            'currentPage' => 1,
            'model' => 'Fish'
        ];

        return view('admin.fish-table', $data);

    }

    public function lakeTable()
    {
        session()->put('attribute', 'id-desc');

        $pages = (int)ceil(Lake::all()->count() / 10);
        session()->put('pages', $pages);
        $lakes = Lake::take(10)->withData()->get();

        $data = [
            'lakes' => $lakes,
            'lang' => 1,
            'pages' => $pages,
            'currentPage' => 1,
            'model' => 'Lake'
        ];

        return view('admin.lake-table', $data);
    }

    public function ajaxTable(Request $request)
    {
        $nameVar = mb_strtolower($request->post('model'));

        if ($request->post('attribute') != null) {
            session()->put('attribute', $request->post('attribute'));
        }

        $model = '\App\\' . $request->post('model');
        $pages = session('pages');
        $currentPage = !is_null($request->post('page')) ? $request->post('page') : 1;
        $currentLang = !is_null($request->post('currentLang')) ? $request->post('currentLang') : $request->post('lang');

        if($request->post('action') == 'action')
        {
            $checkEnabled = $model::where('id', $request->post('id'))->first()->enabled;
            if($checkEnabled == 1)
            {
                $model::where('id', $request->post('id'))->update(['enabled' => 0]);
            }elseif ($checkEnabled == 0)
            {
                $model::where('id', $request->post('id'))->update(['enabled' => 1]);
            }
        }

        switch (session('attribute')) {
            case 'id' :
                $$nameVar = $model::orderBy('id', 'desc')->withData()->skip(10 * ($currentPage - 1))->take(10)->get();
                $lang = $currentLang;
                break;

            case 'id-desc' :
                $$nameVar = $model::orderBy('id', 'asc')->withData()->skip(10 * ($currentPage - 1))->take(10)->get();
                $lang = $currentLang;
                break;

            case 'username' :
                $$nameVar = $model::orderBy('name', 'desc')->withData()->skip(10 * ($currentPage - 1))->take(10)->get();
                $lang = $currentLang;
                break;

            case 'username-desc' :
                $$nameVar = $model::orderBy('name', 'asc')->withData()->skip(10 * ($currentPage - 1))->take(10)->get();
                $lang = $currentLang;
                break;

            case 'name' :
                $$nameVar = $model::withData()->orderBy('alias', 'desc')->withData()->skip(10 * ($currentPage - 1))->take(10)->get();
                $lang = $currentLang;
                break;

            case 'name-desc' :
                $$nameVar = $model::withData()->orderBy('alias', 'asc')->withData()->skip(10 * ($currentPage - 1))->take(10)->get();
                $lang = $currentLang;
                break;

            case 'alias' :
                $$nameVar = $model::withData()->orderBy('alias', 'desc')->withData()->skip(10 * ($currentPage - 1))->take(10)->get();
                $lang = $currentLang;
                break;

            case 'alias-desc' :
                $$nameVar = $model::withData()->orderBy('alias', 'asc')->withData()->skip(10 * ($currentPage - 1))->take(10)->get();
                $lang = $currentLang;
                break;

            case 'email' :
                $$nameVar = $model::orderBy('email', 'desc')->withData()->skip(10 * ($currentPage - 1))->take(10)->get();
                $lang = $currentLang;
                break;

            case 'email-desc' :
                $$nameVar = $model::orderBy('email', 'asc')->withData()->skip(10 * ($currentPage - 1))->take(10)->get();
                $lang = $currentLang;
                break;

            case 'category' :
                $$nameVar = $model::orderBy('category_id', 'desc')->withData()->skip(10 * ($currentPage - 1))->take(10)->get();
                $lang = $currentLang;
                break;

            case 'category-desc' :
                $$nameVar = $model::orderBy('category_id', 'asc')->withData()->skip(10 * ($currentPage - 1))->take(10)->get();
                $lang = $currentLang;
                break;

            case 'created_at' :
                $$nameVar = $model::orderBy('created_at', 'desc')->withData()->skip(10 * ($currentPage - 1))->take(10)->get();
                $lang = $currentLang;
                break;

            case 'created_at-desc' :
                $$nameVar = $model::orderBy('created_at', 'asc')->withData()->skip(10 * ($currentPage - 1))->take(10)->get();
                $lang = $currentLang;
                break;

            case 'updated_at' :
                $$nameVar = $model::orderBy('updated_at', 'desc')->withData()->skip(10 * ($currentPage - 1))->take(10)->get();
                $lang = $currentLang;
                break;

            case 'updated_at-desc' :
                $$nameVar = $model::orderBy('updated_at', 'asc')->withData()->skip(10 * ($currentPage - 1))->take(10)->get();
                $lang = $currentLang;
                break;

            case 'location' :
                $$nameVar = $model::withData()->orderBy('location_id', 'desc')->withData()->skip(10 * ($currentPage - 1))->take(10)->get();
                $lang = $currentLang;
                break;

            case 'location-desc' :
                $$nameVar = $model::withData()->orderBy('location_id', 'asc')->withData()->skip(10 * ($currentPage - 1))->take(10)->get();
                $lang = $currentLang;
                break;


            default:
                break;
        }


        $fishes = $nameVar == 'fish' ? $$nameVar: [];
        $users = $nameVar == 'user' ? $$nameVar : [];
        $lakes = $nameVar == 'lake' ? $$nameVar : [];

        $sections = mb_strtolower($request->post('model'));

        $data = [
            'fishes' => $fishes,
            'users' => $users,
            'lakes' => $lakes,
            'pages' => $pages,
            'currentPage' => $currentPage,
            'lang' => $lang,
            'model' => $request->post('model')
        ];

        return response()->json([
            'response_table' => view('admin.sections.section-' . $sections . '-table', $data)->render()
        ], 200);
    }


}


