<div class="col-lg-9 col-md-8 col-sm-8 col-xs-12">
    <div class="panel-wrapper collapse in">
        <div class="panel-body">
            <div class="form-wrap">
                <div class="form-group">
                    {!! Form::label('id_user','PIC Dokumen', array('class' => 'col-sm-4 control-label')) !!}
                    <div class="col-sm-8">
                        {!! Form::text('id_user', $picDokumen->user->nama_user, array('class' => 'form-control', 'readonly')) !!}
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('nama_dokumen','Nama Dokumen', array('class' => 'col-sm-4 control-label')) !!}
                    <div class="col-sm-8">
                        {!! Form::text('nama_dokumen',null, array('class' => 'form-control', 'readonly')) !!}
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('nama_dokumen','Status Dokumen', array('class' => 'col-sm-4 control-label')) !!}
                    <div class="col-sm-8">
                        {!! Form::text('status_dokumen',null, array('class' => 'form-control', 'readonly')) !!}
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('nama_dokumen','Tanggal Pengajuan', array('class' => 'col-sm-4 control-label')) !!}
                    <div class="col-sm-8">
                      <div class='input-group date datetimepicker1'>
                          <input type='text' name="tanggal_pengajuan" class="form-control" value="{{$dokumen->tanggal_pengajuan}}" readonly/>
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
                          <input type='text' name="deadline_dokumen" class="form-control" value="{{$dokumen->deadline_dokumen}}" readonly/>
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
                            <input type='text' name="tanggal_diterima_mk" class="form-control" value="{{$dokumen->tanggal_diterima_mk}}" readonly/>
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
                            <input type='text' name="tanggal_diapprove_mk" class="form-control" value="{{$dokumen->tanggal_diapprove_mk}}" readonly/>
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
                            <input type='text' name="tanggal_diapprove_owner" class="form-control" value="{{$dokumen->tanggal_diapprove_owner}}" readonly/>
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
                            <input type='text' name="tanggal_diterima_adhikarya" class="form-control" value="{{$dokumen->tanggal_diterima_adhikarya}}" readonly/>
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
                        {!! Form::textarea('keterangan_dokumen',null, array('class' => 'form-control', 'rows' => '4', 'readonly')) !!}
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('keterangan_dokumen','Lampiran Dokumen', array('class' => 'col-sm-4 control-label')) !!}
                    <div class="col-sm-8">
                        @if(count($attachments) > 0)
                        <div class="panel-wrapper collapse in">
                            <div class="panel-body" style="border: 2px solid #E5E5E5; padding-left: 10px; padding-right: 10px;">
                                <ul class="list-icons">
                                    @foreach($attachments as $attachment)
                                    <a href="{{ url('/dokumen/finance/'.$attachment->nama_file)}}" target="_blank" >
                                        <li class="mb-10 txt-primary"><i class="fa fa-angle-double-right text-success mr-5"></i> {{$attachment->nama_file}}</li>
                                    </a>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        @else
                        <div class="panel-wrapper collapse in">
                            <div class="panel-body">
                                <ul class="list-icons">
                                  <li class="mb-10"><i class="fa fa-angle-double-right text-info mr-5"></i> There is no attachment</li>
                              </ul>
                          </div>
                        </div>
                        @endif
                    </div>
                </div>

                <div class="col-sm-10 col-sm-offset-3">
                    @include('partials.errors')
                </div>
                <div class="form-group">
                    {!! Form::label('','', array('class' => 'col-sm-4 control-label')) !!}
                    <div class="col-sm-8">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
