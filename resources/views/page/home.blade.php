@extends('master')
@section('content')
    <div class="content">
        <div class="col-md-9">
            <div id="carousel" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    <li data-target="#carousel" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel" data-slide-to="1"></li>
                    <li data-target="#carousel" data-slide-to="2"></li>
                </ol>

                <!-- Wrapper for slides -->
                <div class="carousel-inner">
                    <div class="item active">
                        <img src="source/images/banner1.png" alt="Los Angeles">
                    </div>

                    <div class="item">
                        <img src="source/images/banner2.jpg" alt="Chicago">
                    </div>

                    <div class="item">
                        <img src="source/images/banner3.jpg" alt="New York">
                    </div>
                </div>

                <!-- Left and right controls -->
                <a class="left carousel-control" href="#carousel" data-slide="prev"> <span
                            class="glyphicon glyphicon-chevron-left"></span> <span class="sr-only">Previous</span> </a>
                <a class="right carousel-control" href="#carousel" data-slide="next"> <span
                            class="glyphicon glyphicon-chevron-right"></span> <span class="sr-only">Next</span> </a>
            </div>
            <div class="content-bottom">
                <h3>Sách Mới Nhất</h3>
                <div class="row display-flex">
                    @foreach($product as $book)
                        <div class="col-xs-6 col-sm-6 col-md-4">
                            <div class="product-item">
                                <div class="pi-img-wrapper">
                                    <img src="images/{{ $book['image'] }}" class="img-responsive" alt="">
                                    <div>
                                        <a href="sach/{{ $book['slug'] }}.html" class="btn">Chi Tiết</a>
                                    </div>
                                </div>
                                <p><a href="">{{ $book['title'] }}</a></p>
                                <div class="pi-price">{{ number_format($book['price']) }}</div>
                                <p>VNĐ</p>
                                <a href="{{ route('addtocart',$book['id']) }}" class="btn add2cart">Thêm Vào Giỏ
                                    Hàng</a>
                                <div class="sticker sticker-new"></div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <ul class="start">
                {{ $product->links() }}
            </ul>
        </div>

        @include('sidebar')
        <div class="clearfix"></div>
    </div>
    <!---->
@endsection