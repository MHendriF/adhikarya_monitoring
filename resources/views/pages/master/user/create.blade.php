@extends('layouts.app')

@section('custom-css')
    <link href="{{ asset("/assets/theme/vendors/bower_components/dropify/dist/css/dropify.min.css") }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset("/assets/theme/vendors/bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css") }}" rel="stylesheet" type="text/css"/>
@endsection

@section('title', 'User Create')

@section('content')
<!-- Main Content -->
<div class="page-wrapper">
  <div class="container-fluid">

		<div class="row heading-bg">
		  <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
				<h5 class="txt-dark">User Create</h5>
			</div>
			<!-- Breadcrumb -->
			<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
				<ol class="breadcrumb">
          <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
          <li><a href="{{ route('user.index') }}"><span>User</span></a></li>
          <li class="active"><span>Create</span></li>
				</ol>
			</div>
			<!-- /Breadcrumb -->
		</div>

		@include('partials.alert')

    <!-- Row -->
    <div class="row">
      <div class="col-md-12">
        <div class="panel panel-default card-view">
          <div class="panel-heading">
            <div class="pull-left">
              <h6 class="panel-title txt-dark">Semua Data Required *</h6>
            </div>
            <div class="clearfix"></div>
          </div>
          <div class="panel-wrapper collapse in">
            <div class="panel-body">
              <div class="row">
                <div class="col-md-12">
                  <div class="form-wrap">

                    {!! Form::open(array('route' => 'user.store', 'method' => 'POST', 'files' => true, 'class' => 'form-horizontal', 'data-toggle' => 'validator', 'role' => 'form')) !!}
                      @include('pages.master.user.form',array('submit' => 'Create'))
                    {!! Form::close() !!}

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- /Row -->

  </div>
  <!-- /Container -->

  @include('partials.footer')

</div>
<!-- /Main Content -->

@endsection

@section('custom-js')
    <!-- Moment JavaScript -->
    <script src="{{ asset("/assets/theme/vendors/bower_components/moment/min/moment-with-locales.min.js") }}"></script>
    <!-- Bootstrap Datetimepicker JavaScript -->
    <script src="{{ asset("/assets/theme/vendors/bower_components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js") }}"></script>
    <!-- Bootstrap Dropify JavaScript -->
		<script src="{{ asset("/assets/theme/vendors/bower_components/dropify/dist/js/dropify.min.js") }}"></script>
		<!-- Form Flie Upload Data JavaScript -->
		<script src="{{ asset("/assets/theme/dist/js/form-file-upload-data.js") }}"></script>

    <script type="text/javascript">
        $(function () {
            $('.datetimepicker1').datetimepicker({
                format: 'YYYY-MM-DD'
            });
        });
    </script>
@endsection
