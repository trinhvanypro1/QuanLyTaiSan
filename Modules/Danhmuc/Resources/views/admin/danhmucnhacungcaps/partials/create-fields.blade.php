
<div class="box-body">
    <div class="col-md-6">
        <label for="exampleInputPassword1">Mã Nhà Cung Cấp</label>
        <input type="text" class="form-control" name="manhacungcap" value="{{$manhacungcap}}">
    </div>
    <div class="col-md-6">
        {!! Form::normalInput('tennhacungcap', 'Tên Nhà Cung Cấp', $errors, ['class' => 'form-control']) !!}
    </div>
    <div class="col-md-6">
        {!! Form::normalInput('diachi', 'Địa Chỉ', $errors, ['class' => 'form-control']) !!}
    </div>

</div>
