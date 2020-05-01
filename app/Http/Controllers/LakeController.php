<?php

namespace App\Http\Controllers;

use App\Fish;
use App\Lake;
use Illuminate\Http\Request;

class LakeController extends Controller
{
    public function index()
    {
        $this->data = self::necessarily();
        $this->data['title'] = 'lakes';
        $this->data['lakes'] = Lake::withData()->paginate(9);

        return view ('site.lakes', $this->data);
    }
}
