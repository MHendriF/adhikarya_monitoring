@extends('layouts.app')

@section('title', $submenu)

@section('content')
<!-- Main Content -->
<div class="page-wrapper">
  <div class="container-fluid pt-25">

    <!-- Row -->
		<div class="row heading-bg">
		  <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
				<h5 class="txt-dark">List {{ $submenu }}</h5>
			</div>
			<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
				<ol class="breadcrumb">
          <li><a href="{{ route('dashboard') }}"><i class="fa fa-home"></i>&nbsp;Dashboard</a></li>
					<li class="active"><span>User</span></li>
				</ol>
			</div>
		</div>
    <!-- Row -->

		<!-- Row -->
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="panel panel-default card-view">
					<div class="panel-heading">
						<div class="clearfix"></div>
  					<div class="pull-left">
  						<a href="{{ route('user.create') }}" class="btn btn-rounded btn-warning"><i class="fa fa-plus"></i> Tambah {{ $submenu }}</a>
  					</div>
  				</div>

					<div class="clearfix"></div>
					<div class="panel-wrapper collapse in">
						<div class="panel-body row pa-0">
							<div class="table-wrap">
								<div class="table-responsive">
									<table class="table table-hover mb-0" id="datatable">
										<thead>
											<tr>
												<th>#</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Jabatan</th>
                        <th>Divisi</th>
                        <th>Lembaga</th>
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

@include('partials.sweetalert')

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
              "ajax": "{{ route('user.ajax') }}",
              "columns": [
                  {data: 'DT_RowIndex', searchable: false},
                  {data: 'nama_user'},
                  {data: 'email'},
                  {data: 'nama_jabatan'},
                  {data: 'nama_divisi'},
                  {data: 'nama_lembaga'},
                  {data: 'action', orderable: false, searchable: false}
              ],
              "order": [[ 1, 'asc' ]]
          });
          oTable.on('draw.dt', function() {
              $('[data-toggle="tooltip"]').tooltip();
          })
      });
  </script>
@endsection
