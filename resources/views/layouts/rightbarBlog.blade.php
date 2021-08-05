{{-- <div class="col-md-3"> --}}
    <div class="side_bar">
        <div class="side_bar_blog">
            <h4>TÌM KIẾM</h4>
            <form action="/blog" method="GET">
                <div class="side_bar_search">
                    <div class="input-group stylish-input-group">
                    <input class="form-control" type="text" name="tuKhoa" value="{{ $tuKhoa ?? '' }}" placeholder="Tìm kiếm bài viết">
                    <span class="input-group-addon">
                        <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                    </span>
                    </div>
                </div>
            </form>
        </div>
        <div class="side_bar_blog">
            <h4>TÁC GIẢ</h4>
            {{-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. sed do eiusmod tempor.</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p> --}}
        </div>
        <div class="side_bar_blog">
            <h4>Chủ đề</h4>
            <div class="categary">
                <ul>
                    @foreach($chuDe as $cd)
                    <li><a href="/chude/blog/{{ $cd->Id }}"><i class="fa fa-angle-right"></i> {{ $cd->TenChuDe }}</a></li>
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
        <div class="side_bar_blog">
          <h4>BÀI VIẾT THEO THÁNG</h4>
          <div class="categary">
            <ul>
              <li><a href="#"><i class="fa fa-caret-right"></i> Tháng 6 (12)</a></li>
              <li><a href="#"><i class="fa fa-caret-right"></i> Tháng 7 (12)</a></li>
              <li><a href="#"><i class="fa fa-caret-right"></i> Tháng 3 (12)</a></li>
              <li><a href="#"><i class="fa fa-caret-right"></i> Tháng 11 (12)</a></li>
              <li><a href="#"><i class="fa fa-caret-right"></i> Tháng 12 (12)</a></li>
            </ul>
          </div>
        </div>
    </div>
{{-- </div> --}}