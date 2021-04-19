@extends('layouts.admin', ['title' => ''])

@push('css')
    <style>
        .layout {
            width: 100%;
            height: 550px;
            overflow: auto;
        }
    </style>
@endpush

@section('content')

<div class="card mt-4 layout">
    <div class="card-header">
        <div class="d-flex justify-content-start">
            <a href="#" class="btn btn-primary mr-3"><i class="fas fa-arrow-left mt-1 fa-xs"></i></a>
            <h5 class="mt-2">Materi</h5>
        </div>
    </div>
    <div class="card-body p-4">
    	<form action="" method="">
    		@csrf
    		<div class="row">
    			<div class="col-6">
		    		<div class="form-group">
		    			<label for="" class="form-control-label">Tipe</label>
		    			<select class="form-control" id="" name="">
		    				<option disabled selected>Pilih Tipe</option>
		    				<option>Materi</option>
		    				<option>Tugas</option>
		    			</select>
		    		</div>
    			</div>
    		</div>
    		<div class="row">
    			<div class="col-12">
		    		<div class="form-group">
		    			<label for="" class="form-control-label">Judul</label>
		    			<input class="form-control" type="text" id="" name="" value="" placeholder="Masukkan Judul">
		    		</div>
    			</div>
    		</div>
    		<div class="row">
    			<div class="col-12">
		    		<div class="form-group">
		    			<label for="" class="form-control-label">Deskripsi</label>
		    			<textarea class="form-control" type="text" id="" name="" wrap="soft" runat="server" placeholder="Masukkan Deskripsi" style="overflow:auto; resize:none; height: 100px;"></textarea>
		    		</div>
    			</div>
    		</div>
    		<div class="row">
    			<div class="col-6">
		    		<div class="form-group">
		    			<label for="" class="form-control-label">Tenggat</label>
		    			<input class="form-control" type="date" id="" name="" value="">
		    		</div>
    			</div>
    			<div class="col-6">
		    		<div class="form-group">
		    			<label for="" class="form-control-label">Upload File</label>
		    			<input class="form-control-file" type="file" id="" name="" value="">
		    		</div>	
    			</div>
    		</div>
    	</form>
    </div>
</div>

@endsection