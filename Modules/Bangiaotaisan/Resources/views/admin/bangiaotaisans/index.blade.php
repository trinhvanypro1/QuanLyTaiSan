@extends('layouts.master')

@section('content-header')
    <h1>
        {{ trans('Danh Sách Bàn Giao') }}
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> {{ trans('Trang Chủ') }}</a></li>
        <li class="active">{{ trans('Danh Sách Bàn Giao') }}</li>
    </ol>
@stop

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="row">
                <div class="btn-group pull-right" style="margin: 0 15px 15px 0;">
                    <a href="{{ route('admin.bangiaotaisan.bangiaotaisan.create') }}" class="btn btn-primary btn-flat" style="padding: 4px 10px;">
                        <i class="fa fa-pencil"></i> {{ trans('Thêm Bàn Giao') }}
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
                                <th>Mã Bàn Giao</th>
                                <th>Loại Bàn Giao</th>
                                <th>Hợp Đồng Bàn Giao</th>
                                <th>Bộ Phận Nhận Tài Sản</th>
                                <th>Nhân Viên Nhận Tài Sản</th>
                                <th>Tên tài sản </th>
                                <th>Tình Trạng</th>
                                <th>Số Lượng</th>
                                <th>Ngày Bàn Giao</th>
                                <th>Tính Năng</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if (isset($bangiaotaisans)): ?>
                            <?php foreach ($bangiaotaisans as $bangiaotaisan): ?>
                            <tr>
                                <td>{{ $bangiaotaisan->ma_ban_giao }}</td>

                                <td>{{ $bangiaotaisan->loai_ban_giao }}</td>

                            @if($bangiaotaisan->hop_dong_ban_giao)
                                <td>
                                   <a target="_blank" href="{{asset('/public/document/'.$bangiaotaisan->hop_dong_ban_giao)}}">Xem</a> 
                                </td>
                            @else
                                <td>Không file</td>
                            @endif

                                <?php foreach ($join_phongbannhantaisan as $phongbannhan): ?>
                                    <?php if ($phongbannhan->id == $bangiaotaisan->phongbannhantaisan_id): ?>
                                        <td>{{ $phongbannhan->tenphongban }}</td>
                                    <?php endif; ?>
                                <?php endforeach; ?>

                                <?php foreach ($join_nhanviennhantaisan as $nhanviennhan): ?>
                                    <?php if ($nhanviennhan->id == $bangiaotaisan->nhanviennhantaisan_id): ?>
                                        <td>{{ $nhanviennhan->tennhanvien }}</td>
                                    <?php endif; ?>
                                <?php endforeach; ?>

                                <?php foreach ($join_taisan as $taisan): ?>
                                    <?php if ($taisan->id == $bangiaotaisan->taisan_id): ?>
                                        <td>{{ $taisan->tentaisan }}</td>
                                    <?php endif; ?>
                                <?php endforeach; ?>

                                <td>{{ $bangiaotaisan->tinh_trang}}</td>

                                <td>{{ $bangiaotaisan->so_luong_ban_giao }}</td>

                                <td>{{ $bangiaotaisan->ngay_ban_giao }}</td>

                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('admin.bangiaotaisan.bangiaotaisan.edit', [$bangiaotaisan->id]) }}" class="btn btn-default btn-flat"><i class="fa fa-pencil"></i></a>
                                        <button class="btn btn-danger btn-flat" data-toggle="modal" data-target="#modal-delete-confirmation" data-action-target="{{ route('admin.bangiaotaisan.bangiaotaisan.destroy', [$bangiaotaisan->id]) }}"><i class="fa fa-trash"></i></button>
                                    </div>
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
        <dd>{{ trans('bangiaotaisan::bangiaotaisans.title.create bangiaotaisan') }}</dd>
    </dl>
@stop

@push('js-stack')
    <script type="text/javascript">
        $( document ).ready(function() {
            $(document).keypressAction({
                actions: [
                    { key: 'c', route: "<?= route('admin.bangiaotaisan.bangiaotaisan.create') ?>" }
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
                "sort":false,
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
