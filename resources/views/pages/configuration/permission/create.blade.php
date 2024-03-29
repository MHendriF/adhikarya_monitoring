@extends('layouts.app')

@section('title', $submenu)

@section('content')

<!-- Main Content -->
<div class="page-wrapper">
    <div class="container-fluid">

        <!-- Title -->
        <div class="row heading-bg">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h5 class="txt-dark">{{ $submenu }}</h5>
            </div>
            <!-- Breadcrumb -->
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="{{ route('dashboard') }}"><i class="fa fa-home"></i>&nbsp;Dashboard</a></li>
                    <li><a href="{{ route('permission.index') }}"><span>{{ $submenu }}</span></a></li>
                    <li class="active"><span>Create</span></li>
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
                            <h6 class="panel-title txt-light"><i class="fa fa-wpforms"></i>&nbsp;&nbsp;Form {{ $submenu }}</h6>
                        </div>
                        @include('partials.panel')
                        <div class="clearfix"></div>
                    </div>

                    <div id="collapse_1" class="panel-wrapper collapse in">
                        <div class="panel-body">
                            <div class="row">
                                <center>
                                    <h3 style="padding-top: 1em">{{ $submenu }}</h3>
                                </center>
                                {!! Form::open(array('route' => 'permission.store', 'method' => 'POST', 'class' => 'form-horizontal', 'data-toggle' => 'validator', 'role' => 'form')) !!}
                                    @include('pages.configuration.permission.form',array('submit' => 'Create'))
                                {!! Form::close() !!}
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
