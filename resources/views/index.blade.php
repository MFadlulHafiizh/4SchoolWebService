@extends('layouts.app', ['title' => 'Denah SMKN 4 Bandung'])

@push('css')
<style>
	.ruang-a {
		position: absolute;
		top: 700px;
		left: 145px;
	}
	.map-1 .ruang-b {
		position: absolute;
		top: 11px;
		left: 48px;
	}

	.map-1 .ruang-c {
		position: absolute;
		top: 135px;
		left: 260px;
	}

	.ruang-d {
		position: absolute;
		top: 732px;
		left: 420px;
	}

	.ruang-e {
		position: absolute;
		top: 272px;
		left: 932px;
	}

	.ruang-f {
		position: absolute;
		top: 136px;
		left: 396px;
	}

	.map-1 .ruang-g {
		position: absolute;
		top: 196px;
		left: 1197px;
	}

	.map-1 .ruang-h {
		position: absolute;
		top: 863px;
		left: 453px;
	}

	.map-2 .ruang-b {
		position: absolute;
		top: 280px;
		left: 48px;
	}

	.map-2 .ruang-c {
		position: absolute;
		top: 135px;
		left: 260px;
	}

	.map-2 .ruang-g {
		position: absolute;
		top: 508px;
		left: 1197px;
	}

	.map-2 .ict {
		position: absolute;
		top: 950px;
		left: 270px;
	}
	
	.lapang {
		position: absolute;
		top: 265px;
		left: 400px;
	}

	.lapang .btn {
		background-color: orange;
	}

	.lobby {
		position: absolute;
		top: 960px;
		left: 300px;
	}

	.eskul {
		position: absolute;
		top: 732px;
		left: 1197px;
	}

	.btn-room {
		text-decoration: none;
		text-align: center;
		background-color: #7b7ff6;
		color: #f0f0f0;
		font-weight: 500;
		border-radius: 0;
	}

	.btn-room:hover {
		opacity: 0.8;
		color: white;
	}
	.lantai-act {
		display: none;
	}

	.modal-backdrop {
		background-color: transparent;
	}
</style>
@endpush

