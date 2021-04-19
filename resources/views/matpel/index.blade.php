
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Home  4School | CloverTech</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <!-- CSS Libraries -->

  <!-- Template CSS -->
  <link rel="stylesheet" href="{{asset('assets/css/admin.css')}}">
  <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
  <link rel="stylesheet" href="{{asset('assets/css/components.css')}}">
</head>

<body onload="zoom()">
  <div id="app">
    <div class="main-wrapper">
        <div class="navbar-bg"></div>
        <nav class="navbar navbar-expand-lg main-navbar">
            <form class="form-inline mr-auto">
                <ul class="navbar-nav mr-3">
                    <li><a href="#" id="sidebar" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
                    <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
                </ul>
            </form>
            <li class="dropdown"><a href="#" data-toggle="dropdown"
                    class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                    <img alt="image" src="{{asset('assets/img/avatar/user.png')}}" class="rounded-circle mr-1">
                    <div class="d-sm-none d-lg-inline-block">Hi, Chandra</div>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a href="features-settings.html" class="dropdown-item has-icon">
                        <i class="fas fa-cog"></i> Settings
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item has-icon text-danger">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </a>
                </div>
            </li>
            </ul>
        </nav>
        <div class="main-sidebar">
          <aside id="sidebar-wrapper">
            <div class="sidebar-brand">
                <a href="/home">4School</a>
            </div>
            <div class="sidebar-brand sidebar-brand-sm">
                <a href="/home"><img src="{{asset('assets/img/4-smk.png')}}" alt="logo" width="40" class="mt-3"></a>
            </div>
            {{-- // nav kiri // --}}
            <ul class="sidebar-menu">
              <li class="menu-header">Dashboard</li>
              <li class="active">
                <a class="nav-link" href="/home">
                <i class="fas fa-map-marker-alt"></i><span>MAPS</span></a>
              </li>
              <li class="nav-item dropdown"></li>
              <li class="menu-header">CRUD</li>
              <li class="active"><a class="nav-link" href="/crud"><i class="far fa-file-alt"></i> <span>Tambah Data Matpel</span></a></li>
              <li class="nav-item dropdown">
              <li class="active"><a class="nav-link" href="/register"><i class="fas fa-th-large"></i><span>Tambah Data User</span></a>
              <li class="nav-item dropdown">
              </li>
        </div>
    </div>

      <!-- Main Content -->
      <div class="main-content">
        @if (session('success'))
        <div class="alert alert-success">
          {{session('success')}}
        </div>
        @endif

        @if (session('fail'))
        <div class="alert alert-danger">
          {{session('fail')}}
        </div>
        @endif
        <section class="section">
          <div class="section-header">
            <h1>Tambah Matpel</h1>
          </div>
          <div class="form-group row">
            <div class="col-lg-3 col-sm d-flex">
              <label for="example-number-input" class="w-100 mt-2"><h5>Select Row</h5></label>
              <input class="form-control input-row" type="number" value="1" id="example-number-input" min="1" max="10">
            </div>
          </div>
        </section>

        <div class="notif">

        </div>

        <form method="POST" class="w-100 mb-3" style="overflow-x: auto;" action="{{ route('crud_matpel') }}">
        @csrf
        <table class="table table-bordered">
          <thead>
            <tr>
              <th scope="col" rowspan="2">Nama Guru</th>
              <th scope="col" rowspan="2">Mata Pelajaran</th>
              <th scope="col" rowspan="2">Hari</th>
              <th scope="col" rowspan="2">Jam Mulai</th>
              <th rowspan="2">Jam selesai</th>
              <th rowspan="2">Ruangan</th>
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
          </tbody>
        </table>  
        <button class="btn btn-primary p-2 w-100">SUBMIT</button>
      </form>
      <div class="row">
        <div class="col">
        </div>
      </div>
      </div>
      <footer class="main-footer">
        <div class="footer-left">
            Copyright &copy; 4School | CloverTech 2021 
        </div>
      </footer>
    </div>
  </div>


  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script src="{{asset('assets/js/stisla.js')}}"></script>
  <script src="{{asset('assets/js/scripts.js')}}"></script>
  <script src="{{asset('assets/js/custom.js')}}"></script>

  <script>
    
    $('.input-row').change(function() {
      $('.notif').empty();
      $('#table-body').empty();
      
      for( let i = 1; i <= $(this).val(); i++) {
        
        if( i > 10 ) {
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
              <th scope="col" rowspan="2">Nama Guru</th>
              <th scope="col" rowspan="2">Mata Pelajaran</th>
              <th scope="col" rowspan="2">Hari</th>
              <th scope="col" rowspan="2">Jam Mulai</th>
              <th rowspan="2">Jam selesai</th>
              <th rowspan="2">Ruangan</th>
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

</body>
</html>
