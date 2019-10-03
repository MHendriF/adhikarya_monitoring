@extends('layouts.app')

@section('custom-css')
    <link href="{{ asset("/assets/tema/ahsana/vendors/bower_components/dropify/dist/css/dropify.min.css") }}" rel="stylesheet" type="text/css"/>
@endsection

@section('title', 'Unit Detail')

@section('content')
<!-- Main Content -->
<div class="page-wrapper">
  <div class="container-fluid">

		<div class="row heading-bg">
		  <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
				<h5 class="txt-dark">Unit Detail</h5>
			</div>
			<!-- Breadcrumb -->
			<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
				<ol class="breadcrumb">
          <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
          <li><a href="{{ route('unit.index') }}"><span>Unit</span></a></li>
          <li class="active"><span>Detail</span></li>
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
              <h6 class="panel-title txt-dark">Unit {{$unit->code_unit}}</h6>
            </div>
            <div class="clearfix"></div>
          </div>
          <div class="panel-wrapper collapse in">
            <div class="panel-body">
              <div class="row">
                <div class="col-md-12">
                  <div class="form-wrap">

                    {!! Form::model($unit, array('class' => 'form-horizontal', 'data-toggle' => 'validator', 'role' => 'form')) !!}

                        <div class="form-body">
                          <h6 class="txt-dark capitalize-font"><i class="zmdi zmdi-account mr-10"></i>Basic Info</h6>
                          <hr class="light-grey-hr">
                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group  ">
                                <label class="control-label col-md-3">Nama Site</label>
                                <div class="col-md-9">
                                  {!! Form::text('name_site',$unit->site->name_site, array('class' => 'form-control', 'readonly', 'placeholder' => 'Site name')) !!}
                                </div>
                              </div>
                            </div>
                            <!--/span-->
                            <div class="col-md-6">
                              <div class="form-group">
                                <label class="control-label col-md-3">Type</label>
                                <div class="col-md-9">
                                  {!! Form::text('unit_type',null, array('class' => 'form-control', 'readonly', 'placeholder' => 'xxx')) !!}
                                </div>
                              </div>
                            </div>
                            <!--/span-->
                          </div>
                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group ">
                                <label class="control-label col-md-3">Unit Size</label>
                                <div class="col-md-9">
                                    {!! Form::text('unit_size',null, array('class' => 'form-control', 'readonly', 'placeholder' => 'ex 16 x 8')) !!}
                                </div>
                              </div>
                            </div>
                            <!--/span-->
                            <div class="col-md-6">
                              <div class="form-group ">
                                <label class="control-label col-md-3">Harga Unit</label>
                                <div class="col-md-9">
                                    @if(isset($unit))
                                      {!! Form::text('unit_price', number_format($unit->unit_price,2,",","."), array('id'=>'unit_price', 'class' => 'form-control money', 'readonly')) !!}
                                    @endif
                                </div>
                              </div>
                            </div>
                            <!--/span-->
                            <div class="col-md-6">
                              <div class="form-group ">
                                <label class="control-label col-md-3">Status</label>
                                <div class="col-md-9">
                                    {!! Form::select('status', [0 => 'Unsold', 1 => 'Sold'], null, array('class' => 'form-control select2_single', 'readonly')) !!}
                                </div>
                              </div>
                            </div>
                            <!--/span-->
                            <div class="col-md-6">
                              <div class="form-group">
                                <label class="control-label col-md-3">Minimal DP</label>
                                <div class="col-md-9">
                                    @if(isset($unit))
                                      {!! Form::text('minimum_dp', number_format($unit->minimum_dp,2,",","."), array('id'=>'minimum_dp', 'class' => 'form-control money', 'readonly')) !!}
                                    @endif
                                </div>
                              </div>
                            </div>
                            <!--/span-->
                          </div>
                          <!-- /Row -->
                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group">
                                <label class="control-label col-md-3">Image Cover</label>
                                <div class="col-md-9">
                                  @if(isset($unit))
                                    <input name="image_cover" type="file" id="input-file-now" class="dropify" data-default-file="{{ asset('/image_upload/unit/'.$unit->image_cover) }}" value="{{$unit->image_cover}}" readonly/>
                                  @endif
                                  <span class="help-block"> *jpg,gif,png format </span>
                                </div>
                              </div>
                            </div>
                            <!--/span-->
                            <div class="col-md-6">
                              <div class="form-group">
                                <label class="control-label col-md-3">Detail Unit</label>
                                <div class="col-md-9">
                                  {!! Form::textarea('description',null, array('class' => 'form-control', 'readonly', 'placeholder' => '....')) !!}
                                </div>
                              </div>
                            </div>
                            <!--/span-->
                          </div>
                          <!-- /Row -->
                          <div class="row">
                            <div class="col-md-12">
                              <div class="form-group">
                                <label class="control-label col-md-2" style="width: 160px">Image Detail</label>
                                <div class="col-md-2">
                                    @if(isset($unit))
                                      <input name="image_detail_1" type="file" id="input-file-now" class="dropify" data-default-file="{{ asset('/image_upload/unit/'.$unit->image_detail_1) }}" value="{{$unit->image_detail_1}}" readonly/>
                                    @else
                                      <input name="image_detail_1" type="file" id="input-file-now" class="dropify" />
                                    @endif
                                </div>
                                <div class="col-md-2">
                                    @if(isset($unit))
                                      <input name="image_detail_2" type="file" id="input-file-now" class="dropify" data-default-file="{{ asset('/image_upload/unit/'.$unit->image_detail_2) }}" value="{{$unit->image_detail_2}}" readonly/>
                                    @else
                                      <input name="image_detail_2" type="file" id="input-file-now" class="dropify" />
                                    @endif
                                </div>
                                <div class="col-md-2">
                                    @if(isset($unit))
                                      <input name="image_detail_3" type="file" id="input-file-now" class="dropify" data-default-file="{{ asset('/image_upload/unit/'.$unit->image_detail_3) }}" value="{{$unit->image_detail_3}}" readonly/>
                                    @else
                                      <input name="image_detail_3" type="file" id="input-file-now" class="dropify" />
                                    @endif
                                </div>
                                <div class="col-md-2">
                                    @if(isset($unit))
                                      <input name="image_detail_4" type="file" id="input-file-now" class="dropify" data-default-file="{{ asset('/image_upload/unit/'.$unit->image_detail_4) }}" value="{{$unit->image_detail_4}}" readonly/>
                                    @else
                                      <input name="image_detail_4" type="file" id="input-file-now" class="dropify" />
                                    @endif
                                </div>
                                <div class="col-md-2">
                                    @if(isset($unit))
                                      <input name="image_detail_5" type="file" id="input-file-now" class="dropify" data-default-file="{{ asset('/image_upload/unit/'.$unit->image_detail_5) }}" value="{{$unit->image_detail_5}}" readonly/>
                                    @else
                                      <input name="image_detail_5" type="file" id="input-file-now" class="dropify" />
                                    @endif
                                </div>
                              </div>
                            </div>
                          </div>
                          <!-- /Row -->
                        </div>
                        <div class="form-actions mt-10">
                          <div class="row">
                            <div class="col-md-6">
                              <div class="row">
                                <div class="col-md-offset-3 col-md-9">
                                  <a href="{{ URL::previous() }}" class="btn btn-success mr-10">
                                    Back
                                  </a>
                                </div>
                              </div>
                            </div>
                            <div class="col-md-6"> </div>
                          </div>
                        </div>

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
    <!-- Maskmoney JavaScript -->
    <script src="{{ asset("/assets/tema/ahsana/vendors/maskmoney/dist/jquery.maskMoney.min.js")}}"></script>
@endsection
