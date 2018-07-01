@extends('admin.master')
@section('content')
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">
            <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Sửa Sách</h3>
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
                    <form class="form-horizontal" action="{{ route('product-edit',$post->id) }}" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="">Tên Sách</label>
                            <div class="col-sm-10">
                                <input type="text" value="{{ $post->title }}" class="form-control" id="" name="title">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="">Thể Loại</label>
                            <div class="col-sm-10">
                                <select value="{{ $post->category->name }}" class="form-control" name="id_cat">
                                    @foreach($category as $cate)
                                        <option value="{{ $cate['id'] }}">{{ $cate['name'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="">Tác Giả</label>
                            <div class="col-sm-10">
                                <select value="{{ $post->author->name }}" class="form-control" name="id_auth">
                                    @foreach($author as $au)
                                        <option value="{{ $au['id'] }}">{{ $au['name'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="">Giá Tiền</label>
                            <div class="col-sm-4">
                                <input value="{{ $post->price }}" type="text" class="form-control" id="" name="price">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="">Năm Xuất Bản</label>
                            <div class="col-sm-4">
                                <input value="{{ $post->year }}" type="text" class="form-control" id="" name="year">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="">Hình Ảnh</label>
                            <div class="col-sm-4">
                                <input type="file" class="form-control" id="" name="image">
                            </div>
                            <div class="col-sm-4">
                                <img src="{{ asset("images/$post->image") }}" style="max-width: 55px;"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="">Số Lượng</label>
                            <div class="col-sm-4">
                                <input value="{{ $post->quantity }}" type="text" class="form-control" id="" name="quantity">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="">Mô Tả</label>
                            <div class="col-sm-10">
                            <textarea name="post_content" id="post_content" rows="5" type="text" class="form-control" id="description"
                                    name="descrip">{{ $post->description }}</textarea>
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