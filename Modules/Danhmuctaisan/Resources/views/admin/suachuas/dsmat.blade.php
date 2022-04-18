@extends('layouts.master')

@section('content-header')
    <h1>
        {{ trans('Danh Sách Tài Sản Mất') }}
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> {{ trans('core::core.breadcrumb.home') }}</a></li>
        <li class="active">{{ trans('Danh Sách Tài Sản Mất') }}</li>
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
                                <th>Tên Tài Sản</th>
                                <th>Số Lượng</th>
                                <th>Bộ Phận Làm Mất</th>
                                <th>Nhân Viên Làm Mất</th>
                                <th>Tình Trạng Tài Sản</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if (isset($biencotaisans)): ?>
                            <?php foreach ($biencotaisans as $bienco): ?>
                                <?php if ($bienco->tinhtrang==3): ?>
                                    <tr>
                                        <?php foreach ($join_taisan as $taisan): ?>
                                            <?php if ($taisan->id == $bienco->taisan_id): ?>
                                                <td>{{$taisan->tentaisan}}</td>
                                            <?php endif; ?>
                                        <?php endforeach; ?>

                                        <td>{{$bienco->soluong}}</td>

                                        <?php foreach ($join_phongban as $phongban): ?>
                                            <?php if ($phongban->id == $bienco->bophanbithuhoi_id): ?>
                                                <td>{{$phongban->tenphongban}}</td>
                                            <?php endif; ?>
                                        <?php endforeach; ?>

                                        <?php foreach ($join_nhanvien as $nhanvien): ?>
                                            <?php if ($nhanvien->id == $bienco->nhanvienbithuhoi_id): ?>
                                                <td>{{$nhanvien->tennhanvien}}</td>
                                            <?php endif; ?>
                                        <?php endforeach; ?>

                                        <?php if ($bienco->tinhtrang==1): ?>
                                            <td>Bình Thường</td>
                                        <?php elseif($bienco->tinhtrang==2): ?>
                                            <td>Hư Hỏng</td>
                                        <?php elseif($bienco->tinhtrang==3): ?>
                                            <td>Mất Tài Sản</td>
                                        <?php endif; ?>


                                    </tr>
                                <?php endif; ?>
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
