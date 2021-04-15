<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>Mapping School</title>

		{{--Jquery --}}

		{{-- Favicon --}}
		<link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

		{{-- JS --}}
		<script src="{{ asset('js/app.js') }}"></script>
				
		{{-- CSS --}}
		<link rel="stylesheet" href="{{ asset('css/app.css') }}">
		@stack('css')

		 {{-- <link href="{{ asset('datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">  --}}

		{{-- Fontawesome --}}
		<script src="https://kit.fontawesome.com/f3e03d1e1d.js" crossorigin="anonymous"></script>

		{{-- Font Google --}}
		<link rel="preconnect" href="https://fonts.gstatic.com">
		<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">

		<style>
			*{
				font-family: 'Poppins', sans-serif;
			}
			::-webkit-scrollbar {
				width: 12px;
				background: transparent ;
			}
			
			::-webkit-scrollbar-thumb {
				background: rgb(145, 151, 157) ;
				border-radius: 5px;
			}
			body {
				overflow: hidden;
			}
			#wrapper {
				overflow-x: hidden;
			}
			.sidebar {
				min-height: 100vh;
				margin-left: -16rem;
				-webkit-transition: margin .25s ease-out;
				-moz-transition: margin .25s ease-out;
				-o-transition: margin .25s ease-out;
				transition: margin .25s ease-out;
			}
			.sidebar .sidebar-header {
				padding: 0.875rem 1.25rem;
				font-size: 1.2rem;
			}
			.sidebar-header .img-logo {
				width: 35px;
				height: 35px;
			}
			.sidebar .list-group {
				width: 16rem;
			}
			.page-content {
				min-width: 100vw;
			}
			.list-group-item span {
				font-size: 0.9em;
			}
			#wrapper.toggled .sidebar {
				margin-left: 0;
			}
			.content .content-map {	
				padding: 0;
				border-radius: 10px;
			}
			.content .map {
					overflow: auto;
					max-height: 135vh;
			}

			.lantai-act {
				display: none;
			}

			.title {
				margin-left: 0.5rem;
				margin-top: 0.5rem;
			}
			.select-lantai {
				margin-left: 0.5rem;
				margin-top: 0.2rem;
			}

			.btn-rute {
				height: 40px;
				margin-top: 2px;
			}

			.btn-rute {
				width: 60px;
				font-size: 17px;
			}
	
			div.modal-content{
				-webkit-box-shadow: none;
				-moz-box-shadow: none;
				-o-box-shadow: none;
				box-shadow: none;
			}

			@media (min-width: 768px) {
				.sidebar {
					margin-left: 0;
				}

				.page-content {
					min-width: 0;
					width: 100%;
				}

				#wrapper.toggled .sidebar {
					margin-left: -16rem;
				}
			}

			@media (max-width: 768px) {
				.title {
					margin-top: 0.5rem;
					font-size: 0.8em;
				}
				.lead {
					font-size: 22px;
				}
			}
		</style>

	</head>

