
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-body">
                        <div class="box-header">
                        <a class="btn btn-primary" href="{{ route('admin.danhmuctaisan.nhaptaisan.index', [$nhaptaisan->id])}}"></i>Danh Sách Tài Sản</a>
                        <a class="btn btn-primary" href="{{ route('admin.danhmuctaisan.nhaptaisan.details', [$nhaptaisan->id])}}"></i>Thông Tin Tài Sản</a>
                        <a class="btn btn-primary" href="{{ route('admin.danhmuctaisan.nhaptaisan.usage-history', [$nhaptaisan->id])}}"></i>Lịch Sử Dùng</a>
                        </div>
                    </div>
                <hr>
              <!-- /.card-header -->
                <div class="text-right">
                  <img class="img-thumbnail"
                    src="/public/images/{{ $nhaptaisan->hinhanh }} "
                        height="200" width="200">
                </div>
                <br>
                <div class="card-body">
                    <h3>Lịch Sử Bàn Giao</h3>
                    <table  class="table table-striped table-bordered table-hover">
                        <br>
                        <?php foreach ($bangiaotaisans as $bangiao): ?>
                            <?php if ($bangiao->taisan_id == $nhaptaisan->id): ?>
                                <tr>
                                    <th>Trạng Thái</th>
                                    <td>Đang bàn giao</td>

                                    <th>Mã Tài Sản</th>
                                    <td>{{ $bangiao->ma_ban_giao}}</td>
                                </tr>

                                <tr>
                                    <th>Trạng Thái Tài Sản</th>
                                    <td>{{ $bangiao->tinh_trang}}</td>

                                    <th>Nhân Viên Bàn Giao</th>
                                    <?php foreach ($users as $user): ?>
                                        <?php if ($user->id == $bangiao->nhanvienbangiao_id): ?>
                                            <td>{{ $user -> first_name}} {{ $user -> last_name}}</td>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </tr>
                                
                                <tr>
                                    <th>Phong Ban Nhận Tài Sản</th>
                                    <?php foreach ($phongbans as $phongban): ?>
                                        <?php if ($phongban->id == $bangiao->phongbannhantaisan_id): ?>
                                            <td>{{ $phongban -> tenphongban}}</td>
                                        <?php endif; ?>
                                    <?php endforeach; ?>

                                    <th>Nhân Viên Nhận Tài Sản</th>
                                    <?php foreach ($nhanviens as $nhanvien): ?>
                                        <?php if ($nhanvien->id == $bangiao->nhanviennhantaisan_id): ?>
                                            <td>{{ $nhanvien -> tennhanvien}}</td>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </tr>

                                <tr>
                                    <th>Số Lượng Kho</th>
                                    <td>{{ $nhaptaisan -> soluong}}</td>

                                    <th>Số Lượng Nhận Tài Sản</th>
                                    <td>{{ $bangiao->so_luong_ban_giao}}</td>
                                </tr>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </table>
                    <br>
                    <hr>
                    <h3>Lịch Sử Thu Hồi</h3>
                    <table  class="table table-striped table-bordered table-hover">
                        <?php foreach ($thuhoitaisans as $thuhoi): ?>
                            <?php if ($thuhoi->taisan_id == $nhaptaisan->id): ?>
                                <tr>
                                    <th>Trạng Thái</th>
                                    <td>Đã thu hồi</td>

                                    <th>Mã Phiếu Thu Hồi</th>
                                    <td>{{$thuhoi->mathuhoi}}</td>

                                </tr>

                                <tr>
                                    <th>Trạng Thái Tài Sản</th>
                                    <td>{{$thuhoi->tinhtrang}}</td>

                                    <th>Nhân Viên Thu Hồi</th>
                                    <?php foreach ($users as $user): ?>
                                        <?php if ($user->id == $thuhoi->nhanvienthuhoi_id): ?>
                                            <td>{{ $user -> first_name}} {{ $user -> last_name}}</td>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </tr>

                                <tr>
                                    <th>Phong Ban Bị Thu Hồi</th>
                                    <?php foreach ($phongbans as $phongban): ?>
                                        <?php if ($phongban->id == $thuhoi->bophanbithuhoi_id): ?>
                                            <td>{{ $phongban -> tenphongban}}</td>
                                        <?php endif; ?>
                                    <?php endforeach; ?>

                                    <th>Nhân Viên Bị Thu Hồi</th>
                                    <?php foreach ($nhanviens as $nhanvien): ?>
                                        <?php if ($nhanvien->id == $thuhoi->nhanvienbithuhoi_id): ?>
                                            <td>{{ $nhanvien -> tennhanvien}}</td>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </tr>
                                <tr>
                                    <th>Ngày Thu Hồi</th>
                                    <td>{{$thuhoi->ngaythuhoi}}</td>

                                    <th>Số Lượng Thu Hồi</th>
                                    <td>{{$thuhoi->soluong}}</td>
                                </tr>
                                <?php else: ?>
                                    <p>Chưa</p>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </table>
                </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
          <!-- /.col -->
    </div>
        <!-- /.row -->
</div>


