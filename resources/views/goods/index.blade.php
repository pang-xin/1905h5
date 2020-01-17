@extends('layouts.app')

@section('content')
    @include('public.head')
    <!-- product -->
    <div class="section product product-list">
        <div class="container">
            <div class="pages-head">
                <h3>PRODUCT LIST</h3>
            </div>
            <div class="input-field">
                <select>
                    <option value="">Popular</option>
                    <option value="1">New Product</option>
                    <option value="2">Best Sellers</option>
                    <option value="3">Best Reviews</option>
                    <option value="4">Low Price</option>
                    <option value="5">High Price</option>
                </select>
            </div>
            <div class="row">
                @foreach($info as $k=>$v)
                    <div class="col s6">
                        <div class="content">
                            <img src="{{$v->goods_file}}" alt="">
                            <h6><a href="">{{$v->goods_name}}</a></h6>
                            <div class="price">
                                ${{$v->goods_price}} <span>$28</span>
                            </div>
                            <button class="btn button-default" id="cart" goods_id="{{$v->goods_id}}">ADD TO CART</button>
                        </div>
                    </div>
                @endforeach
                <div class="pagination-product">
                    <ul>
                        {{$info->links()}}
                    </ul>
                </div>
            </div>
        </div>
        <!-- end product -->
        <script src="/jquery.js"></script>
        <script>
            $(document).on('click','#cart',function(){
                var _this = $(this);
                var goods_id = _this.attr('goods_id');
                $.ajax({
                    url:"{{url('goods/addCart')}}",
                    type:"post",
                    data:{goods_id:goods_id},
                    dataType:"json",
                    success:function(res){
                        if(res.error==0){
                            alert(res.msg);
                        }else if(res.error==203){
                            alert(res.msg);
                        }
                    }
                });
            });
        </script>


    @include('public.tail')

@endsection
