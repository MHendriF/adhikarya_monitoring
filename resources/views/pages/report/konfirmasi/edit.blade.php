@extends('layouts.app')

@section('custom-css')
    <link href="{{ asset("/assets/tema/ahsana/vendors/bower_components/dropify/dist/css/dropify.min.css") }}" rel="stylesheet" type="text/css"/>
@endsection

@section('title', 'Unit List')

@section('content')
<!-- Main Content -->
<div class="page-wrapper">
  <div class="container-fluid">

		<div class="row heading-bg">
		  <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
				<h5 class="txt-dark">Unit List</h5>
			</div>
			<!-- Breadcrumb -->
			<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
				<ol class="breadcrumb">
          <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
          <li><a href="{{ route('unit.index') }}"><span>Unit</span></a></li>
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
              <h5><strong>Total UNIT Site ini : 122/90</strong></h5>
            </div>
            <div class="clearfix"></div>
          </div>
          <div class="panel-wrapper collapse in">
            <div class="panel-body">
              <div class="row">
                <div class="col-md-12">
                  <div class="form-wrap">

                    {!! Form::model($unit, array('route' => ['unit.update', $unit->id_unit], 'method' => 'PUT', 'files' => true, 'class' => 'form-horizontal', 'data-toggle' => 'validator', 'role' => 'form')) !!}
                      @include('pages.master.unit.form',array('submit' => 'Create'))
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
    <!-- Bootstrap Dropify JavaScript -->
		<script src="{{ asset("/assets/tema/ahsana/vendors/bower_components/dropify/dist/js/dropify.min.js") }}"></script>
		<!-- Form Flie Upload Data JavaScript -->
		<script src="{{ asset("/assets/tema/ahsana/dist/js/form-file-upload-data.js") }}"></script>
@endsection
