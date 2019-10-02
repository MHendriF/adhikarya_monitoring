@extends('layouts.app')

@section('title', 'Banner Promo List')

@section('content')
<!-- Main Content -->
<div class="page-wrapper">
  <div class="container-fluid pt-25">

    <!-- Row -->
		<div class="row heading-bg">
		  <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
				<h5 class="txt-dark">Banner Promo List</h5>
			</div>
			<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
				<ol class="breadcrumb">
          <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
					<li class="active"><span>Banner</span></li>
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
  						<a href="{{ route('banner.create') }}" class="btn btn-rounded btn-warning"><i class="fa fa-plus"></i> Add New Banner</a>
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
												<th>Nama Promo</th>
                        <th>Site</th>
												<th>Description</th>
												<th>Image</th>
												<th>Expired Date</th>
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

@include('partials.sweetalert')

@push('message')
@include('partials.toastr')
@endpush

@endsection

@section('custom-js')
  <script>
      $(document).ready( function () {
          var t = $('#datatable').DataTable({
              "serverSide": true,
              "processing": true,
              "ajax": "{{ route('banner.ajax') }}",
              "columns": [
                  {data: 'DT_Row_Index', searchable: false},
                  {data: 'name'},
                  {data: 'site.name_site'},
                  {data: 'description'},
                  {data: "image_path", "width":"60px", "render": function (data, type, full, meta) { return '<img src="/image_upload/banner/'+ data +'" alt="no-logo" style="width:60%;height:auto">'; } },
                  {data: 'expired_date'},
                  {data: 'status', "render": function (data, type, full, meta) { return (data == 0) ? '<span class="label label-warning">Unactive</span>' : '<span class="label label-success">Active</span>'; } },
                  {data: 'action', orderable: false, searchable: false}
              ],
              "order": [[ 1, 'asc' ]]
          });
          t.on('draw.dt', function() {
              $('[data-toggle="tooltip"]').tooltip();
          })
      });
  </script>
@endsection
