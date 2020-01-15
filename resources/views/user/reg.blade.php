@extends('layouts.app')

@section('content')

@include('public.head')

<!-- register -->
<div class="pages section">
    <div class="container">
        <div class="pages-head">
            <h3>REGISTER</h3>
        </div>
        <div class="register">
            <div class="row">
                <form class="col s12" action="{{url('user/reg_do')}}" method="post">
                    <div class="input-field">
                        <input type="text" class="validate" placeholder="NAME" name="user_name" required>
                    </div>
                    <div class="input-field">
                        <input type="email" placeholder="EMAIL" class="validate" name="user_email" required>
                    </div>
                    <div class="input-field">
                        <input type="tel" placeholder="TEL" class="validate" name="user_tel" required>
                    </div>
                    <div class="input-field">
                        <input type="password" placeholder="PASSWORD" class="validate" name="user_pwd" required>
                    </div>
                    <div class="input-field">
                        <input type="password" placeholder="PASSWORD" class="validate" name="user_pwd1" required>
                    </div>
                    <input type="submit" value="REGISTER" class="btn button-default">
                </form>
            </div>
        </div>
    </div>
</div>
<!-- end register -->

@include('public.tail')

@endsection

