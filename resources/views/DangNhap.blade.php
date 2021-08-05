<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/main.css') }}">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Đăng nhập - Admin</title>
  </head>
  <body>
    <section class="material-half-bg">
        <div class="cover"></div>
    </section>
    <section class="login-content">
        <div class="logo">
            <h1>It_store</h1>
        </div>
        <div class="login-box">
            <form class="login-form" role="form" action="{{ url('/dangnhap') }}" method="POST">
                <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>ĐĂNG NHẬP</h3>
                <div class="form-group">
                    <label class="control-label">Tên đăng nhập/ Email *</label>
                    <input class="form-control" type="text" name="UserName" value="{{$user->UserName??''}}" placeholder="Username" autofocus>
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                </div>
                <div class="form-group">
                    <label class="control-label">Mật khẩu *</label>
                    <input class="form-control" type="password" name="MatKhau" placeholder="Password">
                </div>
                <div class="form-group">
                    <div class="utility">
                    <div class="animated-checkbox">
                        <label>
                        <input type="checkbox"><span class="label-text" title="Để cho đẹp">Stay Signed in</span>
                        </label>
                    </div>
                    <p class="semibold-text mb-2"><a href="#" data-toggle="flip">Bâng khuâng?</a></p>
                    </div>
                </div>
                <div class="form-group btn-container">
                    <button class="btn btn-primary btn-block"><i class="fa fa-sign-in fa-lg fa-fw"></i>ĐĂNG NHẬP</button>
                </div>
            </form>
            <form class="forget-form" action="index.html" method="POST">
                <h3 class="login-head"><i class="fa fa-lg fa-fw fa-lock"></i>Có lúc bạn bâng khuâng?</h3>
                <div class="form-group">
                    <label class="control-label">EMAIL</label>
                    <input class="form-control" type="text" placeholder="Nhập Email">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                </div>
                <div class="form-group btn-container">
                    <button class="btn btn-primary btn-block"><i class="fa fa-unlock fa-lg fa-fw"></i>GỬI</button>
                </div>
                <div class="form-group mt-3">
                    <p class="semibold-text mb-0"><a href="#" data-toggle="flip"><i class="fa fa-angle-left fa-fw"></i> ĐĂNG NHẬP</a></p>
                </div>
            </form>
        </div>
        <div class="alert">
            @if ( Session('message') )
                <div class="alert alert-warning alert-dismissible" role="alert">
                    <strong>{{ Session('message') }}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                </div>
            @endif
            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible" role="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                </div>
            @endif
        </div>
    </section>
    <!-- Essential javascripts for application to work-->
    <script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="{{ asset('js/plugins/pace.min.js') }}"></script>
    <script type="text/javascript">
      // Login Page Flipbox control
      $('.login-content [data-toggle="flip"]').click(function() {
      	$('.login-box').toggleClass('flipped');
      	return false;
      });
    </script>
  </body>
</html>