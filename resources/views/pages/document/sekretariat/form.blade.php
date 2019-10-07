<div class="col-xs-8 col-sm-8 col-sm-offset-1">
    <div class="panel-wrapper collapse in">
        <div class="panel-body">
            <div class="form-wrap">
                <div class="form-group">
                    {!! Form::label('nama_dokumen','Nama Dokumen', array('class' => 'col-sm-4 control-label')) !!}
                    <div class="col-sm-8">
                        {!! Form::text('nama_dokumen',null, array('class' => 'form-control', 'required')) !!}
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('nama_dokumen','Status Dokumen', array('class' => 'col-sm-4 control-label')) !!}
                    <div class="col-sm-8">
                        {!! Form::text('status_dokumen',null, array('class' => 'form-control')) !!}
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('nama_dokumen','Tanggal Pengajuan', array('class' => 'col-sm-4 control-label')) !!}
                    <div class="col-sm-8">
                      <div class='input-group date datetimepicker1'>
                          @if(isset($dokumen))
                            <input type='text' name="tanggal_pengajuan" class="form-control" value="{{$dokumen->tanggal_pengajuan}}" required/>
                          @else
                            <input type='text' name="tanggal_pengajuan" class="form-control" required/>
                          @endif
                          <span class="input-group-addon">
                              <span class="glyphicon glyphicon-calendar"></span>
                          </span>
                      </div>
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('nama_dokumen','Tanggal Deadline', array('class' => 'col-sm-4 control-label')) !!}
                    <div class="col-sm-8">
                      <div class='input-group date datetimepicker1'>
                          @if(isset($dokumen))
                            <input type='text' name="deadline_dokumen" class="form-control" value="{{$dokumen->deadline_dokumen}}"/>
                          @else
                            <input type='text' name="deadline_dokumen" class="form-control"/>
                          @endif
                          <span class="input-group-addon">
                              <span class="glyphicon glyphicon-calendar"></span>
                          </span>
                      </div>
                    </div>
                </div>

                @if(isset($dokumen))

                  <div class="form-group">
                      {!! Form::label('tanggal_diterima_mk','Tanggal Diterima MK', array('class' => 'col-sm-4 control-label')) !!}
                      <div class="col-sm-8">
                        <div class='input-group date datetimepicker1'>
                            @if(isset($dokumen))
                              <input type='text' name="tanggal_diterima_mk" class="form-control" value="{{$dokumen->tanggal_diterima_mk}}"/>
                            @else
                              <input type='text' name="tanggal_diterima_mk" class="form-control"/>
                            @endif
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                      </div>
                  </div>
                  <div class="form-group">
                      {!! Form::label('tanggal_diapprove_mk','Tanggal Diterima MK', array('class' => 'col-sm-4 control-label')) !!}
                      <div class="col-sm-8">
                        <div class='input-group date datetimepicker1'>
                            @if(isset($dokumen))
                              <input type='text' name="tanggal_diapprove_mk" class="form-control" value="{{$dokumen->tanggal_diapprove_mk}}"/>
                            @else
                              <input type='text' name="tanggal_diapprove_mk" class="form-control"/>
                            @endif
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                      </div>
                  </div>
                  <div class="form-group">
                      {!! Form::label('tanggal_diapprove_owner','Tanggal Diapprove Owner', array('class' => 'col-sm-4 control-label')) !!}
                      <div class="col-sm-8">
                        <div class='input-group date datetimepicker1'>
                            @if(isset($dokumen))
                              <input type='text' name="tanggal_diapprove_owner" class="form-control" value="{{$dokumen->tanggal_diapprove_owner}}"/>
                            @else
                              <input type='text' name="tanggal_diapprove_owner" class="form-control"/>
                            @endif
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                      </div>
                  </div>
                  <div class="form-group">
                      {!! Form::label('tanggal_diterima_adhikarya','Tanggal Diterima Adhi', array('class' => 'col-sm-4 control-label')) !!}
                      <div class="col-sm-8">
                        <div class='input-group date datetimepicker1'>
                            @if(isset($dokumen))
                              <input type='text' name="tanggal_diterima_adhikarya" class="form-control" value="{{$dokumen->tanggal_diterima_adhikarya}}"/>
                            @else
                              <input type='text' name="tanggal_diterima_adhikarya" class="form-control"/>
                            @endif
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                      </div>
                  </div>

                @endif

                <div class="form-group">
                    {!! Form::label('keterangan_dokumen','Keterangan Dokumen', array('class' => 'col-sm-4 control-label')) !!}
                    <div class="col-sm-8">
                        {!! Form::textarea('keterangan_dokumen',null, array('class' => 'form-control')) !!}
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
