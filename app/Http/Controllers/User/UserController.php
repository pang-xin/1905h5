<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Common;

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
        $response = Common::curlPost($url,$login_info);
        if($response['code']==200){
            session(['user_name'=>$login_info['user_name']]);
        }
        print_r($response);
    }
}
