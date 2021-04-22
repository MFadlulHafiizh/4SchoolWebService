@extends('layouts.admin')

@section('content')

<div class="section-body">
    <div class="row mb-3">
        <div class="col">
            <h2>Data User</h2>
        </div>
        <div class="col">
            <a href="/register" class="float-right btn btn-md btn-primary"><i class="fas fa-plus"></i></a>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Lengkap</th>
                        <th>NIP</th>
                        <th>NIS</th>
                        <th>Foto</th>
                        <th>Role</th>
                        <th>Email</th>
                        <th colspan="2">Aksi</th>
                    </tr>
                <tbody class="table-striped">
                    @foreach ($users as $data)
                    <tr>
                        <td>{{ $data->id }}</td>
                        <td>{{ $data->name }}</td>
                        <td>{{ $data->nip }}</td>
                        <td>{{ $data->nis }}</td>
                        <td>{{ $data->photo }}</td>
                        <td>{{ $data->role }}</td>
                        <td>{{ $data->email }}</td>
                        <td><a href="" class="btn btn-sm btn-primary">Edit</a></td>
                        <td><a href="" class="btn btn-sm btn-danger">Delete</a></td>
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
    
</script>
@endpush