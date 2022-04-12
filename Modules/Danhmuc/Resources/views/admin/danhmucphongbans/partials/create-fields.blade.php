
<div class="box-body">
    <div class="col-md-6">
        <label for="exampleInputPassword1">Mã Phòng Ban</label>
        <input type="text" class="form-control" name="maphongban" value="{{$maphongban}}">
    </div>
    <div class="col-md-6">
        {!! Form::normalInput('tenphongban', 'Tên phòng Ban', $errors, ['class' => 'form-control']) !!}
    </div>
</div>
