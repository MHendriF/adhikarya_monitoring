<div class="row">
    <div class="col-md-12">
        <div class="form-wrap">
            <div class="col-md-3">
                <div class="form-group">
                    {!! Form::label('type_role','Role', array('class' => 'control-label mb-10')) !!}
                    <select onchange="location = this.value;" class="form-control select2">
                        @foreach($roles as $role)
                            <option value="{{url('')}}/config/role/{{$role->id}}/edit" {{$role->id == $selectedRole ? "selected" : ""}}>{{$role->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row pa-15">
    <center>
        <h3 style="padding-bottom: 1em">Assign Permission</h3>
    </center>
    @foreach($permissionOption as $permission)
        <div class="col-sm-6 col-md-4 col-lg-3 pl-20">
            <div class="checkbox checkbox-primary ">
                <input name="permission{{$permission['id']}}" type="checkbox" {{$permission['selected'] == 'on' ? 'checked' : ''}}>
                <label>{{$permission['name']}}</label>
            </div>
        </div>
    @endforeach
</div>

 <div class="row pa-30 pb-0">
    <center>
        <input type="button" id="check" class="btn btn-primary" value="Check All" />
        <input type="button" id="uncheck" class="btn btn-primary" value="UnCheck All" />
    </center>
</div>

<div class="row pa-10">
    <center>
        {!! Form::submit('Perbarui', array('class' => 'btn btn-success')) !!}
    </center>
</div>


{{-- <div class="panel-wrapper collapse in">
    <div class="panel-body">         
        @foreach($permissionOption as $permission)
            <div class="col-sm-3">
                <div class="form-group mb-0">
                    <div class="col-sm-8">
                        <div class="checkbox checkbox-success">
                            <input name="permission{{$permission['id']}}" type="checkbox" {{$permission['selected'] == 'on' ? 'checked' : ''}}>
                            <label>{{$permission['name']}}</label>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

        <div class="col-sm-12">
            <div class="row pa-30 pb-15">
                <center>
                    <input type="button" id="check" class="btn btn-primary" value="Check All" />
                    <input type="button" id="uncheck" class="btn btn-primary" value="Uncheck All" />
                </center>
            </div>
        </div>

        <div class="col-sm-12">
            <div class="form-group">
                <center>
                    {{ Form::submit('Update', array('class' => 'btn btn-success')) }}
                </center>
            </div>
        </div>
    </div>
</div>
 --}}
