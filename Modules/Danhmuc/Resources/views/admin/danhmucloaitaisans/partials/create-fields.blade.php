
<div class="box-body">
    <div class="col-md-6">
        <label for="exampleInputPassword1">Mã Loại Tài Sản</label>
        <input type="text" class="form-control" name="maloaitaisan" value="{{$maloaitaisan}}">
    </div>
    <div class="col-md-6">
        {!! Form::normalInput('loaitaisan', 'Loại Tài Sản', $errors, ['class' => 'form-control']) !!}
    </div>

</div>
