@extends('layouts.app')

@section('custom-css')
    	<link rel="stylesheet" href="{{url('assets/theme/vendors/bower_components/morris.js/morris.css')}}">
@endsection

@section('title', 'Dashboard')

@section('content')

 <!-- Main Content -->
<div class="page-wrapper">
	<div class="container-fluid pt-25">


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

@endsection
