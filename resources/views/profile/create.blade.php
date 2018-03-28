@section('js')
<script type="text/javascript">

      function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#showgambar').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#inputgambar").change(function () {
        readURL(this);
    });

</script>

@stop
@extends('layouts.app')

@section('content')
<h4>Profile Baru</h4>
<form action="{{ route('profile.store') }}" method="post" enctype="multipart/form-data">
    {{csrf_field()}}
    {{ method_field('post') }}

    <div class="form-group {{ $errors->has('nama') ? 'has-error' : '' }}">
        <label for="nama" class="control-label">Nama</label>
        <input type="text" class="form-control" name="nama" placeholder="Nama">
        @if ($errors->has('nama'))
            <span class="help-block">{{ $errors->first('nama') }}</span>
        @endif
    </div>
    <div class="form-group {{ $errors->has('alamat') ? 'has-error' : '' }}">
        <label for="alamat" class="control-label">Alamat</label>
        <textarea name="alamat" cols="30" rows="5" class="form-control"></textarea>
        @if ($errors->has('alamat'))
            <span class="help-block">{{ $errors->first('alamat') }}</span>
        @endif
    </div>
    <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
        <label for="email" class="control-label">Email</label>
        <textarea name="email" cols="30" rows="5" class="form-control"></textarea>
        @if ($errors->has('email'))
            <span class="help-block">{{ $errors->first('email') }}</span>
        @endif
    </div>
    <div class="form-group {{ !$errors->has('foto') ?: 'has-error' }}">
        <label>Foto</label>
        <input type="file" name="foto">
        <span class="help-block text-danger">{{ $errors->first('foto') }}</span>
    </div>
   <!-- <div class="row">
        <div class="col s6">
            <img src="http://placehold.it/100x100" id="showgambar" style="max-width:200px;max-height:200px;float:left;" />
        </div>
    </div>
 -->
    <!-- <div class="form-group">
        {!! Form::label('image', 'Image', ['class'=>'col-sm-2 control-label']) !!}
        <div class="col-sm-8">
            <div class="input-group">     
              {!! Form::text('image', null, ['class'=>'form-control']) !!}
              <span class="input-group-btn">
                <a data-fancybox data-type="iframe" href="{{ asset('js/filemanager/dialog.php?type=1&field_id=image&relative_url=1') }}" class="btn btn-success" type="button">Pilih Gambar</a>
              </span>
            </div>
        </div>
    </div> -->
    <div class="form-group">
        <button type="submit" class="btn btn-info">Simpan</button>
        <a href="{{ route('profile.index') }}" class="btn btn-default">Kembali</a>
    </div>
</form>
@endsection