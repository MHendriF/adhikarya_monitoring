<div class="col-xs-6 col-sm-6 col-sm-offset-2">
    <div class="panel-wrapper collapse in">
        <div class="panel-body">
            <div class="form-wrap">
                <div class="form-group">
                    {!! Form::label('code','Nama Customer', array('class' => 'col-sm-4 control-label')) !!}
                    <div class="col-sm-8">
                        {!! Form::text('name_customer',null, array('class' => 'form-control', 'required')) !!}
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('nama_area','Site', array('class' => 'col-sm-4 control-label')) !!}
                    <div class="col-sm-8">
                        {!! Form::text('name_site',null, array('class' => 'form-control', 'required')) !!}
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('nama_area','ID Unit', array('class' => 'col-sm-4 control-label')) !!}
                    <div class="col-sm-8">
                        <!-- {!! Form::select('code_unit', array_pluck($unit_data, 'code_unit', 'code_unit'), null, array('class' => 'form-control', 'required')) !!} -->
                        <select name="code_unit" class="form-control select2" required>
                            @foreach($unit_data as $data)
                                @if($data->status == 0)
                                  <option value="{{ $data->code_unit }}" @if($minat->code_unit==$data->code_unit) selected="selected" @endif> {{ $data->code_unit }} -- available</option>
                                @else
                                  <option value="{{ $data->code_unit }}" @if($minat->code_unit==$data->code_unit) selected="selected" @endif> {{ $data->code_unit }} -- unvailable</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('nama_area','Type', array('class' => 'col-sm-4 control-label')) !!}
                    <div class="col-sm-8">
                        {!! Form::text('type',null, array('class' => 'form-control', 'required')) !!}
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('nama_area','No HP', array('class' => 'col-sm-4 control-label')) !!}
                    <div class="col-sm-8">
                        {!! Form::text('phone',null, array('class' => 'form-control', 'required')) !!}
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('nama_area','Status', array('class' => 'col-sm-4 control-label')) !!}
                    <div class="col-sm-8">
                        {!! Form::select('status', [0 => 'Unprocessed', 1 => 'Processed'], null, array('class' => 'form-control select2_single', 'required')) !!}
                    </div>
                </div>
                <div class="col-sm-10 col-sm-offset-3">
                    @include('partials.errors')
                </div>
                <div class="form-group">
                    {!! Form::label('','', array('class' => 'col-sm-4 control-label')) !!}
                    <div class="col-sm-8">
                        {{ Form::submit($submit, array('class' => 'btn btn-primary')) }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
