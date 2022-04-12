
<div class="box-body">
    <div class="row">
        <div class="col-md-4">
            {!! Form::normalInput('mataisan', 'Mã Tài Sản', $errors,$nhaptaisan, ['class' => 'form-control']) !!}            
        </div>
        <div class="col-md-4">
            {!! Form::normalInput('tentaisan', 'Tên Tài Sản', $errors,$nhaptaisan, ['class' => 'form-control']) !!}
        </div>
        <div class="col-md-4">
            <label for="exampleInputPassword1">Ảnh Sản Phẩm</label>
            <input type="file" name="hinhanh" class="form-control">
            @foreach($edit_taisan as $key => $taisan)
                <img src="{{URL::to('public/images/'.$taisan->hinhanh)}}" height="100" width="">
            @endforeach
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            {!! Form::normalInput('soluong', 'Số Lượng', $errors,$nhaptaisan, ['class' => 'form-control']) !!} 

        </div>
        <div class="col-md-4">
            {!! Form::normalInput('soserial', 'Số Serial', $errors,$nhaptaisan, ['class' => 'form-control']) !!}
        </div>

        <div class="col-md-4">
        <div class="form-group">
                <label for="exampleInputPassword1">Đơn Vị</label>

                <select name="donvi" class="form-control" 
                onchange="if(this.options[this.selectedIndex].value=='customOption'){
              toggleField(this,this.nextSibling);
              this.selectedIndex='0';
            }">
            @foreach($edit_taisan as $key => $taisan)
                @foreach($phanloaitaisan as $key =>$donvi)
                    @if($donvi->id == $taisan->id)
                        <option selected value="{{$donvi->id}}">{{$donvi->donvi}}</option>
                    @else
                        <option  value="{{$donvi->id}}">{{$donvi->donvi}}</option>
                    @endif
                @endforeach
            @endforeach
            <option>Chọn ---</option>
            <option>Chiếc</option>
            <option>Cái</option>
            <option>Kg</option>
            <option>Lít</option>
            <option value="customOption">---Khác ---</option>

        </select><input name="donvi" class="form-control" style="display:none;" disabled="disabled" 
            onblur="if(this.value==''){toggleField(this,this.previousSibling);}">
            </div>
        </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            {!! Form::normalInput('muckhtbhangnam', 'Mức KHTB Hằng Năm (%)', $errors,$nhaptaisan, ['class' => 'form-control']) !!}  
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="exampleInputPassword1">Phân Loại Tài Sản</label>
                <select name="phanloaitaisan" class="form-control input-sm m-bot15" >
                @foreach($edit_taisan as $key => $taisan)
                    @foreach($phanloaitaisan as $key => $plts)
                        @if($plts->id == $taisan->id)
                            <option selected value="{{$plts->id}}">{{$plts->phanloaitaisan}}</option>
                        @else
                            <option  value="{{$plts->id}}">{{$plts->phanloaitaisan}}</option>
                        @endif
                    @endforeach
                @endforeach
                    <!-- <option >Tài Sản</option>
                    <option >Tài Sản Cố Định</option>       -->
                </select>
            </div>
        </div>

        <div class="col-md-4">
            <label for="exampleInputPassword1">Loại tài sản</label>   
            <select name="maloaitaisan" class="form-control input-sm m-bot15">
                <option>Chọn ---</option>
                @foreach($edit_taisan as $key => $taisan)
                    @foreach($loaitaisan as $key => $lts)
                        @if($lts->id == $taisan->id)
                            <option selected value="{{$lts->id}}"> {{$lts->loaitaisan}} </option>
                        @else
                            <option value="{{$lts->id}}"> {{$lts->loaitaisan}} </option>
                        @endif
                    @endforeach
                @endforeach
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            {!! Form::normalInput('tongtaisan', 'Giá', $errors,$nhaptaisan, ['class' => 'form-control']) !!}
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
        <label for="exampleInputPassword1">Nhà cung cấp</label>   
            <select name="manhacungcap" class="form-control input-sm m-bot15">
                <option>Chọn ---</option>
                @foreach($edit_taisan as $key => $taisan)
                    @foreach($tennhacungcap as $key => $ncc)
                        @if($ncc->id == $taisan->id)
                            <option selected value="{{$ncc->id}}"> {{$ncc->tennhacungcap}} </option>
                        @else
                            <option value="{{$ncc->id}}"> {{$ncc->tennhacungcap}} </option>
                        @endif
                    @endforeach
                @endforeach
            </select> 
        </div>
    </div>
</div>