@section('content')
<div class="content-maps">
         
    <!-- Map Lantai 1 -->
		<div class="map-1">
		
		<!-- Layout  -->
		<div class="layout-maps mb-5 ml-3">
			<img src="{{ asset('img/lantai-1.png') }}" width="1280px" class="img-maps" alt="img-maps">
		</div>
		<!-- Layout End  -->

		<!-- Ruang A -->
		<div class="kelas ruang-a">
			<button class="btn btn-room d-block mb-1" style="width: 120px; height:100px" data-toggle="modal" data-target="#modalData">
				<i class="fas fa-chalkboard fa-lg"></i><br>R. Guru
			</button>
			<button class="btn btn-room d-block mb-1" style="width: 120px; height:100px" data-toggle="modal" data-target="#modalData">
				<i class="fas fa-money-check-alt fa-lg"></i><br>R. Tata Usaha
			</button>
			<button class="btn btn-room d-block" style="margin-bottom: 55px;width: 120px; height:75px" data-toggle="modal" data-target="#modalData">
				<i class="fas fa-server fa-lg"></i><br>Server
			</button>

			<button class="btn btn-room d-block mb-1" style="width: 120px; height:60px" data-toggle="modal" data-target="#modalData">
				<i class="fas fa-industry fa-lg"></i><br>R. WK Hubin
			</button>
			<button class="btn btn-room d-block mb-1" style="width: 120px; height:60px" data-toggle="modal" data-target="#modalData">
				<i class="fas fa-school fa-lg"></i><br>R. Kepsek
			</button>
			<button class="btn btn-room d-block mb-1" style="width: 120px; height:60px" data-toggle="modal" data-target="#modalData">
				<i class="fas fa-school fa-lg"></i><br>R. PKB
			</button>
			<button class="btn btn-room d-block mb-1" style="width: 120px; height:60px" data-toggle="modal" data-target="#modalData">
				<i class="fas fa-school fa-lg"></i><br>R.Kesiswaan
			</button>
			<button class="btn btn-room d-block mb-1" style="width: 120px; height:60px" data-toggle="modal" data-target="#modalData">
				<i class="fas fa-chalkboard fa-lg"></i><br>R. Kurikulum
			</button>
			<button class="btn btn-room d-block mb-1" style="width: 120px; height:60px" data-toggle="modal" data-target="#modalData">
				<i class="fas fa-tools fa-lg"></i><br>R. Sarpras
			</button>
		</div>

		<!-- Ruang B + mesjid -->
		<div class="kelas ruang-b">
			<div class="mesjid d-flex">
			
				@foreach ($dataB2 as $ruanganb2)
				<button class="btn btn-room d-block mb-1 mr-1" style="width: 100px; height:92px" data-toggle="modal" data-target="#modalData" data-id="{{$ruanganb2->id}}">			
					<i class="fas fa-chalkboard-teacher fa-lg"></i><br>{{$ruanganb2->nama}}
				</button>
				@endforeach
				<button class="btn btn-room mr-1" style="background-color: #0080ff; width: 80px; height:90px" data-toggle="modal" data-target="#modalData">
					<i class="fas fa-toilet fa-lg"></i><br>WC
				</button>
				<button class="btn btn-room" style="background-color: #00a572; width: 145px; height:90px" data-toggle="modal" data-target="#modalData">
					<i class="fas fa-mosque fa-lg"></i><br>Mesjid
				</button>
			</div>
			@foreach ($dataB1 as $ruanganb1)
			<button class="btn btn-room d-block mb-1" style="width: 100px; height:92px" data-toggle="modal" data-target="#modalData" data-id="{{$ruanganb1->id}}">		
						<i class="fas fa-chalkboard-teacher fa-lg"></i><br>{{$ruanganb1->nama}}
			</button>
			@endforeach
			<button class="btn btn-room d-block" style="width: 208px; height:145px" data-toggle="modal" data-target="#modalData">
				<i class="fas fa-school fa-lg"></i><br>Tekno Park
			</button>
		</div>

		<!-- Ruang C -->
		<div class="kelas ruang-c">
			@foreach ($dataC1 as $ruanganc1)
			<button class="btn btn-room d-block mb-1" style="width: 100px; height:110px" data-toggle="modal" data-target="#modalData" data-id="{{$ruanganc1->id}}">				<i class="fas fa-chalkboard-teacher fa-lg"></i><br>{{$ruanganc1->nama}}
			</button>
			@endforeach
			@foreach ($dataC2 as $ruanganc2)
			<button class="btn btn-room d-block mb-1" style="width: 100px; height:110px" data-toggle="modal" data-target="#modalData" data-id="{{$ruanganc2->id}}">				<i class="fas fa-desktop fa-lg"></i><br>{{$ruanganc2->nama}}
			</button>
			@endforeach
			<button class="btn btn-room d-block" style="margin-bottom: 48px; width: 92px; height:60px" >
			</button>

			<button class="btn btn-room d-block mb-1" style="width: 92px; height:72px" data-toggle="modal" data-target="#modalData">
				<i class="fas fa-chalkboard-teacher fa-lg"></i><br>WC
			</button>
			@foreach ($dataC3 as $ruanganc3)
			<button class="btn btn-room d-block mb-1" style="width: 100px; height:90px" data-toggle="modal" data-target="#modalData" data-id="{{$ruanganc3->id}}">				<i class="fas fa-chalkboard-teacher fa-lg"></i><br>{{$ruanganc3->nama}}
			</button>
			@endforeach
		</div>

		<!-- Ruang D -->
		<div class="kelas d-flex ruang-d">
			@foreach ($dataD1 as $ruanganD1)
			<button class="btn btn-room d-block mb-1 mr-1" style="width: 96px; height:92px"  data-id="{{$ruanganD1->id}}">			
				<i class="fas fa-chalkboard-teacher fa-lg"></i><br>{{$ruanganD1->nama}}
			</button>				
			@endforeach	
			<button class="btn d-block btn-room mt-3 mr-1" style="width: 80px; height:80px" data-toggle="modal" data-target="#modalData">
				<i class="fas fa-volleyball-ball fa-lg"></i><br>R. OR
			</button>	
			<div class="wc">
				<button class="btn d-block btn-room mt-3" style="background-color: #0080ff; width: 65px; height:80px" data-toggle="modal" data-target="#modalData">
					<i class="fas fa-chalkboard-teacher fa-lg"></i><br>WC
				</button>
			</div>
		</div>

		<!-- Ruang E -->
		<div class="kelas ruang-e">
			<button class="btn btn-room d-block mb-1" style="width: 100px; height:100px" data-toggle="modal" data-target="#modalData">
				<i class="fas fa-book fa-lg"></i><br>Perpus
			</button>
			@foreach ($dataE1 as $ruanganE1)
			<button class="btn btn-room d-block mb-1" style="width: 100px; height:92px"  data-id="{{$ruanganE1->id}}">			
					<i class="fas fa-chalkboard-teacher fa-lg"></i><br>{{$ruanganE1->nama}}
			</button>
			@endforeach
			<button class="btn btn-room d-block mb-1" style="background-color: #ff6101; width: 100px; height:85px" data-toggle="modal" data-target="#modalData">
				<i class="fas fa-store fa-lg"></i><br>Koperasi
			</button>
		</div>

		<!-- Ruang F -->
		<div class="kelas d-flex ruang-f">
			@foreach ($dataF1 as $ruanganF1)
			<button class="btn btn-room mr-1" style="width: 130px; height:90px" data-id="{{$ruanganF1->id}}">
				<i class="fas fa-chalkboard-teacher fa-lg"></i><br>{{$ruanganF1->nama}}
			</button>
			@endforeach

			<button class="btn btn-room mr-1" style="width: 90px; height:90px" data-toggle="modal" data-target="#modalData">
				<i class="fas fa-clinic-medical fa-lg"></i><br>UKS
			</button>
			<button class="btn btn-room" style="background-color: #ff5a5f; margin-right: 26px; width: 79px; height:90px" data-toggle="modal" data-target="#modalData">
				<i class="fas fa-toilet fa-lg"></i><br>WC
			</button>
			@foreach ($dataF2 as $ruanganF2)
			<button class="btn btn-room mr-1" style="width: 105px; height:90px" data-id="{{$ruanganF2->id}}">
				<i class="fas fa-chalkboard-teacher fa-lg"></i><br>{{$ruanganF2->nama}}
			</button>	
			@endforeach
			<button class="btn btn-room" style="background-color: #ff6101; width: 80px; height:90px" data-toggle="modal" data-target="#modalData">
				<i class="fas fa-utensils fa-lg"></i><br>Kantin
			</button>
		</div>

		<!-- Ruang G -->
		<div class="kelas ruang-g">
			@foreach ($dataG1 as $ruanganG1)
			<button class="btn btn-room d-block mb-1" style="width: 100px; height:100px" data-toggle="modal" data-target="#modalData" data-id="{{$ruanganG1->id}}">			
			<i class="fas fa-chalkboard-teacher fa-lg"></i><br>{{$ruanganG1->nama}}
			</button>
			@endforeach
		</div>
		
		<!-- Ruang H -->
		<div class="kelas d-flex ruang-h">
			@foreach ($dataH1 as $ruanganH1)
			<button class="btn btn-room mr-1" style="width: 100px; height:85px" data-id="{{$ruanganH1->id}}">
				<i class="fas fa-chalkboard-teacher fa-lg"></i><br>ORBIT
			</button>
			@endforeach
			@foreach ($dataH2 as $ruanganH2)
			<button class="btn btn-room mr-1" style="width: 100px; height:85px" data-id="{{$ruanganH2->id}}">
				<i class="fas fa-chalkboard-teacher fa-lg"></i><br>R. EDU 
			</button>	
			@endforeach
			@foreach ($dataH3 as $ruanganH3)
			<button class="btn btn-room mr-1" style="width: 100px; height:85px" data-id="{{$ruanganH3->id}}">
				<i class="fas fa-chalkboard-teacher fa-lg"></i><br>R. TOOL
			</button>		
			@endforeach
			<div class="prodi-av">
				@foreach ($dataH4 as $ruanganH4)
				<div class="ruang-av">
					<button class="btn btn-room mb-1 mr-1" style=" width: 120px; height:40px" data-id="{{$ruanganH4->id}}">
						<i class="fas fa-chalkboard-teacher fa-lg mr-2"></i>R. AV
					</button>
				@endforeach
				</div>
				<div class="mushola d-flex">
				<button class="btn btn-room mb-1 mr-1" style="background-color: #00a572; width: 60px; height:40px" data-toggle="modal" data-target="#modalData">
					<i class="fas fa-mosque fa-lg"></i><br>
				</button>
				<button class="btn btn-room mr-1" style="background-color: #0080ff; width: 55px; height:40px" data-toggle="modal" data-target="#modalData">
					<i class="fas fa-toilet fa-lg"></i><br>
				</button>
				</div>
			</div>
			@foreach ($dataH5 as $ruanganH5)
			<button class="btn btn-room mr-1" style="width: 90px; height:85px" data-id="{{$ruanganH5->id}}">
				<i class="fas fa-chalkboard-teacher fa-lg"></i><br>{{$ruanganH5->nama}}
			</button>		
			 @endforeach
		</div>
		

		<!-- Ruang Eskul -->
		<div class="kelas eskul">
			<button class="btn btn-room d-block mb-1" style="width: 100px; height:70px" data-toggle="modal" data-target="#modalData">
				<i class="fas fa-chalkboard-teacher fa-lg"></i><br>Pramuka
			</button>
			<button class="btn btn-room d-block mb-1" style="width: 100px; height:70px" data-toggle="modal" data-target="#modalData">
				<i class="fas fa-chalkboard-teacher fa-lg"></i><br>OSIS
			</button>
			<button class="btn btn-room d-block mb-1" style="width: 100px; height:70px" data-toggle="modal" data-target="#modalData">
				<i class="fas fa-chalkboard-teacher fa-lg"></i><br>PMR
			</button>
			<button class="btn btn-room d-block mb-1" style="width: 100px; height:70px" data-toggle="modal" data-target="#modalData">
				<i class="fas fa-chalkboard-teacher fa-lg"></i><br>Paskibra
			</button>
		</div>
		
		<!-- Lobby -->
		<div class="kelas lobby d-flex">
			<div class="komite">
				<button class="btn btn-room d-block mb-1 mr-1" style="width: 100px; height:60px" data-toggle="modal" data-target="#modalData">
					<i class="fas fa-school fa-lg"></i><br>R. Komite
				</button>
				<button class="btn btn-room d-block mb-1" style="background-color: #0080ff; width: 100px; height:60px" data-toggle="modal" data-target="#modalData">
					<i class="fas fa-toilet fa-lg"></i><br>WC Guru
				</button>
			</div>
			<div class="toilet d-flex">
				<button class="btn btn-room d-block mb-1 mr-1" style="background-color: #ff5a5f; width: 60px; height:125px" data-toggle="modal" data-target="#modalData">
					<i class="fas fa-toilet fa-lg"></i><br>WC Putri
				</button>
				<button class="btn btn-room d-block mb-1" style="background-color: #0080ff; width: 60px; height:125px" data-toggle="modal" data-target="#modalData">
					<i class="fas fa-toilet fa-lg"></i><br>WC Putra
				</button>
			</div>
		</div>

		<!-- lapang -->
		<div class="kelas lapang">
			<button class="btn btn-room mr-1" style="font-size:25px; width: 480px; height:375px" data-toggle="modal" data-target="#modalData">
				<i class="fas fa-basketball-ball fa-2x"></i><br><span>Lapang</span>
			</button>
		</div>
	</div>
	<!-- Map Lantai 1 End -->





	<!-- Map Lantai 2 -->
	<div class="map-2 lantai-act">
	
		<!-- Layout  -->
		<div class="img-maps mb-5 ml-3">
			<img src="{{ asset('img/lantai-1.png') }}" width="1280px" class="img-maps" alt="img-maps">
		</div>
		<!-- Layout End  -->

		<!-- Ruang A lt2 -->
		<div class="kelas ruang-a">
			@foreach ($dataA1 as $ruanganA1)
			<button class="btn btn-room d-block mb-1 bg-warning" style="width: 120px; height:80px" data-id="{{$ruanganA1->id}}">
				<i class="fas fa-desktop fa-lg"></i><br>{{$ruanganA1->nama}}
			</button>
			@endforeach
			@foreach ($dataA2 as $ruanganA2)
			<button class="btn btn-room d-block mb-1" style="width: 120px; height:70px" data-id="{{$ruanganA2->id}}">
				<i class="fas fa-camera fa-lg"></i><br>Stud. MM
			</button>
			@endforeach
			@foreach ($dataA3 as $ruanganA3)
			<button class="btn btn-room d-block mb-1" style="width: 120px; height:100px" data-id="{{$ruanganA3->id}}">
				<i class="fas fa-money-check-alt fa-lg"></i><br>Lab MM
			</button>
			@endforeach
			<button class="btn btn-room d-block mb-1" style="width: 120px; height:110px" data-toggle="modal" data-target="#modalData">
				<i class="fas fa-chalkboard fa-lg"></i><br>R. Guru TI
			</button>
			@foreach ($dataA4 as $ruanganA4)
			<button class="btn btn-room d-block mb-1 bg-warning"" style="width: 120px; height:80px" data-id="{{$ruanganA4->id}}">
				<i class="fas fa-desktop fa-lg"></i><br>Lab A 2.6
			</button>	
			@endforeach
			@foreach ($dataA5 as $ruanganA5)
			<button class="btn btn-room d-block mb-1" style="width: 120px; height:70px" data-id="{{$ruanganA5->id}}">
				<i class="fas fa-warehouse fa-lg"></i><br>Gudang A 2.7
			</button>
			@endforeach
			@foreach ($dataA6 as $ruanganA6) 
			<button class="btn btn-room d-block mb-1 bg-warning"" style="width: 120px; height:80px" data-id="{{$ruanganA6->id}}">
				<i class="fas fa-desktop fa-lg "></i><br>Lab A 2.8
			</button>	
			 @endforeach 
			
		</div>

		<!-- Ruang B lt 2 -->
		<div class="kelas ruang-b">
			@foreach ($dataB3 as $ruanganB3)
			<button class="btn btn-room d-block mb-1" style="width: 92px; height:80px" data-id="{{$ruanganB3->id}}">
				<i class="fas fa-chalkboard-teacher fa-lg"></i><br>{{$ruanganB3->nama}}
			</button>
			@endforeach
		</div>

		<!-- Ruang C lt2 -->
		<div class="kelas ruang-c">
			@foreach ($dataC4 as $ruanganc4)
			<button class="btn btn-room d-block mb-1" style="width: 100px; height:92px" data-toggle="modal" data-target="#modalData" data-id="{{$ruanganc4->id}}">	
			<i class="fas fa-chalkboard-teacher fa-lg"></i><br>{{$ruanganc4->nama}}
			</button>
			@endforeach
		</div>

		<!-- Ruang D lt2 -->
		<div class="kelas d-flex ruang-d">
			@foreach ($dataD2 as $ruanganD2)
			<button class="btn btn-room d-block mb-1" style="width: 125px; height:92px" data-id="{{$ruanganD2->id}}">	
			<i class="fas fa-chalkboard-teacher fa-lg"></i><br>{{$ruanganD2->nama}}
			</button>
			@endforeach
			@foreach ($dataD3 as $ruanganD3)
			<button class="btn btn-room mr-1" style="width: 130px; height:90px" data-id="{{$ruanganD3->id}}">
				<i class="fas fa-chalkboard-teacher fa-lg"></i><br>Lab Bahasa
			</button>	
			@endforeach
			
		</div>

		<!-- Ruang E lt2 -->
		<div class="kelas ruang-e">
			@foreach ($dataE2 as $ruanganE2)
			<button class="btn btn-room d-block mb-1" style="width: 100px; height:92px" data-toggle="modal" data-target="#modalData" data-id="{{$ruanganE2->id}}">				<i class="fas fa-chalkboard-teacher fa-lg"></i><br>{{$ruanganE2->nama}}</a>
			@endforeach
		</div>

		<!-- Ruang F lt2 -->
		<div class="kelas d-flex ruang-f">
			@foreach ($dataF3 as $ruanganF3)
			<button class="btn btn-room mr-1" style="width: 130px; height:90px" data-id="{{$ruanganF3->id}}">
				<i class="fas fa-chalkboard-teacher fa-lg"></i><br>{{$ruanganF3->nama}}
			</button>
			@endforeach
			<button class="btn btn-room mr-1" style="width: 85px; height:90px" data-toggle="modal" data-target="#modalData">
				<i class="fas fa-clinic-medical fa-lg"></i><br>Ruangan BK
			</button>
			<button class="btn btn-room" style="background-color: #0080ff; margin-right: 40px; width: 70px; height:90px" data-toggle="modal" data-target="#modalData">
				<i class="fas fa-toilet fa-lg"></i><br>WC
			</button>
			@foreach ($dataF4 as $ruanganF4)
			<button class="btn btn-room mr-1" style="width: 110px; height:90px" data-id="{{$ruanganF4->id}}">
				<i class="fas fa-chalkboard-teacher fa-lg"></i><br>{{$ruanganF4->nama}}
			</button>
			@endforeach
			@foreach ($dataF5 as $ruanganF5)
			<button class="btn btn-room mr-1 bg-warning" style="width: 145px; height:90px" data-id="{{$ruanganF5->id}}">
				<i class="fas fa-desktop fa-lg"></i><br>{{$ruanganF5->nama}}
			</button>
			@endforeach
		</div>

		<!-- Ruang G lt2 -->
		<div class="kelas ruang-g">
			@foreach ($dataG2 as $ruanganG2)
			<button class="btn btn-room d-block mb-1" style="width: 100px; height:100px" data-id="{{$ruanganG2->id}}">
				<i class="fas fa-chalkboard-teacher fa-lg"></i><br>{{@$ruanganG2->nama}}
			</button>
			@endforeach
		</div>

		<!-- Ruang ICT -->
		<div class="kelas ict">
			<button class="btn btn-room d-block mb-1" style="width: 120px; height:50px" data-toggle="modal" data-target="#modalData">
				<i class="fas fa-user-shield fa-lg"></i> ICT
			</button>
			<button class="btn btn-room d-block mb-1" style="width: 120px; height:50px" data-toggle="modal" data-target="#modalData">
				<i class="fas fa-sink fa-lg"></i> Pantry
			</button>
			<button class="btn btn-room d-block mb-1" style="background-color: #0080ff; width: 120px; height:50px" data-toggle="modal" data-target="#modalData">
				<i class="fas fa-toilet fa-lg"></i> WC Guru
			</button>
		</div>

		<!-- lapang -->
		<div class="kelas lapang">
			<button class="btn btn-room mr-1" style="font-size:25px; width: 480px; height:375px" data-toggle="modal" data-target="#modalData">
				<i class="fas fa-basketball-ball fa-2x"></i><br><span>Lapang</span>
			</button>
		</div>
		

	</div>
	<!-- Map Lantai 2 End -->

    <!-- Modal -->
    <div class="modal fade" id="modalroom" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Informasi</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
               <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" id="ruangan-tab" data-toggle="tab" href="#ruangan" role="tab" aria-controls="ruangan" aria-selected="true">Ruangan</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="sarpras-tab" data-toggle="tab" href="#sarpras" role="tab" aria-controls="sarpras" aria-selected="false">SarPras</a>
                    </li>
                </ul>
                {{-- <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="ruangan" role="tabpanel" aria-labelledby="ruangan-tab">
                        <div class="table-responsive mt-4">
                            <table class="table table-bordered table-sm">
                                <tr>
                                    <th width="30%" class="th-gray">Tipe</th>
                                    <td width="70%" id="" val>Kelas</td>
                                </tr>
                                <tr>
                                    <th width="30%" class="th-gray">Lantai</th>
                                    <td width="70%" id="">1</td>
                                </tr>
                                <tr>
                                    <th width="30%" class="th-gray">Status</th>
                                    <td width="70%" id=""></td>
                                </tr>
                                <tr>
                                    <th width="30%" class="th-gray">Deskripsi</th>
                                    <td width="70%" id="">Lorem ipsum dolor sit amet, consectetur adipisicing elit..</td>
                                </tr>                                
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="sarpras" role="tabpanel" aria-labelledby="sarpras-tab">
                        <div class="table-responsive mt-4">
                            <table class="table table-bordered table-sm">
                                <tr align="center">
                                    <th width="30%" class="th-gray">Nama Barang</th>
                                    <th width="20%" class="th-gray">Jumlah</th>
                                    <th width="25%" class="th-gray">Kondisi</th>
                                    <th width="25%" class="th-gray">Catatan</th>
                                </tr>
                                <tr align="center">
                                    <td>..</td>
                                    <td>..</td>
                                    <td>..</td>
                                    <td>..</td>
                                </tr>
                                <tr align="center">
                                    <td>..</td>
                                    <td>..</td>
                                    <td>..</td>
                                    <td>..</td>
                                </tr>
                                <tr align="center">
                                    <td>..</td>
                                    <td>..</td>
                                    <td>..</td>
                                    <td>..</td>
                                </tr>
                                <tr align="center">
                                    <td>..</td>
                                    <td>..</td>
                                    <td>..</td>
                                    <td>..</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div> --}}
            </div> 
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Navigate</button>
            </div>
        </div>
        </div>
    </div>

</div>

@endsection

@push('js')
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js"></script>

<script type="text/javascript">
    $(function() {
        $('.btn-room').click(function(e) {
			console.log($(this).attr('data-id'));
			var ruanganid = $(this).attr('data-id')
			// console.log($(this).attr('data-id'));
			// let id = $(this).attr('data-id')
            // alert("hiii");
			$.ajax({
				url: `/room/${ruanganid}/show`,
				method: "GET",
				success: function(data){
					console.log(data)
					$('#modalroom').find('.modal-body').html(data);
					//$('#modalroom').html(Response);
					$('#modalroom').modal('show');
				},
				error:function (error) {
					console.log(error)
				}
			})
        });
    });

</script>