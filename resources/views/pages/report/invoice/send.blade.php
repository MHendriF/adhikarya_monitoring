@extends('layouts.app')

@section('custom-css')
    <link href="{{ asset("/assets/tema/ahsana/vendors/bower_components/dropify/dist/css/dropify.min.css") }}" rel="stylesheet" type="text/css"/>
@endsection

@section('title', 'Unit List')

@section('content')
<!-- Main Content -->
<div class="page-wrapper">
  <div class="container-fluid">

		<div class="row heading-bg">
		  <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
				<h5 class="txt-dark">Invoice @if($invoice[0]->cicilan_ke == 'DP')
                                      DP
                                     @else
                                      Cicilan ke : {{ $invoice[0]->cicilan_ke }}
                                    @endif </h5>
			</div>
			<!-- Breadcrumb -->
			<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
				<ol class="breadcrumb">
          <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
          <li><a href="{{ route('invoice.index') }}"><span>Invoice</span></a></li>
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
             <h6 class="txt-dark">{{ $invoice[0]->code_payment}}</h6>
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
                   <span class="address-head mb-5">{{ $invoice[0]->name_customer }}</span>
                   {{ $invoice[0]->address_customer }} - {{ $invoice[0]->customer_city }}<br>
                   {{ $invoice[0]->email_customer }}<br>
                   <abbr title="Phone">HP: </abbr>{{ $invoice[0]->phone_customer }}
                 </address>
               </div>
             </div>

             <div class="row">
               <div class="col-xs-6">
                 <address>
                   <span class="txt-dark head-font capitalize-font mb-5">Unit Site : {{ $invoice[0]->name_site }}</span>
                   <br>
                   {{ $invoice[0]->address_site }}<br>
                   {{ $invoice[0]->site_city }}<br>
                   Call Center : {{ $invoice[0]->call_center }}
                   <br>Nama Sales : {{ $invoice[0]->name_user }}
                 </address>
               </div>
               <div class="col-xs-3">
                 <address>
                   <span class="txt-dark head-font capitalize-font mb-5">Rekening Pembayaran :</span>
                   <br>
                   {{ $invoice[0]->bank_1 }} : {{ $invoice[0]->rekening_1 }} - {{ $invoice[0]->name_site }}<br>
                   {{ $invoice[0]->bank_2 }} : {{ $invoice[0]->rekening_2 }} - {{ $invoice[0]->name_site }}<br>
                 </address>
               </div>
               <div class="col-xs-3 text-right">
                 <address>
                   <span class="txt-dark head-font capitalize-font ">Jatuh Tempo:</span><br>
                   {{ $invoice[0]->due_date }} <br><br>
                   <strong> Tgl Cetak: </strong>
                   <br>{{ $invoice[0]->print_date }}
                 </address>
               </div>
             </div>

             <br><br>
             <div class="row">
               <div class="col-md-6"><strong>Harga Pembelian : Rp. {{ $invoice[0]->deal_price }}</strong></div>
                 <div class="col-md-6"><strong>Telah Terbayar : Rp. 290.000.000 - {{ $invoice[0]->cicilan_ke }}</strong></div>
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
                       <td>Pembayaran @if($invoice[0]->cicilan_ke == 'DP')
                                       DP
                                      @else
                                       Cicilan ke : {{ $invoice[0]->cicilan_ke }}
                                     @endif
                       Untuk Unit ID : {{ $invoice[0]->code_unit }}, Type : {{ $invoice[0]->unit_type }}</td>
                       <td>{{ $invoice[0]->inv_amount }}</td>
                       <td>1</td>
                       <td>{{ $invoice[0]->inv_amount }}</td>
                     </tr>
                     <tr class="txt-dark">
                       <td></td>
                       <td></td>
                       <td>Total</td>
                       <td>{{ $invoice[0]->inv_amount }}</td>
                     </tr>
                   </tbody>
                 </table>
               </div>

               <div class="pull-right">
                 <a href="{{ route('invoice.sending', [$invoice[0]->id_payment]) }}" class="btn btn-success mr-10">
                   Kirim Email INV
                 </a>
                 <button type="button" class="btn btn-success btn-outline btn-icon left-icon" onclick="javascript:window.print();">
                   <i class="fa fa-print"></i><span> Cetak</span>
                 </button>
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
    <!-- Bootstrap Dropify JavaScript -->
		<script src="{{ asset("/assets/tema/ahsana/vendors/bower_components/dropify/dist/js/dropify.min.js") }}"></script>
		<!-- Form Flie Upload Data JavaScript -->
		<script src="{{ asset("/assets/tema/ahsana/dist/js/form-file-upload-data.js") }}"></script>
@endsection
