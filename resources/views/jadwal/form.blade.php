@extends('layouts.admin')
@if (!empty($data))
  @section('title', 'Edit Jadwal')
@else
  @section('title', 'Tambah Jadwal')
@endif

@section('jadwal','active')

@section('content')
@if (session('success'))
<div class="alert alert-success">
    {{session('success')}}
</div>
@endif
<div class="section-body p-3">
    <div class="row">
        <h1>Tambah Matpel</h1>
    </div>

    <div class="form-group row">
        <div class="col-lg-3 col-sm d-flex">
            <label for="example-number-input" class="w-100 mt-2">
                <h5>Select Row</h5>
            </label>
            <input class="form-control input-row" type="number" value="1" id="example-number-input" min="1" max="10">
        </div>
    </div>

    <div class="notif">

    </div>
    <div class="row">

        <form method="POST" class="w-100 mb-3" style="overflow-x: auto;" action="{{ route('jadwal.store') }}">
            @csrf
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Nama Guru</th>
                        <th scope="col">Mata Pelajaran</th>
                        <th scope="col">Hari</th>
                        <th scope="col">Jam Mulai</th>
                        <th scope="col">Jam selesai</th>
                        <th scope="col">Ruangan</th>
                        <th scope="col">Kelas</th>
                    </tr>
                </thead>

                <tbody id="table-body">
                    <tr>
                        <th scope="row" class="pr-3 pl-2">
                            <div class="form-group mt-2">
                                <select class="form-control" name="id_user">
                                    <option value="">-- Nama Guru --</option>
                                    @foreach ($dataguru as $guru)
                                    <option value="{{$guru->id}}">{{$guru->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </th>
                        <td class="pr-3 pl-0">
                            <div class="form-group mt-3">
                                <select class="form-control" name="id_matpel">
                                    <option value="">-- Pilih Matpel --</option>
                                    @foreach ($datamatpel as $matpel)
                                    <option value="{{$matpel->id}}">{{$matpel->nama}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </td>
                        <td class="pr-0 pl-0">
                            <div class="form-group mt-3">
                                <select class="form-control" name="id_hari">
                                    <option value="">-- Pilih Hari --</option>
                                    @foreach ($hari as $days)
                                    <option value="{{$days->id}}">{{$days->hari}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </td>
                        <td class="pr-0 pl-0">
                            <div class="form-group mt-3">
                                <div class="col">
                                    <input class="form-control" type="time" value="00:00:00" name="jam_mulai">
                                </div>
                            </div>
                        </td>
                        <td class="pr-0 pl-0">
                            <div class="form-group mt-3">
                                <div class="col">
                                    <input class="form-control" type="time" value="00:00:00" name="jam_selesai">
                                </div>
                            </div>
                        </td>
                        <td class="pr-3 pl-0">
                            <div class="form-group mt-3">
                                <select class="form-control" name="id_ruangan">
                                    <option value="">-- Pilih Ruangan --</option>
                                    @foreach ($dataruangan as $ruangan)
                                    <option value="{{$ruangan->id}}">{{$ruangan->nama}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </td>
                        <td class="pr-2 pl-0">
                            <div class="form-group mt-3">
                                <select class="form-control">
                                    <option value="">-- Pilih Kelas --</option>
                                    @foreach ($datakelas as $kelas)
                                    <option value="{{$kelas->id}}">{{$kelas->tingkatan}} {{$kelas->jurusan}} {{$kelas->urutan}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
            <button class="btn btn-primary p-2 w-100">SUBMIT</button>
        </form>
    </div>
</div>
@endsection

@push('js')
<script>
    $('.input-row').change(function () {
        $('.notif').empty();
        $('#table-body').empty();

        for (let i = 1; i <= $(this).val(); i++) {

            if (i > 10) {
                $('.notif').append(`
          <div class="alert alert-danger" role="alert">
            Gabisa Lebih dari 10 Bosq!
            </div>
            `);
                return;
            }
            form();
        }
    });

    function form() {
        $('#table-body').append(`
            <tr>
              <th scope="col">Nama Guru</th>
              <th scope="col">Mata Pelajaran</th>
              <th scope="col">Hari</th>
              <th scope="col">Jam Mulai</th>
              <th>Jam selesai</th>
              <th>Ruangan</th>
              <th class="h-50 text-center"colspan="2">Kelas</th>
            </tr>
            <tr>
              <th class="h-50 text-center">Tingkat</th>
              <th class="h-50 text-center">Jurusan</th>
            </tr>
          </thead>
         
          <tbody id="table-body">
            <tr>
              <th scope="row" class="pr-3 pl-2">
                <div class="form-group mt-2">
                  <select class="form-control" name="id_user">
                    <option value="">-- Nama Guru --</option>
                    @foreach ($dataguru as $guru)
                    <option value="{{$guru->id}}" >{{$guru->name}}</option>
                    @endforeach
                  </select>
                </div>
              </th>
              <td class="pr-3 pl-0">
                <div class="form-group mt-3">
                  <select class="form-control" name="id_matpel">
                    <option value="">-- Pilih Matpel --</option>
                    @foreach ($datamatpel as $matpel)
                    <option value="{{$matpel->id}}">{{$matpel->nama}}</option>
                    @endforeach
                  </select>
                </div>
              </td>
              <td class="pr-0 pl-0">
                <div class="form-group mt-3">
                  <select class="form-control" name="id_hari">
                    <option value="">-- Pilih Hari --</option>
                    @foreach ($hari as $days)
                    <option value="{{$days->id}}">{{$days->hari}}</option>
                    @endforeach
                  </select>
                </div>
              </td>
              <td class="pr-0 pl-0">
                <div class="form-group mt-3">
                <div class="col">
                  <input class="form-control" type="time" value="00:00:00" name="jam_mulai">
                </div>
              </div>
              </td> 
              <td class="pr-0 pl-0">
                <div class="form-group mt-3">
                  <div class="col">
                    <input class="form-control" type="time" value="00:00:00" name="jam_selesai">
                  </div>
                </div>
              </td>
              <td class="pr-3 pl-0">
                <div class="form-group mt-3">
                  <select class="form-control" name="id_ruangan">
                  <option value="">-- Pilih Ruangan --</option>
                  @foreach ($dataruangan as $ruangan)
                      <option value="{{$ruangan->id}}">{{$ruangan->nama}}</option>
                  @endforeach
                  </select>
                </div>
              </td>
              <td class="pr-2 pl-0">
                <div class="form-group mt-3">
                  <select class="form-control">
                    <option value="">-- Pilih Kelas --</option>
                    @foreach ($datakelas as $kelas)
                      <option value="{{$kelas->id}}">{{$kelas->tingkatan}}</option>
                    @endforeach
                  </select>
                </div>
              </td>
              <td class="pr-3 pl-0">
                <div class="form-group mt-3">
                  <select class="form-control" name="id_kelas">
                    <option value="">-- Pilih Jurusan --</option>
                    @foreach ($datakelas as $kelas)
                        <option value="{{$kelas->id}}">{{$kelas->jurusan}}</option>
                    @endforeach
                  </select>
                </div>
              </td>
            </tr>
      `);
    }

</script>
@endpush
