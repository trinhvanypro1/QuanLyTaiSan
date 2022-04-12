
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
                    <table  class="table table-striped table-bordered table-hover">

                        <tr>
                            <th >Giá</th>
                            <td>{{$nhaptaisan->tongtaisan}}  VNĐ</td>
                            
                            <th >Đơn vị tính</th>
                            <td>{{$nhaptaisan->donvi}}</td>
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


