@extends('layouts.master')

@section('content-header')
    <h1>
        {{ trans('Thu hồi tài sản') }}
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> {{ trans('Trang Chủ') }}</a></li>
        <li><a href="{{ route('admin.danhmuctaisan.nhaptaisan.index') }}">{{ trans('Danh Sách Thu Hồi') }}</a></li>
        
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
                            @include('thuhoitaisan::admin.thuhoitaisans.partials.thuhoi-fields', ['lang' => $locale])
                        </div>
                    @endforeach

                    <div class="box-footer">
                        <a class="btn btn-danger pull-right btn-flat" href="{{ route('admin.thuhoitaisan.thuhoitaisan.index')}}"><i class="fa fa-times"></i> {{ trans('Thoát') }}</a>
                    </div>
                </div>
            </div> {{-- end nav-tabs-custom --}}
        </div>
    </div>
@stop





