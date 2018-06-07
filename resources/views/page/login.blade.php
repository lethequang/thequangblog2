@extends('master')
@section('content')
    <div class="content">
        <div class="row">
            <div class="col-sm-10 col-md-8 col-md-offset-2">
                <form action="{{ route('login') }}" class="form-horizontal" method="post">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Đăng Nhập</h3>
                        </div>
                        <div class="panel-body">
                            @if(session()->has('reg-message'))
                                <div class="alert alert-success text-center">
                                        {{ session()->get('reg-message') }}
                                </div>
                            @endif
                            @if(session()->has('message'))
                                <div class="alert alert-danger">
                                        {{ session()->get('message') }}
                                </div>
                            @endif
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
                                <label class="control-label col-xs-3">Mật Khẩu*</label>
                                <div class="col-xs-8">
                                    <input type="password" name="password" class="input-lg form-control" placeholder="">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-offset-3 col-xs-3">
                                    <button type="submit" class="btn btn-success btn-lg"> Đăng Nhập
                                    </button>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-offset-3 col-xs-6">
                                    <p>Chưa có tài khoản ? <a href="{{ route('register') }}">Đăng ký</a></p>
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