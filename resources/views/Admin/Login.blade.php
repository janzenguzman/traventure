@extends('layouts.admin.login_headlayout')  
<body>
<!-- Preloader -->
<div class="preloader">
  <div class="cssload-speeding-wheel"></div>
</div>
<section id="wrapper" class="login-register">
  <div class="login-box">
    <center>
        <img class="img-responsive" style = "length:150px; width:150px; margin-bottom:2%" src="/uploads/files/logo.png">
    </center>
    <div class="white-box">
        <form class="form-horizontal form-material" id="loginform" role="form" method="POST" action="{{ route('Admin.Login.Submit') }}">
        {{ csrf_field() }}
        <h3 class="box-title m-b-20">Admin Sign In</h3>
        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
          <div class="col-xs-12">
                <input class="form-control" type="email" placeholder="Email" name="email" value="{{ old('email') }}" required>
                    @if ($errors->has('email'))
                        <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                    @endif
          </div>  
        </div>
        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            <div class="col-xs-12">
             {{--  <a class="pull-right" href="{{ route('password.request') }}">Forgot Your Password?</a>   --}}
                <input class="form-control" type="password" placeholder="Password" name="password" required>
                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
            </div>
        <div>
        {{--  <div class="form-group">
          <div class="col-md-12">
            <div class="checkbox checkbox-primary pull-left p-t-0">
              <input id="checkbox-signup" type="checkbox">
              <label for="checkbox-signup"> Remember me </label>
            </div>
            <a href="#" id="to-recover" class="text-dark pull-right"><i class="fa fa-lock"></i> Forgot pwd?</a> </div>
        </div>  --}}
        <div class="form-group text-center m-t-20">
          <div class="col-xs-12">
            <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Log In</button>
          </div>
        </div>
      </form>  
    </div>
  </div>  
</section>

</body>
</html>
@extends('layouts.admin.login_scriptlayout')
{{--  @extends('layouts.admin.login_headlayout')

<body>
    <div id="container" >
        <!-- LOGIN FORM -->
        <!--===================================================-->
        <div class="lock-wrapper">
            <div class="row">
                <div class="col-md-12">
                    <center><img class="img-responsive" style = "length:200px; width:200px; 
                                    margin-bottom:2%" src="/uploads/files/logo.png"></center>
                    <div class="col-xs-12" style="background-color:white; box-shadow: 5px 10px 18px #000000;" >
                        <div class="panel-body">
                            <h3 class="text-semibold" style="text-align:center">ADMIN LOGIN</h3>
                            <br>
                            <form role="form" method="POST" action="{{ route('Admin.Login.Submit') }}">
                            {{ csrf_field() }}
                            
                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label class="text-semibold" for="email">Email Address</label>
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                </div>

                               <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                    <!--<a class="pull-right" href="#">Forgot password?</a>-->
                                    <a class="pull-right" href="{{ route('password.request') }}">
                                    Forgot Your Password?
                                    </a>
                                    <label class="text-semibold" for="password">Password</label>
                                    <input id="password" type="password" class="form-control" name="password" required>

                                        @if ($errors->has('password'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                </div>   
                                <div class="pull-left pad-btm">
                                    <div class="checkbox">
                                        <label class="form-checkbox form-icon form-text">
                                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                        </label>
                                    </div>
                                </div>

                                
                                 <button type="submit" class="btn btn btn-primary pull-right">
                                    Log In
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <div>
@extends('layouts.admin.login_scriptlayout')
</body>
</html>  --}}

