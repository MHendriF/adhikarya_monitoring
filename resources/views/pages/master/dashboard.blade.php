@extends('layouts.app')

@section('custom-css')
    	<link rel="stylesheet" href="{{url('assets/theme/vendors/bower_components/morris.js/morris.css')}}">
@endsection

@section('title', 'Dashboard')

@section('content')

 <!-- Main Content -->
<div class="page-wrapper">
	<div class="container-fluid pt-25">

		<!-- Row -->
		<div class="row">
			<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
				<div class="panel panel-default card-view panel-refresh">
					<div class="refresh-container">
						<div class="la-anim-1"></div>
					</div>
					<div class="panel-heading">
						<div class="pull-left">
							<h6 class="panel-title txt-dark">Site Sold</h6>
						</div>
						<div class="pull-right">
							<a href="#" class="pull-left inline-block refresh mr-15">
								<i class="zmdi zmdi-replay"></i>
							</a>

						</div>
						<div class="clearfix"></div>
					</div>
					<div class="panel-wrapper collapse in">
						<div class="panel-body">

              <div id="chart" style="width:100%"></div>
              @piechart('Statistik_Site', 'chart')


              @foreach($sites as $site)
                <hr class="light-grey-hr row mt-10 mb-15"/>
                <div class="label-chatrs">
                  <div class="">
                    <span id="{{ $site->id_site }}" class="clabels clabels-lg inline-block bg-blue mr-10 pull-left"></span>
                    <span class="clabels-text font-12 inline-block txt-dark capitalize-font pull-left"><span class="block font-12 weight-500 mb-5">{{ $site->name_site }}</span><span class="block txt-grey">{{ $site->total_sold}} Sold</span></span>
                    <div class="clearfix"></div>
                  </div>
                </div>
              @endforeach

						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
				<div class="panel panel-default card-view">
					<div class="panel-wrapper collapse in">
						<div class="panel-body sm-data-box-1">
							<span class="uppercase-font weight-500 font-14 block text-center txt-dark">Customer Payment</span>
							<div class="cus-sat-stat weight-500 txt-success text-center mt-5">
								<span class="counter-anim">{{$persen_this_year}}</span><span>%</span>
							</div>
							<div class="progress-anim mt-20">
								<div class="progress">
									<div class="progress-bar progress-bar-success wow animated progress-animated" role="progressbar" aria-valuenow="{{$persen_this_year}}" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
							</div>

						</div>
					</div>
				</div>

			</div>
			<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
				<div class="panel panel-default card-view">
					<div class="panel-heading">
						<div class="pull-left">
							<h6 class="panel-title txt-dark">Sales statistics</h6>
						</div>

						<div class="clearfix"></div>
					</div>
					<div class="panel-wrapper collapse in">
						<div class="panel-body">

              <div id="chart4" style="width:100%"></div>
              @linechart('Statistik_Sales', 'chart4')

						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- /Row -->

		<!-- Row -->
		<div class="row">
			<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
				<div class="panel panel-default card-view pa-0">
					<div class="panel-wrapper collapse in">
						<div class="panel-body pa-0">
							<div class="sm-data-box bg-red">
								<div class="container-fluid">
									<div class="row">
										<div class="col-xs-8 text-center pl-0 pr-0 data-wrap-left">
											<span class="txt-light block counter"><span class="counter-anim">{{ $sales_count }}</span></span>
											<span class="weight-500 uppercase-font txt-light block font-13">Sales</span>
										</div>
										<div class="col-xs-4 text-center  pl-0 pr-0 data-wrap-right">
											<i class="zmdi zmdi-male-female txt-light data-right-rep-icon"></i>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
				<div class="panel panel-default card-view pa-0">
					<div class="panel-wrapper collapse in">
						<div class="panel-body pa-0">
							<div class="sm-data-box bg-yellow">
								<div class="container-fluid">
									<div class="row">
										<div class="col-xs-8 text-center pl-0 pr-0 data-wrap-left">
											<span class="txt-light block counter"><span class="counter-anim">{{$persen_this_month}}</span>%</span>
											<span class="weight-500 uppercase-font txt-light block">Paid Invoice ( {{$this_month}} )</span>
										</div>
										<div class="col-xs-4 text-center  pl-0 pr-0 data-wrap-right">
											<i class="zmdi zmdi-redo txt-light data-right-rep-icon"></i>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
				<div class="panel panel-default card-view pa-0">
					<div class="panel-wrapper collapse in">
						<div class="panel-body pa-0">
							<div class="sm-data-box bg-green">
								<div class="container-fluid">
									<div class="row">
										<div class="col-xs-8 text-center pl-0 pr-0 data-wrap-left">
											<span class="txt-light block counter">Rp <span class="counter-anim">{{$payment_this_month}}</span></span>
											<span class="weight-500 uppercase-font txt-light block">({{$this_month}})</span>
										</div>
										<div class="col-xs-4 text-center  pl-0 pr-0 data-wrap-right">
											<i class="zmdi zmdi-file txt-light data-right-rep-icon"></i>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
				<div class="panel panel-default card-view pa-0">
					<div class="panel-wrapper collapse in">
						<div class="panel-body pa-0">
							<div class="sm-data-box bg-blue">
								<div class="container-fluid">
									<div class="row">
										<div class="col-xs-8 text-center pl-0 pr-0 data-wrap-left">
											<span class="txt-light block counter">Rp <span class="counter-anim">{{$payment_this_year}}</span></span>
											<span class="weight-500 uppercase-font txt-light block">Total Paid</span>
										</div>
										<div class="col-xs-4 text-center  pl-0 pr-0 pt-25  data-wrap-right">
											<!-- <div id="sparkline_4" style="width: 100px; overflow: hidden; margin: 0px auto;"></div> -->
                      <i class="zmdi zmdi-file txt-light data-right-rep-icon"></i>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- /Row -->

		<!-- Row -->
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="panel panel-default card-view panel-refresh">
					<div class="refresh-container">
						<div class="la-anim-1"></div>
					</div>
					<div class="panel-heading">
						<div class="pull-left">
							<h6 class="panel-title txt-dark">Latest Payment</h6>
						</div>
						<div class="pull-right">
							<a href="#" class="pull-left inline-block refresh mr-15">
								<i class="zmdi zmdi-replay"></i>
							</a>
							<a href="#" class="pull-left inline-block full-screen mr-15">
								<i class="zmdi zmdi-fullscreen"></i>
							</a>
							<div class="pull-left inline-block dropdown">
								<a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false" role="button"><i class="zmdi zmdi-more-vert"></i></a>
								<ul class="dropdown-menu bullet dropdown-menu-right"  role="menu">
									<li role="presentation"><a href="javascript:void(0)" role="menuitem"><i class="icon wb-reply" aria-hidden="true"></i>Edit</a></li>
									<li role="presentation"><a href="javascript:void(0)" role="menuitem"><i class="icon wb-share" aria-hidden="true"></i>Delete</a></li>
									<li role="presentation"><a href="javascript:void(0)" role="menuitem"><i class="icon wb-trash" aria-hidden="true"></i>New</a></li>
								</ul>
							</div>
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
												<th>ID</th>
												<th>Customer</th>
												<th>INV No</th>
												<th>Sales</th>
												<th>Ammount</th>
												<th>Term</th>
												<th>Finance</th>
												<th>Status</th>
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


  <!-- <script src="{{url('assets/theme/dist/js/dashboard-data.js')}}"></script> -->

	<!-- Slimscroll JavaScript -->
 	<script src="{{url('assets/theme/dist/js/jquery.slimscroll.js')}}"></script>

	<!-- simpleWeather JavaScript -->
	<script src="{{url('assets/theme/vendors/bower_components/moment/min/moment.min.js')}}"></script>
	<script src="{{url('assets/theme/vendors/bower_components/simpleWeather/jquery.simpleWeather.min.js')}}"></script>
	<script src="{{url('assets/theme/dist/js/simpleweather-data.js')}}"></script>

	<!-- Progressbar Animation JavaScript -->
	<script src="{{url('assets/theme/vendors/bower_components/waypoints/lib/jquery.waypoints.min.js')}}"></script>
	<script src="{{url('assets/theme/vendors/bower_components/jquery.counterup/jquery.counterup.min.js')}}"></script>

	<!-- Fancy Dropdown JS -->
	<script src="{{url('assets/theme/dist/js/dropdown-bootstrap-extended.js')}}"></script>

	<!-- Owl JavaScript -->
	<script src="{{url('assets/theme/vendors/bower_components/owl.carousel/dist/owl.carousel.min.js')}}"></script>

	<!-- ChartJS JavaScript -->
	<script src="{{url('assets/theme/vendors/chart.js/Chart.min.js')}}"></script>

	<!-- Morris Charts JavaScript -->
	<script src="{{url('assets/theme/vendors/bower_components/raphael/raphael.min.js')}}"></script>
	<script src="{{url('assets/theme/vendors/bower_components/morris.js/morris.min.js')}}"></script>
	<script src="{{url('assets/theme/vendors/bower_components/jquery-toast-plugin/dist/jquery.toast.min.js')}}"></script>

	<!-- Switchery JavaScript -->
	<script src="{{url('assets/theme/vendors/bower_components/switchery/dist/switchery.min.js')}}"></script>

  <script>
      $(document).ready( function () {
          var t = $('#datatable').DataTable({
              "serverSide": true,
              "processing": true,
              "ajax": "{{ route('dashboard.ajax') }}",
              "columns": [
                  {data: 'DT_Row_Index', searchable: false},
                  {data: 'name_customer'},
                  {data: 'code_payment'},
                  {data: 'name_user', name: 'user.name_user'},
                  {data: 'inv_amount'},
                  {data: 'cicilan_ke'},
                  {data: 'name_user', name: 'user.name_user'},
                  {data: 'payment_status', "render": function (data, type, full, meta) { return (data == 0) ? '<span class="label label-warning">Unconfirm</span>' : '<span class="label label-success">Confirmed</span>'; } }

              ],
              "order": [[ 1, 'asc' ]]
          });
          t.on('draw.dt', function() {
              $('[data-toggle="tooltip"]').tooltip();
          })
      });
  </script>
@endsection
