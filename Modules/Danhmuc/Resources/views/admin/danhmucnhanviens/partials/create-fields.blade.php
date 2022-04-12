
<div class="box-body">


    <div class="row">
        <div class="col-md-3">
            <label for="exampleInputPassword1">Mã Nhân Viên</label>
            <input type="text" class="form-control" name="manhanvien" value="{{$manhanvien}}">
        </div>

        <div class="col-md-3">
            {!! Form::normalInput('tennhanvien', 'Tên Nhân Viên', $errors, ['class' => 'form-control']) !!}
        </div>

        <div class="col-md-3">
            <label for="exampleInputPassword1">Ảnh Nhân Viên</label>
            <input type="file" name="hinhanh" class="form-control" id ="exampleInputEmail">
        </div>

        <div class="col-md-3">
            <div class="form-group">
                <label for="exampleInputPassword1">Giới Tính</label>
                <select name="gioitinh" class="form-control" >
                    <option value="0">---Chọn---</option>
                    <option value="1">Nam</option>
                    <option value="2">Nữ</option>      
                </select>
            </div>
        </div>
    </div>

    <div class="row">


        <div class="col-md-3">
            <label for="exampleInputPassword1">Ngày Tháng Năm Sinh</label>
            <input name="ngaysinh" class="form-control" style="width: 100%; display: inline;" onchange="invoicedue(event);" required="" value="2018-05-10 00:00:00" type="date">
        </div>

        <div class="col-md-3">
            <label for="exampleInputPassword1">CCCD/HC</label>
            <input name="cmnd" class="form-control" placeholder="CCCD/HC">
        </div>

        <div class="col-md-3">
            <label for="exampleInputPassword1">Tôn Giáo</label>
            <input name="tongiao" class="form-control" placeholder="Tôn Giáo">
        </div>

        <div class="col-md-3">
            <label for="exampleInputPassword1">Dân Tộc</label>
            <input name="dantoc" class="form-control" placeholder="Dân Tộc">
        </div>
    </div>


    <h5><b>Địa Chỉ</b></h4>
    <div class="form-group">

        <div class="row">

            <div class="col-md-3">
                <select name="tinhtp" id="city" class="form-control select2 choose city" style="width: 100%;">
                    <option value="">--Chọn Tỉnh/Thành Phố--</option>
                    @foreach($city as $key => $ci)
                    <option value="{{$ci->matp}}">{{$ci->name_city}}</option> 
                    @endforeach     
                </select>
            </div>

            <div class="col-md-3">
                <select name="quanhuyen" id="province" class="form-control province choose" >
                    <option value="">--Chọn Quận/Huyện--</option>
                         
                </select>
            </div>

            <div class="col-md-3">
                <select name="xaphuong" id="wards" class="form-control wards" >
                    <option value="">--Chọn Xã Phường--</option>      
                </select>
            </div>

            <div class="col-md-3">
                <input name="sonha" type="text" class="form-control" placeholder="Số nhà">
            </div>

        </div>
    </div>

    <div class="row">
        <div class="col-md-3">
            <label for="exampleInputPassword1">Chuyên Môn</label>
            <input name="chuyenmon" class="form-control" placeholder="Chuyên Môn">
        </div>

        <div class="col-md-3">
            <label for="exampleInputPassword1">Trình Độ</label>
            <input name="trinhdo" class="form-control" placeholder="Trình Độ">
        </div>

        <div class="col-md-3">
            <label for="exampleInputPassword1">Phòng Ban</label>
            <select name="phongban" class="form-control">
                <option value="">--Chọn Phòng Ban--</option>
                @foreach($phongban as $key => $pb) 
                    <option value="{{$pb->id}}">{{$pb->tenphongban}}</option>
                @endforeach
            </select>
        </div>
    </div>

</div>

