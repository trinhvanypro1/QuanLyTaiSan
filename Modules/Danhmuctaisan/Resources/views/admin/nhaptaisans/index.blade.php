@extends('layouts.master')

@section('content-header')
    <h1>
        {{ trans('Danh Sách Tài Sản') }}
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> {{ trans('core::core.breadcrumb.home') }}</a></li>
        <li class="active">{{ trans('Danh Sách Tài Sản') }}</li>
    </ol>
@stop

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="row">
                <div class="btn-group pull-right" style="margin: 0 15px 15px 0;">
                    <a href="{{ route('admin.danhmuctaisan.nhaptaisan.create') }}" class="btn btn-primary btn-flat" style="padding: 4px 10px;">
                        <i class="fa fa-pencil"></i> {{ trans('Thêm Tài Sản') }}
                    </a>
                </div>
            </div>
            <div class="box box-primary">
                    <div class="card-body">
                        <div class="box-header">
                            <a class="btn btn-primary" href="{{ route('admin.danhmuctaisan.nhaptaisan.index')}}"></i>Danh Sách Tài Sản</a>
                            <a class="btn btn-primary" href="{{ route('admin.danhmuctaisan.nhaptaisan.usage-history')}}"></i>Lịch Sử Dùng</a>
                        </div>
                        
                    </div>
                <div class="box-header">
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover" >
                            <thead >
                            <tr>
                                <th>Mã Tài Sản</th>
                                <th>Tên Tài Sản</th>
                                <th>Hình Ảnh</th>
                                <th>Loại Tài Sản</th>
                                <th>Số Lượng Kho</th>
                                <th>Đơn Vị Tính</th>
                                <th>Nhà Cung Cấp</th>
                                <th>Ngày Đưa Vào Sử Dụng</th>
                                <th>Mô Tả</th>
                                <th>Tính Năng</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if (isset($nhaptaisans)): ?>
                            <?php foreach ($nhaptaisans as $nhaptaisan): ?>
                            <tr width="100%">
                                <td>{{ $nhaptaisan->mataisan }}</td>

                                <td>
                                    <a href="{{ route('admin.danhmuctaisan.nhaptaisan.details', [$nhaptaisan->id]) }}">
                                        {{ $nhaptaisan->tentaisan }}
                                    </a>
                                </td>

                                <td>
                                    <a href="{{ route('admin.danhmuctaisan.nhaptaisan.details', [$nhaptaisan->id]) }}">
                                        <img src="/public/images/{{ $nhaptaisan->hinhanh }} " height="70" width="70">
                                    </a>
                                </td>

                                <?php foreach ($join_loaitaisan as $loaitaisan): ?>
                                    <?php if ($loaitaisan->id == $nhaptaisan->loaitaisan_id): ?>
                                        <td>{{ $loaitaisan->loaitaisan }}</td>
                                    <?php endif; ?>
                                <?php endforeach; ?>

                                <?php if ($nhaptaisan->soluong < 0): ?>
                                    <td>0</td>
                                <?php else: ?>
                                    <td>{{ $nhaptaisan->soluong }}</td>
                                <?php endif; ?>

                                <td>{{ $nhaptaisan->donvi }}</td>

                                <?php foreach ($join_nhacungcap as $nhacungcap): ?>
                                    <?php if ($nhacungcap->id == $nhaptaisan->nhacungcap_id): ?>
                                        <td>{{ $nhacungcap -> tennhacungcap }}</td>
                                    <?php endif; ?>
                                <?php endforeach; ?>

                                <td>{{ $nhaptaisan->ngaysudung }}</td>

                                <td>{{ $nhaptaisan->mota }}</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('admin.danhmuctaisan.nhaptaisan.edit', [$nhaptaisan->id]) }}" class="btn btn-default btn-flat"><i class="fa fa-pencil"></i></a>
                                        <br>
                                        <br>
                                        <button class="btn btn-danger btn-flat" data-toggle="modal" data-target="#modal-delete-confirmation" data-action-target="{{ route('admin.danhmuctaisan.nhaptaisan.destroy', [$nhaptaisan->id]) }}"><i class="fa fa-trash"></i></button>
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
        <dd>{{ trans('danhmuctaisan::nhaptaisans.title.create nhaptaisan') }}</dd>
    </dl>
@stop

@push('js-stack')
    <script type="text/javascript">
        $( document ).ready(function() {
            $(document).keypressAction({
                actions: [
                    { key: 'c', route: "<?= route('admin.danhmuctaisan.nhaptaisan.create') ?>" }
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
                "sort": false,
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
