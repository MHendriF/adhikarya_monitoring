@extends('layouts.auth')

@section('title', 'Login')

@section('content')

<div class="container">
  <div class="d-flex justify-content-center h-100">
    <div class="card">
      <div class="card-header" style="font-size: 12px; color: #fff">
        <center>
            <img src="{{ asset('/assets/theme/img/logo_adhi.png') }}" style="max-height: 90px">
            <p>Adhi Karya</p>
        </center>
      </div>

      <div class="card-body">
        {!! Form::open(['route'=>'postLogin', 'method' => 'store', 'class'=>'form-horizontal']) !!}
          <div class="input-group form-group">
            <div class="input-group-prepend" >
              <span class="input-group-text" style="color: #fff"><i class="fas fa-user"></i></span>
            </div>
            {!! Form::email('email',null, array('class' => 'form-control', 'placeholder' => 'Enter Email')) !!}
          </div>
          <div class="input-group form-group">
            <div class="input-group-prepend">
              <span class="input-group-text" style="color: #fff"><i class="fas fa-key"></i></span>
            </div>
            {!! Form::password('password', array('class' => 'form-control', 'placeholder' => 'Enter Password')) !!}
          </div>
          <div class="row align-items-center remember">
            <input id="checkbox_2" value="1" type="checkbox"  name="remember_me">Remember Me
          </div>
          @include('partials.errors')
					@if (session('timeout'))
						<div class="form-group">
						    <div class="alert alert-danger">
						        {{ session('timeout') }}
						    </div>
						</div>
					@endif
					@if (session('success'))
						<div class="form-group">
					    	<div class="alert alert-warning">
					        	{{ session('success') }}
					    	</div>
					    </div>
					@endif
          <div class="form-group">
            <button type="submit" class="btn float-right login_btn"><span class="txt_white" style="color: #fff"> Sign in</span></button>
          </div>
        {!! Form::close() !!}
      </div>

      <div class="card-footer">
        <div class="d-flex justify-content-center">
          <a href="{{ route('getForgot') }}">Forgot your password?</a>
        </div>
        <center><div style="color: #fff; font-size: 10px;color: #fff">
          <span >
            © 2019 . Adhi Karya. All rights reserved.
          </span>
          <p>Versi: 1.0.1</p></center>
        </div>
      </div>

    </div>
  </div>
</div>
@endsection
