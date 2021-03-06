<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;

class NewapiController extends Controller
{
    public function getNews()
    {
        $newsJson = file_get_contents("http://api.jisuapi.com/news/get?channel=头条&start=0&num=10&appkey=01da48b167d5d8ea");
        $newArr = json_decode($newsJson, true);
        if ($newArr['status'] == 0){
            $lists = $newArr['result']['list'];
            foreach ($lists as $lk => $list){
                $isExist = News::where('title',$list['title'])->get();
                if (count($isExist)>0){
                    continue;
                }
                $save['channel']=1;  // 频道id
                $save['title']=$list['title'];
                $save['time']=$list['time'];
                $save['src']=$list['src'];
                $save['category']=$list['category'];
                $save['pic']=$list['pic'];
                $save['content']=$list['content'];
                $save['url']=$list['url'];
                $save['weburl']=$list['weburl'];
                $createRes = News::create($save);  // 如果save失败，返回false；如果成功，返回model。
                if ($createRes != false){
                    echo "success </br>";
                }
            }
        }
    }
}
