@extends('layouts.app')

@section('content')
@include('public.head')
<!-- wishlist -->
<div class="wishlist section">
    <div class="container">
        <div class="pages-head">
            <h3>WISHLIST</h3>
        </div>
        @foreach($goodsInfo as $k=>$v)
        <div class="content">
            <div class="cart-1">
                <div class="row">
                    <div class="col s5">
                        <h5>Image</h5>
                    </div>
                    <div class="col s7">
                        <img src="{{$v['goods_file']}}" alt="">
                    </div>
                </div>
                <div class="row">
                    <div class="col s5">
                        <h5>Name</h5>
                    </div>
                    <div class="col s7">
                        <h5><a href="">{{$v['goods_name']}}</a></h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col s5">
                        <h5>Stock Status</h5>
                    </div>
                    <div class="col s7">
                        <h5>{{$v['cart_num']}}</h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col s5">
                        <h5>Original price</h5>
                    </div>
                    <div class="col s7">
                        <h5>${{$v['goods_price']}}</h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col s5">
                        <h5>Price</h5>
                    </div>
                    <div class="col s7">
                        <h5>${{$v['goods_price']*$v['cart_num']}}</h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col s5">
                        <h5>Action</h5>
                    </div>
                    <div class="col s7">
                        <h5><i class="fa fa-trash"></i></h5>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        <div class="total">
            <div class="row">
                <div class="col s7">
                    <h6>Total</h6>
                </div>
                <div class="col s5">
                    <h6 id="total">${{$total ?? ''}}</h6>
                </div>
            </div>
        </div>
        <a href="{{url('goods/alipay/'.$total)}}" class="btn button-default">Process to Checkout</a>
        <button class="btn button-default" id="alipay"></button>
    </div>
</div>
<script src="/jquery.js"></script>
<!-- end wishlist -->
<script>
    {{--$('#alipay').on('click',function(){--}}
    {{--    var total = $('#total').html();--}}
    {{--    $.ajax({--}}
    {{--        url:"{{url('goods/alipay')}}",--}}
    {{--        data:{total:total},--}}
    {{--        success:function(res){--}}

    {{--        }--}}
    {{--    });--}}
    {{--});--}}
</script>
@include('public.tail')

@endsection
