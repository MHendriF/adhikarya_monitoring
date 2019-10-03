@extends('layouts.app')

@section('custom-css')
    <link href="{{ asset("/assets/tema/ahsana/vendors/bower_components/dropify/dist/css/dropify.min.css") }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset("/assets/tema/ahsana/vendors/bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css") }}" rel="stylesheet" type="text/css"/>
@endsection

@section('title', 'Sales Detail')

@section('content')
<!-- Main Content -->
<div class="page-wrapper">
  <div class="container-fluid">

		<div class="row heading-bg">
		  <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
				<h5 class="txt-dark">Sales Detail</h5>
			</div>
			<!-- Breadcrumb -->
			<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
				<ol class="breadcrumb">
          <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
          <li><a href="{{ route('sales.index') }}"><span>Sales</span></a></li>
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
              <h6 class="panel-title txt-dark">Semua Data Required *</h6>
            </div>
            <div class="clearfix"></div>
          </div>
          <div class="panel-wrapper collapse in">
            <div class="panel-body">
              <div class="row">
                <div class="col-md-12">
                  <div class="form-wrap">

                    {!! Form::model($user, array('class' => 'form-horizontal', 'data-toggle' => 'validator', 'role' => 'form')) !!}

                        <div class="form-body">
                          <h6 class="txt-dark capitalize-font"><i class="zmdi zmdi-account mr-10"></i>Basic Info</h6>
                          <hr class="light-grey-hr"/>
                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group has-error">
                                <label class="control-label col-md-3">Nama Lengkap</label>
                                <div class="col-md-9">
                                  {!! Form::text('name_user',null, array('class' => 'form-control', 'readonly', 'placeholder' => 'Nama Sesuai KTP')) !!}
                                  <span class="help-block"> Pastikan penulisan sesuai </span>
                                </div>
                              </div>
                            </div>
                            <!--/span-->
                            <div class="col-md-6">
                              <div class="form-group has-error">
                                <label class="control-label col-md-3">Email</label>
                                <div class="col-md-9">
                                    {!! Form::text('email',null, array('class' => 'form-control', 'readonly', 'placeholder' => 'email@domain.com')) !!}
                                    <span class="help-block"> Pastikan penulisan sesuai</span>
                                </div>
                              </div>
                            </div>
                            <!--/span-->
                          </div>
                          <!-- /Row -->
                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group ">
                                <label class="control-label col-md-3">Username</label>
                                <div class="col-md-9">
                                  @if(isset($user))
                                    {!! Form::text('username',null, array('class' => 'form-control', 'readonly', 'placeholder' => 'username')) !!}
                                  @endif
                                  <span class="help-block"> no space</span>
                                </div>
                              </div>
                            </div>
                            <!--/span-->
                            <div class="col-md-6">
                              <div class="form-group ">
                                <label class="control-label col-md-3">Tempat Lahir</label>
                                <div class="col-md-9">
                                  {!! Form::text('place_of_birth',null, array('class' => 'form-control', 'readonly', 'placeholder' => 'xxxx')) !!}
                                </div>
                              </div>
                            </div>
                            <!--/span-->
                          </div>
                          <!-- /Row -->
                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group">
                                <label class="control-label col-md-3">Jenis Kelamin</label>
                                <div class="col-md-9">
                                  {!! Form::select('gender', [0 => 'Female', 1 => 'Male'], null, array('class' => 'form-control select2_single', 'readonly')) !!}
                                </div>
                              </div>
                            </div>
                            <!--/span-->
                            <div class="col-md-6">
                              <div class="form-group">
                                <label class="control-label col-md-3">Tanggal Lahir</label>
                                <div class="col-md-9">
                                  <div class='input-group date datetimepicker1'>
                                      @if(isset($user))
                                        <input type='text' name="date_of_birth" class="form-control" value="{{$user->date_of_birth}}" readonly/>
                                      @endif
                                      <span class="input-group-addon">
                                          <span class="glyphicon glyphicon-calendar"></span>
                                      </span>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <!--/span-->
                          </div>
                          <!-- /Row -->
                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group">
                                <label class="control-label col-md-3">Site</label>
                                <div class="col-md-9">
                                  {!! Form::select('id_site', array_pluck($sites, 'name_site', 'id_site'), null, array('class' => 'form-control', 'readonly')) !!}
                                </div>
                              </div>
                            </div>
                            <!--/span-->
                            <div class="col-md-6">
                              <div class="form-group">
                                <label class="control-label col-md-3">Status</label>
                                <div class="col-md-9">
                                  <div class="radio-list">
                                    <div class="radio-inline pl-0">
                                      <span class="radio radio-info">
                                        @if(isset($user))
                                          @if($user->status == 1)
                                            <input type="radio" name="status" id="radio_9" value="1" checked>
                                          @else
                                            <input type="radio" name="status" id="radio_9" value="1">
                                          @endif
                                        @endif
                                        <label for="radio_9">Active</label>
                                      </span>
                                    </div>
                                    <div class="radio-inline pl-0">
                                      <span class="radio radio-info">
                                        @if(isset($user))
                                          @if($user->status == 0)
                                            <input type="radio" name="status" id="radio_10" value="0" checked>
                                          @else
                                            <input type="radio" name="status" id="radio_10" value="0">
                                          @endif
                                        @endif
                                        <label for="radio_10">Unactive</label>
                                      </span>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <!--/span-->
                          </div>
                          <!-- /Row -->
                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group">
                                <label class="control-label col-md-3">Password</label>
                                <div class="col-md-9">
                                    @if(isset($user))
                                      <input type="password" class="form-control" name="password" value="{{$user->password}}" readonly>
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
                                <label class="control-label col-md-3">Upload image</label>
                                <div class="col-md-9">
                                  @if(isset($user))
                                    <input type="file" name="image_path" id="input-file-now" class="dropify" data-default-file="{{ asset('/image_upload/user/'.$user->image_path) }}" value="{{$user->image_path}}" readonly/>
                                  @endif
                                  <span class="help-block"> *jpg,gif,png format </span>
                                </div>
                              </div>
                            </div>
                            <!--/span-->
                          </div>

                          <div class="seprator-block"></div>

                          <h6 class="txt-dark capitalize-font"><i class="fa fa-map-marker mr-10"></i>Alamat</h6>
                          <hr class="light-grey-hr"/>
                          <!-- /Row -->
                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group">
                                <label class="control-label col-md-3">Alamat 1</label>
                                <div class="col-md-9">
                                  {!! Form::text('address_1',null, array('class' => 'form-control', 'readonly', 'placeholder' => 'alamat')) !!}
                                </div>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label class="control-label col-md-3">Alamat 2</label>
                                <div class="col-md-9">
                                  {!! Form::text('address_2',null, array('class' => 'form-control', 'readonly', 'placeholder' => 'alamat')) !!}
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group">
                                <label class="control-label col-md-3">Kota</label>
                                <div class="col-md-9">
                                    {!! Form::text('city',null, array('class' => 'form-control', 'readonly', 'placeholder' => 'kota')) !!}
                                </div>
                              </div>
                            </div>
                            <!--/span-->
                            <div class="col-md-6">
                              <div class="form-group">
                                <label class="control-label col-md-3">Provinsi</label>
                                <div class="col-md-9">
                                  {!! Form::text('province',null, array('class' => 'form-control', 'readonly', 'placeholder' => 'provinsi')) !!}
                                </div>
                              </div>
                            </div>
                            <!--/span-->
                          </div>
                          <!-- /Row -->
                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group">
                                <label class="control-label col-md-3">Kode Pos</label>
                                <div class="col-md-9">
                                  {!! Form::text('postal_code',null, array('class' => 'form-control', 'readonly', 'placeholder' => 'kode pos')) !!}
                                </div>
                              </div>
                            </div>
                            <!--/span-->
                          </div>
                          <!-- /Row -->

                          <div class="seprator-block"></div>

                          <h6 class="txt-dark capitalize-font"><i class="zmdi zmdi-account-box mr-10"></i>Data ID</h6>
                          <hr class="light-grey-hr">
                          <!-- /Row -->
                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group">
                                <label class="control-label col-md-3">Bank Account Name</label>
                                <div class="col-md-9">
                                  {!! Form::text('bank_name',null, array('class' => 'form-control', 'readonly', 'placeholder' => 'Bank XXXXXX')) !!}
                                </div>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label class="control-label col-md-3">Bank Account ID</label>
                                <div class="col-md-9">
                                  {!! Form::text('bank_account_number',null, array('class' => 'form-control', 'readonly', 'placeholder' => 'No.Rek XXXXXX')) !!}
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group">
                                <label class="control-label col-md-3">No KTP</label>
                                <div class="col-md-9">
                                  {!! Form::text('ktp',null, array('class' => 'form-control', 'readonly', 'placeholder' => 'xxxx')) !!}
                                </div>
                              </div>
                            </div>
                            <!--/span-->
                            <div class="col-md-6">
                              <div class="form-group ">
                                <label class="control-label col-md-3">No HP</label>
                                <div class="col-md-9">
                                  {!! Form::text('phone',null, array('class' => 'form-control', 'readonly', 'placeholder' => 'xxxx')) !!}
                                </div>
                              </div>
                            </div>
                            <!--/span-->
                          </div>
                          <!-- /Row -->
                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group">
                                <label class="control-label col-md-3">NPWP</label>
                                <div class="col-md-9">
                                  {!! Form::text('npwp',null, array('class' => 'form-control', 'readonly', 'placeholder' => 'xxxx')) !!}
                                </div>
                              </div>
                            </div>
                          </div>
                          <!-- /Row -->
                          <div class="row mr-15 ml-15">
                            <div class="col-md-12">
                              @include('partials.errors')
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
