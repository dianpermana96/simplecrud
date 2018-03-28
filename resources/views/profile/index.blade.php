@extends('layouts.app')

@section('content')
    <a href="{{ route('profile.create') }}" class="btn btn-info btn-sm">Profile Baru</a>
    
    @if ($message = Session::get('message'))
        <div class="alert alert-success martop-sm">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-responsive martop-sm">
        <thead>
            <th>ID</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Email</th>
            <th>Foto</th>
            <th>Action</th>
        </thead>
        <tbody>
            @foreach ($profiles as $profile)
                <tr>
                    <td>{{ $profile->id }}</td>
                    <td>{{ $profile->nama }}</td>
                    <td>{{ $profile->alamat }}</td>
                    <td>{{ $profile->email }}</td>
                    <td><img style="max-width:50px;max-height:50px"; src="{{ url('../storage/app/'.$profile->foto) }}"></td>
                    <td>
                        <form action="{{ route('profile.destroy', $profile->id) }}" method="post">
                            {{csrf_field()}}
                            {{ method_field('DELETE') }}
                            <a href="{{ route('profile.edit', $profile->id) }}" class="btn btn-warning btn-sm">Ubah</a>
                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                        </form>

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $profiles->links()}}
@endsection