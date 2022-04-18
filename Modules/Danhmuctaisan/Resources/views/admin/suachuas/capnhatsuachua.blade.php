@extends('layouts.master')

@section('content-header')
    <?php foreach ($taisans as $taisan): ?>
        <?php if ($taisan->id == $suachua->taisan_id): ?>
            <?php foreach ($taisans as $taisan): ?>
                <?php if ($taisan->id == $suachua->taisan_id): ?>
                    <h1>Sữa chữa - {{$taisan->tentaisan}}</h1>
                <?php endif; ?>
            <?php endforeach; ?>
        <?php endif; ?>
    <?php endforeach; ?>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> {{ trans('Trang Chủ') }}</a></li>
        <li><a href="{{ route('admin.danhmuctaisan.suachua.index') }}">{{ trans('Cập Nhật Sửa Chữa') }}</a></li>
    </ol>
@stop

@section('content')
{!! Form::open(['route' => ['admin.danhmuctaisan.suachua.cnsuachua'], 'method' => 'post']) !!}
        <div class="row">
            <div class="col-md-12">
                <div class="nav-tabs-custom">
                    @include('partials.form-tab-headers')
                    <div class="tab-content">
                        <?php $i = 0; ?>
                        @foreach (LaravelLocalization::getSupportedLocales() as $locale => $language)
                            <?php $i++; ?>
                            <div class="tab-pane {{ locale() == $locale ? 'active' : '' }}" id="tab_{{ $i }}">
                                @include('danhmuctaisan::admin.suachuas.partials.capnhatsuachua-fields', ['lang' => $locale])
                            </div>
                        @endforeach

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary btn-flat">{{ trans('Cập Nhật') }}</button>
                            <a class="btn btn-danger pull-right btn-flat" href="{{ route('admin.danhmuctaisan.suachua.index')}}"><i class="fa fa-times"></i> {{ trans('Thoát') }}</a>
                        </div>
                    </div>
                </div> {{-- end nav-tabs-custom --}}
            </div>
        </div>
        {!! Form::close() !!}
@stop
@section('footer')
    <a data-toggle="modal" data-target="#keyboardShortcutsModal"><i class="fa fa-keyboard-o"></i></a> &nbsp;
@stop
@section('shortcuts')
    <dl class="dl-horizontal">
        <dt><code>b</code></dt>
        <dd>{{ trans('core::core.back to index') }}</dd>
    </dl>
@stop





