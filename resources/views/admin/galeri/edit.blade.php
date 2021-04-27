@extends('template.master')

@section('content')
<div class="container pt-3">
    <h2>Edit Galeri</h2>
      <form action="{{ route('galeri.update',$galeri->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
          <label for="nama_galeri" class="form-label">Judul</label>
          <input type="text" class="form-control" id="nama_galeri" name="nama_galeri" value="{{ $galeri->nama_galeri }}">
        </div>
        <div class="mb-3">
            <label for="id_album" class="form-label">Album</label>
            <select class="form-select" name="id_album" id="id_album">
                <option selected>Album</option>
                @foreach ($album as $data)
                    <option value="{{ $data->id }}"
                        @if ($data->id == $galeri->id_album)
                            selected
                        @endif
                        >{{ $data->nama_album }}
                    </option>
                @endforeach
              </select>
        </div>
        <div class="mb-3">
            <label for="keterangan" class="form-label">Keterangan</label>
            <input type="text" class="form-control" id="keterangan" name="keterangan" value="{{ $galeri->keterangan }}">
          </div><div class="mb-3">
            <label for="gambar">Gambar</label>
            <br><img src="{{ asset('thumb/'.$galeri->foto) }}" alt="Gambar" style="width: 100px">
        </div>
        <div class="mb-3">
            <label for="edit_gambar" class="form-label">Ganti Foto</label>
            <input class="form-control" type="file" id="edit_gambar" name="foto">
            <label for="edit_gambar">*) Jika Foto Tidak DiGanti, Kosongkan Saja</label>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="/galeri" class="btn btn-warning">Kembali</a>
      </form>
</div>
@endsection