<div class="form-body">
  <h6 class="txt-dark capitalize-font"><i class="zmdi zmdi-account mr-10"></i>Basic Info</h6>
  <hr class="light-grey-hr">
  <div class="row">
    <div class="col-md-6">
      <div class="form-group  ">
        <label class="control-label col-md-3">Nama Site</label>
        <div class="col-md-9">
          {!! Form::text('name_site',$site->name_site, array('class' => 'form-control', 'readonly', 'placeholder' => 'Site name')) !!}
          <!-- {!! Form::select('id_site', array_pluck($site, 'name_site', 'id_site'), null, array('class' => 'form-control', 'readonly')) !!} -->
        </div>
      </div>
    </div>
    <!--/span-->
    <div class="col-md-6">
      <div class="form-group">
        <label class="control-label col-md-3">Total Unit</label>
        <div class="col-md-9">
          {!! Form::text('unit_total',$site->total_unit, array('class' => 'form-control', 'readonly', 'placeholder' => 'xx')) !!}
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
            {!! Form::text('unit_size',null, array('class' => 'form-control', 'required', 'placeholder' => 'ex 16 x 8')) !!}
        </div>
      </div>
    </div>
    <!--/span-->
    <div class="col-md-6">
      <div class="form-group ">
        <label class="control-label col-md-3">Harga Unit</label>
        <div class="col-md-9">
            {!! Form::number('unit_price',null, array('class' => 'form-control', 'required', 'placeholder' => 'Rp xxx')) !!}
        </div>
      </div>
    </div>
    <!--/span-->
    <div class="col-md-6">
      <div class="form-group ">
        <label class="control-label col-md-3">Status
        </label>
        <div class="col-md-9">
            {!! Form::select('status', [0 => 'Unsold', 1 => 'Sold'], null, array('class' => 'form-control select2_single', 'required')) !!}
        </div>
      </div>
    </div>
    <!--/span-->
    <div class="col-md-6">
      <div class="form-group">
        <label class="control-label col-md-3">Minimal DP</label>
        <div class="col-md-9">
            {!! Form::number('minimum_dp',null, array('class' => 'form-control', 'required', 'placeholder' => 'Rp xxx')) !!}
        </div>
      </div>
    </div>
    <!--/span-->
  </div>
  <!-- /Row -->
  <div class="row">
    <div class="col-md-6">
      <div class="form-group">
        <label class="control-label col-md-3">Type</label>
        <div class="col-md-9">
          {!! Form::text('unit_type',null, array('class' => 'form-control', 'required', 'placeholder' => 'xxx')) !!}
        </div>
      </div>
    </div>
    <!--/span-->
    <div class="col-md-6">
      <div class="form-group">
        <label class="control-label col-md-3">Jumlah Unit </label>
        <div class="col-md-9">
          {!! Form::number('total_unit',null, array('class' => 'form-control', 'required', 'placeholder' => 'xxx')) !!}
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
            <input name="image_cover" type="file" id="input-file-now" class="dropify" data-default-file="{{ asset('/image_upload/unit/'.$unit->image_cover) }}" value="{{$unit->image_cover}}" />
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
          {!! Form::textarea('description',null, array('class' => 'form-control', 'required', 'placeholder' => '....')) !!}
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
              <input name="image_detail_1" type="file" id="input-file-now" class="dropify" data-default-file="{{ asset('/image_upload/unit/'.$unit->image_detail_1) }}" value="{{$unit->image_detail_1}}" />
            @else
              <input name="image_detail_1" type="file" id="input-file-now" class="dropify" />
            @endif
        </div>
        <div class="col-md-2">
            @if(isset($unit))
              <input name="image_detail_2" type="file" id="input-file-now" class="dropify" data-default-file="{{ asset('/image_upload/unit/'.$unit->image_detail_2) }}" value="{{$unit->image_detail_2}}" />
            @else
              <input name="image_detail_2" type="file" id="input-file-now" class="dropify" />
            @endif
        </div>
        <div class="col-md-2">
            @if(isset($unit))
              <input name="image_detail_3" type="file" id="input-file-now" class="dropify" data-default-file="{{ asset('/image_upload/unit/'.$unit->image_detail_3) }}" value="{{$unit->image_detail_3}}" />
            @else
              <input name="image_detail_3" type="file" id="input-file-now" class="dropify" />
            @endif
        </div>
        <div class="col-md-2">
            @if(isset($unit))
              <input name="image_detail_4" type="file" id="input-file-now" class="dropify" data-default-file="{{ asset('/image_upload/unit/'.$unit->image_detail_4) }}" value="{{$unit->image_detail_4}}" />
            @else
              <input name="image_detail_4" type="file" id="input-file-now" class="dropify" />
            @endif
        </div>
        <div class="col-md-2">
            @if(isset($unit))
              <input name="image_detail_5" type="file" id="input-file-now" class="dropify" data-default-file="{{ asset('/image_upload/unit/'.$unit->image_detail_5) }}" value="{{$unit->image_detail_5}}" />
            @else
              <input name="image_detail_5" type="file" id="input-file-now" class="dropify" />
            @endif
        </div>
      </div>
    </div>
  </div>
  <!-- /Row -->
</div>
<div class="form-actions mt-10">
  <div class="row">
    <div class="col-md-6">
      <div class="row">
        <div class="col-md-offset-3 col-md-9">
          <button type="submit" class="btn btn-success  mr-10">Submit</button>
          <button type="button" class="btn btn-default">Cancel</button>
        </div>
      </div>
    </div>
    <div class="col-md-6"> </div>
  </div>
</div>
