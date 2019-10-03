<div class="form-body">
  <h6 class="txt-dark capitalize-font"><i class="zmdi zmdi-account mr-10"></i>Basic Info</h6>
  <hr class="light-grey-hr">
  <div class="row">
    <div class="col-md-6">
      <div class="form-group has-error">
        <label class="control-label col-md-3">Nama Site</label>
        <div class="col-md-9">
          {!! Form::text('name_site',null, array('class' => 'form-control', 'required', 'placeholder' => 'Site name')) !!}
        </div>
      </div>
    </div>
    <!--/span-->
    <div class="col-md-6">
      <div class="form-group has-error">
        <label class="control-label col-md-3">Email Official Site</label>
        <div class="col-md-9">
          {!! Form::text('email_site',null, array('class' => 'form-control', 'required', 'placeholder' => 'email@domain.com')) !!}
        </div>
      </div>
    </div>
    <!--/span-->
  </div>
  <div class="row">
    <div class="col-md-6">
      <div class="form-group ">
        <label class="control-label col-md-3">Call Center</label>
        <div class="col-md-9">
          {!! Form::number('call_center',null, array('class' => 'form-control', 'required', 'placeholder' => 'call center')) !!}
        </div>
      </div>
    </div>
    <!--/span-->
    <div class="col-md-6">
      <div class="form-group ">
        <label class="control-label col-md-3">Longitude</label>
        <div class="col-md-9">
          {!! Form::text('longitude',null, array('class' => 'form-control', 'required', 'placeholder' => 'xxxxx')) !!}
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
          @if(isset($site))
            <input name="image_cover" type="file" id="input-file-now" class="dropify" data-default-file="{{ asset('/image_upload/site/'.$site->image_cover) }}" value="{{$site->image_cover}}" />
          @else
            <input name="image_cover" type="file" id="input-file-now" class="dropify" />
          @endif
          <span class="help-block"> *jpg,gif,png format </span>
        </div>
      </div>
    </div>
    <!--/span-->
    <div class="col-md-6">
      <div class="row ma-0">
        <div class="form-group">
          <label class="control-label col-md-3">Latitude</label>
          <div class="col-md-9">
            {!! Form::text('latitude',null, array('class' => 'form-control', 'required', 'placeholder' => 'xxxxx')) !!}
          </div>
        </div>
      </div>
      <div class="row ma-0">
        <div class="form-group">
          <label class="control-label col-md-3">Bonus Point</label>
          <div class="col-md-9">
            {!! Form::number('bonus_point',null, array('class' => 'form-control', 'required', 'placeholder' => 'xxxxx')) !!}
          </div>
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
            @if(isset($site))
              <input name="image_detail_1" type="file" id="input-file-now" class="dropify" data-default-file="{{ asset('/image_upload/site/'.$site->image_detail_1) }}" value="{{$site->image_detail_1}}" />
            @else
              <input name="image_detail_1" type="file" id="input-file-now" class="dropify" />
            @endif
        </div>
        <div class="col-md-2">
            @if(isset($site))
              <input name="image_detail_2" type="file" id="input-file-now" class="dropify" data-default-file="{{ asset('/image_upload/site/'.$site->image_detail_2) }}" value="{{$site->image_detail_2}}" />
            @else
              <input name="image_detail_2" type="file" id="input-file-now" class="dropify" />
            @endif
        </div>
        <div class="col-md-2">
            @if(isset($site))
              <input name="image_detail_3" type="file" id="input-file-now" class="dropify" data-default-file="{{ asset('/image_upload/site/'.$site->image_detail_3) }}" value="{{$site->image_detail_3}}" />
            @else
              <input name="image_detail_3" type="file" id="input-file-now" class="dropify" />
            @endif
        </div>
        <div class="col-md-2">
            @if(isset($site))
              <input name="image_detail_4" type="file" id="input-file-now" class="dropify" data-default-file="{{ asset('/image_upload/site/'.$site->image_detail_4) }}" value="{{$site->image_detail_4}}" />
            @else
              <input name="image_detail_4" type="file" id="input-file-now" class="dropify" />
            @endif
        </div>
        <div class="col-md-2">
            @if(isset($site))
              <input name="image_detail_5" type="file" id="input-file-now" class="dropify" data-default-file="{{ asset('/image_upload/site/'.$site->image_detail_5) }}" value="{{$site->image_detail_5}}" />
            @else
              <input name="image_detail_5" type="file" id="input-file-now" class="dropify" />
            @endif
        </div>
      </div>
    </div>
  </div>
  <!-- /Row -->

  <div class="seprator-block"></div>

  <h6 class="txt-dark capitalize-font"><i class="fa fa-map-marker mr-10"></i>Alamat</h6>
  <hr class="light-grey-hr">
  <!-- /Row -->
  <div class="row">
    <div class="col-md-6">
      <div class="form-group">
        <label class="control-label col-md-3">Alamat 1</label>
        <div class="col-md-9">
          {!! Form::text('address_1',null, array('class' => 'form-control', 'required', 'placeholder' => '')) !!}
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <label class="control-label col-md-3">Alamat 2</label>
        <div class="col-md-9">
          {!! Form::text('address_2',null, array('class' => 'form-control', 'required', 'placeholder' => '')) !!}
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6">
      <div class="form-group">
        <label class="control-label col-md-3">Kota</label>
        <div class="col-md-9">
          {!! Form::text('city',null, array('class' => 'form-control', 'placeholder' => 'kota')) !!}
        </div>
      </div>
    </div>
    <!--/span-->
    <div class="col-md-6">
      <div class="form-group">
        <label class="control-label col-md-3">Provinsi</label>
        <div class="col-md-9">
          {!! Form::text('province',null, array('class' => 'form-control', 'required', 'placeholder' => '')) !!}
        </div>
      </div>
    </div>
    <!--/span-->
  </div>
  <!-- /Row -->
  <div class="row">
    <div class="col-md-6">
      <div class="form-group">
        <label class="control-label col-md-3">Kode Pos</label>
        <div class="col-md-9">
          {!! Form::text('postal_code',null, array('class' => 'form-control', 'required', 'placeholder' => '')) !!}
        </div>
      </div>
    </div>

  </div>
  <!-- /Row -->
  <div class="seprator-block"></div>

  <h6 class="txt-dark capitalize-font"><i class="zmdi zmdi-account-box mr-10"></i>Data Site</h6>
  <hr class="light-grey-hr">
  <!-- /Row -->
  <div class="row">
    <div class="col-md-6">
      <div class="form-group">
        <label class="control-label col-md-3">Bank Name 1</label>
        <div class="col-md-9">
          {!! Form::text('bank_1',null, array('class' => 'form-control', 'required', 'placeholder' => 'xxxx')) !!}
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <label class="control-label col-md-3">Bank Name 3</label>
        <div class="col-md-9">
          {!! Form::text('bank_3',null, array('class' => 'form-control', 'placeholder' => 'xxxx')) !!}
        </div>
      </div>
    </div>
  </div>
  <!-- /Row -->
  <div class="row">
    <div class="col-md-6">
      <div class="form-group">
        <label class="control-label col-md-3">Bank Account ID 1</label>
        <div class="col-md-9">
          {!! Form::text('rekening_1',null, array('class' => 'form-control', 'required', 'placeholder' => 'No.Rek XXXXXX')) !!}
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <label class="control-label col-md-3">Bank Account ID 3</label>
        <div class="col-md-9">
          {!! Form::text('rekening_3',null, array('class' => 'form-control', 'placeholder' => 'No.Rek XXXXXX')) !!}
        </div>
      </div>
    </div>
  </div>

  <!-- /Row -->
  <div class="row">
    <div class="col-md-6">
      <div class="form-group">
        <label class="control-label col-md-3">Bank Name 2</label>
        <div class="col-md-9">
          {!! Form::text('bank_2',null, array('class' => 'form-control', 'required', 'placeholder' => 'xxxx')) !!}
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <label class="control-label col-md-3">Bank Name 4</label>
        <div class="col-md-9">
          {!! Form::text('bank_4',null, array('class' => 'form-control',  'placeholder' => 'xxxx')) !!}
        </div>
      </div>
    </div>
  </div>
  <!-- /Row -->
  <div class="row">
    <div class="col-md-6">
      <div class="form-group">
        <label class="control-label col-md-3">Bank Account ID 2</label>
        <div class="col-md-9">
          {!! Form::text('rekening_2',null, array('class' => 'form-control', 'required', 'placeholder' => 'No.Rek XXXXXX')) !!}
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <label class="control-label col-md-3">Bank Account ID 4</label>
        <div class="col-md-9">
          {!! Form::text('rekening_4',null, array('class' => 'form-control', 'placeholder' => 'No.Rek XXXXXX')) !!}
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-6">
      <div class="form-group">
        <label class="control-label col-md-3">Kuota Unit</label>
        <div class="col-md-9">
          {!! Form::number('kuota_unit',null, array('class' => 'form-control', 'required', 'placeholder' => 'XXXXXX')) !!}
        </div>
      </div>
    </div>
    <!--/span-->
    <div class="col-md-6">
      <div class="form-group">
        <label class="control-label col-md-3">Deskripsi</label>
        <div class="col-md-9">
          {!! Form::textarea('description',null, array('class' => 'form-control', 'required', 'rows'=>'3', 'placeholder' => '')) !!}
        </div>
      </div>
    </div>
    <!--/span-->
  </div>
  <!-- /Row -->
  <div class="row">
     <div class="col-md-6">
      <div class="form-group">
        <label class="control-label col-md-3">Site Manager</label>
        <div class="col-md-9">
            @if(isset($site))
              {!! Form::select('site_manager', array_pluck($user, 'name_user', 'name_user'), $site->site_manager, array('class' => 'form-control', 'required')) !!}
            @else
              {!! Form::select('site_manager', array_pluck($user, 'name_user', 'name_user'), null, array('class' => 'form-control', 'required')) !!}
            @endif
        </div>
      </div>
    </div>
  </div>
  <!-- /Row -->
  <div class="row mr-15 ml-15">
    <div class="col-md-12">
      @include('partials.errors')
    </div>
  </div>
  <!-- /Row -->
</div>
<div class="form-actions mt-10">
  <div class="row">
    <div class="col-md-6">
      <div class="row">
        <div class="col-md-offset-3 col-md-9">
          {{ Form::submit($submit, array('class' => 'btn btn-success mr-10')) }}
          <button type="button" class="btn btn-default">Cancel</button>
        </div>
      </div>
    </div>
    <div class="col-md-6"> </div>
  </div>
</div>
