
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
                <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
                <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
              </ul>
            </form>
            <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                <img alt="image" src="{{asset('assets/img/avatar/user.png')}}" class="rounded-circle mr-1">
                <div class="d-sm-none d-lg-inline-block">Hi, Chandra</div></a>
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
                <img src="{{asset('assets/img/4-logo.jpg')}}" alt="logo" width="50" class="shadow-light rounded-circle">
              </div>
           {{-- // nav kiri // --}}
           <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="active"><a class="nav-link" href="/home"><i class="fas fa-map-marker-alt"></i> <span>MAPS</span></a>
              <li class="nav-item dropdown">
                  
          <li class="menu-header">CRUD</li>
          <li class="active"><a class="nav-link" href="/crud"><i class="far fa-file-alt"></i> <span>Tambah Data Matpel</span></a>
            <li class="nav-item dropdown">       
          <li class="active"><a class="nav-link" href="/register"><i class="fas fa-th-large"></i> <span>Tambah Data User</span></a>
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
        <section class="section">
          <div class="section-header">
            <h1>Tambah Matpel</h1>
          </div>
          <div class="form-group row">
            <label for="example-number-input" class="col-2 col-form-label"><h5>Input Jadwal mengajar</h5></label>
            <div class="col-2">
              <input class="form-control" type="number" value="1" id="example-number-input" min="1" max="10">
            </div>
          </div>
        </section>
        <form method="POST" action="{{ route('crud_matpel') }}">
          @csrf
        <table class="table">
          <thead>
            <tr>
              <th scope="col">Nama Guru</th>
              <th scope="col">Mata Pelajaran</th>
              <th scope="col">Hari</th>
              <th scope="col">Jam Mulai</th>
              <th>Jam selesai</th>
              <th>Ruangan  </th>
              <th>Kelas</th>
              <th>Tingkat</th>
            </tr>
          </thead>
         
          <tbody>
            <tr>
              <th scope="row"><div class="form-group">
                <label for="exampleFormControlSelect1"></label>
                <select class="form-control" id="exampleFormControlSelect1" name="id_user">
                  @foreach ($dataguru as $guru)
                  <option value="{{$guru->id}}" >{{$guru->name}}</option>
                  @endforeach
                </select>
              </div>
            </th>
              <td><div class="form-group">
                <label for="exampleFormControlSelect1"></label>
                <select class="form-control" id="exampleFormControlSelect1" name="id_matpel">
                  @foreach ($datamatpel as $matpel)
                  <option value="{{$matpel->id}}">{{$matpel->nama}}</option>
                  @endforeach
                </select>
              </div>
            </td>
              <td><div class="form-group">
                <label for="exampleFormControlSelect1"></label>
                <select class="form-control" id="exampleFormControlSelect1" name="id_hari">
                  @foreach ($hari as $days)
                  <option value="{{$days->id}}">{{$days->hari}}</option>
                  @endforeach
                </select>
              </div>
            </td>
              <td>
                <div class="form-group row">
                <label for="example-time-input" class="col-2 col-form-label">Time</label>
                <div class="col-10">
                  <input class="form-control" type="time" value="13:45:00" id="example-time-input" name="jam_mulai">
                </div>
              </div>
            </td> 
              <td>
                <div class="form-group row">
                  <label for="example-time-input" class="col-2 col-form-label">Time</label>
                  <div class="col-10">
                    <input class="form-control" type="time" value="13:45:00" id="example-time-input" name="jam_selesai">
                  </div>
                </div>
              </td>
              <td><div class="form-group">
                <label for="exampleFormControlSelect1"></label>
                <select class="form-control" id="exampleFormControlSelect1" name="id_ruangan">
                 @foreach ($dataruangan as $ruangan)
                     <option value="{{$ruangan->id}}">{{$ruangan->nama}}</option>
                 @endforeach
                </select>
              </div>
            </td>
              <td>
                <div class="form-group">
                <label for="exampleFormControlSelect1">Example select</label>
                <select class="form-control" id="exampleFormControlSelect1" name="id_kelas">
                  @foreach ($datakelas as $kelas)
                      <option value="{{$kelas->id}}">{{$kelas->jurusan}}</option>
                  @endforeach
                </select>
              </div>
            </td>
              <td><div class="form-group">
                <label for="exampleFormControlSelect1">Example select</label>
                <select class="form-control" id="exampleFormControlSelect1">
                  <option>1</option>
                  <option>2</option>
                  <option>3</option>
                  <option>4</option>
                  <option>5</option>
                </select>
              </div>
            </td>
            </tr>
          </tbody>
          <button class="btn btn-primary" type="submit" style="float: right;">SUBMIT</button>
        </table>  
      </form>
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


</body>
</html>
