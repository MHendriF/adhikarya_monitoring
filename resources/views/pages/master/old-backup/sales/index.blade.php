@extends('layouts.app')

@section('title', 'User List')

@section('content')
<!-- Main Content -->
<div class="page-wrapper">
  <div class="container-fluid pt-25">

    <!-- Row -->
		<div class="row heading-bg">
		  <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
				<h5 class="txt-dark">User List</h5>
			</div>
			<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
				<ol class="breadcrumb">
          <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
					<li class="active"><span>User</span></li>
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
              <h4 class="panel-title txt-light"><strong>Filter Data Sales</strong></h4>
            </div>
            <div class="clearfix"></div>
          </div>
          <div class="panel-wrapper collapse in">
            <div class="panel-body">
              <div class="form-wrap">

                <form class="form-horizontal">
                  <div class="col-sm-12">
                    <div class="row mb-30">
                      <div class="col-sm-2">
                      </div>
                      <div class="col-sm-3">
                        <label class="control-label mb-10">Site Name</label>
                        <select id="site_param" name="site" class="form-control select2" required>
                            <option value='all'>All Site</option>
                            @foreach($site as $row)
                                <option value='{{ $row->id_site }}'>{{ $row->name_site }}</option>
                            @endforeach
                        </select>
                      </div>
                      <div class="col-sm-3">
                        <label class="control-label mb-10">Status</label>
                        <select id="status_param"  name="status" class="form-control select2" required>
                            <option value='all'>All Status</option>
                            <option value='1'>Active</option>
                            <option value='0'>Unactive</option>
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
                        <th>ID Sales</th>
                        <th>Nama</th>
                        <th>Email</th>
												<th>Image</th>
                        <th>Address</th>
                        <th>Customer Total</th>
                        <th>Phone</th>
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
          var oTable = $('#datatable').DataTable({
              "serverSide": true,
              "processing": true,
              // "ajax": "{{ route('sales.ajax') }}",
              ajax: {
                 url: '{{ route( 'sales.ajax' ) }}',
                 data: function(d) {
                     d.site = $('#site_param').val();
                     d.status = $('#status_param').val();

                     console.log("site:"+d.site+ " status:"+d.status);
                 }
              },
              "columns": [
                  {data: 'DT_Row_Index', searchable: false},
                  {data: 'code_user'},
                  {data: 'name_user'},
                  {data: 'email'},
                  {data: "image_path", "width":"60px", "render": function (data, type, full, meta) { return (data != null) ? '<img src="/image_upload/user/'+ data +'" alt="no-logo" style="width:60%;height:auto">' : '<img src="assets/tema/ahsana/img/no-image.png" alt="no-logo" style="width:60%;height:auto">'; } },
                  {data: 'address_1'},
                  {data: 'email'},
                  {data: 'phone'},
                  {data: 'status', "render": function (data, type, full, meta) { return (data == 0) ? '<span class="label label-warning">Unactive</span>' : '<span class="label label-success">Active</span>'; } },
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
@endsection