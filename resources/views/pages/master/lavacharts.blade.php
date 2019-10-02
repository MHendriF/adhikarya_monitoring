@extends('layouts.app')

@section('custom-css')
    	<link rel="stylesheet" href="{{url('assets/tema/ahsana/vendors/bower_components/morris.js/morris.css')}}">
@endsection

@section('title', 'Dashboard')

@section('content')

 <!-- Main Content -->
<div class="page-wrapper">
	<div class="container-fluid pt-25">

		<!-- Row -->
		<div class="row">
			<div class="col-lg-4">
				<div class="panel panel-default card-view">
					<div class="panel-heading">
						<div class="pull-left">
							<h6 class="panel-title txt-dark">PieChart</h6>
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="panel-wrapper collapse in">
						<div class="panel-body">
              <div id="chart" style="width:100%"></div>
              @piechart('IMDB', 'chart')
						</div>
					</div>
				</div>
			</div>

			<div class="col-lg-4">
				<div class="panel panel-default card-view">
          <div class="panel-heading">
						<div class="pull-left">
							<h6 class="panel-title txt-dark">DonutChart</h6>
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="panel-wrapper collapse in">
						<div class="panel-body">
              <div id="chart2" style="width:100%"></div>
              @donutchart('IMDB2', 'chart2')
						</div>
					</div>
				</div>
			</div>

			<div class="col-lg-4 ">
				<div class="panel panel-default card-view">
					<div class="panel-heading">
						<div class="pull-left">
							<h6 class="panel-title txt-dark">BarChart</h6>
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="panel-wrapper collapse in">
						<div class="panel-body">
              <div id="chart3" style="width:100%"></div>
              @barchart('Votes', 'chart3')
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- /Row -->

    <!-- Row -->
		<div class="row">
			<div class="col-lg-4">
				<div class="panel panel-default card-view">
					<div class="panel-heading">
						<div class="pull-left">
							<h6 class="panel-title txt-dark">LineChart</h6>
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="panel-wrapper collapse in">
						<div class="panel-body">
              <div id="chart4" style="width:100%"></div>
              @linechart('Temps', 'chart4')
						</div>
					</div>
				</div>
			</div>

			<div class="col-lg-4">
				<div class="panel panel-default card-view">
          <div class="panel-heading">
						<div class="pull-left">
							<h6 class="panel-title txt-dark">AreaChart</h6>
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="panel-wrapper collapse in">
						<div class="panel-body">
              <div id="chart5" style="width:100%"></div>
              @areachart('Population', 'chart5')
						</div>
					</div>
				</div>
			</div>

			<div class="col-lg-4 ">
				<div class="panel panel-default card-view">
					<div class="panel-heading">
						<div class="pull-left">
							<h6 class="panel-title txt-dark">ColumnChart</h6>
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="panel-wrapper collapse in">
						<div class="panel-body">
              <div id="chart6" style="width:100%"></div>
              @columnchart('Finances', 'chart6')
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- /Row -->

	</div>

  @include('partials.footer')

</div>
<!-- /Main Content -->
@push('message')
@include('partials.toastr')
@endpush

@endsection

@section('custom-js')


  <script src="{{url('assets/tema/ahsana/dist/js/dashboard-data.js')}}"></script>

	<!-- Slimscroll JavaScript -->
 	<script src="{{url('assets/tema/ahsana/dist/js/jquery.slimscroll.js')}}"></script>

	<!-- simpleWeather JavaScript -->
	<script src="{{url('assets/tema/ahsana/vendors/bower_components/moment/min/moment.min.js')}}"></script>
	<script src="{{url('assets/tema/ahsana/vendors/bower_components/simpleWeather/jquery.simpleWeather.min.js')}}"></script>
	<script src="{{url('assets/tema/ahsana/dist/js/simpleweather-data.js')}}"></script>

	<!-- Progressbar Animation JavaScript -->
	<script src="{{url('assets/tema/ahsana/vendors/bower_components/waypoints/lib/jquery.waypoints.min.js')}}"></script>
	<script src="{{url('assets/tema/ahsana/vendors/bower_components/jquery.counterup/jquery.counterup.min.js')}}"></script>

	<!-- Fancy Dropdown JS -->
	<script src="{{url('assets/tema/ahsana/dist/js/dropdown-bootstrap-extended.js')}}"></script>

	<!-- Owl JavaScript -->
	<script src="{{url('assets/tema/ahsana/vendors/bower_components/owl.carousel/dist/owl.carousel.min.js')}}"></script>

	<!-- ChartJS JavaScript -->
	<script src="{{url('assets/tema/ahsana/vendors/chart.js/Chart.min.js')}}"></script>

	<!-- Morris Charts JavaScript -->
	<script src="{{url('assets/tema/ahsana/vendors/bower_components/raphael/raphael.min.js')}}"></script>
	<script src="{{url('assets/tema/ahsana/vendors/bower_components/morris.js/morris.min.js')}}"></script>
	<script src="{{url('assets/tema/ahsana/vendors/bower_components/jquery-toast-plugin/dist/jquery.toast.min.js')}}"></script>

	<!-- Switchery JavaScript -->
	<script src="{{url('assets/tema/ahsana/vendors/bower_components/switchery/dist/switchery.min.js')}}"></script>


@endsection
