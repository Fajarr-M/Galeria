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
      <div class="container">
          <table class="table" id="table1">
              <thead>
                  <tr>
                      <th>No</th>
                      <th>Nama</th>
                      <th>Email</th>
                      <th>Level</th>
                      <th>Aksi</th>
                  </tr>
              </thead>
          </table>
      </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js" integrity="sha512-n/4gHW3atM3QqRcbCn6ewmpxcLAHGaDjpEBu4xZd47N0W2oQ+6q7oc3PXstrJYXcbNU1OHdQ1T7pAP+gi5Yu8g==" crossorigin="anonymous"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>
<script>
    $(document).ready( function () {
        isi()
} );
function isi(){
    $('#table1').DataTable({
        serverside : true,
        responsive : true,
        ajax : {
            url : "{{ route('user.index') }}"
        },
        columns:[ 
        {
            "data" : null, "sortable" : false,
            render : function (data, type, row, meta){
                return meta.row + meta.settings._iDisplayStart + 1
            }
        },
        {data: 'name', name: 'name'},
        {data: 'email', name: 'email'},
        {data: 'level', name: 'level'},
        {data: 'aksi', name: 'aksi'}
        ]
  })
}
</script>
@endsection