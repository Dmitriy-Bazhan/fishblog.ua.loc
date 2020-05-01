<?php

namespace App\Http\Controllers\Admin;

use App\Lake;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminLakeController extends Controller
{
    public function lakeEdit($id)
    {
        $data['lake'] = Lake::where('id', $id)->withData()->first();
        return view('admin.lake.edit', $data);
    }

    public function lakeUpdate(Request $request)
    {
        dd($request->post());
    }
}
