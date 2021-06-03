@extends('template.master')

@section('content')
<div class="container pt-3 pb-5">
    <h1>Galeri Foto</h1>
    @if (session('status'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        {{ session('status') }}
    </div>
    @endif
    <div class="d-flex justify-content-end mb-2">
    <a href="{{ route('galeri.create') }}"><button type="button" class="btn btn-primary ">Tambah Galeri Foto</button></a>
    </div>
    <table class="table">
        <thead class="table-dark">
        <tr>
            <th scope="col">No</th>
            <th scope="col">Nama Album</th>
            <th scope="col">Album</th>
            <th scope="col">Kontributor</th>
            <th scope="col">Foto</th>
            <th scope="col">Aksi</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($galeri as $data)
            <tr>
                <th scope="row">{{ ++$no }}</th>
                <td>{{ $data->nama_galeri }}</td>
                <td>{{ $data->albums->nama_album }}</td>
                <td>{{ $data->users->name }}</td>
                <td><img src="{{ asset('storage/thumb/'.$data->foto) }}" style="width: 150px"></td>
                <td>
                    <form action="{{ route('galeri.destroy',$data->id) }}" method="post">@csrf
                        <a href="{{ route('galeri.edit', $data->id) }}" class="btn btn-success">Edit</a>
                        <button class="btn btn-danger" onclick="return confirm('Yakin Mau Dihapus?')">Hapus</button>
                    </form> 
                </td>
            </tr> 
            @endforeach
        </tbody>
      </table>
      <div class="position-absolute end-0 me-5">{{ $galeri->links() }}</div>
</div>
@endsection