@extends('layouts.app')
@section('content')
        <h1 class="text-center text-uppercase">ALBUM {{ $album->nama_album }}</h1>
        <a href="/" class="btn btn-danger mt-3 mt-4 mb-5">Kembali</a>
        <div class="row">
            @foreach ($galeri as $data)
            <div class="col-md-4 mt-4">
                <div class="card" id="post-data" style="width: 250px;">
                    <a href="{{ asset('storage/images/'.$data->foto) }}" data-lightbox="image-1" data-title="{{ $data->keterangan }} <br> By {{ $data->users->name }}">
                    <img src="{{ asset('storage/thumb/'.$data->foto) }}" class="card-img-top" alt="img">
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
        <div>{{ $galeri->links() }}</div>
        <div class="ajax-load text-center" style="display: none"><div style="width:100%;height:0;padding-bottom:100%;position:relative;"><iframe src="https://giphy.com/embed/3oEjI6SIIHBdRxXI40" width="100%" height="100%" style="position:absolute" frameBorder="0" class="giphy-embed" allowFullScreen></iframe></div><p><a href="https://giphy.com/gifs/mashable-3oEjI6SIIHBdRxXI40">via GIPHY</a></p>Loading...</div>
@endsection