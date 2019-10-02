<div class="col-md-12">
  <div class="panel panel-default card-view">
    <div class="panel-heading">
      <div class="pull-left">
        <h5><strong>Details Unit : {{$unit->code_unit}}</strong></h5>
      </div>
      <div class="clearfix"></div>
    </div>
    <div class="panel-wrapper collapse in">
      <div class="panel-body">
        <div class="row">
          <div class="col-md-12">
            <div class="form-wrap">

              <!-- <form> -->
                <div class="form-body">
                  <h6 class="txt-dark capitalize-font"><i class="zmdi zmdi-account mr-10"></i>Basic Info</h6>
                  <hr class="light-grey-hr">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group  ">
                        <label class="control-label col-md-3">Nama Site</label>
                        <div class="col-md-9">
                          {!! Form::text('name_site',$unit->site->name_site, array('class' => 'form-control', 'readonly', 'placeholder' => 'Site name')) !!}
                        </div>
                      </div>
                    </div>
                    <!--/span-->
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="control-label col-md-3">Total Unit</label>
                        <div class="col-md-9">
                          {!! Form::text('unit_total',$unit->site->total_unit, array('class' => 'form-control', 'readonly', 'placeholder' => 'xx')) !!}
                        </div>
                      </div>
                    </div>
                    <!--/span-->
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group ">
                        <label class="control-label col-md-3">Unit Size</label>
                        <div class="col-md-9">
                            {!! Form::text('unit_size',null, array('class' => 'form-control', 'readonly', 'placeholder' => 'ex 16 x 8')) !!}
                        </div>
                      </div>
                    </div>
                    <!--/span-->
                    <div class="col-md-6">
                      <div class="form-group ">
                        <label class="control-label col-md-3">Harga Unit</label>
                        <div class="col-md-9">
                            {!! Form::number('unit_price',null, array('class' => 'form-control', 'readonly', 'placeholder' => 'Rp xxx')) !!}
                        </div>
                      </div>
                    </div>
                    <!--/span-->
                    <div class="col-md-6">
                      <div class="form-group ">
                        <label class="control-label col-md-3">Status
                        </label>
                        <div class="col-md-9">
                            {!! Form::select('status', [0 => 'Unsold', 1 => 'Sold'], null, array('class' => 'form-control select2_single', 'readonly')) !!}
                        </div>
                      </div>
                    </div>
                    <!--/span-->
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="control-label col-md-3">Minimal DP</label>
                        <div class="col-md-9">
                            {!! Form::number('minimum_dp',null, array('class' => 'form-control', 'readonly', 'placeholder' => 'Rp xxx')) !!}
                        </div>
                      </div>
                    </div>
                    <!--/span-->
                  </div>
                  <!-- /Row -->
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="control-label col-md-3">Image Cover</label>
                        <div class="col-md-9">
                          @if(isset($unit))
                            <input name="image_cover" type="file" id="input-file-now" class="dropify" data-default-file="{{ asset('/image_upload/unit/'.$unit->image_cover) }}" value="{{$unit->image_cover}}" disabled/>
                          @else
                            <input name="image_cover" type="file" id="input-file-now" class="dropify" />
                          @endif
                          <span class="help-block"> *jpg,gif,png format </span>
                        </div>
                      </div>
                    </div>
                    <!--/span-->
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="control-label col-md-3">Detail Unit</label>
                        <div class="col-md-9">
                          {!! Form::textarea('description',null, array('class' => 'form-control', 'readonly', 'placeholder' => '....')) !!}
                        </div>
                      </div>
                    </div>
                    <!--/span-->
                  </div>
                  <!-- /Row -->
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="control-label col-md-2" style="width: 160px">Image Detail</label>
                        <div class="col-md-2">
                            @if(isset($unit))
                              <input name="image_detail_1" type="file" id="input-file-now" class="dropify" data-default-file="{{ asset('/image_upload/unit/'.$unit->image_detail_1) }}" value="{{$unit->image_detail_1}}" disabled/>
                            @else
                              <input name="image_detail_1" type="file" id="input-file-now" class="dropify" />
                            @endif
                        </div>
                        <div class="col-md-2">
                            @if(isset($unit))
                              <input name="image_detail_2" type="file" id="input-file-now" class="dropify" data-default-file="{{ asset('/image_upload/unit/'.$unit->image_detail_2) }}" value="{{$unit->image_detail_2}}" disabled/>
                            @else
                              <input name="image_detail_2" type="file" id="input-file-now" class="dropify" />
                            @endif
                        </div>
                        <div class="col-md-2">
                            @if(isset($unit))
                              <input name="image_detail_3" type="file" id="input-file-now" class="dropify" data-default-file="{{ asset('/image_upload/unit/'.$unit->image_detail_3) }}" value="{{$unit->image_detail_3}}" disabled/>
                            @else
                              <input name="image_detail_3" type="file" id="input-file-now" class="dropify" />
                            @endif
                        </div>
                        <div class="col-md-2">
                            @if(isset($unit))
                              <input name="image_detail_4" type="file" id="input-file-now" class="dropify" data-default-file="{{ asset('/image_upload/unit/'.$unit->image_detail_4) }}" value="{{$unit->image_detail_4}}" disabled/>
                            @else
                              <input name="image_detail_4" type="file" id="input-file-now" class="dropify" />
                            @endif
                        </div>
                        <div class="col-md-2">
                            @if(isset($unit))
                              <input name="image_detail_5" type="file" id="input-file-now" class="dropify" data-default-file="{{ asset('/image_upload/unit/'.$unit->image_detail_5) }}" value="{{$unit->image_detail_5}}" disabled/>
                            @else
                              <input name="image_detail_5" type="file" id="input-file-now" class="dropify" />
                            @endif
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- /Row -->
                </div>
             <!-- </form> -->

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="col-md-12">
  <div class="alert alert-info alert-dismissable">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    NOTICE: Setelah Anda men-submit form ini, maka secara otomatis sistem akan me-generate INVOICE tiap bulan sesuai dengan jumlah pembayaran yang ditentukan. Oleh karena itu, harap benar-benar dipastikan data yang di-input SUDAH FIXED & BENAR. karena langkah ini TIDAK BISA DI UNDO.
  </div>
