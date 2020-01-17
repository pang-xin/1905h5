<?php

namespace App\Http\Controllers\Goods;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Goods;
use Illuminate\Support\Facades\Cookie;
use App\Model\Cart;

class GoodsController extends Controller
{
    public function getGoods()
    {
        $info = Goods::paginate(4);

        return view('goods/index',['info'=>$info]);
    }

    public function addCart(Request $request)
    {
        $user_id = cookie::get('user_id');
        $goods_id = $request->input('goods_id');
        $where = [
            'user_id' => $user_id,
            'goods_id' => $goods_id,
        ];
        $cartInfo = Cart::where($where)->first();
        if(empty($cartInfo)){
            $res = Cart::create([
                'goods_id'=>$goods_id,
                'user_id'=>$user_id
            ]);
        }else{
            $cart_num = $cartInfo->cart_num + 1;
            $res = Cart::where($where)->update(['cart_num' => $cart_num]);
        }

        if($res){
            return json_encode(['error'=>'0','msg'=>'添加购物车成功']);
        }else{
            return json_encode(['error'=>'203','msg'=>'添加购物车失败']);
        }
    }

    public function getCart()
    {
        $goodsInfo = Cart::join('goods','cart.goods_id','=','goods.goods_id')->where(['is_del'=>1])->get()->toArray();
        $total = 0;
        foreach($goodsInfo as $k=>$v){
            $total += $v['goods_price']*$v['cart_num'];
        }
        return view('goods/cart',['goodsInfo'=>$goodsInfo,'total'=>$total]);
    }
}
