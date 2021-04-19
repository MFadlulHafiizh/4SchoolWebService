@extends('layouts.admin')

@section('content')
<!-- Main Content -->
  <section class="section pl-3 pr-3 w-100">
    <div class="section-body d-block pt-4">
      <div class="row">
        <div class="col-1">
          <label class="switch mt-1">
            <input name="switch" class="toogle-switch" type="checkbox" {{ $registStatus[0] == "Open" ? 'checked' : '' }}> 
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
      </div>
      {{-- <div class="login-brand">
        <img src="{{asset('assets/img/4-smk.png')}}" alt="logo" width="70" class="shadow-light rounded-circle">
      </div> --}}
        <div class="row">
          <div class="form-group col-6">
            <label for="first_name">Nama Depan</label>
            <input id="first_name" type="text" class="form-control" name="first_name" autofocus>
          </div>
          <div class="form-group col-6">
            <label for="last_name">Nama Belakang</label>
            <input id="last_name" type="text" class="form-control" name="last_name">
          </div>
        </div>

        <div class="form-group">
          <label for="email">Email</label>
          <input id="email" type="email" class="form-control" name="email">
          <div class="invalid-feedback">
          </div>
        </div>

        <div class="form-group">
          <label for="password">Password</label>
          <div class="input-group">
            <input type="password" name="password" id="password" class="form-control" >
            <span class="input-group-text"><i class="far fa-eye m-0" id="togglePassword"></i></span>
          </div>
      </div>
        {{-- <div class="row">
          <div class="form-group col-6">
            <label for="password" class="d-block">Password</label>
            <div class="input-grup">
              <input type="password" class="form-control" data-toggle="password">
              <div class="form-group-append">
                <div class="input-grup-text"><i class="fa fa-eye"></i></div>
            </div>
            </div> --}}
            
          {{-- <div class="form-group col-6">
            <label for="password2" class="d-block">Password Confirmation</label>
            <input id="password2" type="password" class="form-control" name="password-confirm">
          </div> --}}
        

        <div class="row">
          <div class="form-group col-6">
            <label>Kelas</label>
            <select class="form-control selectric">
              <option>Pilih Kelas</option>
              <option>X</option>
              <option>XI</option>
              <option>XII</option>
              <option>XIII</option>
            </select>
          </div>
          <div class="form-group col-6">
            <label>Jurusan</label>
            <select class="form-control selectric">
              <option>Pilih Jurusan</option>
              <option>RPL</option>
              <option>TKJ</option>
              <option>MM</option>
              <option>AV</option>
              <option>TOI</option>
              <option>TITL</option>
            </select>
          </div>
        </div>
    
        <div class="form-group w-100" >
          <form method="post" action="">
            <button type="submit" class="btn btn-primary btn-lg btn-block mt-5">
              Register
            </button>
          </form>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection

@push('js')
<script type="text/javascript">

// if( $('#role-select').val() == 'Open For') {
//   $('.toogle-switch').attr('disabled', '');
// }

// $('#role-select').on('change', function(){
//   if ( $('#role-select').val() == 'Guru' || 'Siswa' ) {
//     $('.toogle-switch').removeAttr('disabled');
//   }
// });

// $('#role-select').on('change', function(){
//   var role = $('#role-select').val();
//   console.log(role);
// });

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