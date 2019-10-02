@extends('layouts.auth')

@section('title', 'Reset Password')

@section('content')

<div class="container">
  <div class="d-flex justify-content-center h-100">
    <div class="card">
      <div class="card-header" style="font-size: 12px; color: #fff">
        <center>
            <img src="{{ asset('/assets/theme/img/logo_png.png') }}" style="max-height: 90px">
            <p>Ahsana Property Syariah</p>
        </center>
      </div>

      <div class="card-body">
        {!! Form::open(['route'=>'postReset', 'method' => 'store', 'class'=>'form-horizontal']) !!}
          <div class="input-group form-group">
            <div class="input-group-prepend" >
              <span class="input-group-text" style="color: #fff"><i class="fas fa-key"></i></span>
            </div>
            {!! Form::hidden('reset_code',$reset_code, array('class' => 'form-control')) !!}
            {!! Form::password('password', array('id'=> 'inputPassword', 'class' => 'form-control', 'required', 'placeholder' => 'Enter New Password')) !!}
						<div class="help-block with-errors"></div>
          </div>
          <div class="input-group form-group">
            <div class="input-group-prepend">
              <span class="input-group-text" style="color: #fff"><i class="fas fa-key"></i></span>
            </div>
            {!! Form::password('password', array('class' => 'form-control', 'required', 'placeholder' => 'Enter Confirm Password', 'data-match' => '#inputPassword', 'data-match-error'=>"Whoops, these don't match")) !!}
						<div class="help-block with-errors"></div>
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
            <button type="submit" class="btn float-right login_btn"><span class="txt_white" style="color: #fff;">Reset</span></button>
          </div>
        {!! Form::close() !!}
      </div>

      <div class="card-footer">
        <center><div style="color: #fff; font-size: 10px;color: #fff">
          <span >
            © 2018 . Ahsana Property Syariah. All rights reserved.
          </span>
          <p>Versi: 1.0.1</p></center>
        </div>
      </div>

    </div>
  </div>
</div>
@endsection
