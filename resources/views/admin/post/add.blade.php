@include('admin.AdminLTE.sidebar')
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">ADD POST</h3>
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
                <form class="form-horizontal" action="{{ route('product-add') }}" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="">title</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="" name="title">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="">id_cat</label>
                        <div class="col-sm-4">
                            <input value="10" type="text" class="form-control" id="" name="id_cat">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="">id_auth</label>
                        <div class="col-sm-4">
                            <input value="30" type="text" class="form-control" id="" name="id_auth">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="">price</label>
                        <div class="col-sm-4">
                            <input value="20000" type="text" class="form-control" id="" name="price">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="">promo</label>
                        <div class="col-sm-4">
                            <input value="0" type="text" class="form-control" id="" name="promo">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="">year</label>
                        <div class="col-sm-4">
                            <input value="1994" type="text" class="form-control" id="" name="year">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="">image</label>
                        <div class="col-sm-4">
                            <input value="3055.jpg" type="text" class="form-control" id="" name="image">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="">quantity</label>
                        <div class="col-sm-4">
                            <input value="55" type="text" class="form-control" id="" name="quantity">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="">des</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="" name="descrip">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-default">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div><!-- /.content-wrapper -->@include('admin.AdminLTE.footer')