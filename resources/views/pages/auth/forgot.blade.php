@extends('layouts.auth')

@section('title', 'Forgot Password')

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
        {!! Form::open(['route'=>'postForgot', 'method' => 'store', 'class'=>'form-horizontal']) !!}
          <div class="input-group form-group">
            <div class="input-group-prepend" >
              <span class="input-group-text" style="color: #fff"><i class="fas fa-user"></i></span>
            </div>
            {!! Form::email('email',null, array('class' => 'form-control', 'placeholder' => 'Your Valid Email here...')) !!}
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
            <button type="submit" class="btn float-right login_btn"><span class="txt_white" style="color: #fff;">Sent Code</span></button>
          </div>
        {!! Form::close() !!}
      </div>

      <div class="card-footer">
        <div class="d-flex justify-content-center">
          <a href="{{ route('login') }}">Sign In</a>
        </div>
        <center><div style="color: #fff; font-size: 10px;color: #fff">
          <span >
            © 2019 PT. Adhi Karya. All rights reserved.
          </span>
          <p>Versi: 1.0.0</p></center>
        </div>
      </div>

    </div>
  </div>
</div>
@endsection
