@extends('master')
@section('content')
    <div class="content">

        <div class="col-md-9">
            <div class="content-bottom">
                <h4 class="pull-right">Tìm thấy {{ count($type_product) }} cuốn sách của thể loại này</h4>
                <h3>{{ $category->name }}</h3>
                <div class="row display-flex">
                    @foreach($type_product as $book)
                        <div class="col-xs-12 col-md-4">
                            <div class="product-item">
                                <div class="pi-img-wrapper">
                                    <img src="images/{{ $book['image'] }}" class="img-responsive" alt="">
                                    <div>
                                        <a href="book/{{ $book['slug'] }}" class="btn">Chi Tiết</a>
                                    </div>
                                </div>
                                <p><a href="">{{ $book['title'] }}</a></p>
                                <div class="pi-price">{{ number_format($book['price']) }}</div>
                                <p>VNĐ</p>
                                <a href="{{ route('addtocart',$book['id']) }}" class="btn add2cart">Thêm Vào Giỏ Hàng</a>
                                <div class="sticker sticker-new"></div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <ul class="start">
                {{ $type_product->links() }}
            </ul>
        </div>
        @include('sidebar')
        <div class="clearfix"></div>
    </div>
    <!---->
@endsection