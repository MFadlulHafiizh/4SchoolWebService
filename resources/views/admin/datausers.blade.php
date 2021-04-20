@extends('layouts.admin')

@section('content')

<div class="section-body">
    <div class="row">
        <div class="col">
            <h2>Data User</h2>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <table class="table">
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
                    @foreach ($users as $data)
                    <tr>
                        <td>{{ $data->id }}</td>
                        <td>{{ $data->name }}</td>
                        <td>{{ $data->nip }}</td>
                        <td>{{ $data->nis }}</td>
                        <td>{{ $data->photo }}</td>
                        <td>{{ $data->role }}</td>
                        <td>{{ $data->email }}</td>
                        <td><a href="">Edit</a></td>
                        <td>
                            <form action="{{ route('destroy.destroy', $data->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">Delete</button>
                              </form>
                        </td>
                    </tr>
                    @endforeach
            </table>
        </div>
    </div>
</div>
@endsection