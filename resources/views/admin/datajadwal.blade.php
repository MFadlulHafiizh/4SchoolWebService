@extends('layouts.admin')

@section('content')

<div class="section-body">
    <div class="row">
        <div class="col">
            <h2>Data Jadwal</h2>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <table class="table">
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
                        <th>Jurusan</th>
                        <th colspan="2">Aksi</th>
                    </tr>
                    @foreach ($jadwal as $data)
                    <tr>
                        <td>{{ $data->id }}</td>
                        <td>{{ $data->name }}</td>
                        <td>{{ $data->hari }}</td>
                        <td>{{ $data->jam_mulai }}</td>
                        <td>{{ $data->jam_selesai }}</td>
                        <td>{{ $data->nama }}</td>
                        <td>{{ $data->nama }}</td>
                        <td>{{ $data->tingkatan }}</td>
                        <td>{{ $data->jurusan }}</td>
                        <td><a href="">Edit</a></td>
                        <td><a href="" class="btnDelete">Delete</a></td>
                    </tr>
                    @endforeach
            </table>
        </div>
    </div>
</div>
@endsection