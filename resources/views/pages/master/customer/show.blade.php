@extends('layouts.app')

@section('title', 'Customer Detail')

@section('content')
<!-- Main Content -->
<div class="page-wrapper">
	<div class="container-fluid pt-25">

		<!-- Row -->
		<div class="row heading-bg">
			<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
				<h5 class="txt-dark">Customer Detail</h5>
			</div>
			<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
				<ol class="breadcrumb">
					<li><a href="{{ route('dashboard') }}">Dashboard</a></li>
					<li><a href="{{ route('customer.index') }}"><span>Customer</span></a></li>
					<li class="active"><span>Detail</span></li>
				</ol>
			</div>
		</div>
		<!-- Row -->

		<!-- Row -->
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

				<div class="col-lg-4 col-md-12 col-xs-12">
					<div class="panel panel-default card-view  pa-0">
						<div class="panel-wrapper collapse in">
							<div class="panel-body  pa-0">
								<div class="profile-box">
									<div class="profile-cover-pic">
										<div class="fileupload btn btn-default">
 										</div>
 									</div>
									<div class="profile-info text-center">
										<div class="profile-img-wrap">
											@if($customer->image_path)
												<img class="inline-block mb-10" src="{{ asset('/image_upload/customer/'.$customer->image_path) }}" alt="user"/>
											@else
												<img class="inline-block mb-10" src="{{url('assets/tema/ahsana/img/no-image.png')}}" alt="user"/>
											@endif
										</div>
										<h5 class="block mt-10 mb-5 weight-500 capitalize-font txt-danger">{{$customer->name_customer}}</h5>
										<h6 class="block capitalize-font pb-20">Join at : {{$customer->created_at}}</h6>
									</div>
									<div class="social-info">
										<div class="row">
											<div class="col-xs-4 text-center">
												<span class="counts block head-font"><span class="counter-anim">{{$logs_count}}</span></span>
												<span class="counts-text block">logs</span>
											</div>
											<div class="col-xs-4 text-center">
												<span class="counts block head-font"><span class="counter-anim">{{$invoice_count}}</span></span>
												<span class="counts-text block">invoice total</span>
											</div>
											<div class="col-xs-4 text-center">
												<span class="counts block head-font"><span class="counter-anim">{{$unit_count}}</span></span>
												<span class="counts-text block">Unit Buy</span>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="col-lg-8 col-md-6 col-sm-6 col-xs-12">
						<div class="panel panel-default card-view">
							<div class="panel-heading">
								<div class="pull-left">
									<h6 class="panel-title txt-dark">Customer transaction Logs</h6>
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="panel-wrapper collapse in">
								<div class="panel-body row pa-0">
									<div class="table-wrap">
										<div class="table-responsive">
											<table class="table table-hover mb-0" id="datatable">
		                    <thead>
		                      <tr>
		                        <th>#</th>
		                        <th>ID Invoice</th>
		                        <th>Site Name</th>
		                        <th>Activity</th>
		                        <th>Amount</th>
		                        <th>Log Date</th>
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
		<!-- Progressbar Animation JavaScript -->
		<script src="{{url('assets/tema/ahsana/vendors/bower_components/waypoints/lib/jquery.waypoints.min.js')}}"></script>
		<script src="{{url('assets/tema/ahsana/vendors/bower_components/jquery.counterup/jquery.counterup.min.js')}}"></script>

		<script>
	      $(document).ready( function () {
	          var oTable = $('#datatable').DataTable({
	              "serverSide": true,
	              "processing": true,
								ajax: {
	                 url: '{{ route( 'customer.log.ajax' ) }}',
	                 data: function(d) {
	                     d.customer = {{$customer->id_customer}};
	                     console.log("customer:"+{{$customer->id_customer}});
	                 }
	              },
	              "columns": [
	                  {data: 'DT_Row_Index', searchable: false},
	                  {data: 'code_payment'},
	                  {data: 'name_site', name: 'site.name_site'},
										{data: 'payment_status', "render": function (data, type, full, meta) { return (data == 0) ? 'Invoice telah terkirim' : 'Invoice telah terkonfirmasi'; } },
	                  {data: 'inv_amount', "render": function (data, type, full, meta) { return 'Rp '+ data} },
	                  {data: 'created_at'}
	              ],
	              "order": [[ 1, 'asc' ]]
	          });
	          oTable.on('draw.dt', function() {
	              $('[data-toggle="tooltip"]').tooltip();
	          })
	      });
	  </script>
@endsection
