@extends('layouts.header')

@section('content')
	<div class="login-box">
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">{{config('app.name')}} <br> Sign In</p>

      <form action="{{ route('login.post')}}" method="post">

      	@csrf
      	@if(session('success'))
      		<span class="text-danger">{{ session('success') }}</span>
      	@endif


        <div class="form-group mb-3">
          <input type="email" name="email" class="form-control" placeholder="Email">
          	<div class="form-group">
          @if ($errors->has('email'))
          	<span class="text-danger">{{ $errors->first('email') }}</span>
          @endif
      		</div>
        </div>

        <div class="form-group mb-3">
          <input type="password" name="password" class="form-control" placeholder="Password">
          	<div class="form-group">
          @if ($errors->has('password'))
          	<span class="text-danger">{{ $errors->first('password') }}</span>
          @endif
        </div>
        	</div>
        	
        <div class="row">
          <div class="col-8">
            <div class="icheck-success">
              <input type="checkbox" name="remember" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-success btn-block btn-sm">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>


      <p class="mb-1">
        <a href="forgot-password.html">I forgot my password</a>
      </p>
      <p class="mb-0">
        <a href="{{ route('register')}}" class="text-center">Register for account</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

@endsection