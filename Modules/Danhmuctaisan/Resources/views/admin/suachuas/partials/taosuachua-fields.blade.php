
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                <div class="card-body">
                    <div class="text-right">
                    <?php foreach ($taisans as $taisan): ?>
                        <?php if ($taisan->id == $thuhoitaisan->taisan_id): ?>
                            <?php foreach ($taisans as $taisan): ?>
                                <?php if ($taisan->id == $thuhoitaisan->taisan_id): ?>
                                    <img class="img-thumbnail"
                                        src="/public/images/{{ $taisan->hinhanh }} "
                                            height="170" width="170">
                                <?php endif; ?>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    <?php endforeach; ?>
                    </div>
                    <table  class="table table-striped table-bordered table-hover">
                    <?php foreach ($taisans as $taisan): ?>
                            <?php if ($taisan->id == $thuhoitaisan->taisan_id): ?>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="text">Tên Tài Sản</label>
                                        <?php foreach ($taisans as $taisan): ?>
                                            <?php if ($taisan->id == $thuhoitaisan->taisan_id): ?>
                                                <select name="taisansuachua" class="form-control">  
                                                    <option value="{{$taisan->id}}">{{$taisan->tentaisan}} |SL hư hỏng: {{$thuhoitaisan->soluong}}</option>
                                                </select>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="text">Nhà Cung Cấp Tài Sản</label>
                                            <?php foreach ($taisans as $taisan): ?>
                                                <?php if ($taisan->id == $thuhoitaisan->taisan_id): ?>
                                                    <?php foreach ($nhacungcaps as $nhacungcap): ?>
                                                        <?php if ($nhacungcap->id == $taisan->nhacungcap_id): ?>
                                                            <select name="nhacungcap" class="form-control">  
                                                                <option value="{{$nhacungcap->id}}">{{$nhacungcap->tennhacungcap}}</option>
                                                            </select>
                                                        <?php endif; ?>
                                                    <?php endforeach; ?>
                                                <?php endif; ?>
                                        <?php endforeach; ?>
                                    </div>
  
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Số Lượng Sửa Chữa</label>
                                        <input type="number" min="1" name="soluong" class="form-control"  step="1" ></input>
                                    </div> 

                                    <div class="col-md-6">
                                        <label for="text">Nhân Viên Nhập</label>
                                        <select name="nhanviennhap" class="form-control">  
                                            <option value="">--Chọn Nhân Viên Nhập--</option>
                                            @foreach($users as $key => $user) 
                                                <option value="{{$user->id}}">{{$user->last_name}} {{$user->first_name}}</option>
                                            @endforeach
                                        </select>
                                    </div> 

                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="exampleInputPassword1">Ngày Sửa Chữa</label>
                                        <input name="ngaysuachua" class="form-control" style="width: 100%; display: inline;" onchange="invoicedue(event);" required=""  type="date">
                                    </div>

                                    <div class="col-md-6">
                                        <label for="text">Tình Trạng Tài Sản</label>
                                        <select name="tinhtrang" class="form-control">  
                                            <?php if ($thuhoitaisan->tinhtrang==1): ?>
                                                <option value="{{$thuhoitaisan->tinhtrang}}">Bình Thường</option>
                                            <?php elseif($thuhoitaisan->tinhtrang==2): ?>
                                                <option value="{{$thuhoitaisan->tinhtrang}}">Hư Hỏng</option>
                                            <?php elseif($thuhoitaisan->tinhtrang==3): ?>
                                                <option value="{{$thuhoitaisan->tinhtrang}}">Mất Tài Sản</option>
                                            <?php endif; ?>    
                                        </select>
                                    </div>
                                </div>
<br>
                                <div class="col-md-12">
                                    {!! Form::normalTextarea('motahuhai', 'Mô Tả Hư Hại', $errors, ['class' => 'form-control']) !!}
                                </div> 
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


