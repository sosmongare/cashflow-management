@extends('layouts.header')

@section('content')
	<div class="register-box">

  <div class="card">
    <div class="card-body register-card-body">
      <p class="login-box-msg">{{config('app.name')}} <br> Sign Up</p>

      <form action="{{ route('register.post') }}" method="post">
      	@csrf

      	@if(session('success'))
      		<span class="text-success">{{ session('success') }}</span>
      	@endif
      	<!-- @if(session()->has('message'))
                  <div class="alert alert-success">
                      {{ session()->get('message') }}
                  </div>
              @endif -->
        <div class="form-group mb-3">
          <input type="text" name="name" class="form-control" placeholder="Full name">
       	<div class="form-group">
       		 @if ($errors->has('name'))
          		<span class="text-danger">{{ $errors->first('name') }}</span>
        	 @endif
       	</div>   
        </div>

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
              <input type="checkbox" name="checkbox" id="agreeTerms" name="terms" value="agree">
              <label for="agreeTerms">
               I agree to the <a href="#">terms</a>
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-success btn-block btn-sm">Register</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <a href="{{ route('login')}}" class="text-center">I already have an account</a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

@endsection