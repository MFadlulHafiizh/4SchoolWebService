@extends('layouts.admin')

@if (!empty($users))
@section('title', 'Edit User')
@else
@section('title', 'Tambah User')
@endif

@section('users','active')

@section('content')
<!-- Main Content -->
<section class="section pl-3 pr-3 w-100">
    <div class="section-body d-block pt-4">
        <form method="POST" action="{{!empty($users) ? route('users.update', @$users->id) : route('users.create') }}">
            @csrf

            @if (!empty($users))
            @method('PATCH')
            @endif
            {{-- Toggle, Role, Header --}}
            <div class="row">
                <div class="col-12 d-lg-none d-block text-center">
                    <h1 class="mb-5">{{!empty($users) ? 'Edit Data User' : 'Tambah Data User'}}</h1>
                </div>
                <div class="col-lg-1 col-3">
                    <label class="switch mt-1">
                        <input name="switch" class="toogle-switch" type="checkbox" disabled>
                        <span class="slider round"></span>
                    </label>
                </div>
                <div class="col-lg-4 col p-0">
                    <div class="form-group col-lg-8">
                        <select class="form-control selectric" id="role-select" name="role"
                            {{!empty($users) ? 'hidden' : ''}}>
                            <option>Select Role</option>
                            <option class="role" value="guru"
                                {{ old('role', @$users->role) == "guru" ? 'selected' : ''}}>Guru</option>
                            <option class="role" value="siswa"
                                {{ old('role', @$users->role) == "siswa" ? 'selected' : ''}}>Siswa</option>
                        </select>
                    </div>
                </div>
                <div class="col-6 d-lg-block d-none">
                    <h1 class="header mb-5">{{!empty($users) ? 'Edit Data User' : 'Tambah Data User'}}</h1>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    {{-- Nama & NIS/NIP --}}
                    <div class="row row-cols-lg-2 row-cols-1">
                        <div class="form-group col">
                            <label for="name">Nama</label>
                            <input id="name" type="text" class="form-control userInput" name="name"
                                value="{{ old('name', @$users->name) }}">
                        </div>

                        <div class="form-group col">
                            <label for="nisp" id="nispLabel">NIS</label>
                            <input id="nisp" type="text" class="form-control userInput" name="nis"
                                value="{{ old('nis', @$users->nis) }}{{ old('nip', @$users->nip) }}">
                        </div>
                    </div>

                    {{-- Email & Password --}}
                    <div class="row row-cols-lg-2 row-cols-1">
                        <div class="form-group col">
                            <label for="email">Email</label>
                            <input id="email" type="email" class="form-control userInput" name="email"
                                value="{{ old('email', @$users->email) }}">
                            <div class="invalid-feedback">
                            </div>
                        </div>

                        <div class="form-group col">
                            <label for="password">Password</label>
                            <div class="input-group">
                                <input type="password" name="password" id="password" class="form-control userInput"
                                    value="{{ old('password', @$users->password) }}">
                                <div class="input-group-append" {{!empty($users) ? 'hidden' : ''}}>
                                    <span class="input-group-text" id="togglePassword" style="cursor: pointer;">
                                        <i class="fas fa-eye" id="passwordEye"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row row-cols-lg-2 row-cols-1" id="advance">
                        <div class="form-group col kelas">
                            <label for="kelas">Kelas</label>
                            <select class="form-control selectric kelas" id="kelas" name="id_kelas">
                                <option value="">Pilih Kelas</option>
                                @foreach ($kelas as $data)
                                <option value="{{$data->id}}"
                                    {{ old('id_kelas', @$users->id_kelas) == $data->id ? 'selected' : ''}}>
                                    {{$data->tingkatan}} {{$data->jurusan}} {{$data->urutan}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col profesi">
                            <label for="profesi">Profesi</label>
                            <select class="form-control selectric profesi" id="profesi" name="profesi">
                                <option value="">Pilih Profesi</option>
                                @foreach ($matpel as $data)
                                <option value="{{$data->id}}"
                                    {{ old('profesi', @$users->profesi) == $data->id ? 'selected' : ''}}>{{$data->nama}}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col">
                            <label for="photo">Foto Profil (Opsional)</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input userInput" id="photo" accept="image/*"
                                    name="photo">
                                <label class="custom-file-label" for="photo">Pilih Foto</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group w-100">
                        <button type="submit" class="btn btn-primary btn-lg btn-block mt-5">
                            {{!empty($users) ? 'Edit Data' : 'Tambah Data'}}
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
@endsection

@push('js')
<script type="text/javascript">
    $(document).ready(function () {
        bsCustomFileInput.init();
    });

    // Role Select
    $('#role-select').on('change', function () {
        // Select : Siswa / Guru
        if ($('#role-select').val() == 'Guru' || 'Siswa') {
            // Toggle Activity
            $('.toogle-switch').removeAttr('disabled');
            if ($('.toogle-switch').prop("checked")) {
                // Do Nothing
            } else {
                $('.toogle-switch').click();
            }

            // Enable Form
            $('.userInput').removeAttr('disabled');
            $('button').removeAttr('disabled');
            $('.userInput').removeAttr('placeholder');
            $('#advance').removeClass('d-none');

            // Select : Siswa
            if ($('#role-select').val() == "siswa") {
                // NIS
                $('#nisp').attr('name', 'nis');
                $('#nispLabel').text('NIS');
                // Advance
                $('.profesi').prop('selectedIndex', 0);
                $('.profesi').addClass('d-none');
                $('.kelas').removeClass('d-none');
            }

            // Select : Guru
            if ($('#role-select').val() == "guru") {
                // NIP
                $('#nisp').attr('name', 'nip');
                $('#nispLabel').text('NIP');
                // Advance
                $('.kelas').prop('selectedIndex', 0);
                $('.kelas').addClass('d-none');
                $('.profesi').removeClass('d-none');
            }
        }

        // Select : Unselected
        if ($('#role-select').val() == 'Select Role') {
            // Toggle Activity
            if ($('.toogle-switch').prop("checked")) {
                $('.toogle-switch').click();
            }
            $('.toogle-switch').attr('disabled', '');

            // Disable All Form
            $('.userInput').val('');
            $('select').prop('selectedIndex', 0);
            $('.userInput').attr('disabled', '');
            $('button').attr('disabled', '');
            $('.userInput').attr('placeholder', 'Please Select Role');
            $('#advance').addClass('d-none');
        }
    }).change();

    // Password Visibility
    $('#togglePassword').click(function () {
        if ($('#password').attr('type') == 'password') {
            $('#passwordEye').removeClass('fas');
            $('#passwordEye').addClass('far');
            $('#password').attr('type', 'text');
        } else {
            $('#passwordEye').removeClass('far');
            $('#passwordEye').addClass('fas');
            $('#password').attr('type', 'password');
        }
    });

</script>
@endpush
