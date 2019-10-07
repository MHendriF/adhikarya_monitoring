@extends('layouts.app')

@section('custom-css')
      <link href="{{ asset("/assets/theme/vendors/bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css") }}" rel="stylesheet" type="text/css"/>
      <link href="{{ asset("/assets/theme/vendors/bower_components/dropify/dist/css/dropify.min.css") }}" rel="stylesheet" type="text/css"/>
      <link rel="stylesheet" href="{{url('assets/theme/vendors/bower_components/morris.js/morris.css')}}">
@endsection

@section('title', 'Dashboard')

@section('content')

 <!-- Main Content -->
<div class="page-wrapper">
	<div class="container-fluid pt-25">

    <!-- Row -->
		<div class="row heading-bg">
		  <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
				<h5 class="txt-dark">Dashboard</h5>
			</div>
			<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
				<ol class="breadcrumb">
          <li><a href="{{ route('dashboard') }}"><i class="fa fa-home"></i>&nbsp;Dashboard</a></li>
					<li class="active"><span>Main</span></li>
				</ol>
			</div>
		</div>
    <!-- Row -->

    <!-- Row -->
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="panel panel-primary card-view">
          <div class="panel-heading">
            <div class="pull-left">
              <h4 class="panel-title txt-light"><strong>Filter Data Document</strong></h4>
            </div>
            <div class="clearfix"></div>
					</div>
          <div class="panel-wrapper collapse in">
					  <div class="panel-body">
              <div class="form-wrap">
                <form class="form-horizontal">
                  <div class="col-sm-12">
                    <div class="row mb-30">
                      <div class="col-sm-1">
                      </div>
                      <div class="col-sm-3">
												<label class="control-label mb-10">Jenis Dokumen</label>
												<select id="jenis_dokumen_param" name="jenis_dokumen" class="form-control select2" required>
                            <option value='all'>Semua Dokumen</option>
                            @foreach($documents as $row)
                                <option value='{{ $row->id_jenis_dokumen }}'>{{ $row->nama_jenis_dokumen }}</option>
                            @endforeach
                        </select>
											</div>
                      <div class="col-sm-3">
												<label class="control-label mb-10">Tgl Pengajuan Awal</label>
                        <div class='input-group date datetimepicker1'>
        									<input id="start_date_param" type='text' class="form-control" name="start_date"/>
        									<span class="input-group-addon">
        										<span class="fa fa-calendar"></span>
        									</span>
        								</div>
											</div>
                      <div class="col-sm-3">
												<label class="control-label mb-10">Tgl Pengajuan Akhir</label>
                        <div class='input-group date datetimepicker1'>
        									<input id="end_date_param" type='text' class="form-control" name="end_date"/>
        									<span class="input-group-addon">
        										<span class="fa fa-calendar"></span>
        									</span>
        								</div>
											</div>
                      <div class="col-sm-1">
												<label class="control-label mb-10">Submit</label>
                        <button type="button" id="find" class="btn login_btn btn-primary"><i class="fa fa-arrow-right"></i></button>
											</div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>

				</div>
			</div>
		</div>
    <!-- Row -->

		<!-- Row -->
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="panel panel-default card-view">


					<div class="clearfix"></div>
					<div class="panel-wrapper collapse in">
						<div class="panel-body row pa-0">
							<div class="table-wrap">
								<div class="table-responsive">
									<table class="table table-hover mb-0" id="datatable">
										<thead>
											<tr>
                        <th>#</th>
                        <th>Kode Dokumen</th>
                        <th>Nama Dokumen</th>
                        <th>Status Dokumen</th>
                        <th>Keterangan</th>
                        <th>Tanggal Pengajuan</th>
												<th>Manage</th>
											</tr>
										</thead>
										<tbody>
										</tbody>
									</table>
								</div>
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
@push('message')
@include('partials.toastr')
@endpush

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

  <script>
      $(document).ready( function () {
          var oTable = $('#datatable').DataTable({
              "serverSide": true,
              "processing": true,
              //"ajax": "{{ route('dashboard.ajax') }}",
              ajax: {
                 url: '{{ route( 'dashboard.ajax' ) }}',
                 data: function(d) {
                     d.jenis_dokumen = $('#jenis_dokumen_param').val();
                     d.start_date = $('#start_date_param').val();
                     d.end_date = $('#end_date_param').val();

                     console.log("jenis_dokumen:"+d.jenis_dokumen+ " start_date:"+d.start_date+" end_date:"+d.end_date);
                 }
              },
              "columns": [
                  {data: 'DT_RowIndex', searchable: false},
                  {data: 'kode_dokumen'},
                  {data: 'nama_dokumen'},
                  {data: 'status_dokumen'},
                  {data: 'keterangan_dokumen'},
                  {data: 'tanggal_pengajuan'},
                  {data: 'action', orderable: false, searchable: false}
              ],
              "order": [[ 1, 'asc' ]]
          });
          oTable.on('draw.dt', function() {
              $('[data-toggle="tooltip"]').tooltip();
          })

          $('#find').on('click', function() {
            oTable.draw();
            //console.log("terclick");
          });
      });
  </script>

@endsection
