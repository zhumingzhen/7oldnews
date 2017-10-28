<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGoodwrittenPost;
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
        $describe = $request->input('describe');
        $account = $request->input('account');
        $ciphertext = $request->input('ciphertext');
        $GoodwrittenData = Goodwrittens::where('operation',$operation)->where('describe',$describe)
            ->where('account',$account)->where('ciphertext',$ciphertext)->first();
        if ($GoodwrittenData){
            $ciphertext = $GoodwrittenData['ciphertext'];
            $dePassword = $this->pwdDecode($ciphertext,$operation);
            $res = ['code'=>200,'msg'=>'请求成功','data'=>$dePassword];
        }else{
            $res = ['code'=>400,'msg'=>'或许是密钥不对呢','data'=>''];
        }
        return $res;
    }

    public function add()
    {
        return view('gwadd');
    }

    public function store(StoreGoodwrittenPost $request)
    {
//            $data = $request->all();
        $data = $request->except('_token'); //同上
        // 加密
        $operation = $request->get('operation');
        $password = $request->get('password');
        $ciphertext = $this->pwdEncode($password,$operation);
        $data['ciphertext'] = $ciphertext;
        $res = Goodwrittens::create($data);

        if ($res){
            return redirect('/goodwritten');
        }else{
            redirect('/goodwritten/add');
        }
    }

    // 删除
    public function delete(Request $request)
    {
        $id = $request->get('deleteId');
        $deletedRows = Goodwrittens::destroy($id);
        if ($deletedRows){
            $res = ['code'=>200,'msg'=>'请求成功'];
        }else{
            $res = ['code'=>400,'msg'=>'删除失败'];
        }
        return $res;
    }

    /**
     * 简单对称加密算法之加密
     * @param String $string 需要加密的字串
     * @param String $skey 加密EKY
     * @return String
     */
    public function pwdEncode($string = '', $skey = 'goodwritten') {
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
     * @return String
     */
    public function pwdDecode($string = '', $skey = 'goodwritten') {
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
