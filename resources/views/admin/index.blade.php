@extends('admin.master')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Bảng Điều Khiển
            </h1>
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-aqua">
                        <div class="inner">
                            <h3>{{ count($product) }}</h3>

                            <p>Sách</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-book"></i>
                        </div>
                        <a href="{{ route('product-list') }}" class="small-box-footer">Chi tiết <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-green">
                        <div class="inner">
                            <h3>{{ count($author) }}</h3>

                            <p>Tác Giả</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-user-secret"></i>
                        </div>
                        <a href="{{ route('author-list') }}" class="small-box-footer">Chi tiết <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-yellow">
                        <div class="inner">
                            <h3>{{ count($category) }}</h3>

                            <p>Thể Loại</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-clone"></i>
                        </div>
                        <a href="{{ route('category-list') }}" class="small-box-footer">Chi tiết <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-red">
                        <div class="inner">
                            <h3>{{ count($bill) }}</h3>

                            <p>Đơn Hàng</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-shopping-cart"></i>
                        </div>
                        <a href="{{ route('bill-list') }}" class="small-box-footer">Chi tiết <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
            </div>
            <div class="row">
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-aqua">
                        <div class="inner">
                            <h3>{{ count($customer) }}</h3>

                            <p>Khách Hàng</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-male"></i>
                        </div>
                        <a href="{{ route('customer-list') }}" class="small-box-footer">Chi tiết <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-green">
                        <div class="inner">
                            <h3>{{ count($user) }}</h3>

                            <p>Tài Khoản</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-group"></i>
                        </div>
                        <a href="{{ route('user-list') }}" class="small-box-footer">Chi tiết <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-yellow">
                        <div class="inner">
                            <h3>{{ count($news) }}</h3>

                            <p>Tin Tức</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-newspaper-o"></i>
                        </div>
                        <a href="{{ route('news-list') }}" class="small-box-footer">Chi tiết <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-red">
                        <div class="inner">
                            <h3>{{ count($feedback) }}</h3>

                            <p>Phản Hồi</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-smile-o"></i>
                        </div>
                        <a href="{{ route('feedback-list') }}" class="small-box-footer">Chi tiết <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
            </div>
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->
@endsection
