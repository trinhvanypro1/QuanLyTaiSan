
<div class="box-body">
    <div class="row">
        <div class="col-md-4">
            <label for="exampleInputPassword1">Loại Bàn Giao</label>
                <select name="loai_ban_giao" class="form-control " style="width: 100%;">
                    <option>Tài Sản Cố Định</option>
                    <option>Tài Sản Công Cụ, Dụng Cụ</option>
                </select>
        </div>  

        <div class="col-md-4">
            <label for="exampleInputPassword1">Ngày Bàn Giao</label>
            <input name="ngay_ban_giao" class="form-control" style="width: 100%; display: inline;" onchange="invoicedue(event);" required=""  type="date">
        </div>

        <div class="col-md-4">
            <label for="exampleInputPassword1">Hợp Đồng Bàn Giao</label>
            <input type="file" name="hop_dong_ban_giao" class="form-control" id ="exampleInputEmail">
        </div>
    </div>
    <br>
    <div class="row">
    <div class="col-md-4">
            <label for="exampleInputPassword1">Nhân Viên Bàn Giao</label>
            <select name="nhanvienbangiao" class="form-control nhanviennhan choose">  
                <option value="">--Chọn Nhân Viên--</option>
                @foreach($nhanvienbangiao as $key => $nvbg) 
                    <option value="{{$nvbg->id}}">{{$nvbg->last_name}} {{$nvbg->first_name}}</option>
                @endforeach
            </select>
        </div>

        <div class="col-md-4">
            <label for="phongbannhan">Bộ Phận Nhận Tài Sản</label>
            <select name="phongban" id="phongban" class="form-control choose phongban" placeholder="Chọn Phòng Ban">
                <option>--Chọn Phòng Ban--</option>
                @foreach($phongbannhantaisan as $key => $pb) 
                    <option value="{{$pb->id}}">{{$pb->tenphongban}}</option>
                @endforeach
            </select>
        </div>

        <div class="col-md-4">
            <label for="exampleInputPassword1">Nhân Viên Nhận Tài Sản</label>
            <select name="nhanvien" id="nhanvien" class="form-control nhanvien "> 
                <option value="">--Chọn nhân viên--</option>
            </select>
        </div>

    </div>
<br>
    <div class="row">
        <div class="col-md-4">
            <label for="exampleInputPassword1">Tài Sản Bàn Giao</label>
            <select name="taisan" class="form-control taisan bangiao" id="taisan" style="width: 100%;">
                <option selected="selected">--Chọn Tài Sản--</option>
                @foreach($taisan as $key => $ts) 
                    <option value="{{$ts->id}}">{{$ts->tentaisan}} |Số lượng kho: {{$ts->soluong}}</option>
                @endforeach
            </select>
        </div>

        <div class="col-md-4">
                <label>Số Lượng </label>
                <input type="number" min="1" name="so_luong_ban_giao" class="form-control"  step="1" ></input>
        </div>   

        <div class="col-md-4">
            <label for="exampleInputPassword1">Tình Trạng TS</label>
            <select name="tinh_trang" class="form-control" 
            onchange="if(this.options[this.selectedIndex].value=='customOption'){
                toggleField(this,this.nextSibling);
                this.selectedIndex='0';
            }">
                <option>--Chọn--</option>
                <option>Tốt</option>
                <option>Bình Thường</option>
                <option>Hư hỏng</option>
                <option value="customOption">--Khác--</option>

                </select><input name="tinh_trang" class="form-control" style="display:none;" disabled="disabled" 
                onblur="if(this.value==''){toggleField(this,this.previousSibling);}">
        </div>  


    </div>

</div>



<script>
    function toggleField(hideObj,showObj){
    hideObj.disabled=true;        
    hideObj.style.display='none';
    showObj.disabled=false;   
    showObj.style.display='inline';
    showObj.focus();
    }
</script>
 

