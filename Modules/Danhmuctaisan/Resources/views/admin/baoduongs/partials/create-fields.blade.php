
<div class="box-body">
    <div class="row">
        <div class="col-md-4">
            <label for="exampleInputPassword1">Loại Bảo Dưỡng</label>
                <select name="loai_ban_giao" class="form-control " style="width: 100%;">
                    <option>Tài Sản Cố Định</option>
                    <option>Tài Sản Công Cụ, Dụng Cụ</option>
                </select>
        </div>  

        <div class="col-md-4">
            <label for="exampleInputPassword1">Ngày Bảo Dưỡng</label>
            <input name="ngay_ban_giao" class="form-control" style="width: 100%; display: inline;" onchange="invoicedue(event);" required=""  type="date">
        </div>

        <div class="col-md-4">
            <label for="exampleInputPassword1">Ngày Dự Kiến Kết Thúc Bảo Dưỡng</label>
            <input name="ngay_ban_giao" class="form-control" style="width: 100%; display: inline;" onchange="invoicedue(event);" required=""  type="date">
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-4">
            <label for="exampleInputPassword1">Nhân Viên Nhập</label>
            <select name="nhanvienbangiao" class="form-control nhanviennhan choose">  
                <option value="">--Chọn Nhân Viên--</option>
                @foreach($nhanvienbangiao as $key => $nvbg) 
                    <option value="{{$nvbg->id}}">{{$nvbg->last_name}} {{$nvbg->first_name}}</option>
                @endforeach
            </select>
        </div>

        <div class="col-md-4">
            <label for="exampleInputPassword1">Tài Sản Bàn Giao</label>
            <select name="taisan" class="form-control taisan bangiao" id="taisan" style="width: 100%;">
                <option selected="selected">--Chọn Tài Sản--</option>
                @foreach($taisan as $key => $ts) 
                    <option value="{{$ts->id}}">{{$ts->tentaisan}}</option>
                @endforeach
            </select>
        </div>

        <div class="col-md-4">
                <label>Số Lượng </label>
                <input type="number" min="1" name="so_luong_ban_giao" class="form-control"  step="1" ></input>
        </div> 
    </div>
<br>
    <div class="row">


  

        <div class="col-md-4">
            <label for="exampleInputPassword1">Tình Trạng TS</label>
            <select name="tinh_trang" class="form-control" 
            onchange="if(this.options[this.selectedIndex].value=='customOption'){
                toggleField(this,this.nextSibling);
                this.selectedIndex='0';
            }">
                <option>--Chọn--</option>
                <option>Bình Thường</option>
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
 

