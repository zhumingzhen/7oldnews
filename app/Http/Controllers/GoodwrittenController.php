<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;

class NewapiController extends Controller
{
    public function index()
    {
        return view('goodwritten');
    }
}
