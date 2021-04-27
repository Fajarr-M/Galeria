@extends('template.master')

@section('content')
<div class="container pt-3">
    <h2>Tambah Album</h2>
      @if (count($errors) > 0)
            <ul class="alert alert-danger" role="alert">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
      @endif
      <form action="{{ route('album.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
          <label for="nama_album" class="form-label">Nama Album</label>
          <input type="text" class="form-control" id="nama_album" name="nama_album">
        </div>
        <div class="mb-3">
            <label for="gambar" class="form-label">Gambar</label>
            <input class="form-control" type="file" id="gambar" name="gambar">
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="/album" class="btn btn-warning">Kembali</a>
      </form>
</div>
@endsection