@extends('layouts.auth')
@section('custom-header')
<style type="text/css">
  html,body{
  background-image: url('./assets/theme/img/bg_login_ahsana.jpeg');
  background-size: cover;
  background-repeat: no-repeat;
  height: 100%;
  -webkit-filter: grayscale(100%); /* Safari 6.0 - 9.0 */
  filter: grayscale(100%);
  font-family: 'Roboto', sans-serif;
}
</style>

@endsection
@section('title', 'Reset Password')

@section('content')

 <div class="container">
  <div class="d-flex justify-content-center h-100">
    <div class="card">
      <div class="card-header" style="font-size: 12px; color: #fff">
        <center><img src="{{ asset('/assets/theme/img/logo_png.png') }}" style="max-height: 90px">
          <p>Ahsana Property Syariah</p></center>

        </div>
        <div class="card-body">
         <div class="input-group form-group">
          <div class="input-group-prepend" >
            <span class="input-group-text" style="color: #fff"><i class="fas fa-user"></i></span>
          </div>
          <input type="email" class="form-control" name="email" value="" placeholder="Username">
        </div>
        <div class="input-group form-group">
          <div class="input-group-prepend">
            <span class="input-group-text" style="color: #fff"><i class="fas fa-key"></i></span>
          </div>

          <input type="email" class="form-control" name="email" value="" placeholder="ID user">
        </div>

        <div class="form-group">
          <a href="{{ route ('reset')}}" class="btn float-right login_btn" style="color: #fff">Reset</a>

        </div>
      </form>
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
