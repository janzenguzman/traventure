<!DOCTYPE html>
<html lang="en">

@extends('layouts.admin.login_headlayout')

<body background-image='url("public/uploads/admin/landing.jpg")'>
    <div id="container">
        <!-- LOGIN FORM -->
        <!--===================================================-->
        <div class="lock-wrapper">
            <div class="row">
                <div class="col-xs-12">
                    <div class="lock-box" style="opacity: 0.9">
                        <div class="main">
                            <h3>ADMIN LOGIN</h3>
                            <form role="form" method="POST" action="{{ route('Admin.Login.Submit') }}">
                            {{ csrf_field() }}
                            
                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label for="email">Username or email</label>
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
                                    <label for="password">Password</label>
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
        
        @extends('layouts.admin.login_scriptlayout')
</body>



</html>