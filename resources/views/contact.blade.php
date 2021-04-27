@extends('layouts.app')
@section('content')
<h1>Kirim Email</h1>
@if (session('respon'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        {{ session('respon') }}
    </div>
    @endif
    
<form method="POST" action="{{ route('contact.send') }}">
  @csrf
    <div class="mb-3">
      <label for="email" class="form-label">Email address</label>
      <input type="email" class="form-control w-50" id="email" name="email" aria-describedby="emailHelp">
      @error('email')
          <span>{{ $message }}</span>
      @enderror
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
@endsection