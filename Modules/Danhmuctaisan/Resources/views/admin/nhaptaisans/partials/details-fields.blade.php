
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-body">
                        <div class="box-header">
                        <a class="btn btn-primary" href="{{ route('admin.danhmuctaisan.nhaptaisan.index')}}"></i>Danh Sách Tài Sản</a>
                        <a class="btn btn-primary" href="{{ route('admin.danhmuctaisan.nhaptaisan.details', [$nhaptaisan->id])}}"></i>Thông Tin Tài Sản</a>
                        
                        </div>
                    </div>
                <hr>
              <!-- /.card-header -->
              <div class="text-right">
                  <img class="img-thumbnail"
                    src="/public/images/{{ $nhaptaisan->hinhanh }} "
                       alt="User profile picture" height="200" width="200">
                </div>
                <br>
                <div class="card-body">
                    <table id="example2" class="table table-striped table-bordered table-hover">
                        <h2>Thông Tin Tài Sản</h2>
                        <tr>
                            <th>Mã tài sản</th>
                            <td>{{$nhaptaisan->mataisan}}</td>

                            <th>Tên tài sản</th>
                            <td>{{$nhaptaisan->tentaisan}}</td>
                        </tr>

                        <tr>
                            <th>Loại tài sản</th>
                                <?php foreach ($join_loaitaisan as $loaitaisan): ?>
                                    <?php if ($loaitaisan->id == $nhaptaisan->loaitaisan_id): ?>
                                        <td>{{ $loaitaisan->loaitaisan }}</td>
                                    <?php endif; ?>
                                <?php endforeach; ?>

                            <th>Phân loại tài sản</th>
                            <td>{{$nhaptaisan->phanloaitaisan}}</td>

                        </tr>

                        <tr>
                            <th>Nhà cung cấp</th>
                                <?php foreach ($join_nhacungcap as $nhacungcap): ?>
                                    <?php if ($nhacungcap->id == $nhaptaisan->nhacungcap_id): ?>
                                        <td>{{ $nhacungcap -> tennhacungcap }}</td>
                                    <?php endif; ?>
                                <?php endforeach; ?>

                            <th>Địa chỉ nhà cung cấp</th>
                                <?php foreach ($join_nhacungcap as $nhacungcap): ?>
                                    <?php if ($nhacungcap->id == $nhaptaisan->nhacungcap_id): ?>
                                        <td>{{ $nhacungcap -> diachi }}</td>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                        </tr>

                        <tr>
                            <th>Số Serial/Model</th>
                            <td>{{$nhaptaisan->soserial}}</td>

                            <th>Thời Hạn Bảo Hành (Tháng)</th>
                            <td>{{$nhaptaisan->baohanh}}</td>
                        </tr>

                        <tr>
                            <th>Người quản lý tài sản</th>
                            <td>...</td>

                            <th>Vị trí kho</th>
                            <td>...</td>

                        </tr>
                    </table>
                    <br>
                    <hr>

                    <div class="card-body">
                    <table id="example2" class="table table-striped table-bordered table-hover">
                        <h2>Giá Trị Tài Sản</h2>
                        <tr>
                            <th>Mã tài sản</th>
                            <td>{{$nhaptaisan->mataisan}}</td>

                            <th>Tên tài sản</th>
                            <td>{{$nhaptaisan->tentaisan}}</td>
                        </tr>

                        <tr>
                            <th>Giá</th>
                            <td>{{$nhaptaisan->tongtaisan}} VNĐ</td>

                            <th>Đơn vị tính</th>
                            <td>{{$nhaptaisan->donvi}}</td>

                        </tr>

                        <tr>
                            <th>Số lượng kho</th>
                            <td>{{$nhaptaisan->soluong}}</td>

                            <th>Ngày đưa vào sử dụng</th>
                            <td>{{ $nhaptaisan -> ngaysudung }}</td>
                        </tr>

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


