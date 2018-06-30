<div class="col-md-3 col-md">
    <div class="possible-about">
        <div class="single category">
            <h4 class="side-title">Thể Loại Sách</h4>
            <ul class="list-unstyled">
                @foreach($product_cat as $type)
                    <li><a href="category/{{ $type['id'] }}">{{ $type['name'] }}</a></li>
                @endforeach
            </ul>
            <div class="clearfix"></div>
        </div>
    </div>
    <div class="possible-about">
        <div class="single category">
            <h4 class="side-title">Tác Giả</h4>
            <ul class="list-unstyled">
                @foreach($product_author as $own)
                    <li><a href="author/{{ $own['id'] }}">{{ $own['name'] }}</a></li>
                @endforeach
            </ul>
        </div>
    </div>
</div>