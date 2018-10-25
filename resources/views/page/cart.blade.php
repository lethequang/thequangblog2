@extends('master')
@section('content')
    <div class="content">
        <h4 class="title">Chi Tiết Giỏ Hàng</h4>

        <div class="row">
            <div class="container">
                @if(count($cartItems))
                    <table id="cart" class="table table-hover table-condensed">
                        <thead>
                        <tr>
                            <th style="width:45%" class="text-center">Sách</th>
                            <th style="width:10%" class="text-center">Đơn Giá</th>
                            <th style="width:15%" class="text-center">Số Lượng</th>
                            <th style="width:20%" class="text-center">Thành Tiền</th>
                            <th style="width:10%" class="text-center"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($cartItems as $item)
                            <tr class="tr-product" id="">
                                <td data-th="Product">
                                    <div class="row">
                                        <div class="col-sm-2 hidden-xs">
                                            <img src="images/{{ $item->options->image }}"
                                                    alt="" class="img-responsive"/>
                                        </div>
                                        <div class="col-sm-10">
                                            <a href="{{ route('detail',$item->id) }}"><h4
                                                        class="nomargin">{{ $item->name }} {{ $item->image }} </h4></a>
                                            <p></p>
                                        </div>
                                    </div>
                                </td>
                                <td data-th="Price" id="" value="">{{ number_format($item->price) }}
                                    VNĐ
                                </td>
                                <td data-th="Quantity">
                                    <div class="input-group">
                                    <span class="input-group-btn">
                                        <a href="{{ url("update-cart?product_id=$item->id&decrease=1") }}"
                                                class="quantity-left-minus btn btn-danger btn-number" data-type="minus"
                                                data-field="">
                                          <span class="glyphicon glyphicon-minus"></span>
                                        </a>
                                    </span> <input type="text" id="quantity" name="quantity"
                                                class="form-control input-number text-center" value="{{ $item->qty }}">
                                        <span class="input-group-btn">
                                        <a href="{{ url("update-cart?product_id=$item->id&increment=1") }}"
                                                class="quantity-right-plus btn btn-success btn-number" data-type="plus"
                                                data-field="">
                                            <span class="glyphicon glyphicon-plus"></span>
                                        </a>
                                    </span>
                                    </div>
                                </td>
                                <td data-th="Subtotal" class="text-center">{{ number_format($item->subtotal) }}
                                    VNĐ
                                </td>
                                <td class="actions" data-th="">
                                    <a href="{{ url("del-item-cart?$item->id") }}" class="del btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr class="visible-xs">
                            <td class="text-center"><strong class="rate" value="">Tổng Cộng: {{ Cart::total()}}
                                    VNĐ</strong></td>
                        </tr>
                        <tr>
                            <td><a href="{{ route('home') }}" class="btn btn-warning"><i class="fa fa-angle-left"></i>
                                    Tiếp Tục Mua Hàng</a></td>
                            <td colspan="2" class="hidden-xs"></td>
                            <td class="hidden-xs text-center"><strong class="rate" value="">Tổng
                                    Cộng: {{ Cart::total()}} VNĐ</strong></td>
                            <td><a href="{{ route('checkout') }}" class="btn btn-success btn-block">Đặt Hàng <i
                                            class="fa fa-angle-right"></i></a></td>
                        </tr>
                        </tfoot>
                    </table>
                @else
                    <div class="alert alert-danger"><h4 class="text-center">Bạn không có sản phẩm nào trong giỏ hàng. Vui lòng
                            quay lại <a href="{{ route('home') }}"> Trang Chủ</a> để đặt mua </h4></div>
                @endif
            </div>
        </div>
        <div class="check-out"></div>
    </div>
    <!---->
    <script src="source/js/jquery.min.js"></script>
@endsection