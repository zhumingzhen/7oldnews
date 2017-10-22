<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Goodwrittens;

class GoodwrittenController extends Controller
{
    public function index()
    {
        return Goodwrittens::get();
        return view('goodwritten');
    }

    public function query()
    {

    }
}
