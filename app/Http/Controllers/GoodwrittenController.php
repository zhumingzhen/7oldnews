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
        $operation = $request->input('operation');
        $res = ['code'=>200,'msg'=>'请求成功','data'=>$operation];
        return $res;
    }

    // 接受post数据
    public function query1()
    {
        return $_POST['operation'];
    }
}
