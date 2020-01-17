<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use App\Model\Goods;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $goodsInfo = Goods::orderBy('goods_id', 'desc')->take(4)->get()->toArray();
        $info = Goods::paginate(4);

        return view('index.index',['goodsInfo'=>$goodsInfo,'info'=>$info]);
    }
}
