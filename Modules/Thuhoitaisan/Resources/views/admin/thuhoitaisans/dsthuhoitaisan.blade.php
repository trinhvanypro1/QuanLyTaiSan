@extends('layouts.master')

@section('content-header')
    <h1>
        {{ trans('Danh Sách Thu Hồi Tài Sản') }}
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> {{ trans('core::core.breadcrumb.home') }}</a></li>
        <li class="active">{{ trans('Danh Sách Mượn Tài Sản') }}</li>
    </ol>
@stop

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="row">
            </div>
            <div class="box box-primary">
                <div class="box-header">
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                        <div class="card-body">
                            <div class="box-header">
                            <a class="btn btn-primary" href="{{ route('admin.thuhoitaisan.thuhoitaisan.index')}}"></i>Danh Sách Mượn Tài Sản</a>
                            <a class="btn btn-primary" href="{{ route('admin.thuhoitaisan.thuhoitaisan.dsthuhoitaisan')}}"></i>Danh Sách Thu Hồi Tài Sản</a>
                            </div>
                        </div>
                        <table class="data-table table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>Mã Phiếu Thu Hồi</th>
                                <th>Tên Tài Sản Thu Hồi</th>
                                <th>Số Lượng Thu Hồi</th>
                                <th>Ngày Thu Hồi</th>
                                <th>Người Thu Hồi</th>
                                <th>Bộ Phận Bị Thu Hồi</th>
                                <th>Nhân Viên Bị Thu Hồi</th>
                                <th>Tình Trạng Tài Sản</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if (isset($thuhoitaisans)): ?>
                            <?php foreach ($thuhoitaisans as $thuhoitaisan): ?>
                            <tr>
                                <td>{{$thuhoitaisan->mathuhoi}}</td>

                                <?php foreach ($join_taisan as $taisan): ?>
                                    <?php if ($taisan->id == $thuhoitaisan->taisan_id): ?>
                                        <td>{{$taisan->tentaisan}}</td>
                                    <?php endif; ?>
                                <?php endforeach; ?>

                                <?php if ($thuhoitaisan->soluong < 0): ?>
                                    <td>0</td>
                                <?php else: ?>
                                    <td>{{$thuhoitaisan->soluong}}</td>
                                <?php endif; ?>
                                
                                <td>{{$thuhoitaisan->ngaythuhoi}}</td>

                                <?php foreach ($join_user as $user): ?>
                                    <?php if ($user->id == $thuhoitaisan->nhanvienthuhoi_id): ?>
                                        <td>{{$user->first_name}} {{$user->last_name}}</td>
                                    <?php endif; ?>
                                <?php endforeach; ?> 
                                    
                                <?php foreach ($join_phongban as $phongban): ?>
                                    <?php if ($phongban->id == $thuhoitaisan->bophanbithuhoi_id): ?>
                                        <td>{{$phongban->tenphongban}}</td>
                                    <?php endif; ?>
                                <?php endforeach; ?>

                                <?php foreach ($join_nhanvien as $nhanvien): ?>
                                    <?php if ($nhanvien->id == $thuhoitaisan->nhanvienbithuhoi_id): ?>
                                        <td>{{$nhanvien->tennhanvien}}</td>
                                    <?php endif; ?>
                                <?php endforeach; ?>

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

