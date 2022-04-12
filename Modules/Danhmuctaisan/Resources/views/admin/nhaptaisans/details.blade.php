@extends('layouts.master')

@section('content-header')
    <h1>
        {{ trans('Thông tin') }} {{$nhaptaisan->tentaisan}}
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> {{ trans('Trang Chủ') }}</a></li>
        <li><a href="{{ route('admin.danhmuctaisan.nhaptaisan.index') }}">{{ trans('Danh Sách Tài Sản') }}</a></li>
        <li class="active">{{ trans('Thông tin tài sản') }}</li>
    </ol>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="nav-tabs-custom">
                @include('partials.form-tab-headers')
                <div class="tab-content">
                    <?php $i = 0; ?>
                    @foreach (LaravelLocalization::getSupportedLocales() as $locale => $language)
                        <?php $i++; ?>
                        <div class="tab-pane {{ locale() == $locale ? 'active' : '' }}" id="tab_{{ $i }}">
                            @include('danhmuctaisan::admin.nhaptaisans.partials.details-fields', ['lang' => $locale])
                        </div>
                    @endforeach

                    <div class="box-footer">
                        <a class="btn btn-danger pull-right btn-flat" href="{{ route('admin.danhmuctaisan.nhaptaisan.index')}}"><i class="fa fa-times"></i> {{ trans('Thoát') }}</a>
                    </div>
                </div>
            </div> {{-- end nav-tabs-custom --}}
        </div>
    </div>
@stop





