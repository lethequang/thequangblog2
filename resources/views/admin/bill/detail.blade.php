@extends('admin.master')
@section('content')
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">
            <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Chi Tiết Đơn Hàng: #</h3>
                </div>
                <div class="box-body">
                    <div class="panel panel-default">
                        <div class="panel-heading">Thông Tin Giao Hàng</div>
                        <div class="panel-body">
                            <ul>
                                <li>Mã khách hàng: <span class="label label-info">{{ $customer->id }}</span></li>
                                <li>Họ và tên: <span class="label label-info">{{ $customer->full_name }}</span></li>
                                <li>Số điện thoại:<span class="label label-info">{{ $customer->phone }}</span></li>
                                <li>Địa chỉ email:<span class="label label-info">{{ $customer->email }}</span></li>
                                <li>Ghi chú:<span class="label label-info">{{ $customer->note }}</span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">Chi tiết giỏ hàng</div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                    <tr class="row-name">
                                        <th width="15%">Mã sách</th>
                                        <th width="40%">Tên sách</th>
                                        <th width="15%">Số lượng</th>
                                        <th width="30%">Thành tiền</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($bill_details as $bill_detail)
                                        <tr class="row-content">
                                            <td>{{ $bill_detail->id_product }}</td>
                                            <td>{{ $bill_detail->product->title }}</td>
                                            <td>{{ $bill_detail->quantity }}</td>
                                            <td>{{ $bill_detail->price }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr class="row-content">
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                        <span class="label label-info">Tổng tiền: {{ $bill_detail->bill->total }}</span>
                                        </td>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="box-footer">
                        <form>
                        <div class="well">
                            <span>Trạng thái: </span>
                            <label class="radio-inline"><input type="radio" value=""><span class="label label-primary">Chờ xử lý</span></label>
                            <label class="radio-inline"><input type="radio" value=""><span class="label label-success">Đã hoàn tất</span></label>
                            <label class="radio-inline"><input type="radio" value=""><span class="label label-danger">Đã bị hủy</span></label>
                        </div>
                            <button class="btn btn-success">Áp Dụng</button>
                        </form>
                    </div>
                </div>
            </div>
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->
@endsection
