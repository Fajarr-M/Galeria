@extends('template.master')

@section('content')
<div class="container pt-3">
    <h1>Data User</h1>
    @if (session('status'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        {{ session('status') }}
    </div>
    @endif
    <div class="d-flex justify-content-end mb-2">
    <a href="{{ route('user.create') }}"><button type="button" class="btn btn-primary ">Tambah User</button></a>
    </div>
    <table class="table">
        <thead class="table-dark">
        <tr>
            <th scope="col">No</th>
            <th scope="col">Nama User</th>
            <th scope="col">Email</th>
            <th scope="col">Level</th>
            <th scope="col">Aksi</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($user as $data)
            <tr>
                <th scope="row">{{ ++$no }}</th>
                <td>{{ $data->name }}</td>
                <td>{{ $data->email }}</td>
                <td>{{ $data->level }}</td>
                <td>
                        <a href="{{ route('user.edit', $data->id) }}" class="btn btn-success">Edit</a>
                      <!-- Button trigger modal -->
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Hapus
                        </button>
                        
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Yakin Mau Di Hapus?</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                <form action="{{ route('user.destroy', $data->id) }}" method="POST">@csrf
                                <button class="btn btn-danger">Hapus</button>
                                </form>
                                </div>
                            </div>
                            </div>
                        </div>
                </td>
            </tr> 
            @endforeach
        </tbody>
      </table>
      <div>{{ $user->links() }}</div>
</div>
@endsection