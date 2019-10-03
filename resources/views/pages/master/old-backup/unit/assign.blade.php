@extends('layouts.app')

@section('custom-css')
    <link href="{{ asset("/assets/tema/ahsana/vendors/bower_components/dropify/dist/css/dropify.min.css") }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset("/assets/tema/ahsana/vendors/bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css") }}" rel="stylesheet" type="text/css"/>
@endsection

@section('title', 'Unit Assign')

@section('content')
<!-- Main Content -->
<div class="page-wrapper">
  <div class="container-fluid">

		<div class="row heading-bg">
		  <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
				<h5 class="txt-dark">Unit Assign</h5>
			</div>
			<!-- Breadcrumb -->
			<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
				<ol class="breadcrumb">
          <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
          <li><a href="{{ route('unit.index') }}"><span>Unit</span></a></li>
          <li class="active"><span>Assign</span></li>
				</ol>
			</div>
			<!-- /Breadcrumb -->
		</div>

    <!-- Row -->
    <div class="row">

      {!! Form::model($unit, array('route' => ['unit.assigned', $unit->id_unit], 'method' => 'PUT', 'files' => true, 'class' => 'form-horizontal', 'data-toggle' => 'validator', 'role' => 'form')) !!}
        @include('pages.master.unit.form-assign',array('submit' => 'Assign'))
      {!! Form::close() !!}

    </div>
    <!-- /Row -->

  </div>
  <!-- /Container -->

  @include('partials.footer')

</div>
<!-- /Main Content -->

@endsection

@section('custom-js')
    <!-- Moment JavaScript -->
    <script src="{{ asset("/assets/tema/ahsana/vendors/bower_components/moment/min/moment-with-locales.min.js") }}"></script>
    <!-- Bootstrap Datetimepicker JavaScript -->
    <script src="{{ asset("/assets/tema/ahsana/vendors/bower_components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js") }}"></script>
    <!-- Bootstrap Dropify JavaScript -->
    <script src="{{ asset("/assets/tema/ahsana/vendors/bower_components/dropify/dist/js/dropify.min.js") }}"></script>
    <!-- Form Flie Upload Data JavaScript -->
    <script src="{{ asset("/assets/tema/ahsana/dist/js/form-file-upload-data.js") }}"></script>
    <!-- Maskmoney JavaScript -->
    <script src="{{ asset("/assets/tema/ahsana/vendors/maskmoney/dist/jquery.maskMoney.min.js")}}"></script>

    <script type="text/javascript">
        $(function () {
            $('.datetimepicker1').datetimepicker({
                format: 'YYYY-MM-DD'
            });

            $(".money").maskMoney({allowNegative: true, thousands:'.', decimal:',', affixesStay: false});

            $('#payment_term').change(function(){
                calculate_amount();
            });

            $('#dp, #deal_price').on('keyup', function() {
                calculate_amount();
            });

            function calculate_amount(){
                var deal_price = $('#deal_price').maskMoney('unmasked')[0];
                var dp = $('#dp').maskMoney('unmasked')[0];
                var term = $('#payment_term').val();

                var amount = (deal_price-dp)/term;
                //console.log(amount);

                $('#payment_monthly').val(amount.formatMoney(2,',','.'));

            }

            Number.prototype.formatMoney = function(c, d, t){
                var n = this,
                    c = isNaN(c = Math.abs(c)) ? 2 : c,
                    d = d == undefined ? "," : d,
                    t = t == undefined ? "." : t,
                    s = n < 0 ? "-" : "",
                    i = parseInt(n = Math.abs(+n || 0).toFixed(c)) + "",
                    j = (j = i.length) > 3 ? j % 3 : 0;
                return s + (j ? i.substr(0, j) + t : "")
                + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + t)
                + (c ? d + Math.abs(n - i).toFixed(c).slice(2) : "");
            };
            //calculate_amount();
        });
    </script>
@endsection
