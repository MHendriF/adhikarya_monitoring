<div class="col-xs-6 col-sm-6 col-sm-offset-2">
    <div class="panel-wrapper collapse in">
        <div class="panel-body">
            <div class="form-wrap">
                <div class="form-group">
                    {!! Form::label('code','Judul', array('class' => 'col-sm-4 control-label')) !!}
                    <div class="col-sm-8">
                        {!! Form::text('title',null, array('class' => 'form-control', 'required')) !!}
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('nama_area','Konten', array('class' => 'col-sm-4 control-label')) !!}
                    <div class="col-sm-8">
                        {!! Form::textarea('content',null, array('class' => 'form-control', 'required')) !!}
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('nama_area','Kategori', array('class' => 'col-sm-4 control-label')) !!}
                    <div class="col-sm-8">
                        {!! Form::select('category', [1 => 'Event', 2 => 'Info'], null, array('class' => 'form-control select2_single', 'required')) !!}
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('nama_area','Status', array('class' => 'col-sm-4 control-label')) !!}
                    <div class="col-sm-8">
                        {!! Form::select('status', [0 => 'Unactive', 1 => 'Active'], null, array('class' => 'form-control select2_single', 'required')) !!}
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('nama_area','Image', array('class' => 'col-sm-4 control-label')) !!}
                    <div class="col-sm-8">
                        @if(isset($news))
                          <input name="image_path" type="file" id="input-file-now" class="dropify" data-default-file="{{ asset('/image_upload/news/'.$news->image_path) }}" value="{{$news->image_path}}" />
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
