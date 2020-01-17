<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Common;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Cookie;

class UserController extends Controller
{
    /**
     * 注册页面
     */
    public function reg()
    {
        return view('user.reg');
    }

    /**
     * 用户注册
     */
    public function reg_do(Request $request)
    {
        $data = $request->all();
        $url = "http://1905passport.com/user/reg";
        $response = Common::curlPost($url,$data);
        print_r($response);
    }

    /**
     * 登陆页面
     */
    public function login()
    {
        return view('user.login');
    }

    /**
     * 用户登陆
     */
    public function login_do(Request $request)
    {
        $login_info = $request->all();
        $url = "http://1905passport.com/user/login";
        $client = new Client();
        $response = $client->request('post',$url,[
            'form_params'=>$login_info
        ]);

        $json_data = $response->getBody();
        $info = json_decode($json_data,true);
        if($info['error']){
            echo '错误信息：'.$info['msg'];
            header('Refresh:2;url=/user/login');
            die;
        }

        $token = $info['token'];
        $user_id = $info['user_id'];

        Cookie::queue('token',$token,600);
        Cookie::queue('user_id',$user_id,600);

        header('Refresh:2;url=/user/center');
        echo "登陆成功";
    }

    public function center()
    {
        $token = cookie::get('token');
        $user_id = cookie::get('user_id');
        if(empty($token) || empty($user_id)){
            echo '对不起 您没登陆 请先登陆';
            header('Refresh:2;url=/user/login');
            die;
        }

        //鉴权
        $url = "1905passport.com/user/auth";

        $client = new Client();

        $response = $client->request('post',$url,[
           'form_params'=>['token'=>$token,'user_id'=>$user_id]
        ]);

        $json_data = $response->getBody();
        $info = json_decode($json_data,true);

        if($info['error']){
            echo '错误信息：'.$info['msg'];
        }
        echo '个人中心';
    }
}
