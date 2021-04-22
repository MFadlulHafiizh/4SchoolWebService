@extends('layouts.admin')
@section('title', 'Data User')
@section('users','active')

@section('content')
<div class="col">
    {{-- Title + Add Data --}}
    <div class="row mb-2">
        <div class="col p-0">
            <h2>Data User</h2>
        </div>
        <div class="col p-0 text-right">
            <a href="{{ route('users.create') }}" class="btn btn-info"><i class="fa fa-plus-circle mr-2" aria-hidden="true"></i>Add Data</a>
        </div>
    </div>
    <div class="row">
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Foto</th>
                        <th scope="col">Nama Lengkap</th>
                        <th scope="col">NIP</th>
                        <th scope="col">NIS</th>
                        <th scope="col">Role</th>
                        <th scope="col">Email</th>
                        <th scope="col" colspan="2" class="text-center">Aksi</th>
                    </tr>
                    @foreach ($users as $data)
                    <tr>
                        <td>{{ isset($i) ? ++$i : $i = 1 }}</td>
                        <td><img src="{{ $data->photo }}" alt="profile.jpg" class="img-fluid"></td>
                        <td>{{ $data->name }}</td>
                        <td>{{ $data->nip }}</td>
                        <td>{{ $data->nis }}</td>
                        <td>{{ $data->role }}</td>
                        <td>{{ $data->email }}</td>
                        <td><a href="{{ route('users.edit', $data->id) }}" class="btn btn-info">Edit</a></td>
                        <td>
                            <form action="{{ route('users.destroy', $data->id)}}" method="post">
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
