
<div class="box-body">
    <div class="row">
        <div class="col-md-4">
            {!! Form::normalInput('tentaisan', 'Tên Tài Sản', $errors, ['class' => 'form-control']) !!}
        </div>

        <div class="col-md-4">
            <label for="exampleInputPassword1">Ảnh Sản Phẩm</label>
            <input type="file" name="hinhanh" class="form-control" id ="exampleInputEmail">
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="exampleInputPassword1">Đơn Vị Tính</label>

                <select name="donvi" class="form-control" 
          onchange="if(this.options[this.selectedIndex].value=='customOption'){
              toggleField(this,this.nextSibling);
              this.selectedIndex='0';
          }">
            <option>--Chọn--</option>
            <option>Chiếc</option>
            <option>Cái</option>
            <option>Kg</option>
            <option value="customOption">--Khác--</option>

            </select><input name="donvi" class="form-control" style="display:none;" disabled="disabled" 
            onblur="if(this.value==''){toggleField(this,this.previousSibling);}">
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-md-4">
            <label>Số Lượng</label>
            <input type="number" name="soluong" class="form-control"  step="1" ></input>

        </div>
        <div class="col-md-4">
            <!-- <laber>  </laber> -->
            {!! Form::normalInput('soserial', 'Số Serial', $errors, ['class' => 'form-control']) !!}
        </div>

        <div class="col-md-4">
            {!! Form::normalInput('muckhtbhangnam', 'Mức KHTB Hằng Năm (%)', $errors, ['class' => 'form-control']) !!}  
        </div>
    </div>


    <div class="row">

        <div class="col-md-4">
            <div class="form-group">
                <label for="exampleInputPassword1">Phân Loại Tài Sản</label>
                <select name="phanloaitaisan" class="form-control" >
                    
                    <option >Tài Sản</option>
                    <option >Tài Sản Cố Định</option>      
                </select>
            </div>
        </div>

        <div class="col-md-4">
            <label for="exampleInputPassword1">Loại tài sản</label>   
            <select name="loaitaisan_id" class="form-control">
                <option>--Chọn--</option>
                @foreach($loaitaisan as $key => $lts)
                <option value="{{$lts->id}}"> {{$lts->loaitaisan}} </option>
                @endforeach
            </select>
        </div>

        <div class="col-md-4">
            <label for="exampleInputPassword1">Nhà cung cấp</label>   
            <select name="nhacungcap_id" class="form-control">
                <option>--Chọn--</option>
                @foreach($tennhacungcap as $key => $ncc)
                <option value="{{$ncc->id}}"> {{$ncc->tennhacungcap}} </option>
                @endforeach
            </select> 
        </div>
    </div>


    <div class="row">
        <div class="col-md-4">
            <label for="exampleInputPassword1">Ngày Sử Dụng</label>
            <input name="ngaysudung" class="form-control" style="width: 100%; display: inline;" onchange="invoicedue(event);" required="" value="2018-05-10 00:00:00" type="date">
        </div>

        <div class="col-md-4">
          <label for="">Thời Hạn Bảo Hành (Tháng)</label>
          <input type="text"  class="form-control" name="baohanh">
        </div>

        <div class="col-md-4">
          <label for="">Giá</label>
          <input type="text" data-validation="length" data-validation-length="min5" class="form-control price_format" name="tongtaisan">
        </div>
    </div>


    <div class="col-md-12">
        {!! Form::normalTextarea('mota', 'Mô Tả', $errors, ['class' => 'form-control']) !!}
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


