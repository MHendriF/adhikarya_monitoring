<div class="col-xs-6 col-sm-6 col-sm-offset-2">
    <div class="panel-wrapper collapse in">
        <div class="panel-body">
            <div class="form-wrap">
                <div class="form-group">
                    {!! Form::label('code','Title', array('class' => 'col-sm-4 control-label')) !!}
                    <div class="col-sm-8">
                        {!! Form::text('title',null, array('class' => 'form-control', 'required')) !!}
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('nama_area','Content', array('class' => 'col-sm-4 control-label')) !!}
                    <div class="col-sm-8">
                        {!! Form::textarea('body',null, array('class' => 'form-control', 'required')) !!}
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('code','Sent to', array('class' => 'col-sm-4 control-label')) !!}
                    <div class="col-sm-8">
                        <select name="id_site" class="form-control select2" required>
                            <option value='0'>All Customer</option>
                            @foreach($sites as $site)
                                <option value='{{ $site->id_site }}'>Customer Site {{ $site->name_site }}</option>
                            @endforeach
                        </select>
                        <!-- {!! Form::select('id_site', array_pluck($sites, 'name_site', 'id_site'), null, array('class' => 'form-control', 'required')) !!} -->
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('nama_area','Image', array('class' => 'col-sm-4 control-label')) !!}
                    <div class="col-sm-8">
                      @if(isset($notifikasi))
                        <input name="image_path" type="file" id="input-file-now" class="dropify" data-default-file="{{ asset('/image_upload/notification/'.$notifikasi->image_path) }}" value="{{$notifikasi->image_path}}" />
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
