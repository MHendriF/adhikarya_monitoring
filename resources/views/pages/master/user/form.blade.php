<div class="form-body">
  <h6 class="txt-dark capitalize-font"><i class="zmdi zmdi-account mr-10"></i>Basic Info</h6>
  <hr class="light-grey-hr"/>
  <div class="row">
    <div class="col-md-6">
      <div class="form-group has-error">
        <label class="control-label col-md-3">Nama Lengkap</label>
        <div class="col-md-9">
          {!! Form::text('name_user',null, array('class' => 'form-control', 'required', 'placeholder' => 'Nama Sesuai KTP')) !!}
          <span class="help-block"> Pastikan penulisan sesuai </span>
        </div>
      </div>
    </div>
    <!--/span-->
    <div class="col-md-6">
      <div class="form-group has-error">
        <label class="control-label col-md-3">Email</label>
        <div class="col-md-9">
            {!! Form::text('email',null, array('class' => 'form-control', 'required', 'placeholder' => 'email@domain.com')) !!}
            <span class="help-block"> Pastikan penulisan sesuai</span>
        </div>
      </div>
    </div>
    <!--/span-->
  </div>
  <!-- /Row -->
  <div class="row">
    <div class="col-md-6">
      <div class="form-group ">
        <label class="control-label col-md-3">Username</label>
        <div class="col-md-9">
          @if(isset($user))
            {!! Form::text('username',null, array('class' => 'form-control', 'readonly', 'placeholder' => 'username')) !!}
          @else
            {!! Form::text('username',null, array('class' => 'form-control', 'required', 'placeholder' => 'username')) !!}
          @endif
          <span class="help-block"> no space</span>
        </div>
      </div>
    </div>
    <!--/span-->
    <div class="col-md-6">
      <div class="form-group ">
        <label class="control-label col-md-3">Tempat Lahir</label>
        <div class="col-md-9">
          {!! Form::text('place_of_birth',null, array('class' => 'form-control', 'required', 'placeholder' => 'xxxx')) !!}
        </div>
      </div>
    </div>
    <!--/span-->
  </div>
  <!-- /Row -->
  <div class="row">
    <div class="col-md-6">
      <div class="form-group">
        <label class="control-label col-md-3">Jenis Kelamin</label>
        <div class="col-md-9">
          {!! Form::select('gender', [0 => 'Female', 1 => 'Male'], null, array('class' => 'form-control select2_single', 'required')) !!}
        </div>
      </div>
    </div>
    <!--/span-->
    <div class="col-md-6">
      <div class="form-group">
        <label class="control-label col-md-3">Tanggal Lahir</label>
        <div class="col-md-9">
          <div class='input-group date datetimepicker1'>
              @if(isset($user))
                <input type='text' name="date_of_birth" class="form-control" value="{{$user->date_of_birth}}" required/>
              @else
                <input type='text' name="date_of_birth" class="form-control" required/>
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
  <!-- /Row -->
  <div class="row">
    <div class="col-md-6">
      <div class="form-group">
        <label class="control-label col-md-3">Site</label>
        <div class="col-md-9">
          {!! Form::select('id_site', array_pluck($sites, 'name_site', 'id_site'), null, array('class' => 'form-control', 'required')) !!}
        </div>
      </div>
    </div>
    <!--/span-->
    <div class="col-md-6">
      <div class="form-group">
        <label class="control-label col-md-3">Status</label>
        <div class="col-md-9">
          <div class="radio-list">
            <div class="radio-inline pl-0">
              <span class="radio radio-info">
                @if(isset($user))
                  @if($user->status == 1)
                    <input type="radio" name="status" id="radio_9" value="1" checked>
                  @else
                    <input type="radio" name="status" id="radio_9" value="1">
                  @endif
                @else
                  <input type="radio" name="status" id="radio_9" value="1">
                @endif
                <label for="radio_9">Active</label>
              </span>
            </div>
            <div class="radio-inline pl-0">
              <span class="radio radio-info">
                @if(isset($user))
                  @if($user->status == 0)
                    <input type="radio" name="status" id="radio_10" value="0" checked>
                  @else
                    <input type="radio" name="status" id="radio_10" value="0">
                  @endif
                @else
                  <input type="radio" name="status" id="radio_10" value="0">
                @endif
                <label for="radio_10">Unactive</label>
              </span>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--/span-->
  </div>
  <!-- /Row -->
  <div class="row">
    <div class="col-md-6">
      <div class="form-group">
        <label class="control-label col-md-3">Password</label>
        <div class="col-md-9">
            @if(isset($user))
              <input type="password" class="form-control" name="password" value="{{$user->password}}" readonly>
            @else
              <input type="password" class="form-control" name="password" required>
            @endif
        </div>
      </div>
    </div>
    <!--/span-->
     <div class="col-md-6">
      <div class="form-group">
        <label class="control-label col-md-3">Role</label>
        <div class="col-md-9">
          @if(isset($user))
            {!! Form::select('id_role', array_pluck($roles, 'display_name', 'id'), $currentrole, array('class' => 'form-control', 'required')) !!}
          @else
            {!! Form::select('id_role', array_pluck($roles, 'display_name', 'id'), null, array('class' => 'form-control', 'required')) !!}
          @endif
        </div>
      </div>
    </div>
    <!--/span-->
  </div>
  <!-- /Row -->
  <div class="row">
     <div class="col-md-6">
      <div class="form-group">
        <label class="control-label col-md-3">Upload image</label>
        <div class="col-md-9">
          @if(isset($user))
            <input type="file" name="image_path" id="input-file-now" class="dropify" data-default-file="{{ asset('/image_upload/user/'.$user->image_path) }}" value="{{$user->image_path}}" />
          @else
            <input type="file" name="image_path" id="input-file-now" class="dropify" />
          @endif
          <span class="help-block"> *jpg,gif,png format </span>
        </div>
      </div>
    </div>
    <!--/span-->
  </div>

  <div class="seprator-block"></div>

  <h6 class="txt-dark capitalize-font"><i class="fa fa-map-marker mr-10"></i>Alamat</h6>
  <hr class="light-grey-hr"/>
  <!-- /Row -->
  <div class="row">
    <div class="col-md-6">
      <div class="form-group">
        <label class="control-label col-md-3">Alamat 1</label>
        <div class="col-md-9">
          {!! Form::text('address_1',null, array('class' => 'form-control', 'placeholder' => 'alamat')) !!}
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <label class="control-label col-md-3">Alamat 2</label>
        <div class="col-md-9">
          {!! Form::text('address_2',null, array('class' => 'form-control', 'placeholder' => 'alamat')) !!}
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
          {!! Form::text('province',null, array('class' => 'form-control', 'placeholder' => 'provinsi')) !!}
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
          {!! Form::text('postal_code',null, array('class' => 'form-control', 'placeholder' => 'kode pos')) !!}
        </div>
      </div>
    </div>
    <!--/span-->
  </div>
  <!-- /Row -->

  <div class="seprator-block"></div>

  <h6 class="txt-dark capitalize-font"><i class="zmdi zmdi-account-box mr-10"></i>Data ID</h6>
  <hr class="light-grey-hr">
  <!-- /Row -->
  <div class="row">
    <div class="col-md-6">
      <div class="form-group">
        <label class="control-label col-md-3">Bank Account Name</label>
        <div class="col-md-9">
          {!! Form::text('bank_name',null, array('class' => 'form-control', 'placeholder' => 'Bank XXXXXX')) !!}
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <label class="control-label col-md-3">Bank Account ID</label>
        <div class="col-md-9">
          {!! Form::text('bank_account_number',null, array('class' => 'form-control', 'placeholder' => 'No.Rek XXXXXX')) !!}
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6">
      <div class="form-group">
        <label class="control-label col-md-3">No KTP</label>
        <div class="col-md-9">
          {!! Form::text('ktp',null, array('class' => 'form-control', 'placeholder' => 'xxxx')) !!}
        </div>
      </div>
    </div>
    <!--/span-->
    <div class="col-md-6">
      <div class="form-group ">
        <label class="control-label col-md-3">No HP</label>
        <div class="col-md-9">
          {!! Form::text('phone',null, array('class' => 'form-control', 'required', 'placeholder' => 'xxxx')) !!}
        </div>
      </div>
    </div>
    <!--/span-->
  </div>
  <!-- /Row -->
  <div class="row">
    <div class="col-md-6">
      <div class="form-group">
        <label class="control-label col-md-3">NPWP</label>
        <div class="col-md-9">
          {!! Form::text('npwp',null, array('class' => 'form-control', 'placeholder' => 'xxxx')) !!}
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
