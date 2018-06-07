@extends('master')
@section('content')
    <div class="content">
        <div class="row">
            <div class="col-sm-10 col-md-8 col-md-offset-2">
                <form class="form-horizontal" action="{{ route('changepass') }}" method="post">
                    {{ csrf_field() }}
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Đăng Nhập</h3>
                        </div>
                        <div class="panel-body">
                            @if (session('error'))
                                <div class="alert alert-danger">
                                    {{ session('error') }}
                                </div>
                            @endif
                            @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif
                            <div class="form-group{{ $errors->has('current-password') ? ' has-error' : '' }}">
                                <label for="current-password" class="control-label col-xs-3">Mật Khẩu Hiện Tại</label>
                                <div class="col-xs-8">
                                    <input id="current-password" type="password" class="input-lg form-control"
                                            name="current-password" required>
                                    @if ($errors->has('current-password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('current-password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('new-password') ? ' has-error' : '' }}">
                                <label for="new-password" class="control-label col-xs-3">Mật Khẩu Mới</label>
                                <div class="col-xs-8">
                                    <input id="new-password" type="password" class="input-lg form-control" name="new-password"
                                            required>

                                    @if ($errors->has('new-password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('new-password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="new-password-confirm" class="control-label col-xs-3">Xác Nhận Mật Khẩu</label>
                                <div class="col-xs-8">
                                    <input id="new-password-confirm" type="password" class="input-lg form-control"
                                            name="new-password_confirmation" required>
                                </div>
                            </div>
                                <div class="form-group">
                                    <div class="col-xs-offset-3 col-xs-3">
                                        <button type="submit" class="btn btn-success btn-lg"> Đổi Mật Khẩu
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