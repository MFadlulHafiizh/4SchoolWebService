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
				
		{{-- CSS --}}
		<link rel="stylesheet" href="{{ asset('css/app.css') }}">
		@stack('css')

		<script>
			function zoom() {
				document.body.style.zoom = "70%";
			}

		</script>
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

			<!-- Page Content -->
			<div class="page-content bg-transparent">
				<button type="button" id="btn-toggle" class="btn btn-dark position-absolute rounded-circle" style="top: 40px; left:20px; height:52px; width:52px; z-index: 1000"><i class="fas fa-bars"></i></button>
				<nav class="navbar navbar-expand-lg rounded shadow-sm border-bottom" style="margin: 20px 20px 20px 80px;background-color:white; position:absolute; z-index:1000;">
					<div class="d-flex justify-content-start">
						{{-- <button class="btn btn-light" id="btn-toggle">
							<i class="fas fa-bars fa-lg text-dark mt-2"></i>	
						</button> --}}
						<h2 class="lead mt-2">{{ $title }}</h2>
						<div class="select-lantai">
							<select class="form-control float-end" id="lantai" >
								<option>1</option>
								<option>2</option>
							</select>
						</div>
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

	
	@stack('js')
	{{-- JS --}}
	<script src="{{ asset('js/app.js') }}"></script>

	<script src="{{ asset('js/main.js') }}"></script>
	<script src="{{ asset('datatables/jquery.dataTables.min.js') }}"></script>
  	<script src="{{ asset('datatables/dataTables.bootstrap4.min.js') }}"></script>
</body>
</html>