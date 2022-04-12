@extends('layouts.master')

@section('content-header')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<link href="/dist/css/select2.css" rel="stylesheet" />
<script src="/dist/js/select2.min.js"></script>
    <h1>
        {{ trans('Thêm Bàn Giao') }}
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> {{ trans('Trang Chủ') }}</a></li>
        <li><a href="{{ route('admin.bangiaotaisan.bangiaotaisan.index') }}">{{ trans('Danh Sách Bàn Giao') }}</a></li>
        <li class="active">{{ trans('Thêm Bàn Giao') }}</li>
    </ol>
@stop

@section('content')
    {!! Form::open(['route' => ['admin.bangiaotaisan.bangiaotaisan.store'], 'method' => 'post','enctype'=>'multipart/form-data']) !!}
    <div class="row">
        <div class="col-md-12">
            <div class="nav-tabs-custom">
                @include('partials.form-tab-headers')
                <div class="tab-content">
                    <?php $i = 0; ?>
                    @foreach (LaravelLocalization::getSupportedLocales() as $locale => $language)
                        <?php $i++; ?>
                        <div class="tab-pane {{ locale() == $locale ? 'active' : '' }}" id="tab_{{ $i }}">
                            @include('bangiaotaisan::admin.bangiaotaisans.partials.create-fields', ['lang' => $locale])
                        </div>
                    @endforeach

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">{{ trans('Bàn Giao') }}</button>
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

    <script>
    $(document).ready(function() {
    $('#taisan').select2();
        });
    </script>

<script type="text/javascript">
    $(document).ready(function(){
        $('.choose').on('change',function(){
            var action = $(this).attr('id');
            var ma_id = $(this).val();
            var _token = $('input[name="_token"]').val();
            var $result = '';
            if(action=='phongban' ){
                result = 'nhanvien';
            }else{
                result = 'nhanvien';
            }
            $.ajax({
                url :"{{route('admin.bangiaotaisan.bangiaotaisan.selectNhanvien')}}",
                type: 'POST',
                data :{action:action,ma_id:ma_id,_token:_token},
                success:function(data){
                    $('#'+result).html(data);
                }
            });
        });
    })
</script>



@endpush
