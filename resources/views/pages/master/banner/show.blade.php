@extends('layouts.app')

@section('custom-css')
    <link href="{{ asset("/assets/tema/ahsana/vendors/bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css") }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset("/assets/tema/ahsana/vendors/bower_components/dropify/dist/css/dropify.min.css") }}" rel="stylesheet" type="text/css"/>
@endsection


@section('title', 'Banner Promo List')

@section('content')
<!-- Main Content -->
<div class="page-wrapper">
  <div class="container-fluid">

		<div class="row heading-bg">
		  <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
				<h5 class="txt-dark">Banner Promo Detail</h5>
			</div>
			<!-- Breadcrumb -->
			<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
				<ol class="breadcrumb">
          <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
          <li><a href="{{ route('banner.index') }}"><span>Banner</span></a></li>
          <li class="active"><span>Detail</span></li>
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
  						<h6 class="panel-title txt-light"><i class="fa fa-map-marker"></i>&nbsp;&nbsp;Form Banner</h6>
  					</div>
            <div class="clearfix"></div>
  				</div>

          <div id="collapse_1" class="panel-wrapper collapse in">
            <div class="panel-body">
              <div class="row">
                <center>
                  <h3 style="padding-top: 1em">Banner</h3>
                </center>

                {!! Form::model($banner, array('class' => 'form-horizontal', 'data-toggle' => 'validator', 'role' => 'form')) !!}
                    <div class="col-xs-6 col-sm-6 col-sm-offset-2">
                        <div class="panel-wrapper collapse in">
                            <div class="panel-body">
                                <div class="form-wrap">
                                    <div class="form-group">
                                        {!! Form::label('code','Nama Banner', array('class' => 'col-sm-4 control-label')) !!}
                                        <div class="col-sm-8">
                                            {!! Form::text('name',null, array('class' => 'form-control', 'readonly')) !!}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('nama_area','Site', array('class' => 'col-sm-4 control-label')) !!}
                                        <div class="col-sm-8">
                                            {!! Form::select('id_site', array_pluck($sites, 'name_site', 'id_site'), null, array('class' => 'form-control', 'readonly')) !!}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('nama_area','Status', array('class' => 'col-sm-4 control-label')) !!}
                                        <div class="col-sm-8">
                                            {!! Form::select('status', [0 => 'Unactive', 1 => 'Active'], null, array('class' => 'form-control select2_single', 'readonly')) !!}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('nama_area','Expired Date', array('class' => 'col-sm-4 control-label')) !!}
                                        <div class="col-sm-8">
                                            <div class='input-group date datetimepicker1'>
                                                @if(isset($banner))
                                                  <input type='text' name="expired_date" class="form-control" value="{{$banner->expired_date}}" readonly/>
                                                @endif
                                                <span class="input-group-addon">
                                                    <span class="glyphicon glyphicon-calendar"></span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('nama_area','Deskripsi', array('class' => 'col-sm-4 control-label')) !!}
                                        <div class="col-sm-8">
                                            {!! Form::textarea('description',null, array('class' => 'form-control', 'readonly', 'rows'=>'5')) !!}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('nama_area','Image', array('class' => 'col-sm-4 control-label')) !!}
                                        <div class="col-sm-8">
                                          @if(isset($banner))
                                            <input name="image_path" type="file" id="input-file-now" class="dropify" data-default-file="{{ asset('/image_upload/banner/'.$banner->image_path) }}" value="{{$banner->image_path}}"/ readonly>
                                          @endif
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('','', array('class' => 'col-sm-4 control-label')) !!}
                                        <div class="col-sm-8">
                                          <a href="{{ URL::previous() }}" class="btn btn-success mr-10">
                                            Back
                                          </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

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
    <script src="{{ asset("/assets/tema/ahsana/vendors/bower_components/moment/min/moment-with-locales.min.js") }}"></script>
    <!-- Bootstrap Datetimepicker JavaScript -->
    <script src="{{ asset("/assets/tema/ahsana/vendors/bower_components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js") }}"></script>
    <!-- Bootstrap Dropify JavaScript -->
		<script src="{{ asset("/assets/tema/ahsana/vendors/bower_components/dropify/dist/js/dropify.min.js") }}"></script>
		<!-- Form Flie Upload Data JavaScript -->
		<script src="{{ asset("/assets/tema/ahsana/dist/js/form-file-upload-data.js") }}"></script>

    <script type="text/javascript">
        $(function () {
            $('.datetimepicker1').datetimepicker({
                format: 'YYYY-MM-DD'
            });
        });
    </script>
@endsection
