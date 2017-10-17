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
        for ($i=0;$i>(-7);$i--){
            $newTime = date("Y-m-d",strtotime("{$i} day"));
            $articles[$newTime] = $news::select(['id','title','time'])->where('time','>',$newTime.' 00:00:00')->where('time','<',$newTime.' 23:59:59')
                ->orderBy(\DB::raw('RAND()'))->take(10)->get();
        }
        return $articles;
    }
    
    //详情
    public function detail(News $news,$id)
    {
        $detail = $news::select(['id','title','time','src','content','url'])->where('id',$id)->get();
        return $detail;
    }
    
}
