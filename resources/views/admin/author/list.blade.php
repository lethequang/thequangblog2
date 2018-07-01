@extends('admin.master')
@section('content')
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            @if(session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
            @endif
            <div class="box-header with-border">
                <h3 class="box-title">Danh Sách Tác Giả</h3>
            </div>
            <div class="box-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <div>
                            <a class="btn-top pull-right" href="{{ route('author-add') }}"> <span
                                        class="glyphicon glyphicon-plus"></span> &nbsp Thêm tác giả mới</a>
                        </div>
                        <thead>
                        <tr class="row-name">
                            <th width="20%">STT</th>
                            <th width="50%">Tên tác giả</th>
                            <th width="30%">Tùy chọn</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($auths as $auth)
                            <tr class="row-content">
                                <td>{{ $auth->id }}</td>
                                <td>{{ $auth->name }}</td>
                                <td>
                                    <!-- Single button -->
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-default dropdown-toggle"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Thao tác <span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a href="{{ route('author-edit',$auth->id) }}" aria-label="Settings">Sửa</a>
                                            </li>
                                            <li role="separator" class="divider"></li>
                                            <li>
                                                <a href="{{ route('author-delete',$auth->id) }}"
                                                        onclick="return confirm('Xác nhận xóa thể loại này');">Xóa</a>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="box-footer">
                    <div class="text-center">{{ $auths->links() }}</div>
                </div>
            </div>
        </div>
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->
    @endsection
