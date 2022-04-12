@extends('layouts.master')

@section('content-header')
<script src="/money/simple.money.format.js"></script>
    <h1>
        {{ trans('Thêm Tài Sản') }}
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> {{ trans('Trang Chủ') }}</a></li>
        <li><a href="{{ route('admin.danhmuctaisan.nhaptaisan.index') }}">{{ trans('Danh Sách Tài Sản') }}</a></li>
        <li class="active">{{ trans('Thêm Tài Sản') }}</li>
    </ol>
@stop

@section('content')
    {!! Form::open(['route' => ['admin.danhmuctaisan.nhaptaisan.store'], 'method' => 'post','enctype'=>'multipart/form-data']) !!}
    <div class="row">
        <div class="col-md-12">
            <div class="nav-tabs-custom">
                @include('partials.form-tab-headers')
                <div class="tab-content">
                    <?php $i = 0; ?>
                    @foreach (LaravelLocalization::getSupportedLocales() as $locale => $language)
                        <?php $i++; ?>
                        <div class="tab-pane {{ locale() == $locale ? 'active' : '' }}" id="tab_{{ $i }}">
                            @include('danhmuctaisan::admin.nhaptaisans.partials.create-fields', ['lang' => $locale])
                        </div>
                    @endforeach

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary btn-flat">{{ trans('Thêm Tài Sản') }}</button>
                        <a class="btn btn-danger pull-right btn-flat" href="{{ route('admin.danhmuctaisan.nhaptaisan.index')}}"><i class="fa fa-times"></i> {{ trans('Đóng') }}</a>
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

@push('js-stack')
    <script type="text/javascript">
        $( document ).ready(function() {
            $(document).keypressAction({
                actions: [
                    { key: 'b', route: "<?= route('admin.danhmuctaisan.nhaptaisan.index') ?>" }
                ]
            });
        });
    </script>
    <script>
        $( document ).ready(function() {
            $('input[type="checkbox"].flat-blue, input[type="radio"].flat-blue').iCheck({
                checkboxClass: 'icheckbox_flat-blue',
                radioClass: 'iradio_flat-blue'
            });
        });
    </script>
    
    <script>
        $('.price_format').simpleMoneyFormat();
    </script>
@endpush
