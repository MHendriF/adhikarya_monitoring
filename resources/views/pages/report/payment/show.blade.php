@extends('layouts.app')

@section('custom-css')
    <link href="{{ asset("/assets/tema/ahsana/vendors/bower_components/dropify/dist/css/dropify.min.css") }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset("/assets/tema/ahsana/vendors/bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css") }}" rel="stylesheet" type="text/css"/>
@endsection

@section('title', 'Payment Detail')

@section('content')
<!-- Main Content -->
<div class="page-wrapper">
  <div class="container-fluid">

		<div class="row heading-bg">
		  <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
				<h5 class="txt-dark">Payment @if($payment[0]->cicilan_ke == 'DP')
                                      DP
                                     @else
                                      Cicilan ke : {{ $payment[0]->cicilan_ke }}
                                    @endif </h5>
			</div>
			<!-- Breadcrumb -->
			<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
				<ol class="breadcrumb">
          <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
          <li><a href="{{ route('payment.index') }}"><span>Payment</span></a></li>
          <li class="active"><span>Detail</span></li>
				</ol>
			</div>
			<!-- /Breadcrumb -->
		</div>

    <!-- Row -->
    <div class="row">
     <div class="col-md-12">
       <div class="panel panel-default card-view">
         <div class="panel-heading">
           <div class="pull-left">
             <h6 class="panel-title txt-dark">Invoice</h6>
           </div>
           <div class="pull-right">
             <h6 class="txt-dark">{{ $payment[0]->code_payment}}</h6>
           </div>
           <div class="clearfix"></div>
         </div>
         <div class="panel-wrapper collapse in">
           <div class="panel-body">
             <div class="row">
               <div class="col-xs-6">
                 <span class="txt-dark head-font inline-block capitalize-font mb-5">
                   <img src="{{url('assets/tema/ahsana/img/logo_png.png')}}">
                 </span>
                 <address class="mb-15">
                   <span class="address-head mb-5">PT. Ahsana Property Syariah</span>
                   Jl. Masjid Agung No.5-7, Pagesangan, <br>
                   Jambangan,
                   <br>Kota SBY, Jawa Timur 60233
                   <br><abbr title="Phone">Tlp :</abbr>(133) 456-7890
                 </address>
               </div>
               <div class="col-xs-6 text-right">
                 <span class="txt-dark head-font inline-block capitalize-font mb-5">Ditagihkan Kepada YTH :</span>
                 <address class="mb-15">
                   <span class="address-head mb-5">{{ $payment[0]->name_customer }}</span>
                   {{ $payment[0]->address_customer }} - {{ $payment[0]->customer_city }}<br>
                   {{ $payment[0]->email_customer }}<br>
                   <abbr title="Phone">HP: </abbr>{{ $payment[0]->phone_customer }}
                 </address>
               </div>
             </div>

             <div class="row">
               <div class="col-xs-6">
                 <address>
                   <span class="txt-dark head-font capitalize-font mb-5">Unit Site : {{ $payment[0]->name_site }}</span>
                   <br>
                   {{ $payment[0]->address_site }}<br>
                   {{ $payment[0]->site_city }}<br>
                   Call Center : {{ $payment[0]->call_center }}
                   <br>Nama Sales : {{ $payment[0]->name_user }}
                 </address>
               </div>
               <div class="col-xs-3">
                 <address>
                   <span class="txt-dark head-font capitalize-font mb-5">Rekening Pembayaran :</span>
                   <br>
                   {{ $payment[0]->bank_1 }} : {{ $payment[0]->rekening_1 }} - {{ $payment[0]->name_site }}<br>
                   {{ $payment[0]->bank_2 }} : {{ $payment[0]->rekening_2 }} - {{ $payment[0]->name_site }}<br>
                 </address>
               </div>
               <div class="col-xs-3 text-right">
                 <address>
                   <span class="txt-dark head-font capitalize-font ">Jatuh Tempo:</span><br>
                   {{ $payment[0]->due_date }} <br><br>
                   <strong> Tgl Cetak: </strong>
                   <br>{{ $payment[0]->print_date }}
                 </address>
               </div>
             </div>

             <br><br>
             <div class="row">
               <div class="col-md-6"><strong>Harga Pembelian : Rp. {{ $payment[0]->deal_price }}</strong></div>
                 <div class="col-md-6"><strong>Telah Terbayar : Rp. 290.000.000 - {{ $payment[0]->cicilan_ke }}</strong></div>
             </div>
             <div class="seprator-block"></div>
             <div class="invoice-bill-table">
               <div class="table-responsive">
                 <table class="table table-hover">
                   <thead>
                     <tr>
                       <th>Item</th>
                       <th>Nominal</th>
                       <th>Quantity</th>
                       <th>Totals</th>
                     </tr>
                   </thead>
                   <tbody>
                     <tr>
                       <td>Pembayaran @if($payment[0]->cicilan_ke == 'DP')
                                       DP
                                      @else
                                       Cicilan ke : {{ $payment[0]->cicilan_ke }}
                                     @endif
                       Untuk Unit ID : {{ $payment[0]->code_unit }}, Type : {{ $payment[0]->unit_type }}</td>
                       <td>{{ $payment[0]->inv_amount }}</td>
                       <td>1</td>
                       <td>{{ $payment[0]->inv_amount }}</td>
                     </tr>
                     <tr class="txt-dark">
                       <td></td>
                       <td></td>
                       <td>Total</td>
                       <td>{{ $payment[0]->inv_amount }}</td>
                     </tr>
                   </tbody>
                 </table>
               </div>

               <!-- Form isian konfirmasi -->
               <div class="row">
                 <div class="col-md-12">
                   <div class="form-wrap">
                     {!! Form::model($payment, array('class' => 'form-horizontal', 'data-toggle' => 'validator', 'role' => 'form')) !!}
                       <div class="form-body">
                           <h6 class="txt-dark capitalize-font"><i class="zmdi zmdi-account mr-10"></i>Konfirmasi Pembayaran</h6>
                           <hr class="light-grey-hr">
                           <div class="row">
                             <div class="col-md-6">
                               <div class="form-group  ">
                                 <label class="control-label col-md-3">Tgl Konfirmasi</label>
                                 <div class="col-md-9">
                                   <div class='input-group date datetimepicker1'>
                                     <input type='text' name="confirmation_date" class="form-control" value="{{$payment[0]->confirmation_date}}"  readonly/>
                                     <span class="input-group-addon">
                                         <span class="glyphicon glyphicon-calendar"></span>
                                     </span>
                                   </div>
                                 </div>
                               </div>
                             </div>
                             <!--/span-->
                             <div class="col-md-6">
                               <div class="form-group">
                                 <label class="control-label col-md-3">Jumlah Pembayaran</label>
                                 <div class="col-md-9">
                                   {!! Form::number('paid_off',$payment[0]->inv_amount, array('class' => 'form-control', 'readonly', 'placeholder' => '1.900.000')) !!}
                                 </div>
                               </div>
                             </div>
                             <!--/span-->
                             <div class="col-md-6">
                               <div class="form-group">
                                 <label class="control-label col-md-3">Methode Bayar</label>
                                 <div class="col-md-9">
                                   {!! Form::select('payment_method', ['Transfer' => 'Transfer', 'Cash' => 'Cash', 'Cek/Giro' => 'Cek/Giro', 'Setor Tunai' => 'Setor Tunai'], null, array('class' => 'form-control select2_single', 'readonly')) !!}
                                 </div>
                               </div>
                             </div>
                             <!--/span-->
                             <div class="col-md-6">
                               <div class="form-group">
                                 <label class="control-label col-md-3">Catatan</label>
                                 <div class="col-md-9">
                                   {!! Form::textarea('note',$payment[0]->note, array('class' => 'form-control', 'readonly', 'placeholder' => 'catatan terkait konfirmasi pembayaran ...', 'rows'=>'3')) !!}
                                 </div>
                               </div>
                             </div>
                             <!--/span-->
                             <div class="col-md-6">
                               <div class="form-group">
                                 <label class="control-label col-md-3">Diproses Oleh</label>
                                 <div class="col-md-9">
                                   {!! Form::select('finance', array_pluck($finance, 'name_user', 'id_user'), $userLogin, array('class' => 'form-control', 'readonly')) !!}
                                 </div>
                               </div>
                             </div>
                             <!--/span-->
                             <div class="col-md-6">
                               <div class="form-group">
                                 <label class="control-label col-md-3">Pesan</label>
                                 <div class="col-md-9">
                                   {!! Form::textarea('note',null, array('class' => 'form-control', 'readonly', 'placeholder' => 'Sudah saya bayar ke rek BNI ...', 'rows'=>'3')) !!}
                                 </div>
                               </div>
                             </div>
                             <!--/span-->
                              <div class="col-md-6">
                               <div class="form-group">
                                 <label class="control-label col-md-3">Bukti Transfer</label>
                                 <div class="col-md-9">
                                   <a href="{{url('assets/tema/ahsana/img/no-image.png')}}" target="_blank">
                                   <img src="{{url('assets/tema/ahsana/img/no-image.png')}}" width="130px"></a>
                                 </div>
                               </div>
                             </div>
                             <!--/span-->
                           </div>
                       </div>

                       <div class="pull-right">
                         <a href="{{ URL::previous() }}" class="btn btn-success mr-10">
                           Back
                         </a>
                       </div>

                     {!! Form::close() !!}
                   </div>
                 </div>
               </div>

               <div class="clearfix"></div>
             </div>
           </div>
         </div>
       </div>
     </div>
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

    <script type="text/javascript">
        $(function () {
            $('.datetimepicker1').datetimepicker({
                format: 'YYYY-MM-DD'
            });
        });
    </script>
@endsection
