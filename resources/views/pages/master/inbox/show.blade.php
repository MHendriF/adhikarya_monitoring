@extends('layouts.app')

@section('custom-css')
  <link href="{{ asset("/assets/tema/ahsana/vendors/bower_components/dropify/dist/css/dropify.min.css") }}" rel="stylesheet" type="text/css"/>
@endsection

@section('title', 'Inbox Detail')

@section('content')
<!-- Main Content -->
<div class="page-wrapper">
  <div class="container-fluid">

		<div class="row heading-bg">
		  <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
				<h5 class="txt-dark">Inbox Detail</h5>
			</div>
			<!-- Breadcrumb -->
			<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
				<ol class="breadcrumb">
          <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
          <li><a href="{{ route('inbox.index') }}"><span>Inbox</span></a></li>
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
  						<h6 class="panel-title txt-light"><i class="fa fa-map-marker"></i>&nbsp;&nbsp;Form Support</h6>
  					</div>
            <div class="clearfix"></div>
  				</div>

          <div id="collapse_1" class="panel-wrapper collapse in">
            <div class="panel-body">
              <div class="row">
                <center>
                  <h3 style="padding-top: 1em">Support</h3>
                </center>

                {!! Form::model($support, array('class' => 'form-horizontal', 'data-toggle' => 'validator', 'role' => 'form')) !!}

                  <div class="col-xs-6 col-sm-6 col-sm-offset-2">
                      <div class="panel-wrapper collapse in">
                          <div class="panel-body">
                              <div class="form-wrap">
                                  <div class="form-group">
                                      {!! Form::label('code','Title', array('class' => 'col-sm-4 control-label')) !!}
                                      <div class="col-sm-8">
                                          {!! Form::text('title',null, array('class' => 'form-control', 'readonly')) !!}
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      {!! Form::label('code','Content', array('class' => 'col-sm-4 control-label')) !!}
                                      <div class="col-sm-8">
                                          {!! Form::text('content',null, array('class' => 'form-control', 'readonly')) !!}
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      {!! Form::label('code','Sender', array('class' => 'col-sm-4 control-label')) !!}
                                      <div class="col-sm-8">
                                          {!! Form::text('sender',null, array('class' => 'form-control', 'readonly')) !!}
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      {!! Form::label('code','Email Sender', array('class' => 'col-sm-4 control-label')) !!}
                                      <div class="col-sm-8">
                                          {!! Form::text('email',null, array('class' => 'form-control', 'readonly')) !!}
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      {!! Form::label('code','Phone', array('class' => 'col-sm-4 control-label')) !!}
                                      <div class="col-sm-8">
                                          {!! Form::text('phone',null, array('class' => 'form-control', 'readonly')) !!}
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      {!! Form::label('nama_area','Category', array('class' => 'col-sm-4 control-label')) !!}
                                      <div class="col-sm-8">
                                          {!! Form::select('category', [1 => 'Support', 2 => 'Payment'], null, array('class' => 'form-control select2_single', 'readonly')) !!}
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      {!! Form::label('nama_area','Image', array('class' => 'col-sm-4 control-label')) !!}
                                      <div class="col-sm-8">
                                        @if(isset($support))
                                          <input name="image_path" type="file" id="input-file-now" class="dropify" data-default-file="{{ asset('/image_upload/support/'.$support->image_path) }}" value="{{$support->image_path}}" readonly/>
                                        @else
                                          <input name="image_path" type="file" id="input-file-now" class="dropify" readonly/>
                                        @endif
                                      </div>
                                  </div>
                                  <div class="col-sm-10 col-sm-offset-3">
                                      @include('partials.errors')
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
    <!-- Bootstrap Dropify JavaScript -->
		<script src="{{ asset("/assets/tema/ahsana/vendors/bower_components/dropify/dist/js/dropify.min.js") }}"></script>
		<!-- Form Flie Upload Data JavaScript -->
		<script src="{{ asset("/assets/tema/ahsana/dist/js/form-file-upload-data.js") }}"></script>
@endsection
