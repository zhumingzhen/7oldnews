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
            // 周几
            $week = date("w",strtotime($newTime));
            $resWeek = $this->getWeek($week);
            /*$articles = $news::select(['id','title','time'])->where('time','>',$newTime.' 00:00:00')->where('time','<',$newTime.' 23:59:59')
                ->orderBy(\DB::raw('RAND()'))->take(10)->get();*/
            $articles = $news::select(['id','title','time'])->where('time','>',$newTime.' 00:00:00')->where('time','<',$newTime.' 23:59:59')
                ->orderBy('time','desc')->take(10)->get();
            $result = array('date'=>$newTime.'('.$resWeek.')','data'=>$articles);
            array_push($res,$result);
        }
        return array('code'=>200,'msg'=>'请求成功','data'=>$res);
    }

    public function getWeek($week)
    {
        switch ($week){
            case 0;
                $resWeek = '周日';
                $week = 7;
                break;
            case 1;
                $resWeek = '周一';
                break;
            case 2;
                $resWeek = '周二';
                break;
            case 3;
                $resWeek = '周三';
                break;
            case 4;
                $resWeek = '周四';
                break;
            case 5;
                $resWeek = '周五';
                break;
            case 6;
                $resWeek = '周六';
                break;
        }
        $nowWeek = date("w",time());
        if($week > $nowWeek){
            $resWeek = '上'.$resWeek;
        }
        return $resWeek;
    }
    
    //详情
    public function detail(News $news,$id)
    {
        $detail = $news::select(['id','title','time','src','content','url'])->where('id',$id)->get();
        $detail[0]['content'] = strip_tags($detail[0]['content']);
        // 处理日期为周几
        $week = date("w",strtotime($detail[0]['time']));
        $noWeek = date("w",time());
        $resWeek = $this->getWeek($week);
        if ($week == $noWeek){
            $detail[0]['week'] = '今天';
        }elseif ($week == ($noWeek-1)){
            $detail[0]['week'] = '昨天';
        }elseif ($noWeek == 0 && $week==6){
            $detail[0]['week'] = '昨天';
        }else{
            $detail[0]['week'] = $resWeek;
        }
        return array('code'=>200,'msg'=>'请求成功','data'=>$detail[0]);
    }
    
}
