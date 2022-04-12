
<div class="box-body">
    <div class="col-md-6">
        <label for="exampleInputEmail1">Mã Nhân Viên</label>
        <input type="text" class="form-control" value="{{$danhmucnhanvien -> manhanvien}}" name="manhanvien">
    </div>
    <div class="col-md-6">
        <label for="exampleInputEmail1">Tên Nhân Viên</label>
        <input type="text" class="form-control" value="{{$danhmucnhanvien -> tennhanvien}}" name="tennhanvien">
    </div>
    <div class="col-md-6">
        <label for="exampleInputEmail1">Địa Chỉ</label>
        <input type="text" class="form-control" value="{{$danhmucnhanvien -> diachi}}" name="diachi">
    </div>
    
        <div class="col-md-6">
            <label for="exampleInputPassword1">Phòng Ban</label>
            <select name="maphongban" class="form-control">
                @foreach($phongban as $key => $pb)
                @if($pb->id == $danhmucnhanvien->phongban_id)  
                    <option selected value = "{{$pb->id}}">{{$pb->tenphongban}}</option>
                @endif
                @endforeach   
                
            </select>
        </div>
</div>
