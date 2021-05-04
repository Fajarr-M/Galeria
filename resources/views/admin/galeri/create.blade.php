@extends('template.master')

@section('content')
<div class="container">
    <h2 class="my-3">Tambah Galeri Foto</h2>
      @if (count($errors) > 0)
            <ul class="alert alert-danger" role="alert">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
      @endif
      <form action="{{ route('galeri.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
          <label for="nama_galeri" class="form-label">Judul</label>
          <input type="text" class="form-control" id="nama_galeri" name="nama_galeri">
        </div>
        <div class="mb-3">
            <label for="id_album" class="form-label">Album</label>
            <select class="form-select" name="id_album" id="id_album">
                <option selected>Pilih Album</option>
                @foreach ($album as $data)
                    <option value="{{ $data->id }}">
                        {{ $data->nama_album }}
                    </option>
                @endforeach
              </select>
        </div>
        <div class="mb-3">
            <label for="keterangan" class="form-label">Keterangan</label>
            <textarea class="form-control" id="keterangan" name="keterangan" rows="3"></textarea>
        </div>
        <div class="mb-3">
            <label for="foto" class="form-label">Gambar</label>
            <input class="form-control" type="file" id="foto" name="foto">
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="/galeri" class="btn btn-warning">Kembali</a>
      </form>
</div>
@endsection