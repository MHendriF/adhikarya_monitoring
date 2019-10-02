<div class="form-body">
  <h6 class="txt-dark capitalize-font"><i class="zmdi zmdi-account mr-10"></i>Basic Info</h6>
  <hr class="light-grey-hr"/>
  <div class="row">
    <div class="col-md-6">
      <div class="form-group has-error">
        <label class="control-label col-md-3">Nama Aplikasi</label>
        <div class="col-md-9">
          {!! Form::text('name',null, array('class' => 'form-control', 'required', 'placeholder' => 'Ahsana')) !!}
        </div>
      </div>
    </div>
    <!--/span-->
    <div class="col-md-6">
      <div class="form-group has-error">
        <label class="control-label col-md-3">Email Contact</label>
        <div class="col-md-9">
            {!! Form::text('email',null, array('class' => 'form-control', 'required', 'placeholder' => 'email@domain.com')) !!}
        </div>
      </div>
    </div>
    <!--/span-->
  </div>
  <!-- /Row -->
  <div class="row">
    <div class="col-md-6">
      <div class="form-group ">
        <label class="control-label col-md-3">Alamat HQ</label>
        <div class="col-md-9">
            {!! Form::text('address',null, array('class' => 'form-control', 'required', 'placeholder' => 'alamat lengkap')) !!}
        </div>
      </div>
    </div>
    <!--/span-->
    <div class="col-md-6">
      <div class="form-group ">
        <label class="control-label col-md-3">Kota</label>
        <div class="col-md-9">
          {!! Form::text('city',null, array('class' => 'form-control', 'required', 'placeholder' => 'xxxx')) !!}
        </div>
      </div>
    </div>
    <!--/span-->
  </div>
  <!-- /Row -->
  <div class="row">
    <div class="col-md-6">
      <div class="form-group">
        <label class="control-label col-md-3">Kode pos</label>
        <div class="col-md-9">
            {!! Form::text('postal_code',null, array('class' => 'form-control', 'required', 'placeholder' => 'xxxx')) !!}
        </div>
      </div>
    </div>
    <!--/span-->
    <div class="col-md-6">
      <div class="form-group">
        <label class="control-label col-md-3">No. Hp 1</label>
        <div class="col-md-9">
            {!! Form::text('phone_1',null, array('class' => 'form-control', 'required', 'placeholder' => 'xxxx')) !!}
        </div>
      </div>
    </div>
    <!--/span-->
  </div>
  <!-- /Row -->
  <div class="row">
    <div class="col-md-6">
      <div class="form-group">
        <label class="control-label col-md-3">No. Hp 2</label>
        <div class="col-md-9">
            {!! Form::text('phone_2',null, array('class' => 'form-control', 'required', 'placeholder' => 'xxxx')) !!}
        </div>
      </div>
    </div>
    <!--/span-->
    <div class="col-md-6">
      <div class="form-group">
        <label class="control-label col-md-3">No. Hp 3</label>
        <div class="col-md-9">
            {!! Form::text('phone_3',null, array('class' => 'form-control', 'required', 'placeholder' => 'xxxx')) !!}
        </div>
      </div>
    </div>
    <!--/span-->
  </div>
  <!-- /Row -->
  <div class="row">
     <div class="col-md-6">
      <div class="form-group">
        <label class="control-label col-md-3">Logo aplikasi</label>
        <div class="col-md-9">
          @if(isset($contact))
            <input type="file" name="image_path" id="input-file-now" class="dropify" data-default-file="{{ asset('/image_upload/contacts/'.$contact->image_path) }}" value="{{$contact->image_path}}" />
          @else
            <input type="file" name="image_path" id="input-file-now" class="dropify" />
          @endif
          <span class="help-block"> *jpg,gif,png format </span>
        </div>
      </div>
    </div>
    <!--/span-->
    <div class="col-md-6">
      <div class="form-group">
        <label class="control-label col-md-3">About Ahsana</label>
        <div class="col-md-9">
            {!! Form::textarea('about',null, array('class' => 'form-control', 'required', 'placeholder' => 'Maks 250 karakter')) !!}
        </div>
      </div>
    </div>
    <!--/span-->
  </div>
  <!-- /Row -->
  <div class="row">
    <div class="col-md-6">
      <div class="form-group">
        <label class="control-label col-md-3">Longitude</label>
        <div class="col-md-9">
            {!! Form::number('longitude',null, array('class' => 'form-control', 'required', 'placeholder' => 'xxxx')) !!}
        </div>
      </div>
    </div>
    <!--/span-->
    <div class="col-md-6">
      <div class="form-group">
        <label class="control-label col-md-3">Latitude</label>
        <div class="col-md-9">
            {!! Form::number('latitude',null, array('class' => 'form-control', 'required', 'placeholder' => 'xxxx')) !!}
        </div>
      </div>
    </div>
    <!--/span-->
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
