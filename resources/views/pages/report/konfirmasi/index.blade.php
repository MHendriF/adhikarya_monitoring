@extends('layouts.app')

@section('title', 'Konfirmasi Pembayaran Cicilan')

@section('content')
<!-- Main Content -->
<div class="page-wrapper">
  <div class="container-fluid pt-25">

    <!-- Row -->
		<div class="row heading-bg">
		  <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
				<h5 class="txt-dark">Konfirmasi Pembayaran Cicilan</h5>
			</div>
			<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
				<ol class="breadcrumb">
          <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
					<li class="active"><span>Konfirmasi Pembayaran Cicilan</span></li>
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
              <h4 class="panel-title txt-light"><strong>Filter Data Konfirmasi</strong></h4>
            </div>
            <div class="clearfix"></div>
          </div>
          <div class="panel-wrapper collapse in">
            <div class="panel-body">
              <div class="form-wrap">

                <form class="form-horizontal">
                  <div class="col-sm-12">
                    <div class="row mb-30">
                      <div class="col-sm-3">
                      </div>
                      <div class="col-sm-4">
                        <label class="control-label mb-10">Site Name</label>
                        <select id="site_param" name="site" class="form-control select2" required>
                            <option value='all'>All Site</option>
                            @foreach($site as $row)
                                <option value='{{ $row->id_site }}'>{{ $row->name_site }}</option>
                            @endforeach
                        </select>
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
                        <th>Customer Name</th>
                        <th>Site Name</th>
                        <th>ID Unit</th>
                        <th>ID Invoice</th>
                        <th>Inv Ammount</th>
                        <th>Img Lampiran</th>
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
              //"ajax": "{{ route('konfirmasi.ajax') }}",
              ajax: {
                 url: '{{ route( 'konfirmasi.ajax' ) }}',
                 data: function(d) {
                     d.site = $('#site_param').val();
                     //console.log("site:"+d.site+ " user:"+d.user+" status:"+d.status);
                 }
              },
              "columns": [
                  {data: 'DT_Row_Index', searchable: false},
                  {data: 'custom_customer'},
                  {data: 'name_site', name: 'site.name_site'},
                  {data: 'code_unit', name: 'unit.code_unit'},
                  {data: 'code_payment'},
                  {data: 'inv_amount'},
                  {data: "image_path", "width":"60px", "render": function (data, type, full, meta) { return (data != null) ? '<img src="/image_upload/payment/'+ data +'" alt="no-logo" style="width:60%;height:auto">' : '<img src="assets/tema/ahsana/img/no-image.png" alt="no-logo" style="width:60%;height:auto">'; } },
                  {data: 'action', orderable: false, searchable: false}
              ],
              "order": [[ 1, 'asc' ]]
          });
          oTable.on('draw.dt', function() {
              $('[data-toggle="tooltip"]').tooltip();
          });
          $('#find').on('click', function() {
            oTable.draw();
            console.log("terclick");
          });
      });
  </script>
@endsection
