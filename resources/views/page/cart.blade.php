@extends('master')
@section('content')
    <div class="content">
        <h4 class="title">Chi Tiết Giỏ Hàng</h4>
        <div class="row">
            <div class="col-sm-12 col-md-10 col-md-offset-1">
                @if(count($cartItems))
                    <table id="cart" class="table table-hover table-condensed">
                        <thead>
                        <tr>
                            <th style="width:50%">Sách</th>
                            <th style="width:10%">Đơn Giá</th>
                            <th style="width:8%">Số Lượng</th>
                            <th style="width:22%" class="text-center">Thành Tiền</th>
                            <th style="width:10%"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($cartItems as $item)
                            <tr class="tr-product" id="">
                                <td data-th="Product">
                                    <div class="row">
                                        <div class="col-sm-2 hidden-xs">
                                            <img src="images/{{ $item->options->has('image') ? $item->options->image : '' }}"
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
                                            <button type="button" class="btn btn-danger btn-number" data-type="minus" data-field="quant[2]">
                                                <span class="glyphicon glyphicon-minus"></span>
                                            </button>
                                        </span>
                                        <input type="number" class="form-control text-center" value="{{$item->qty}}">
                                        <span class="input-group-btn">
                                            <button type="button" class="btn btn-success btn-number" data-type="plus" data-field="quant[2]">
                                                <span class="glyphicon glyphicon-plus"></span>
                                            </button>
                                        </span>
                                    </div>
                                </td>
                                <td data-th="Subtotal" class="text-center">{{ number_format($item->subtotal) }}
                                    VNĐ
                                </td>
                                <td class="actions" data-th="">
                                    <a value="" class="del btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></a>
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
                    <p>Không có sản phẩm nào trong giỏ hàng</p>
                @endif
            </div>
        </div>
        <div class="check-out"></div>
    </div>
    <!---->
    <script src="source/js/jquery.min.js"></script>
@endsection