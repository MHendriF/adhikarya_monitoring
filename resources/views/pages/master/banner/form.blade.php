<div class="col-xs-6 col-sm-6 col-sm-offset-2">
    <div class="panel-wrapper collapse in">
        <div class="panel-body">
            <div class="form-wrap">
                <div class="form-group">
                    {!! Form::label('code','Nama Banner', array('class' => 'col-sm-4 control-label')) !!}
                    <div class="col-sm-8">
                        {!! Form::text('name',null, array('class' => 'form-control', 'required')) !!}
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('nama_area','Site', array('class' => 'col-sm-4 control-label')) !!}
                    <div class="col-sm-8">
                        {!! Form::select('id_site', array_pluck($sites, 'name_site', 'id_site'), null, array('class' => 'form-control', 'required')) !!}
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('nama_area','Status', array('class' => 'col-sm-4 control-label')) !!}
                    <div class="col-sm-8">
                        {!! Form::select('status', [0 => 'Unactive', 1 => 'Active'], null, array('class' => 'form-control select2_single', 'required')) !!}
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('nama_area','Expired Date', array('class' => 'col-sm-4 control-label')) !!}
                    <div class="col-sm-8">
                        <div class='input-group date datetimepicker1'>
                            @if(isset($banner))
                              <input type='text' name="expired_date" class="form-control" value="{{$banner->expired_date}}" required/>
                            @else
                              <input type='text' name="expired_date" class="form-control" required/>
                            @endif
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('nama_area','Deskripsi', array('class' => 'col-sm-4 control-label')) !!}
                    <div class="col-sm-8">
                        {!! Form::textarea('description',null, array('class' => 'form-control', 'required', 'rows'=>'5')) !!}
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('nama_area','Image', array('class' => 'col-sm-4 control-label')) !!}
                    <div class="col-sm-8">
                      @if(isset($banner))
                        <input name="image_path" type="file" id="input-file-now" class="dropify" data-default-file="{{ asset('/image_upload/banner/'.$banner->image_path) }}" value="{{$banner->image_path}}"/>
                      @else
                        <input name="image_path" type="file" id="input-file-now" class="dropify" required/>
                      @endif
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
