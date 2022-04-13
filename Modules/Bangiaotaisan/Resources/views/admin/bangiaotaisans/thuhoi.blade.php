@extends('layouts.master')

@section('content-header')

    <?php foreach ($taisans as $taisan): ?>
        <?php if ($taisan->id == $bangiaotaisan->taisan_id): ?>
            <h1>
                Thu Hồi Tài Sản - {{$taisan->tentaisan}}
            </h1>
        <?php endif; ?>
    <?php endforeach; ?>

    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> {{ trans('Trang Chủ') }}</a></li>
        <li><a href="{{ route('admin.bangiaotaisan.bangiaotaisan.index') }}">{{ trans('Danh Sách Bàn Giao') }}</a></li>
        <li class="active">{{ trans('Thêm Bàn Giao') }}</li>
    </ol>
@stop

@section('content')
    {!! Form::open(['route' => ['admin.bangiaotaisan.bangiaotaisan.dsthuhoi'], 'method' => 'post','enctype'=>'multipart/form-data']) !!}
    <div class="row">
        <div class="col-md-12">
            <div class="nav-tabs-custom">
                @include('partials.form-tab-headers')
                <div class="tab-content">
                    <?php $i = 0; ?>
                    @foreach (LaravelLocalization::getSupportedLocales() as $locale => $language)
                        <?php $i++; ?>
                        <div class="tab-pane {{ locale() == $locale ? 'active' : '' }}" id="tab_{{ $i }}">
                            @include('bangiaotaisan::admin.bangiaotaisans.partials.thuhoi-fields', ['lang' => $locale])
                        </div>
                    @endforeach

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">{{ trans('Thu Hồi Tài Sản') }}</button>
                        <a class="btn btn-danger pull-right btn-flat" href="{{ route('admin.bangiaotaisan.bangiaotaisan.index')}}"><i class="fa fa-times"></i> {{ trans('Đóng') }}</a>
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
                    { key: 'b', route: "<?= route('admin.bangiaotaisan.bangiaotaisan.index') ?>" }
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
@endpush
