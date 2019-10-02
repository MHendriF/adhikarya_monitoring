@extends('layouts.app')

@section('title', 'Customer Notification List')

@section('content')
<!-- Main Content -->
<div class="page-wrapper">
  <div class="container-fluid pt-25">

    <!-- Row -->
		<div class="row heading-bg">
		  <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
				<h5 class="txt-dark">Customer Notification List</h5>
			</div>
			<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
				<ol class="breadcrumb">
          <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
					<li class="active"><span>Customer Notification</span></li>
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
  						<a href="{{ route('notification.customer.create') }}" class="btn btn-rounded btn-warning"><i class="fa fa-plus"></i> Add New FCM</a>
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
												<th>Title</th>
                        <th>Body</th>
												<th>Image</th>
												<th>Sent to</th>
                        <th>Created at</th>
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
              "ajax": "{{ route('notification.customer.ajax') }}",
              "columns": [
                  {data: 'DT_Row_Index', searchable: false},
                  {data: 'title'},
                  {data: 'body'},
                  {data: "image_path", "width":"60px", "render": function (data, type, full, meta) { return (data == null) ? 'no-image' : '<img src="/image_upload/notification/'+ data +'" alt="no-logo" style="width:60%;height:auto">'; } },
                  // {data: 'site.name_site', "render": function (data, type, full, meta) { return (data == null) ? 'All Customer' : 'Customer Site '+data; } },
                  {data: 'destination'},
                  {data: 'created_at'},
                  {data: 'send_status', "render": function (data, type, full, meta) { return (data == 0) ? '<span class="label label-warning">Unsend</span>' : '<span class="label label-success">Send</span>'; } },
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
