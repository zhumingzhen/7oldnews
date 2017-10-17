<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use EasyWeChat\Foundation\Application;

class WechatController extends Controller
{
    public function server()
    {
        $options = [
            'app_id'    => 'wxe6bd61546e337818',
            'secret'    => '1a6c491ccf0e0bb41641d0cfaec6e128',
            'token'     => 'wechat',
            'aes_key'   => 'tOihYdEo0SRv0b6RrkxjxIRjxKM8uCe5xrEevtCDhJf',
            'log' => [
                'level'      => 'debug',
                'permission' => 0777,
                'file'       => '/tmp/easywechat.log',
            ],
        ];

        $app = new Application($options);

        // 从项目实例中得到服务端应用实例。
        $server = $app->server;
        $server->setMessageHandler(function ($message) {
            // $message->FromUserName // 用户的 openid
            // $message->MsgType // 消息类型：event, text....
            return "您好！欢迎关注我!";
        });
        $response = $server->serve();
        return $response;
        $response->send(); // Laravel 里请使用：return $response;
    }




}
