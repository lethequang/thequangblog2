@extends('admin.master')
@section('content')
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">
            <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Sửa Tác Giả</h3>
                </div>
                <div class="box-body">
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
                    <form class="form-horizontal" action="{{ route('author-edit',$auth->id) }}" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="">Tên Tác Giả</label>
                            <div class="col-sm-10">
                                <input type="text" value="{{ $auth->name }}" class="form-control" id="" name="name">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-default">Xác Nhận</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div><!-- /.content-wrapper -->
    <script>
		// Thay thế <textarea id="post_content"> với CKEditor
		CKEDITOR.replace( 'post_content' );// tham số là biến name của textarea
    </script>
@endsection