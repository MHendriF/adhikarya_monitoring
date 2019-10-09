<div class="form-body">
  <h6 class="txt-dark capitalize-font"><i class="zmdi zmdi-account mr-10"></i>Basic Info</h6>
  <hr class="light-grey-hr"/>
  <div class="row">
    <div class="col-md-6">
      <div class="form-group has-error">
        <label class="control-label col-md-3">Nama Lengkap</label>
        <div class="col-md-9">
          {!! Form::text('nama_user',null, array('class' => 'form-control', 'required', 'placeholder' => 'Nama Sesuai KTP')) !!}
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
        <label class="control-label col-md-3">No HP</label>
        <div class="col-md-9">
          {!! Form::text('nohp',null, array('class' => 'form-control', 'required', 'placeholder' => 'xxxx')) !!}
        </div>
      </div>
    </div>
    <!--/span-->
  </div>
  <!-- /Row -->
  <div class="row">
    <div class="col-md-6">
      <div class="form-group">
        <label class="control-label col-md-3">Role</label>
        <div class="col-md-9">
          @if(isset($user))
            {!! Form::select('nama_role', $listRole, $userRole, array('class' => 'form-control select2', 'required')) !!}
          @else
            {!! Form::select('nama_role', $listRole, null, array('class' => 'form-control select2', 'required')) !!}
          @endif
        </div>
      </div>
    </div>
    <!--/span-->
    <div class="col-md-6">
      <div class="form-group">
        <label class="control-label col-md-3">Jabatan</label>
        <div class="col-md-9">
          {!! Form::select('id_jabatan', $listJabatan, null, array('class' => 'form-control select2', 'required')) !!}
        </div>
      </div>
    </div>
    <!--/span-->
  </div>
  <!-- /Row -->
  <div class="row">
    <div class="col-md-6">
      <div class="form-group">
        <label class="control-label col-md-3">Lembaga</label>
        <div class="col-md-9">
          {!! Form::select('id_lembaga', $listLembaga, null, array('class' => 'form-control select2', 'required')) !!}
        </div>
      </div>
    </div>
    <!--/span-->
    <div class="col-md-6">
      <div class="form-group">
        <label class="control-label col-md-3">Divisi</label>
        <div class="col-md-9">
          {!! Form::select('id_divisi', $listDivisi, null, array('class' => 'form-control select2', 'required')) !!}
        </div>
      </div>
    </div>
    <!--/span-->
  </div>
  <!-- /Row -->
  @if(!isset($user))
  <div class="row">
    <div class="col-md-6">
      <div class="form-group">
        <label class="control-label col-md-3">Password</label>
        <div class="col-md-9">
          <input type="password" class="form-control" name="password" required>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <label class="control-label col-md-3">Password Confirmation</label>
        <div class="col-md-9">
          <input type="password" class="form-control" name="password_confirmation" required>
        </div>
      </div>
    </div>
  </div>
  @endif
  <!-- /Row -->

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
