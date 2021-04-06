
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>4School | CloverTech</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <!-- CSS Libraries -->

  <!-- Template CSS -->
  <link rel="stylesheet" href="{{asset('assets/css/admin.css')}}">
  <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
  <link rel="stylesheet" href="{{asset('assets/css/components.css')}}">
</head>

<body>
    <div id="app">
        <div class="main-wrapper">
          <div class="navbar-bg"></div>
          <nav class="navbar navbar-expand-lg main-navbar">
            <form class="form-inline mr-auto">
              <ul class="navbar-nav mr-3">
                <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
                <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
              </ul>
              <div class="search-element">
                <input class="form-control" type="search" placeholder="Search" aria-label="Search" data-width="250">
                <button class="btn" type="submit"><i class="fas fa-search"></i></button>
                <div class="search-backdrop"></div>
                <div class="search-result">
                </div>
              </div>
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
                <img src="{{asset('assets/img/4-smk.png')}}" alt="logo" width="40">
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
        <section class="section">
          <div class="section-header d-block">
            <div class="row">
              <div class="col-1">
                <label class="switch mt-1">
                  <input type="checkbox">
                  <span class="slider round"></span>
                </label>
              </div>
              <div class="col-4">
                <div class="form-group col-8 w-100">
                  <select class="form-control selectric">
                    <option>Open For</option>
                    <option>Guru</option>
                    <option>Siswa</option>
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
            <div class="container">
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
              

              <div class="form-divider">
                Kelas dan Jurusan
              </div>
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
                <button type="submit" class="btn btn-primary btn-lg btn-block mt-5">
                  Register
                </button>
              </div>
            </form>
          </div>
        </div>
        <div class="simple-footer">
          Copyright &copy; 4School | CloverTech 2021
        </div>
      </div>
    </div>
          </div>

          <div class="section-body"></div>
  
          </div>
        </section>
      </div>
    </div>
  </div>


  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script src="{{asset('assets/js/stisla.js')}}"></script>
  <script src="boostrap-show-password.min.js"></script>

 
  <script src="{{asset('assets/js/scripts.js')}}"></script>

  <script src="{{asset('assets/js/custom.js')}}"></script>
  <script>
    const togglePassword = document.querySelector('#togglePassword'); 
const password = document.querySelector('#password');

togglePassword.addEventListener('click', function (e) {
    // toggle the type attribute
    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
    password.setAttribute('type', type);
    // toggle the eye slash icon
    this.classList.toggle('fa-eye-slash');
});
  </script>


</body>
</html>
