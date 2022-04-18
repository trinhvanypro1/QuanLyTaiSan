@extends('layouts.master')

@section('content-header')
    <h1>
        {{ trans('Lịch Sử Dùng') }}
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> {{ trans('core::core.breadcrumb.home') }}</a></li>
        <li class="active">{{ trans('Lịch Sử Dùng') }}</li>
    </ol>
@stop

@section('content')
    <div class="row">
        <div class="col-xs-12">
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
                            <h3>Lịch Sử Bàn Giao</h3>
                            <thead >
                            <tr>
                                <th>Mã Bàn Giao</th>
                                <th>Tên Tài Sản</th>
                                <th>Hình Ảnh</th>
                                <th>Số Lượng Bàn Giao</th>
                                <th>Nhân Viên Bàn Giao</th>
                                <th>Phòng Ban Nhận Tài Sản</th>
                                <th>Nhân Viên Nhận Tài Sản</th>
                                <th>Ngày Bàn Giao</th>
                                
                            </tr>
                            </thead>
                            <tbody>
                            <?php if (isset($bangiaotaisans)): ?>
                            <?php foreach ($bangiaotaisans as $bangiaotaisan): ?>
                            <tr width="100%">
                                <td>{{ $bangiaotaisan->ma_ban_giao }}</td>

                                <?php foreach ($taisans as $taisan): ?>
                                    <?php if ($taisan->id == $bangiaotaisan->taisan_id): ?>
                                        <td>{{$taisan->tentaisan}}</td>
                                    <?php endif; ?>
                                <?php endforeach; ?>

                                <?php foreach ($taisans as $taisan): ?>
                                    <?php if ($taisan->id == $bangiaotaisan->taisan_id): ?>
                                        <td><img src="/public/images/{{ $taisan->hinhanh }} " height="70" width="70"></td>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                                
                                <td>{{$bangiaotaisan->so_luong_ban_giao}}</td>

                                <?php foreach ($users as $user): ?>
                                    <?php if ($user->id == $bangiaotaisan->nhanvienbangiao_id): ?>
                                        <td>{{$user->last_name}} {{$user->first_name}}</td>
                                    <?php endif; ?>
                                <?php endforeach; ?>

                                <?php foreach ($phongbans as $phongban): ?>
                                    <?php if ($phongban->id == $bangiaotaisan->phongbannhantaisan_id): ?>
                                        <td>{{$phongban->tenphongban}}</td>
                                    <?php endif; ?>
                                <?php endforeach; ?>

                                <?php foreach ($nhanviens as $nhanvien): ?>
                                    <?php if ($nhanvien->id == $bangiaotaisan->nhanviennhantaisan_id): ?>
                                        <td>{{$nhanvien->tennhanvien}}</td>
                                    <?php endif; ?>
                                <?php endforeach; ?>

                                <td>{{$bangiaotaisan->ngay_ban_giao}}</td>
                            </tr>
                            <?php endforeach; ?>
                            <?php endif; ?>
                            </tbody>
                        </table>
                        <!-- /.bàn giao tài sản -->

                        <table class="table table-bordered table-striped table-hover" >
                            <h3>Lịch Sử Thu Hồi Tài Sản</h3>
                            <thead >
                            <tr>
                                <th>Mã Thu Hồi</th>
                                <th>Tên Tài Sản</th>
                                <th>Hình Ảnh</th>
                                <th>Số Lượng Thu Hồi</th>
                                <th>Nhân Viên Thu Hồi</th>
                                <th>Phòng Ban Bị Thu Hồi</th>
                                <th>Nhân Viên Bị Thu Hồi</th>
                                <th>Ngày Thu Hồi</th>
                                <th>Tình Trạng Tài Sản</th>
                                
                            </tr>
                            </thead>
                            <tbody>
                            <?php if (isset($thuhoitaisans)): ?>
                            <?php foreach ($thuhoitaisans as $thuhoitaisan): ?>
                            <tr width="100%">
                                <td>{{ $thuhoitaisan->mathuhoi }}</td>

                                <?php foreach ($taisans as $taisan): ?>
                                    <?php if ($taisan->id == $thuhoitaisan->taisan_id): ?>
                                        <td>{{$taisan->tentaisan}}</td>
                                    <?php endif; ?>
                                <?php endforeach; ?>

                                <?php foreach ($taisans as $taisan): ?>
                                    <?php if ($taisan->id == $thuhoitaisan->taisan_id): ?>
                                        <td><img src="/public/images/{{ $taisan->hinhanh }} " height="70" width="70"></td>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                                
                                <td>{{$thuhoitaisan->soluong}}</td>

                                <?php foreach ($users as $user): ?>
                                    <?php if ($user->id == $thuhoitaisan->nhanvienthuhoi_id): ?>
                                        <td>{{$user->last_name}} {{$user->first_name}}</td>
                                    <?php endif; ?>
                                <?php endforeach; ?>

                                <?php foreach ($phongbans as $phongban): ?>
                                    <?php if ($phongban->id == $thuhoitaisan->bophanbithuhoi_id): ?>
                                        <td>{{$phongban->tenphongban}}</td>
                                    <?php endif; ?>
                                <?php endforeach; ?>

                                <?php foreach ($nhanviens as $nhanvien): ?>
                                    <?php if ($nhanvien->id == $thuhoitaisan->nhanvienbithuhoi_id): ?>
                                        <td>{{$nhanvien->tennhanvien}}</td>
                                    <?php endif; ?>
                                <?php endforeach; ?>

                                <td>{{$thuhoitaisan->ngaythuhoi}}</td>

                                <?php if ($thuhoitaisan->tinhtrang==1): ?>
                                    <td>Bình Thường</td>
                                <?php elseif($thuhoitaisan->tinhtrang==2): ?>
                                    <td>Hư Hỏng</td>
                                <?php elseif($thuhoitaisan->tinhtrang==3): ?>
                                    <td>Mất Tài Sản</td>
                                <?php endif; ?>

                            </tr>
                            <?php endforeach; ?>
                            <?php endif; ?>
                            </tbody>
                        </table>
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
