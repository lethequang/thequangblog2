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
                <h3 class="box-title">Danh Sách Đơn Hàng</h3>
            </div>
            <div class="box-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr class="row-name">
                            <th width="15%">Mã đơn hàng</th>
                            <th width="15%">Mã khách hàng</th>
                            <th width="20%">Khách hàng</th>
                            <th width="20%">Ngày đặt hàng</th>
                            <th width="20%">Trạng thái</th>
                            <th width="20%">Tùy chọn</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($bills as $bill)
                            <tr class="row-content">
                                <td>{{ $bill->id }}</td>
                                <td>{{ $bill->id_customer }}</td>
                                <td>{{ $bill->customer->full_name }}</td>
                                <td>{{ $bill->date_order }}</td>
                                <td>
                                    <span class="label label-primary">Chờ xử lý</span>
                                <td>
                                    <!-- Single button -->
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-default dropdown-toggle"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Thao tác <span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a href="{{ route('bill-detail',$bill->id) }}" aria-label="Settings">Xem</a>
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
                    <div class="text-center">{{ $bills->links() }}</div>
                </div>
            </div>
        </div>
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->
    @endsection
