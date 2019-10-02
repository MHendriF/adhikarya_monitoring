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
                    {!! Form::label('code','Content', array('class' => 'col-sm-4 control-label')) !!}
                    <div class="col-sm-8">
                        {!! Form::text('content',null, array('class' => 'form-control', 'required')) !!}
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('code','Sender', array('class' => 'col-sm-4 control-label')) !!}
                    <div class="col-sm-8">
                        {!! Form::text('sender',null, array('class' => 'form-control', 'required')) !!}
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('code','Email Sender', array('class' => 'col-sm-4 control-label')) !!}
                    <div class="col-sm-8">
                        {!! Form::text('email',null, array('class' => 'form-control', 'required')) !!}
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('code','Phone', array('class' => 'col-sm-4 control-label')) !!}
                    <div class="col-sm-8">
                        {!! Form::text('phone',null, array('class' => 'form-control', 'required')) !!}
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('nama_area','Category', array('class' => 'col-sm-4 control-label')) !!}
                    <div class="col-sm-8">
                        {!! Form::select('category', [1 => 'Support', 2 => 'Payment'], null, array('class' => 'form-control select2_single', 'required')) !!}
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('nama_area','Status', array('class' => 'col-sm-4 control-label')) !!}
                    <div class="col-sm-8">
                        {!! Form::select('status', [0 => 'Unreplied', 1 => 'Replied'], null, array('class' => 'form-control select2_single', 'required')) !!}
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('nama_area','Image', array('class' => 'col-sm-4 control-label')) !!}
                    <div class="col-sm-8">
                      @if(isset($support))
                        <input name="image_path" type="file" id="input-file-now" class="dropify" data-default-file="{{ asset('/image_upload/support/'.$support->image_path) }}" value="{{$support->image_path}}"/>
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
