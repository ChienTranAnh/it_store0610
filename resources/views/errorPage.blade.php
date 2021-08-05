@extends('layoutsAd.admin')

@section('title', 'Error 404')
@section('thanhphan', 'Error 404')

@section('content')
    <div style="height: 70%" class="content">
        <div class="page-error tile">
            <h1><i class="fa fa-exclamation-circle"></i> Error 404: Opps, Page not found!</h1>
            <p>The page you have requested is not found.</p>
            <a href="javascript:window.history.back();"><button class="btn btn-primary"><i class="fas fa-undo-alt"></i>Quay lại</button></a>
            @if (Session('message'))
                <div class="alert alert-warning" role="alert">
                    <h4>{{ Session('message') }}</h4>
                </div>
            @endif
        </div>
    </div>
@endsection