@extends('layouts.app')

@section('custom-css')
    <link href="{{ asset("/assets/tema/ahsana/vendors/bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css") }}" rel="stylesheet" type="text/css"/>
@endsection

@section('title', 'Invoice List')

@section('content')
<!-- Main Content -->
<div class="page-wrapper">
  <div class="container-fluid pt-25">

    <!-- Row -->
		<div class="row heading-bg">
		  <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
				<h5 class="txt-dark">Invoice List</h5>
			</div>
			<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
				<ol class="breadcrumb">
          <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
					<li class="active"><span>Invoice</span></li>
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
              <h4 class="panel-title txt-light"><strong>Filter Data Invoice</strong></h4>
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
												<label class="control-label mb-10">Unit Code</label>
												<select id="unit_param" name="unit" class="form-control select2" required>
                            <option value='all'>All Unit</option>
                            @foreach($unit as $row)
                                <option value='{{ $row->id_unit }}'>{{ $row->code_unit }}</option>
                            @endforeach
                        </select>
											</div>
                      <div class="col-sm-3">
												<label class="control-label mb-10">Dari tanggal</label>
                        <div class='input-group date datetimepicker1'>
        									<input id="start_date_param" type='text' class="form-control" name="start_date"/>
        									<span class="input-group-addon">
        										<span class="fa fa-calendar"></span>
        									</span>
        								</div>
											</div>
                      <div class="col-sm-3">
												<label class="control-label mb-10">Ke tanggal</label>
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
                        <th>No Invoice</th>
                        <th>Due Date</th>
                        <th>ID Unit</th>
                        <th>Customer Name</th>
                        <th>Inv Ammount</th>
                        <th>Cicilan ke</th>
                        <th>Sales Name</th>
                        <th>Status</th>
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
  <script>
      $(document).ready( function () {
          var oTable = $('#datatable').DataTable({
              "serverSide": true,
              "processing": true,
              ajax: {
                 url: '{{ route( 'invoice.ajax' ) }}',
                 data: function(d) {
                     d.unit = $('#unit_param').val();
                     d.start_date = $('#start_date_param').val();
                     d.end_date = $('#end_date_param').val();

                     console.log("unit:"+d.unit+ " start_date:"+d.start_date+" end_date:"+d.end_date);
                 }
              },
              // "ajax": "{{ route('invoice.ajax') }}",
              "columns": [
                  {data: 'DT_Row_Index', searchable: false},
                  {data: 'code_payment'},
                  {data: 'due_date'},
                  {data: 'code_unit', name: 'unit.code_unit'},
                  {data: 'custom_customer'},
                  {data: 'inv_amount'},
                  {data: 'cicilan_ke'},
                  {data: 'name_user', name: 'user.name_user'},
                  {data: 'send_status', "render": function (data, type, full, meta) { return (data == 0) ? '<span class="label label-warning">Unsend</span>' : '<span class="label label-success">Send</span>'; } },
                  {data: 'action', orderable: false, searchable: false}
              ],
              "order": [[ 1, 'asc' ]]
          });
          oTable.on('draw.dt', function() {
              $('[data-toggle="tooltip"]').tooltip();
          })

          $('#find').on('click', function() {
            oTable.draw();
            console.log("terclick");
          });
      });
  </script>

  <!-- Moment JavaScript -->
  <script src="{{ asset("/assets/tema/ahsana/vendors/bower_components/moment/min/moment-with-locales.min.js") }}"></script>
  <!-- Bootstrap Datetimepicker JavaScript -->
  <script src="{{ asset("/assets/tema/ahsana/vendors/bower_components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js") }}"></script>

  <script type="text/javascript">
      $(function () {
          $('.datetimepicker1').datetimepicker({
              format: 'YYYY-MM-DD'
          });
      });
  </script>
@endsection
