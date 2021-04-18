@extends('layouts.admin')

@section('content')
<!-- Main Content -->
<section class="section pl-3 pr-3 w-100">
    <div class="section-body d-block pt-4">
        <form method="GET" action="">
            {{-- Toggle, Role, Header --}}
            <div class="row">
                <div class="col-1">
                    <label class="switch mt-1">
                        <input name="switch" class="toogle-switch" type="checkbox"
                            {{ $registStatus[0] == "Open" ? 'checked' : '' }} disabled>
                        <span class="slider round"></span>
                    </label>
                </div>
                <div class="col-4">
                    <div class="form-group col-8 w-100">
                        <select class="form-control selectric" id="role-select">
                            <option>Open For</option>
                            <option class="role" value="guru">Guru</option>
                            <option class="role" value="siswa">Siswa</option>
                        </select>
                    </div>
                </div>
                <div class="col-6">
                    <h1 class="header mb-5">Tambah Data User</h1>
                </div>
				<div class="login-brand col-1 m-0">
					<img src="{{asset('assets/img/4-smk.png')}}" alt="logo" width="70" class="">
				</div>
            </div>

            <div class="row">
                <div class="col">
                    {{-- Nama & NIS/NIP --}}
                    <div class="row">
                        <div class="form-group col-6">
                            <label for="name">Nama</label>
                            <input id="name" type="text" class="form-control" name="name" autofocus>
                        </div>

                        <div class="form-group col-6">
                            <label for="nisp" id="nispLabel">NIS</label>
                            <input id="nisp" type="text" class="form-control" name="nis">
                        </div>
                    </div>

                    {{-- Email & Password --}}
                    <div class="row">
                        <div class="form-group col-6">
                            <label for="email">Email</label>
                            <input id="email" type="email" class="form-control" name="email">
                            <div class="invalid-feedback">
                            </div>
                        </div>

                        <div class="form-group col-6">
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

                    <div class="row">
                        <div class="form-group col-4">
                            <label>Kelas</label>
                            <select class="form-control selectric" id="kelas">
                                <option>Pilih Kelas</option>
                                <option>X</option>
                                <option>XI</option>
                                <option>XII</option>
                                <option>XIII</option>
                            </select>
                        </div>
                        <div class="form-group col-4">
                            <label>Jurusan</label>
                            <select class="form-control selectric" id="jurusan">
                                <option>Pilih Jurusan</option>
                                <option>RPL</option>
                                <option>TKJ</option>
                                <option>MM</option>
                                <option>AV</option>
                                <option>TOI</option>
                                <option>TITL</option>
                            </select>
                        </div>
                        <div class="form-group col-4">
                            <label>Urutan</label>
                            <select class="form-control selectric" id="urutan">
                                <option>Pilih Urutan</option>
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                            </select>
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
    // Role : Account Active Toggle
    $('#role-select').on('change', function () {
        if ($('#role-select').val() == 'Guru' || 'Siswa') {
            $('.toogle-switch').removeAttr('disabled');
        };
        if ($('#role-select').val() == 'Open For') {
            if ($('.toogle-switch').prop("checked")) {
                $('.toogle-switch').click();
            }
            $('.toogle-switch').attr('disabled', '');
        };
    });

    // Role : Form Change
    $('#role-select').on('change', function () {
        if ($('#role-select').val() == "siswa") {
            // NIS
            $('#nisp').attr('name', 'nis');
            $('#nispLabel').text('NIS');
        };

        if ($('#role-select').val() == "guru") {
            // NIP
            $('#nisp').attr('name', 'nip');
            $('#nispLabel').text('NIP');
            // Kelas

        };
    });

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
    $(function () {
        $('.toogle-switch').change(function () {
            var status = $(this).prop('checked') == true ? "Open" : "Close";
            var role;
            if (status == "Open" || status == "Close") {
                role = $('#role-select').val();
                console.log(role);
            }

            $.ajax({
                type: "POST",
                dataType: "json",
                url: 'register/setOpenCloseRegist',
                data: {
                    'statement': status,
                    'role': role,
                    _token: '{{csrf_token()}}'
                },
                success: function (data) {
                    console.log(data.success)
                }
            });
        });
    });

</script>
@endpush
