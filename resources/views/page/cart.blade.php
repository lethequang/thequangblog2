@extends('master')
@section('content')
    <div class="content">
        @if(session()->has('message'))
            <div class="alert alert-success">
                <h3 class="text-center">
                    {{ session()->get('message') }}
                </h3>
            </div>
        @endif
        @if(!Session::has('cart'))
            <div class="alert alert-danger"><h4 class="text-center">Bạn không có sản phẩm nào trong giỏ hàng. Vui lòng
                    quay lại <a href="{{ route('home') }}"> Trang Chủ</a> để đặt mua </h4></div>
        @else
            <h4 class="title">Chi Tiết Giỏ Hàng</h4>
            <div class="row">
                <div class="col-sm-12 col-md-10 col-md-offset-1">
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
                        @foreach($product_cart as $product)
                            <tr class="tr-product" id="tr-product{{ $product['item']['id'] }}">
                                <td data-th="Product">
                                    <div class="row">
                                        <div class="col-sm-2 hidden-xs"><img
                                                    src="images/{{ $product['item']['image'] }}" alt="..."
                                                    class="img-responsive"/></div>
                                        <div class="col-sm-10">
                                            <a href="{{ route('detail',$product['item']['id']) }}"><h4
                                                        class="nomargin">{{ $product['item']['title'] }}</h4></a>
                                            <p></p>
                                        </div>
                                    </div>
                                </td>
                                <td data-th="Price" id="dongia{{ $product['item']['id'] }}"
                                        value="{{ $product['item']['price'] }}">{{ number_format($product['item']['price']) }}
                                    VNĐ
                                </td>
                                <td data-th="Quantity">
                                    <input type="number" class="form-control text-center" value="{{ $product['qty'] }}">
                                </td>
                                <td data-th="Subtotal" class="text-center">{{ number_format($product['price']) }} VNĐ
                                </td>
                                <td class="actions" data-th="">
                                    <a value="{{ $product['item']['id'] }}" soluong="{{ $product['qty'] }}"
                                            class="del btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr class="visible-xs">
                            <td class="text-center"><strong class="rate" value="{{ $totalPrice }}">Tổng
                                    Cộng: {{ number_format($totalPrice) }}
                                    VNĐ</strong></td>
                        </tr>
                        <tr>
                            <td><a href="{{ route('home') }}" class="btn btn-warning"><i class="fa fa-angle-left"></i>
                                    Tiếp Tục Mua Hàng</a></td>
                            <td colspan="2" class="hidden-xs"></td>
                            <td class="hidden-xs text-center"><strong class="rate" value="{{ $totalPrice }}">Tổng
                                    Cộng: {{ number_format($totalPrice) }} VNĐ</strong></td>
                            <td><a href="{{ route('checkout') }}" class="btn btn-success btn-block">Đặt Hàng <i
                                            class="fa fa-angle-right"></i></a></td>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        @endif
        <div class="check-out"></div>
    </div>
    <!---->
    <script src="source/js/jquery.min.js"></script>
    <script>
		$(document).ready(function ($) {
			$('.delheader').click(function () {
				var id = $(this).attr('value');
				var route = "{{ route('del-item-cart',':id_pro') }}";
				route = route.replace(':id_pro', id);
				var soluong = $(this).attr("soluong");
				var dongia = $('#dongia' + id).attr('value')
				var tongdongia = $('.rate').attr('value');

				$.ajax({
					url: route,
					type: 'get',
					data: {id: id},
					success: function () {
						var tongsl = $('#tongsl').html();
						$("#tongsl").html(parseInt(tongsl) - parseInt(soluong));
						$('.rate').html(parseInt(tongdongia) - (parseInt(soluong) * parseInt(dongia)) + ' VNĐ ');
						$('.rate').attr('value', parseInt(tongdongia) - (parseInt(soluong) * parseInt(dongia)));
						$('#hidecart' + id).hide();
					},
					error: function (data) {
						console.log(data)
					}
				})
			})
		});
    </script>

    <script>
		$(document).ready(function ($) {
			$('.del').click(function () {
				var id = $(this).attr('value');
				var route = "{{ route('del-item-cart',':id_pro') }}";
				route = route.replace(':id_pro', id);
				var soluong = $(this).attr("soluong");
				var dongia = $('#dongia' + id).attr('value')
				var tongdongia = $('.rate').attr('value');

				$.ajax({
					url: route,
					type: 'get',
					data: {id: id},
					success: function () {
						var tongsl = $('#tongsl').html();
						$("#tongsl").html(parseInt(tongsl) - parseInt(soluong));
						$('.rate').html(parseInt(tongdongia) - (parseInt(soluong) * parseInt(dongia)) + ' VNĐ ');
						$('.rate').attr('value', parseInt(tongdongia) - (parseInt(soluong) * parseInt(dongia)));
						$('#tr-product' + id).hide();
					},
					error: function (data) {
						console.log(data)
					}
				})
			})
		});
    </script>

    {{--<script>
		$(document).ready(function ($) {
			$('.del').click(function () {
				var id = $(this).attr('value');
				var route = "{{ route('del-item-cart',':id_pro') }}";
				var soluong = $(this).attr('soluong');
				route = route.replace(':id_pro', id);
				var dongia  = $('#dongia'+id).attr('value')
				var tongdongia = $('.rate').attr('value');

				$.ajax({
					url: route,
					type: 'get',
					data: {id: id},
					success: function () {

						$('.rate').html(parseInt(tongdongia)-(parseInt(soluong)*parseInt(dongia))+' VNĐ ');
						$('.rate').attr('value',parseInt(tongdongia)-(parseInt(soluong)*parseInt(dongia)));
						$('#tr-product' + id).hide();
					},
					error: function (data) {
						console.log(data)
					}
				})
			})
		});
    </script>--}}
@endsection