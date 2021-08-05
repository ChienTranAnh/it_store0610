{{-- <div class="col-md-3"> --}}
    <div class="side_bar">
        <div class="side_bar_blog">
            <h4>TÌM KIẾM</h4>
            <form action="/sanpham" method="GET">
                <div class="side_bar_search">
                    <div class="input-group stylish-input-group">
                    <input class="form-control" type="text" name="tuKhoa" value="{{ $tuKhoa ?? '' }}" placeholder="Tìm kiếm sản phẩm">
                    <span class="input-group-addon">
                        <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                    </span>
                    </div>
                </div>
            </form>
        </div>
        <div class="side_bar_blog">
            {{-- <h4>GET A QUOTE</h4>
            <p>An duo lorem altera gloriatur. No imperdiet adver sarium pro. No sit sumo lorem. Mei ea eius elitr consequ unturimperdiet.</p>
            <a class="btn sqaure_bt" href="it_service.html">View Service</a> --}}
        </div>
        <div class="side_bar_blog">
            <h4>Danh mục sản phẩm</h4>
            <div class="categary">
            <ul>
                @foreach($danhMuc as $dm)
                <li><a href="/danhmuc/sanpham/{{ $dm->Id }}"><i class="fa fa-angle-right"></i> {{ $dm->DanhMuc }}</a></li>
                @endforeach
            </ul>
            </div>
        </div>
        <div class="side_bar_blog">
            <h4>BÀI ĐÁNH GIÁ GẦN ĐÂY</h4>
            <div class="recent_post">
                <ul>
                    @foreach ($blog as $bl)
                    <li>
                        <p class="post_head"><a href="/blog-detail/{{ $bl->Id }}">{{ $bl->TieuDe }}</a></p>
                        <p class="post_date"><i class="fas fa-calendar-alt" aria-hidden="true"></i> {{ \Carbon\Carbon::parse($bl->NgaySua)->format('d M Y') }}</p>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="side_bar_blog">
            <h4>BÀI VIẾT GẦN ĐÂY</h4>
            <div class="recent_post">
                <ul>
                    @foreach ($last_blog as $bl)
                    <li>
                        <p class="post_head"><a href="/blog-detail/{{ $bl->Id }}">{{ $bl->TieuDe }}</a></p>
                        <p class="post_date"><i class="fas fa-calendar-alt" aria-hidden="true"></i> {{ \Carbon\Carbon::parse($bl->NgaySua)->format('d M Y') }}</p>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
{{-- </div> --}}