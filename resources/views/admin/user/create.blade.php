@extends('template.master')

@section('content')
<div class="container">
    <h2 class="my-3">Tambah User</h2>
      @if (count($errors) > 0)
            <ul class="alert alert-danger" role="alert">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
      @endif
      <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
          <label for="name" class="form-label">Nama User</label>
          <input type="text" class="form-control" id="name" name="name">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="text" class="form-control" id="email" name="email">
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="level" id="level" value="operator">
            <label class="form-check-label" for="level">
              Operator
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="level" id="level" value="admin">
            <label class="form-check-label" for="level">
              Admin
            </label>
          </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>
        <div class="mb-3">
            <label for="password_confirmation" class="form-label">Password Confirmation</label>
            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="/album" class="btn btn-warning">Kembali</a>
      </form>
</div>
@endsection