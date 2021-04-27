@extends('layouts.app')
@section('content')
        <h1 class="text-center">Album</h1>
        <div class="row">
            @foreach ($album as $data)
            <div class="col-md-4">
                <a href="{{ route('galeri.foto', $data->album_seo) }}" style="color: black; text-decoration:none;">
                <div class="card" style="width: 350px;">
                    <img src="{{ asset('images/'.$data->gambar) }}" class="card-img-top" alt="img">
                    <div class="card-body">
                        <h5 class="card-title">{{$data->nama_album}}</h5>
                        <div class="card-text">({{ $data->photos->count() }} Foto)</div>
                    </div>
                </div>
                </a>
            </div>
              @endforeach
        </div>
@endsection