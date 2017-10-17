<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;

class NewsController extends Controller
{
    // 列表
    public function list(News $news)
    {
//        $articles = $news::all();
//        $articles = $news::find(1);
        $res = [];
        for ($i=0;$i>(-7);$i--){
            $newTime = date("Y-m-d",strtotime("{$i} day"));
            $articles = $news::select(['id','title','time'])->where('time','>',$newTime.' 00:00:00')->where('time','<',$newTime.' 23:59:59')
                ->orderBy(\DB::raw('RAND()'))->take(10)->get();
            $result = array('date'=>$newTime,'data'=>$articles);
            array_push($res,$result);
        }
        return array('code'=>400,'msg'=>'请求成功','data'=>$res);
    }
    
    //详情
    public function detail(News $news,$id)
    {
        $detail = $news::select(['id','title','time','src','content','url'])->where('id',$id)->get();
        return $detail;
    }
    
}
