@extends('template.master')

@section('title')
  Login | HsienTsungWu
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <!-- msg -->
                @if (Session::has('msg-danger'))
                    <div class="alert alert-danger" role="alert">{{ Session::get('msg-danger') }}</div>
                @endif

                {{ Form::open(array('url'=>'user/login', 'class'=>'form-signin')) }}
                    <h2 class="form-signin-heading">Editor Login</h2>
                    <input type="email" name="username" class="form-control" placeholder="Email address" required="" autofocus="" value="{{ Input::old('username') }}">
                    <input type="password" name="password" class="form-control" placeholder="Password" required="">
                    <div class="checkbox">
                        <label>
                          <input type="checkbox" value="remember-me"> Remember me
                        </label>
                    </div>
                    <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
                {{ Form::close() }}
            </div>
        </div>
    </div>
@stop