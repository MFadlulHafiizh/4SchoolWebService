@extends('layouts.admin')

@section('content')
<!-- Main Content -->
<section class="section pl-3 pr-3 w-100">
    <div class="section-body d-block pt-4">
        <form method="POST" action="{{url('register')}}">
            @csrf
            {{-- Toggle, Role, Header --}}
            <div class="row">
                <div class="col-12 d-lg-none d-block text-center">
                    <h1 class="mb-5">Tambah Data User</h1>
                </div>
<<<<<<< HEAD
                <div class="col">
                    <a href="/datausers" class="btn btn-md btn-primary"><i class="fas fa-arrow-left"></i></a>
                </div>
                <div class="col-6 text-right d-lg-block d-none">
                    <h1 class="header mb-5">Tambah Data User</h1>
=======
                <div class="col-lg-1 col-3">
                    <label class="switch mt-1">
                        <input name="switch" class="toogle-switch" type="checkbox" disabled>
                        <span class="slider round"></span>
                    </label>
>>>>>>> cbeb0ca1a4405ea7fc88564348f23f8468fa78d0
                </div>
                <div class="col-lg-4 col p-0">
                    <div class="form-group col-lg-8 float-right">
                        <select class="form-control selectric" id="role-select">
                            <option>Select Role</option>
                            <option class="role" value="guru">Guru</option>
                            <option class="role" value="siswa">Siswa</option>
                        </select>
                    </div>
                </div>
                <div class="col-lg-1 col-3">
                    <label class="switch mt-1">
                        <input name="switch" class="toogle-switch" type="checkbox"
                            {{ $registStatus[0] == "Open" ? 'checked' : '' }} disabled>
                        <span class="slider round"></span>
                    </label>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    {{-- Nama & NIS/NIP --}}
                    <div class="row row-cols-lg-2 row-cols-1">
                        <div class="form-group col">
                            <label for="name">Nama</label>
                            <input id="name" type="text" class="form-control" name="name" autofocus>
                        </div>

                        <div class="form-group col">
                            <label for="nisp" id="nispLabel">NIS</label>
                            <input id="nisp" type="text" class="form-control" name="nis">
                        </div>
                    </div>

                    {{-- Email & Password --}}
                    <div class="row row-cols-lg-2 row-cols-1">
                        <div class="form-group col">
                            <label for="email">Email</label>
                            <input id="email" type="email" class="form-control" name="email">
                            <div class="invalid-feedback">
                            </div>
                        </div>

                        <div class="form-group col">
                            <label for="password">Password</label>
                            <div class="input-group">
                                <input type="password" name="password" id="password" class="form-control">
                                <div class="input-group-append">
                                    <span class="input-group-text" id="togglePassword" style="cursor: pointer;">
                                        <i class="fas fa-eye" id="passwordEye"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row row-cols-lg-2 row-cols-1" id="advance">
                        <div class="form-group col kelas">
                            <label for="tingkatan">Kelas</label>
                            <select class="form-control selectric kelas" id="tingkatan" name="tingkatan">
                                <option value="">Pilih Kelas</option>
                                <option value="X">X</option>
                                <option value="XI">XI</option>
                                <option value="XII">XII</option>
                                <option value="XIII">XIII</option>
                            </select>
                        </div>
                        <div class="form-group col kelas">
                            <label for="jurusan">Jurusan</label>
                            <select class="form-control selectric kelas" id="jurusan" name="jurusan">
                                <option value="">Pilih Jurusan</option>
                                <option value="Audio Video">Audio Video</option>
                                <option value="Teknik Otomasi Industri">Teknik Otomasi Industri</option>
                                <option value="Teknik Instalasi Tenaga Listrik">Teknik Instalasi Tenaga Listrik</option>
                                <option value="Teknik Komputer Jaringan">Teknik Komputer Jaringan</option>
                                <option value="Rekayasa Perangkat Lunak">Rekayasa Perangkat Lunak</option>
                                <option value="Multimedia">Multimedia</option>
                            </select>
                        </div>
                        <div class="form-group col kelas">
                            <label for="urutan">Urutan</label>
                            <select class="form-control selectric kelas" id="urutan" name="urutan">
                                <option value="">Pilih Urutan</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                            </select>
                        </div>
                        <div class="form-group col profesi">
                            <label for="profesi">Profesi</label>
                            <select class="form-control selectric profesi" id="profesi" name="profesi">
                                <option value="">Pilih Profesi</option>
                                <optgroup label="-- Umum">
                                    <option value="Matematika">Matematika</option>
                                    <option value="Fisika">Fisika</option>
                                </optgroup>
                                <optgroup label="-- Rekayasa Perangkat Lunak">
                                    <option value="Basis Data">Basis Data</option>
                                    <option value="Pemrograman Berorientasi Objek">Pemrograman Berorientasi Objek
                                    </option>
                                </optgroup>
                                <optgroup label="-- Multimedia">
                                    <option value="Dasar Desain Grafis">Dasar Desain Grafis</option>
                                    <option value="Animasi">Animasi</option>
                                </optgroup>
                            </select>
                        </div>
                        <div class="form-group col">
                            <label for="foto">Foto Profil (Opsional)</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="foto" accept="image/*" name="foto">
                                <label class="custom-file-label" for="foto">Pilih Foto</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group w-100">
                        <button type="submit" class="btn btn-primary btn-lg btn-block mt-5">
                            Register
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
            $('input').removeAttr('disabled');
            $('button').removeAttr('disabled');
            $('input').removeAttr('placeholder');
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
            $('input').val('');
            $('select').prop('selectedIndex', 0);
            $('input').attr('disabled', '');
            $('button').attr('disabled', '');
            $('input').attr('placeholder', 'Please Select Role');
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

    // Account Active Toggle : Data
    $(function() {
      $('.toogle-switch').change(function() {
        getData();
      });

      $('#role-select').change(function(){
        getData();
      });

      function getData(){
        var status = $('.toogle-switch').prop('checked') == true ? "Open" : "Close";
        var role;
        if( status == "Open" || status == "Close") {
          role = $('#role-select').val();
        }
        
        reqData(status,role);
      }

      function reqData(status, role) {
        $.ajax({
          type: "POST",
          dataType: "json",
          url: 'register/setOpenCloseRegist',
          data: {'statement': status, 'role': role, _token: '{{csrf_token()}}'},
          success: function(data){
            console.log(data.success)
          }
        });
      }
    });

</script>
@endpush