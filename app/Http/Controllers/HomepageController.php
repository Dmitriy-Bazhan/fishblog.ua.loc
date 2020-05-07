<?php

namespace App\Http\Controllers;

use App\Fish;
use App\Lake;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function homepage()
    {
        $this->data = self::necessarily();
        $this->data['title'] = 'homepage';
        $this->data['popular_fishes'] = Fish::withData()->orderBy('views', 'desc')->take(3)->get();
        $this->data['popular_lakes'] = Lake::withData()->orderBy('views', 'desc')->take(3)->get();

        return view('site.homepage', $this->data);
    }

}
