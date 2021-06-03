@extends('template.master')

@section('content')
<div class="container pt-3">
    <h1>Album Foto</h1>
    @if (session('status'))
    <div class="alert alert-info alert-dismissible fade show" role="alert">
        {{ session('status') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif
    <div class="d-flex justify-content-end mb-2">
    <a href="{{ route('album.create') }}"><button type="button" class="btn btn-primary ">Tambah Album</button></a>
    </div>
    <table class="table">
        <thead class="table-dark">
        <tr>
            <th scope="col">No</th>
            <th scope="col">Nama Album</th>
            <th scope="col">Album Seo</th>
            <th scope="col">Gambar</th>
            <th scope="col">Aksi</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($album as $data)
            <tr>
                <th scope="row">{{ ++$no }}</th>
                <td>{{ $data->nama_album }}</td>
                <td>{{ $data->album_seo }}</td>
                <td><img src="{{ asset('storage/images/'.$data->gambar) }}" style="width: 150px"></td>
                <td>
                    <form action="{{ route('album.destroy',$data->id) }}" method="post">@csrf
                    <a href="{{ route('album.edit', $data->id) }}" class="btn btn-success">Edit</a>
                    <button class="btn btn-danger" onclick="return confirm('Yakin Mau Dihapus?')">Hapus</button>
                </form>
                </td>
            </tr> 
            @endforeach
        </tbody>
      </table>
      <div class="position-absolute end-0 me-5">{{ $album->links() }}</div>
</div>
@endsection