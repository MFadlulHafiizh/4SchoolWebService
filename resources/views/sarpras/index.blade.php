@extends('layouts.app', ['title' => ''])

@push('css')
    <style>
        .layout {
            width: 100%;
            height: 550px;
            overflow: auto;
        }
    </style>
@endpush

@section('content')
            
<div class="card mt-4">
    <div class="card-header">
        <div class="d-flex justify-content-between">
            <h4 class="mt-1">Data Sarana Prasarana</h4>
            <a href="{{ route('sarpras.create') }}" class="btn btn-primary"><i class="fas fa-plus mr-1 mt-1"></i> Tambah</a>
        </div>
    </div>
    <div class="card-body p-4 layout">
        <div class="table-responsive">
            <table id="example" class="table table-striped table-bordered" style="width:100%;">
                <thead>
                    <tr>
                        <th width="50">No</th>
                        <th width="200">Nama</th>
                        <th width="80">Jumlah</th>
                        <th width="100">Kondisi</th>
                        <th>Catatan</th>
                        <th width="100">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($ruangan as $s)
                    <tr align="center">
                        <td>{{ $s->id}}</td>
                        <td>{{ $s->nama}}</td>
                        <td>{{ $s->jumlah}}</td>
                        <td>{{ $s->kondisi}}</td>
                        <td>{{ $s->catatan}}</td>
                        <td>
                            <form action="{{ route('sarpras.destroy', $s->id) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <a href="{{ url('/sarpras/'.$s->id.'/edit')}}" class="btn btn-info"><i class="fas fa-edit"></i></a>
                                <button class="btn btn-danger"><i class="fas fa-trash"></i></button>
                            </form> 
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection

@push('js')
    <script>
        $(document).ready( function () {
            $('#example').DataTable();
        } );
    </script>

    <script>
        $.ajax({
            url: ""
        });
    </script>
@endpush