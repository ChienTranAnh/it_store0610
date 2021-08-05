<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Illuminate\Support\Facades\View;
use Illuminate\Pagination\Paginator;
use App\Models\VaiTro;
use App\Models\DanhMuc;
use App\Models\Blog;
use App\Models\ChuDe;
use App\Models\ThuongHieu;
use App\Models\Cart;
use Illuminate\Support\Collection;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // phân trang
        Paginator::useBootstrap();

        // share vai trò trong sidebar
        view::composer('layoutsAd.sidebar', function($view)
        {
            $vaiTro = VaiTro::all();
            $view->with('vaiTro',$vaiTro);
        });

        // share danh mục trong header
        view::composer('layouts.header', function($view)
        {
            $danhMuc = DanhMuc::all();
            $view->with('danhMuc',$danhMuc);
        });

        // share thương hiệu trong header
        view::composer('layouts.header', function($view)
        {
            $thuongHieu = ThuongHieu::all();
            $view->with('thuongHieu',$thuongHieu);
        });

        // share danh mục trong rightbarProduct
        view::composer('layouts.rightbarProduct', function($view)
        {
            $danhMuc = DanhMuc::all();
            $view->with('danhMuc',$danhMuc);
        });

        // share chủ đề trong rightbarBlog, header
        view::composer(['layouts.rightbarBlog', 'layouts.header'], function($view)
        {
            $chuDe = ChuDe::all();
            $view->with('chuDe',$chuDe);
        });

        // share bài viết gần nhất trong rightbarBlog
        view::composer(['layouts.rightbarBlog', 'layouts.rightbarProduct'], function($view)
        {
            $collection = collect(Blog::where('DaDuyet',1)->get());
            $blog = $collection->sortByDesc('NgayDuyet')->take(3);
            $view->with('last_blog',$blog);
        });

        // share bài viết đánh giá gần nhất trong rightbarProduct
        view::composer('layouts.rightbarProduct', function($view)
        {
            $collection = collect(Blog::where('ChuDeId',"REVIEW")->where('DaDuyet',1)->get());
            $blog = $collection->sortByDesc('NgayDuyet')->take(3);
            $view->with('blog',$blog);
        });
    }
}