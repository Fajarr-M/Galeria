@extends('template.master')

@section('content')
<div class="container pt-3">
    <h2>Edit User</h2>
      <form action="{{ route('user.update', $user->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
          <label for="name" class="form-label">Nama User</label>
          <input type="text" class="form-control" id="name" name="name" value="{{$user->name}}">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="text" class="form-control" id="email" name="email" value="{{$user->email}}">
        </div>
        @if (Auth::check() && Auth::user()->level == 'admin')
        <div class="form-check">
            <input class="form-check-input" type="radio" name="level" id="level" value="operator"
            @if ($user->level == 'operator')
                checked
            @endif>
            <label class="form-check-label" for="level">
              Operator
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="level" id="level" value="admin" @if ($user->level == 'admin')
            checked
        @endif>
            <label class="form-check-label" for="level">
              Admin
            </label>
          </div>
          @endif
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password">
            <label for="password" class="form-label">)*Kosongkan Saja Jika Password Tidak Diganti</label>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="/user" class="btn btn-warning">Kembali</a>
      </form>
</div>
@endsection