<!-- =============================================== --><!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header"></li>

            <li class="treeview">
                <a href="#"> <i class="fa fa-circle"></i> <span>Sách</span> <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span> </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('product-list') }}"><i class="fa fa-circle-o"></i> Danh sách</a></li>
                    <li><a href="{{ route('product-add') }}"><i class="fa fa-circle-o"></i> Thêm mới</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#"> <i class="fa fa-circle"></i> <span>Tác giả</span> <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span> </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('author-list') }}"><i class="fa fa-circle-o"></i> Danh sách</a></li>
                    <li><a href="{{ route('author-add') }}"><i class="fa fa-circle-o"></i> Thêm mới</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#"> <i class="fa fa-circle"></i> <span>Thể loại</span> <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span> </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('category-list') }}"><i class="fa fa-circle-o"></i> Danh sách</a></li>
                    <li><a href="{{ route('category-add') }}"><i class="fa fa-circle-o"></i> Thêm mới</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#"> <i class="fa fa-circle"></i> <span>Đơn hàng</span> <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span> </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('bill-list') }}"><i class="fa fa-circle-o"></i> Danh sách</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#"> <i class="fa fa-circle"></i> <span>Khách hàng</span> <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span> </a>
                <ul class="treeview-menu">
                    <li><a href="customer-list"><i class="fa fa-circle-o"></i> Danh sách</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#"> <i class="fa fa-circle"></i> <span>Tài khoản</span> <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span> </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('user-list') }}"><i class="fa fa-circle-o"></i> Danh sách</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#"> <i class="fa fa-circle"></i> <span>Tin tức</span> <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span> </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('news-list') }}"><i class="fa fa-circle-o"></i> Danh sách</a></li>
                    <li><a href="{{ route('news-add') }}"><i class="fa fa-circle-o"></i> Thêm mới</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#"> <i class="fa fa-circle"></i> <span>Phản hồi</span> <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span> </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('feedback-list') }}"><i class="fa fa-circle-o"></i> Danh sách</a></li>
                </ul>
            </li>

        </ul>
    </section>
    <!-- /.sidebar -->
</aside>