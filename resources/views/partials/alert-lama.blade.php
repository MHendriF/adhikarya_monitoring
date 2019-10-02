@section('csstambahan')
	<link rel="stylesheet" href="{{url('assets/theme/vendors/bower_components/sweetalert/dist/sweetalert.css')}}">
@endsection
@section('jsadd')
	<!-- Sweet-Alert  -->
	<script src="{{url('assets/theme/vendors/bower_components/sweetalert/dist/sweetalert.min.js')}}"></script>
	<script src="{{url('assets/theme/dist/js/sweetalert-data.js')}}"></script>
@endsection

<div class="alert alert-danger alert-dismissable">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	Pastikan cek terlebih dahulu data, sebelum di submit
</div>
