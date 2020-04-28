<?php

namespace App\Http\Controllers;

use App\Fish;
use App\Lake;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function homepage()
    {
        $data['path'] = take_path();
        $data['title'] = 'homepage';
        $data['popular_fishes'] = Fish::withData()->orderBy('views', 'desc')->take(3)->get();
        $data['popular_lakes'] = Lake::withData()->orderBy('views', 'desc')->take(3)->get();

        return view('site.homepage', $data);
    }

}
