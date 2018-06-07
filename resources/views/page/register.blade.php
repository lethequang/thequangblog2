@extends('master')
@section('content')
    <div class="content">
        <div class="row">
            <div class="col-sm-10 col-md-8 col-md-offset-2">
                <form action="{{ route('register') }}" class="form-horizontal" method="post">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Đăng Ký Tài Khoản</h3>
                        </div>
                        <div class="panel-body">
                            @if(count($errors)>0)
                                <div class="alert alert-danger">
                                    @foreach($errors->all() as $error)
                                        {{ $error }} <br>
                                    @endforeach
                                </div>
                            @endif
                            <div class="form-group">
                                <label id="name" class="control-label col-xs-3">Tài Khoản*</label>
                                <div class="col-xs-8">
                                    <input id="name" type="text" name="name" class="input-lg form-control"
                                            placeholder="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label id="email" class="control-label col-xs-3">Email*</label>
                                <div class="col-xs-8">
                                    <input id="email" type="email" name="email" class="input-lg form-control">
                                </div>
                            </div>
                                <div class="form-group">
                                    <label id="full_name" class="control-label col-xs-3">Họ Tên*</label>
                                    <div class="col-xs-8">
                                        <input id="full_name" type="text" name="full_name" class="input-lg form-control">
                                    </div>
                                </div>
                            <div class="form-group">
                                <label id="phone" class="control-label col-xs-3">Số Điện Thoại*</label>
                                <div class="col-xs-8">
                                    <input id="phone" type="text" name="phone" class="input-lg form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label id="address" class="control-label col-xs-3">Địa Chỉ*</label>
                                <div class="col-xs-8">
                                    <textarea rows="2" id="address" type="text" name="address"
                                            class="input-lg form-control"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label id="password" class="control-label col-xs-3">Mật Khẩu*</label>
                                <div class="col-xs-8">
                                    <input id="password" type="password" name="password" class="input-lg form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label id="re_password" class="control-label col-xs-3">Xác Nhận Mật Khẩu*</label>
                                <div class="col-xs-8">
                                    <input id="re_password" type="password" name="re_password"
                                            class="input-lg form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-offset-3 col-xs-3">
                                    <button type="submit" class="btn btn-success btn-lg"> Đăng Ký
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <!---->
@endsection