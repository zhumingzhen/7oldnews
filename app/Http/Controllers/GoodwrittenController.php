<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Goodwrittens;

class GoodwrittenController extends Controller
{
    public function index()
    {
        $goodwrittens = Goodwrittens::get();
        echo $this->pwdDecode('egmo1o6dMwTrEiwt');exit;
        echo $enstr = $this->pwdEncode('zmz110');
        echo '-------';
        echo $this->pwdDecode($enstr);
        exit;
        return view('goodwritten',compact('goodwrittens'));
    }

    public function query(Request $request)
    {
        $operation = $request->input('operation');
        $res = ['code'=>200,'msg'=>'请求成功','data'=>$operation];
        return $res;
    }

    /**
     * 简单对称加密算法之加密
     * @param String $string 需要加密的字串
     * @param String $skey 加密EKY
     * @author Anyon Zou <zoujingli@qq.com>
     * @date 2013-08-13 19:30
     * @update 2014-10-10 10:10
     * @return String
     */
    public function pwdEncode($string = '', $skey = '') {
        $strArr = str_split(base64_encode($string));
        $strCount = count($strArr);
        foreach (str_split($skey) as $key => $value)
            $key < $strCount && $strArr[$key].=$value;
        return str_replace(array('=', '+', '/'), array('O0O0O', 'o000o', 'oo00o'), join('', $strArr));
    }
    /**
     * 简单对称加密算法之解密
     * @param String $string 需要解密的字串
     * @param String $skey 解密KEY
     * @author Anyon Zou <zoujingli@qq.com>
     * @date 2013-08-13 19:30
     * @update 2014-10-10 10:10
     * @return String
     */
    public function pwdDecode($string = '', $skey = '') {
        $strArr = str_split(str_replace(array('O0O0O', 'o000o', 'oo00o'), array('=', '+', '/'), $string), 2);
        $strCount = count($strArr);
        foreach (str_split($skey) as $key => $value)
            $key <= $strCount  && isset($strArr[$key]) && $strArr[$key][1] === $value && $strArr[$key] = $strArr[$key][0];
        return base64_decode(join('', $strArr));
    }


    // 接受post数据
    public function query1()
    {
        return $_POST['operation'];
    }
}
