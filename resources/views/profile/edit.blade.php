@extends('layouts.app')

@section('content')
<h4>Ubah Profile</h4>
<form action="{{ route('profile.update', $profile->id) }}" method="post" enctype="multipart/form-data">
    {{csrf_field()}}
    {{ method_field('PUT') }}
    <div class="form-group {{ $errors->has('nama') ? 'has-error' : '' }}">
        <label for="nama" class="control-label">Nama</label>
        <input type="text" class="form-control" name="nama" placeholder="Title" value="{{ $profile->nama }}">
        @if ($errors->has('nama'))
            <span class="help-block">{{ $errors->first('nama') }}</span>
        @endif
    </div>
    <div class="form-group {{ $errors->has('alamat') ? 'has-error' : '' }}">
        <label for="alamat" class="control-label">Alamat</label>
        <textarea name="alamat" cols="30" rows="5" class="form-control">{{ $profile->alamat }}</textarea>
        @if ($errors->has('alamat'))
            <span class="help-block">{{ $errors->first('alamat') }}</span>
        @endif
    </div>
    <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
        <label for="email" class="control-label">Email</label>
        <textarea name="email" cols="30" rows="5" class="form-control">{{ $profile->email }}</textarea>
        @if ($errors->has('email'))
            <span class="help-block">{{ $errors->first('email') }}</span>
        @endif
    </div>

    <div class="form-group {{ !$errors->has('foto') ?: 'has-error' }}">
        <label for="foto" class="control-label">Foto</label><br>
        <img style="max-width:150px ; max-height:150px"; src="{{url('../storage/app/'.$profile->foto)}}" class="img-responsive img-thumbnail" alt="{{$profile->foto}}">
        <input readonly="" type="input" class="form-control" name="foto-dir" value="{{ $profile->foto }}"><br>
        <input type="file" name="foto" value="{{ $profile->foto }}">
        <span class="help-block text-danger">{{ $errors->first('foto') }}</span>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-info">Simpan</button>
        <a href="{{ route('profile.index') }}" class="btn btn-default">Kembali</a>
    </div>
</form>
@endsection