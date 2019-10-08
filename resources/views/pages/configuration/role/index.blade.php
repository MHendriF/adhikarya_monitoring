@extends('layouts.app')

@section('title', $submenu)

@section('content')

<!-- Main Content -->
<div class="page-wrapper">
    <div class="container-fluid pt-25">

        <!-- Title -->
        <div class="row heading-bg">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h5 class="txt-dark">{{ $submenu }} List</h5>
            </div>
            <!-- Breadcrumb -->
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="{{ route('dashboard') }}"><i class="fa fa-home"></i>&nbsp;Dashboard</a></li>
                    <li class="active"><span>{{ $submenu }}</span></li>
                </ol>
            </div>
            <!-- /Breadcrumb -->
        </div>
        <!-- /Title -->

        <!-- Row -->
        <div class="row">
            <div class="col-sm-12 col-md-12 col-sm-12 col-xs-12">
                 <div class="panel panel-default card-view">
                   <div class="panel-heading">
                        <div class="pull-left">
                            <a href="{{ route('role.create') }}" class="btn btn-outline btn-success"><i class="fa fa-plus">&nbsp;Add {{ $submenu }}</i></a>
                        </div>
                        <div class="clearfix"></div>
                    </div>

                    <div class="clearfix"></div>
                    <div class="panel-wrapper collapse in">
                      <div class="panel-body row pa-0">
                        <div class="table-wrap">
                          <div class="table-responsive">
                            <table class="table table-hover mb-0" id="datatable">
                              <thead>
                                <tr>
                                  <th>#</th>
                                  <th>Nama</th>
                                  <th>Guard Name</th>
                                  <th>Created</th>
                                  <th>Updated</th>
                                  <th>Action</th>
                                </tr>
                              </thead>
                              <tbody>
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- /Row -->

        @include('partials.footer')

    </div>
</div>
<!-- /Main Content -->


@include('partials.sweetalert')

@push('message')
@include('partials.toastr')
@endpush

@endsection

@section('custom-js')
    <script>
        $(document).ready( function () {
            var t = $('#datatable').DataTable({
                "serverSide": true,
                "processing": true,
                "ajax": "{{ route('role.ajax') }}",
                "columns": [
                    {data: 'DT_RowIndex', searchable: false},
                    {data: 'name'},
                    {data: 'guard_name'},
                    {data: 'created_at'},
                    {data: 'updated_at'},
                    {data: 'action', orderable: false, searchable: false}
                ],
                "order": [[ 1, 'asc' ]]
            });
            t.on('draw.dt', function() {
                $('[data-toggle="tooltip"]').tooltip();
            })
        });
    </script>
@endsection
