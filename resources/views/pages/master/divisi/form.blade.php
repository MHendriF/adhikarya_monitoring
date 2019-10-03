<div class="col-xs-6 col-sm-6 col-sm-offset-2">
    <div class="panel-wrapper collapse in">
        <div class="panel-body">
            <div class="form-wrap">
                <div class="form-group">
                    {!! Form::label('nama_divisi','Nama Divisi', array('class' => 'col-sm-4 control-label')) !!}
                    <div class="col-sm-8">
                        {!! Form::text('nama_divisi',null, array('class' => 'form-control', 'required')) !!}
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('keterangan_divisi','Keterangan Divisi', array('class' => 'col-sm-4 control-label')) !!}
                    <div class="col-sm-8">
                        {!! Form::textarea('keterangan_divisi',null, array('class' => 'form-control', 'required')) !!}
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
