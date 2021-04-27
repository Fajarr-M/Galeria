@extends('layouts.app')
@section('content')
        <h1 class="text-center">Album {{ $albums->nama_album }}</h1>
        <div class="row">
            @foreach ($galeris as $data)
            <div class="col-md-4 mt-4">
                <div class="card" style="width: 250px;">
                    <a href="{{ asset('images/'.$data->foto) }}" data-lightbox="image-1" data-title="{{ $data->keterangan }} <br> By {{ $data->users->name }}">
                    <img src="{{ asset('thumb/'.$data->foto) }}" class="card-img-top" alt="img">
                    </a>
                    <div class="card-body">
                        <h5 class="card-title">{{$data->nama_galeri}}</h5>
                        <a href="{{ route('like.foto', $data->id) }}" style="color:salmon;">
                            <i class="bi bi-heart" style="font-size: 25px;"></i>
                        </a>
                        <span class="position-absolute end-0 me-3">{{ $data->suka }} Suka</span>
                    </div>     
                </div>
            </div>
              @endforeach
        </div>
        <div>{{ $galeris->links() }}</div>
        <a href="/" class="btn btn-danger mt-3 mt-4 mb-5">Kembali</a>
@endsection