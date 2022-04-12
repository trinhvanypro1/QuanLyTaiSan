@extends('layouts.master')

@section('content-header')
    <h1>
        {{ trans('Danh Sách Nhân Viên') }}
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> {{ trans('core::core.breadcrumb.home') }}</a></li>
        <li class="active">{{ trans('Danh Sách Nhân Viên') }}</li>
    </ol>
@stop

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="row">
                <div class="btn-group pull-right" style="margin: 0 15px 15px 0;">
                    <a href="{{ route('admin.danhmuc.danhmucnhanvien.create') }}" class="btn btn-primary btn-flat" style="padding: 4px 10px;">
                        <i class="fa fa-pencil"></i> {{ trans('Thêm Nhân Viên') }}
                    </a>
                </div>
            </div>
            <div class="box box-primary">
                <div class="box-header">
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                        <table class="data-table table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>Mã Nhân Viên</th>
                                <th>Tên Nhân Viên</th>
                                <th>Hình Ảnh</th>
                                <th>Giới Tính</th>
                                <th>Phòng Ban</th>
                                <th>Tính Năng</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if (isset($danhmucnhanviens)): ?>
                            <?php foreach ($danhmucnhanviens as $danhmucnhanvien): ?>
                            <tr>
                                <td>{{ $danhmucnhanvien->manhanvien }}</td>

                                <td>{{ $danhmucnhanvien->tennhanvien }}</td>

                                <td><img src="/public/images_nhanvien/{{ $danhmucnhanvien->hinhanh }} " height="70" width="70"></td>
                                
                                <?php if ($danhmucnhanvien->gioitinh==1): ?>
                                    <td>Nam</td>
                                <?php else: ?>
                                    <td>Nữ</td>
                                <?php endif; ?>

                                <?php foreach ($join_nhanvien as $nhanvien): ?>
                                    <?php if ($nhanvien->id==$danhmucnhanvien->phongban_id): ?>
                                        <td>{{ $nhanvien->tenphongban }}</td>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                                
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('admin.danhmuc.danhmucnhanvien.edit', [$danhmucnhanvien->id]) }}" class="btn btn-default btn-flat"><i class="fa fa-pencil"></i></a>
                                        <button class="btn btn-danger btn-flat" data-toggle="modal" data-target="#modal-delete-confirmation" data-action-target="{{ route('admin.danhmuc.danhmucnhanvien.destroy', [$danhmucnhanvien->id]) }}"><i class="fa fa-trash"></i></button>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                            <?php endif; ?>
                            </tbody>
                            <tfoot>
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
        <dd>{{ trans('danhmuc::danhmucnhanviens.title.create danhmucnhanvien') }}</dd>
    </dl>
@stop

@push('js-stack')
    <script type="text/javascript">
        $( document ).ready(function() {
            $(document).keypressAction({
                actions: [
                    { key: 'c', route: "<?= route('admin.danhmuc.danhmucnhanvien.create') ?>" }
                ]
            });
        });
    </script>
    <?php $locale = locale(); ?>
    <script type="text/javascript">
        $(function () {
            $('.data-table').dataTable({
                "paginate": false,
                "lengthChange": false,
                "filter": false,
                "sort": false,
                "info": false,
                "autoWidth": true,
                "order": [[ 0, "desc" ]],
                "language": {
                    "url": '<?php echo Module::asset("core:js/vendor/datatables/{$locale}.json") ?>'
                }
            });
        });
    </script>
@endpush
