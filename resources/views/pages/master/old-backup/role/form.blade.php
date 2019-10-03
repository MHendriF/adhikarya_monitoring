<div class="col-xs-6 col-sm-6 col-sm-offset-2">
    <div class="panel-wrapper collapse in">
        <div class="panel-body">
            <div class="form-wrap">
                <div class="form-group">
                    {!! Form::label('code','Nama Role', array('class' => 'col-sm-4 control-label')) !!}
                    <div class="col-sm-8">
                        {!! Form::text('name',null, array('class' => 'form-control', 'required')) !!}
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('code','Display Name', array('class' => 'col-sm-4 control-label')) !!}
                    <div class="col-sm-8">
                        {!! Form::text('display_name',null, array('class' => 'form-control', 'required')) !!}
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('code','Deskripsi', array('class' => 'col-sm-4 control-label')) !!}
                    <div class="col-sm-8">
                        {!! Form::textarea('description',null, array('rows' => '4', 'class' => 'form-control', 'required')) !!}
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
