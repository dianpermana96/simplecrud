@extends('layouts.app')

@section('content')
<p>{{ $articles->nama}}</p>
<p>{{ $articles->alamat }}</p>
<p>{{ $articles->email }}</p>

<a href="{{ route('profile.index') }}" class="btn btn-default">Kembali</a>
@endsection