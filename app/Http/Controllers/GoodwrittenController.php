<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GoodwrittenController extends Controller
{
    public function index()
    {
        return view('goodwritten');
    }
}
