@extends('layouts.admin')

@if (!empty($jadwal))
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
<div class="col p-3">
    <div class="row mb-3">
      <div class="col p-0">
        <h1>{{!empty($jadwal) ? 'Edit Jadwal' : 'Tambah Jadwal'}}</h1>
      </div>
      <div class="col-lg-2 col-4 p-0 text-right">
        <div class="input-group input-group-sm flex-nowrap {{!empty($jadwal) ? 'd-none' : ''}}">
          <div class="input-group-prepend">
            <span class="input-group-text" id="addon-wrapping"><label for="example-number-input"></label><h6 class="m-0">Insert Row</h6></span>
          </div>
          <input class="form-control input-row" type="number" value="1" id="example-number-input" min="1" max="10" {{!empty($jadwal) ? 'readonly' : ''}}>
        </div>
      </div>
    </div>

    <div class="notif"></div>

    <div class="row">

        <form method="POST" class="w-100 mb-3" action="{{!empty($jadwal) ? route('jadwal.update', @$jadwal->id) : route('jadwal.store') }}">
            @csrf
            @if (!empty($jadwal))
            @method('PATCH')
            @endif
            <table class="table table-bordered table-responsive">
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
                                    <option value="">Nama Guru</option>
                                    @foreach ($guru as $data)
                                    <option value="{{$data->id}}" {{ old('id_user', @$jadwal->id_user) == $data->id ? 'selected' : ''}}>{{$data->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </th>
                        <td class="pr-3 pl-0">
                            <div class="form-group mt-3">
                                <select class="form-control" name="id_matpel">
                                    <option value="">Pilih Matpel</option>
                                    @foreach ($matpel as $data)
                                    <option value="{{$data->id}}" {{ old('id_matpel', @$jadwal->id_matpel) == $data->id ? 'selected' : ''}}>{{$data->nama}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </td>
                        <td class="pr-0 pl-0">
                            <div class="form-group mt-3">
                                <select class="form-control" name="id_hari">
                                    <option value="">Pilih Hari</option>
                                    @foreach ($hari as $data)
                                    <option value="{{$data->id}}" {{ old('id_hari', @$jadwal->id_hari) == $data->id ? 'selected' : ''}}>{{$data->hari}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </td>
                        <td class="pr-0 pl-0">
                            <div class="form-group mt-3">
                                <div class="col">
                                    <input class="form-control" type="time" value="{{ !empty($jadwal) ? old('email', @$jadwal->jam_mulai) : '00:00:00' }}" name="jam_mulai">
                                </div>
                            </div>
                        </td>
                        <td class="pr-0 pl-0">
                            <div class="form-group mt-3">
                                <div class="col">
                                    <input class="form-control" type="time" value="{{ !empty($jadwal) ? old('email', @$jadwal->jam_selesai) : '00:00:00' }}" name="jam_selesai">
                                </div>
                            </div>
                        </td>
                        <td class="pr-3 pl-0">
                            <div class="form-group mt-3">
                                <select class="form-control" name="id_ruangan">
                                    <option value="">Pilih Ruangan</option>
                                    @foreach ($ruangan as $data)
                                    <option value="{{$data->id}}" {{ old('id_ruangan', @$jadwal->id_ruangan) == $data->id ? 'selected' : ''}}>{{$data->nama}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </td>
                        <td class="pr-2 pl-0">
                            <div class="form-group mt-3">
                                <select class="form-control" name="id_kelas">
                                    <option value="">Pilih Kelas</option>
                                    @foreach ($kelas as $data)
                                    <option value="{{$data->id}}" {{ old('id_kelas', @$jadwal->id_kelas) == $data->id ? 'selected' : ''}}>{{$data->tingkatan}} {{$data->jurusan}}
                                        {{$data->urutan}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
            <button class="btn btn-primary p-2 w-100">{{!empty($jadwal) ? 'Edit Data' : 'Tambah Data'}}</button>
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
          <th scope="row" class="pr-3 pl-2">
              <div class="form-group mt-2">
                  <select class="form-control" name="id_user">
                      <option value="">Nama Guru</option>
                      @foreach ($guru as $data)
                      <option value="{{$data->id}}">{{$data->name}}</option>
                      @endforeach
                  </select>
              </div>
          </th>
          <td class="pr-3 pl-0">
              <div class="form-group mt-3">
                  <select class="form-control" name="id_matpel">
                      <option value="">Pilih Matpel</option>
                      @foreach ($matpel as $data)
                      <option value="{{$data->id}}">{{$data->nama}}</option>
                      @endforeach
                  </select>
              </div>
          </td>
          <td class="pr-0 pl-0">
              <div class="form-group mt-3">
                  <select class="form-control" name="id_hari">
                      <option value="">Pilih Hari</option>
                      @foreach ($hari as $data)
                      <option value="{{$data->id}}">{{$data->hari}}</option>
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
                      <option value="">Pilih Ruangan</option>
                      @foreach ($ruangan as $data)
                      <option value="{{$data->id}}">{{$data->nama}}</option>
                      @endforeach
                  </select>
              </div>
          </td>
          <td class="pr-2 pl-0">
              <div class="form-group mt-3">
                  <select class="form-control" name="id_kelas">
                      <option value="">Pilih Kelas</option>
                      @foreach ($kelas as $data)
                      <option value="{{$data->id}}">{{$data->tingkatan}} {{$data->jurusan}}
                          {{$data->urutan}}</option>
                      @endforeach
                  </select>
              </div>
          </td>
        </tr>
      `);
    }

</script>
@endpush
