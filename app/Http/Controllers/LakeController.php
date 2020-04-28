<?php

namespace App\Http\Controllers;

use App\Fish;
use App\Lake;
use Illuminate\Http\Request;

class LakeController extends Controller
{
    public function index()
    {
        $data['path'] = take_path();
        $data['title'] = 'lakes';
        $data['lakes'] = Lake::withData()->get();

        return view ('site.lakes', $data);
    }
}
