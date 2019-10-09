@extends('layouts.app')

@section('custom-css')
    <link href="{{ asset("/assets/theme/vendors/bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css") }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset("/assets/theme/vendors/bower_components/dropify/dist/css/dropify.min.css") }}" rel="stylesheet" type="text/css"/>
@endsection

@section('title', $submenu)

@section('content')
<!-- Main Content -->
<div class="page-wrapper">
  <div class="container-fluid">

		<div class="row heading-bg">
		  <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
				<h5 class="txt-dark">Edit {{ $submenu }}</h5>
			</div>
			<!-- Breadcrumb -->
			<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
				<ol class="breadcrumb">
          <li><a href="{{ route('dashboard') }}"><i class="fa fa-home"></i>&nbsp;Dashboard</a></li>
          <li><a href="{{ route('lembaga.index') }}"><span>{{ $submenu }}</span></a></li>
          <li class="active"><span>Edit</span></li>
				</ol>
			</div>
			<!-- /Breadcrumb -->
		</div>

		@include('partials.alert')

		<!-- Row -->
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="panel panel-primary card-view">

          <div class="panel-heading">
  					<div class="pull-left">
  						<h6 class="panel-title txt-light"><i class="fa fa-map-marker"></i>&nbsp;&nbsp;Form {{ $submenu }}</h6>
  					</div>
            <div class="clearfix"></div>
  				</div>

          <div id="collapse_1" class="panel-wrapper collapse in">
            <div class="panel-body">
              <div class="row">
                <center>
                  <h3 style="padding-top: 1em">{{ $submenu }}</h3>
                </center>

                {!! Form::model($lembaga, array('route' => ['lembaga.update', $lembaga->id_lembaga], 'method' => 'PUT', 'files' => true, 'class' => 'form-horizontal', 'data-toggle' => 'validator', 'role' => 'form')) !!}
                  @include('pages.master.lembaga.form',array('submit' => 'Update'))
                {!! Form::close() !!}

              </div>
            </div>
          </div>

				</div>
			</div>
		</div>
		<!-- Row -->

  </div>

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