</div>

<div class="col-md-12">
  <div class="panel panel-default card-view">
    <div class="panel-wrapper collapse in">
      <div class="panel-body">
        <div class="row">
          <div class="col-md-12">
            <div class="form-wrap">
              <!-- <form class="form-horizontal"> -->
                <div class="form-body">
                  <div  style="background: #CCFF99; padding: 10px">
                    <h6 class="txt-dark capitalize-font"><i class="fa fa-barcode mr-10"></i>Data Pembelian UNIT</h6>
                    <hr class="light-grey-hr">
                    <!-- /Row -->
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="control-label col-md-3">Nama Customer</label>
                          <div class="col-md-9">
                            {!! Form::select('id_customer', array_pluck($customer, 'name_customer', 'id_customer'), null, array('class' => 'form-control', 'required')) !!}
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="control-label col-md-3">Unit</label>
                          <div class="col-md-7">
                            {!! Form::text('unit_code',$unit->code_unit, array('class' => 'form-control', 'readonly', 'placeholder' => 'xxx')) !!}
                          </div>
                          <div class="col-md-1">
                            <span>
                               <a href="#" class="btn-primary btn btn-sm"><i class="fa fa-eye"></i> </a>
                             </span>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="control-label col-md-3">Harga Deal</label>
                          <div class="col-md-9">
                            {!! Form::text('deal_price', number_format($unit->deal_price,2,",","."), array('id'=>'deal_price', 'class' => 'form-control money', 'required')) !!}
                          </div>
                        </div>
                      </div>
                      <!--/span-->
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="control-label col-md-3">Type</label>
                          <div class="col-md-9">
                             {!! Form::text('unit_code',$unit->unit_type, array('class' => 'form-control', 'readonly', 'placeholder' => 'xxx')) !!}
                          </div>
                        </div>
                      </div>
                      <!--/span-->
                    </div>
                    <!-- /Row -->
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="control-label col-md-3">DP</label>
                          <div class="col-md-9">
                            {!! Form::text('dp', number_format($unit->dp,2,",","."), array('id'=>'dp', 'class' => 'form-control money', 'required')) !!}
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="control-label col-md-3">Cicilan/Bln</label>
                          <div class="col-md-9">
                            {!! Form::text('payment_monthly',null, array('id'=>'payment_monthly', 'class' => 'form-control', 'readonly', 'placeholder' => 'xxx')) !!}
                          </div>
                        </div>
                      </div>
                      <!--/span-->
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="control-label col-md-3">Tanggal Invoice</label>
                          <div class="col-md-9">
                            <div class='input-group date datetimepicker1'>
                              @if(isset($unit))
                                <input type='text' name="invoice_date" class="form-control" value="{{$unit->invoice_date}}" required/>
                              @else
                                <input type='text' name="invoice_date" class="form-control" required/>
                              @endif
                              <span class="input-group-addon">
                                  <span class="glyphicon glyphicon-calendar"></span>
                              </span>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!--/span-->
                    </div>
                    <div class="row">

                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="control-label col-md-3">Tentukan Jumlah Cicilan (bln)</label>
                          <div class="col-md-9">
                            {!! Form::select('payment_term', [12 => '12', 24 => '24', 36 => '36', 48 => '48'], null, array('id'=>'payment_term', 'class' => 'form-control select2_single', 'required')) !!}
                          </div>
                        </div>
                      </div>
                      <!--/span-->
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="control-label col-md-3">Sales Name</label>
                          <div class="col-md-9">
                            {!! Form::text('sales', Auth::user()->username, array('class' => 'form-control', 'readonly', 'placeholder' => 'xxx')) !!}
                          </div>
                        </div>
                      </div>

                      <div class="form-actions mt-10">
                        <div class="row">
                          <div class="col-md-6">
                            <div class="row">
                              <div class="col-md-offset-3 col-md-9">
                                {{ Form::submit($submit, array('class' => 'btn btn-primary')) }}
                              </div>
                            </div>
                          </div>
                          <div class="col-md-6"> </div>
                        </div>
                      </div>
                    </div>
                    <!-- /Row -->
                  </div>
                </div>
              <!-- </form> -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
