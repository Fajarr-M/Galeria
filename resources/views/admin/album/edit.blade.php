@extends('template.master')

@section('content')
<div class="container pt-3">
    <h2>Edit Album</h2>
      <form action="{{ route('album.update',$album->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
          <label for="nama_album" class="form-label">Nama Album</label>
          <input type="text" class="form-control" id="nama_album" name="nama_album" value="{{ $album->nama_album }}">
        </div>
        <div class="mb-3">
            <label for="gambar">Gambar</label>
            <br><img src="{{ asset('storage/images/'.$album->gambar) }}" alt="Gambar" style="width: 100px">
        </div>
        <div class="mb-3">
            <label for="edit_gambar" class="form-label">Ganti Gambar</label>
            <input class="form-control" type="file" id="edit_gambar" name="gambar">
            <label for="edit_gambar">*) Jika Gambar Tidak Diganti, Kosongkan Saja</label>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="/album" class="btn btn-warning">Kembali</a>
      </form>
</div>
@endsection