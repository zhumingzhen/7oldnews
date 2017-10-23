<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Goodwrittens;

class GoodwrittenController extends Controller
{
    public function index()
    {
        $goodwrittens = Goodwrittens::get();
        return view('goodwritten',compact('goodwrittens'));
    }

    public function query(Request $request)
    {
        return $request->input('operation');
    }

    public function query1()
    {
        return $_POST['operation'];
    }
}
