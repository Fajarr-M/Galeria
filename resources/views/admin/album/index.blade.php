@extends('template.master')

@section('content')
<div class="container pt-3">
    <h1>Album Foto</h1>
    @if (session('status'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        {{ session('status') }}
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
                <td><img src="{{ asset('images/'.$data->gambar) }}" style="width: 150px"></td>
                <td>
                    <a href="{{ route('album.edit', $data->id) }}" class="btn btn-success">Edit</a>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Hapus
                    </button>
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Yakin Mau Di Hapus?</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <form action="{{ route('album.destroy', $data->id) }}" method="POST">@csrf
                            <button class="btn btn-danger">Hapus</button>
                            </form>
                            </div>
                        </div>
                        </div>
                    </div>  
                </td>
            </tr> 
            @endforeach
        </tbody>
      </table>
      <div class="position-absolute end-0 me-5">{{ $album->links() }}</div>
</div>
@endsection