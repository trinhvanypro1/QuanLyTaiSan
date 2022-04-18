@extends('layouts.master')

@section('content-header')
    <h1>
        {{ trans('Danh Sách Sữa Chữa') }}
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> {{ trans('core::core.breadcrumb.home') }}</a></li>
        <li class="active">{{ trans('Danh Sách Sữa Chữa') }}</li>
    </ol>
@stop

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header">
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                        <div class="card-body">
                            <div class="box-header">
                            <a class="btn btn-primary" href="{{ route('admin.danhmuctaisan.suachua.index')}}"></i>Danh Sách Tài Sản Hư Hỏng</a>
                            <a class="btn btn-primary" href="{{ route('admin.danhmuctaisan.suachua.dsmat')}}"></i>Danh Sách Tài Sản Mất</a>
                            <a class="btn btn-primary" href="{{ route('admin.danhmuctaisan.suachua.dssuachua')}}"></i>Danh Sách Tài Sản Sữa Chữa</a>
                        </div>
                        </div>
                        <table class="data-table table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>Mã Sửa Chữa</th>
                                <th>Tên Tài Sản</th>
                                <th>Số Lượng Sửa Chữa</th>
                                <th>Nhân Viên Nhập</th>
                                <th>Nhà Cung Cấp</th>
                                <th>Ngày Sửa Chữa</th>
                                <th>Tình Trạng</th>
                                <th>Tính Năng</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if (isset($suachuas)): ?>
                            <?php foreach ($suachuas as $suachua): ?>
                                    <tr>
                                        <td>{{$suachua->masuachua}}</td>

                                        <?php foreach ($join_taisan as $taisan): ?>
                                            <?php if ($taisan->id == $suachua->taisansuachua_id): ?>
                                                <td>{{$taisan->tentaisan}}</td>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                        
                                        <td>{{$suachua->soluongsuachua}}</td>
                                        

                                        <?php foreach ($join_user as $user): ?>
                                            <?php if ($user->id == $suachua->nhanviennhap_id): ?>
                                                <td>{{$user->last_name}} {{$user->first_name}}</td>
                                            <?php endif; ?>
                                        <?php endforeach; ?>

                                        <?php foreach ($join_nhacungcap as $nhacungcap): ?>
                                            <?php if ($nhacungcap->id == $suachua->nhacungcap_id): ?>
                                                <td>{{$nhacungcap->tennhacungcap}}</td>
                                            <?php endif; ?>
                                        <?php endforeach; ?>

                                        <td>{{$suachua->ngaysuachua}}</td>
                                        
                                        <?php if ($suachua->tinhtrang==1): ?>
                                            <td>Bình Thường</td>
                                        <?php elseif($suachua->tinhtrang==2): ?>
                                            <td>Hư Hỏng</td>
                                        <?php elseif($suachua->tinhtrang==3): ?>
                                            <td>Mất Tài Sản</td>
                                        <?php endif; ?>

                                        <td>
                                            <a href="{{ route('admin.danhmuctaisan.suachua.capnhatsuachua',[$suachua->id]) }}" class="btn btn-primary btn-flat" style="padding: 4px 10px;">
                                            <i class="fa fa-random"></i> {{ trans('Cập Nhật Tình Trạng') }}</a>      
                                        </td>
                                    </tr>
                                
                            <?php endforeach; ?>
                            <?php endif; ?>
                            </tbody>
                        </table>
                        <!-- /.box-body -->
                    </div>
                </div>
                <!-- /.box -->
            </div>
        </div>
    </div>
    @include('core::partials.delete-modal')
@stop

@section('footer')
    <a data-toggle="modal" data-target="#keyboardShortcutsModal"><i class="fa fa-keyboard-o"></i></a> &nbsp;
@stop
@section('shortcuts')
    <dl class="dl-horizontal">
        <dt><code>c</code></dt>
        <dd>{{ trans('danhmuctaisan::suachuas.title.create suachua') }}</dd>
    </dl>
@stop

@push('js-stack')
    <script type="text/javascript">
        $( document ).ready(function() {
            $(document).keypressAction({
                actions: [
                    { key: 'c', route: "<?= route('admin.danhmuctaisan.suachua.create') ?>" }
                ]
            });
        });
    </script>
    <?php $locale = locale(); ?>
    <script type="text/javascript">
        $(function () {
            $('.data-table').dataTable({
                "paginate": true,
                "lengthChange": true,
                "filter": true,
                "sort": true,
                "info": true,
                "autoWidth": true,
                "order": [[ 0, "desc" ]],
                "language": {
                    "url": '<?php echo Module::asset("core:js/vendor/datatables/{$locale}.json") ?>'
                }
            });
        });
    </script>
@endpush