<body onload="zoom()">

    <div class="d-flex" id="wrapper">

      <!-- Sidebar -->
			{{-- <div class="sidebar bg-dark border-right">
				<div class="sidebar-header d-flex">
					<img src="{{ asset('img/smk.png') }}" class="img-logo mr-3" alt="img-logo">
					<span class="mt-1 text-light">Mapping School</span>
				</div>
				<div class="list-group">
					<a href="/" class="list-group-item list-group-item-action bg-dark text-light {{ (request()->is('/')) ? '' : '' }}">
						<i class="fas fa-map-marker-alt fa-md text-white mt-1 mr-3 ml-3"></i>
						<span>Maps</span>
					</a>
					@if ((request()->is('/')))
						<div class="list-group-item list-group-item-action bg-dark active">
							<span class="ml-2">Filter</span>
							<div class="card p-3 mr-2 ml-2 mt-2 mb-2">
								<form action="" method="GET">
									<div class="form-group">
									<label for="lantai" class="text-dark">Lantai</label>
									<select class="form-control form-control-sm" id="lantai">
										<option disabled selected>--Pilih Lantai--</option>
										@foreach ($data['lantai'] as $item)
											<option value="{{ $item }}">{{ $item }}</option>
										@endforeach
									</select>
									</div>
									<div class="form-group">
										<label for="status" class="text-dark">Blok</label>
										<select class="form-control form-control-sm" id="status">
											<option disabled selected>--Pilih Blok--</option>
											@foreach ($data['blok'] as $item)
												<option value="{{ $item }}">{{ $item }}</option>
											@endforeach
										</select>
									</div>
									<div class="form-group">
										<label for="tipe" class="text-dark">Tipe</label>
										<select class="form-control form-control-sm" id="tipe">
											<option disabled selected>--Pilih Tipe--</option>
											@foreach ($data['tipe'] as $item)
											<option value="{{ $item }}">{{ $item }}</option>
											@endforeach
										</select>
									</div>
									<div class="form-group">
										<label for="status" class="text-dark">Status</label>
										<select class="form-control form-control-sm" id="status">
											<option disabled selected>--Pilih Status--</option>
											@foreach ($data['status'] as $item)
											<option value="{{ $item }}">{{ $item }}</option>
											@endforeach
										</select>
									</div>
									<button type="submit" class="btn btn-primary">Active</button>
									<button type="submit" class="btn btn-secondary">Hapus</button>
								</form>							
							</div>
						</div>
					@endif						

					<a href="{{ route('ruangan.index') }}" class="list-group-item list-group-item-action bg-dark text-light {{ (request()->is('ruangan','ruangan/create')) ? 'active' : '' }}">
						<i class="fas fa-chalkboard-teacher fa-md text-white mt-1 mr-3 ml-2"></i>
						<span>Ruangan</span>
					</a>
					<a href="{{ route('sarpras.index') }}" class="list-group-item list-group-item-action bg-dark text-light {{ (request()->is('sarpras','sarpras/create')) ? 'active' : '' }}">
						<i class="fas fa-tools fa-md text-white mt-1 mr-4 ml-2"></i>
						<span>Sarpras</span>
					</a>
				</div>
			</div> --}}
			<!-- Sidebar End -->

			<!-- Page Content -->
			<div class="page-content">

				<nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom mb-3">
					<div class="d-flex justify-content-start">
						{{-- <button class="btn btn-light" id="btn-toggle">
							<i class="fas fa-bars fa-lg text-dark mt-2"></i>	
						</button> --}}
						<h1 class="lead mt-2">{{ $title }}</h1>
						<div class="select-lantai">
							<select class="form-control" id="lantai" >
								<option>1</option>
								<option>2</option>
							</select>
						</div>
						<button class="btn btn-sm ml-2 btn-primary btn-rute" data-toggle="modal" data-backdrop="false" data-target="#modalNavigasi">Rute</button>
					</div>
				</nav>

				<div class="container-fluid">
					<div class="content">
						<div class="row content-map">
							<div class="col map">
								@yield('content')
							</div>
						</div>
					</div>
				</div>
				
			</div>
			<!-- Page Content End -->

	</div>

	<!-- Modal -->
	<div class="modal fade" id="modalNavigasi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Navigasi</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					
					<div class="select-navigasi">
						<select class="form-control mb-2" id="navigasi-awal" >
							<option>Select Awal</option>
							<option>Gerbang</option>
							<option>Lobby</option>
						</select>
						<select class="form-control" id="navigasi-tujuan" >
							<option>Select Tujuan</option>
							<option>Gedung A</option>
							<option>Gedung B</option>
							<option>Gedung C</option>
							<option>Gedung D</option>
							<option>Gedung E</option>
							<option>Gedung F</option>
							<option>Gedung G</option>
							<option>Gedung H</option>
							<option>Masjid</option>
							<option>Kantin</option>
						</select>
					</div>
					
				</div>
				<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<button type="button" class="btn btn-primary" id="btn-navigasi">Navigate</button>
				</div>
			</div>
		</div>
	</div>
	
	<script src="{{ asset('js/main.js') }}"></script>
	<script src="{{ asset('datatables/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('datatables/dataTables.bootstrap4.min.js') }}"></script>

	@stack('js')			
    
</body>
</html>