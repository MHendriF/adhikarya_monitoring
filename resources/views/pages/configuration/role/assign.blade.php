@extends('layouts.app')

@section('title', 'Role')

@section('content')

<!-- Main Content -->
<div class="page-wrapper">
    <div class="container-fluid">

        <!-- Title -->
        <div class="row heading-bg">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h5 class="txt-dark">Role</h5>
            </div>
            <!-- Breadcrumb -->
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="{{ route('dashboard') }}"><i class="fa fa-home"></i>&nbsp;Home</a></li>
                    <li><a href="{{ route('permission.index') }}"><span>Role</span></a></li>
                    <li class="active"><span>Assign</span></li>
                </ol>
            </div>
            <!-- /Breadcrumb -->
        </div>
        <!-- /Title -->

        <!-- Row -->
        <div class="row">
            <div class="col-sm-12">
                 <div class="panel panel-warning card-view">
                   <div class="panel-heading">
                        <div class="pull-left">
                            <h6 class="panel-title txt-light"><i class="fa fa-wpforms"></i>&nbsp;&nbsp;Form Role</h6>
                        </div>
                        <div class="clearfix"></div>
                    </div>

                    <div id="collapse_1" class="panel-wrapper collapse in">
                        <div class="panel-body">
                          
                              {!! Form::model($role,array('route' => ['role.assign.update',$role->id], 'method' => 'PUT', 'class' => 'form-horizontal', 'data-toggle' => 'validator', 'role' => 'form')) !!}
                                  @include('pages.configuration.role.form-assign',array('submit' => 'Perbarui'))
                              {!! Form::close() !!}

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

<script type="text/javascript">
    $(document).ready(function(){
        $(".select2").select2();
    });
</script>

<script type="text/javascript">
    $(document).ready( function() {
        $('#check').on('click', function () {
            var allInputs = document.getElementsByTagName("input");
            for (var i = 0, max = allInputs.length; i < max; i++){
                if (allInputs[i].type === 'checkbox')
                    allInputs[i].checked = true;
            }
        });
        $('#uncheck').on('click', function () {
            var allInputs = document.getElementsByTagName("input");
            for (var i = 0, max = allInputs.length; i < max; i++){
                if (allInputs[i].type === 'checkbox')
                    allInputs[i].checked = false;
            }
        });
    });
</script>

@include('partials.sweetalert')

@push('message')
@include('partials.toastr')
@endpush

@endsection
