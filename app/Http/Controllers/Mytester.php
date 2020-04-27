<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class Mytester extends Controller
{
    public function testerMethod()
    {

        $t = 'User';

        $class = '\App\\' . $t;

        $model = new $class;

        $show = $model::all();

        dd(bcrypt('123'));

        dd($show);

        $data = [];

        return view('mytester', $data);
    }
}
