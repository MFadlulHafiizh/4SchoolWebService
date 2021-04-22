@extends('layouts.admin')
@section('title', 'Data Jadwal')
@section('jadwal','active')

@section('content')
<div class="col">
    <div class="row mb-2">
        <div class="col p-0">
            <h2>Data Jadwal</h2>
        </div>
        <div class="col p-0 text-right">
            <a href="{{ route('jadwal.create') }}" class="btn btn-info"><i class="fa fa-plus-circle mr-2"
                    aria-hidden="true"></i>Add Data</a>
        </div>
    </div>
    <div class="row">
        <table class="table table-responsive">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Pengajar</th>
                    <th>Hari</th>
                    <th>Jam Mulai</th>
                    <th>Jam Selesai</th>
                    <th>Ruangan</th>
                    <th>Mata Pelajaran</th>
                    <th>Kelas</th>
                    <th colspan="2">Aksi</th>
                </tr>
                @foreach ($jadwal as $data)
                <tr>
                    <td>{{ isset($i) ? ++$i : $i = 1 }}</td>
                    <td>{{ $data->name }}</td>
                    <td>{{ $data->hari }}</td>
                    <td>{{ $data->jam_mulai }}</td>
                    <td>{{ $data->jam_selesai }}</td>
                    <td>{{ $data->ruangan }}</td>
                    <td>{{ $data->matpel }}</td>
                    <td>{{ $data->tingkatan }} {{ $data->jurusan }} {{ $data->urutan }}</td>
                    <td><a href="{{ route('jadwal.edit', $data->id)}}" class="btn btn-info">Edit</a></td>
                    <td>
                        <form action="{{ route('jadwal.destroy', $data->id)}}" method="post">
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
@endsection