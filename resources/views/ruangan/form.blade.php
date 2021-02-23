@extends('layouts.app', ['title' => ''])

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

<?php
    if (!empty($dataRuangan)) {
        $action = "Edit";
        $judulForm = "Edit Data Ruangan";
    }else{
        $action = "Tambah";
        $judulForm = "Form Data Ruangan";
    }
?>
            
<div class="card mt-4">
    <div class="card-header">
        <div class="d-flex justify-content-start">
            <a href="{{ route('ruangan.index') }}" class="btn btn-primary mr-3"><i class="fas fa-arrow-left mt-1 fa-xs"></i></a>
            <h5 class="mt-2"><?= $judulForm ?></h5>
        </div>
    </div>
    <div class="card-body p-4 layout">
        {{-- form action --}}
        <form action="{{ url('ruangan', @$dataRuangan->id)}}" method="post">
            @csrf
            @if(!empty($dataRuangan))
                @method('PATCH')
            @endif
            <div class="form-group">
                <label for="nama">Nama</label>
                <input class="form-control form-control-sm" type="text" placeholder="Masukan Nama Ruangan" id="nama" name="nama" value="{{ old('nama', @$dataRuangan->nama)}}">
                @if ($errors->has('nama'))
                    <span class="text-danger">{{ $errors->first('nama') }}</span>
                @endif
            </div>
            <div class="form-row mb-3">
                <div class="col">
                    <label for="lantai" class="text-dark">Lantai</label>
                <select class="form-control form-control-sm" id="lantai" name="lantai">
                        <option disabled selected>Pilih lantai</option>
                        <option {{ old('lantai', @$dataRuangan->lantai)=="1" ? "selected" : '' }}>1</option>
                        <option {{ old('lantai', @$dataRuangan->lantai)=="2" ? "selected" : '' }}>2</option>
                    </select>
                @if ($errors->has('lantai'))
                    <span class="text-danger">{{ $errors->first('lantai') }}</span>
                @endif
                </div>
                <div class="col">
                    <label for="blok" class="text-dark">Blok</label>
                    <select class="form-control form-control-sm" id="blok" name="blok" >
                        <?php $blok = ['A','B', 'C','D','E', 'F', 'G', 'H']; ?>
                        <option disabled selected>Pilih blok</option>
                        @foreach($blok as $listBlok)
                        <option {{ old('blok', @$dataRuangan->blok)=="$listBlok" ? "selected" : '' }}>{{ $listBlok }}</option>
                        @endforeach
                    </select>
                @if ($errors->has('blok'))
                    <span class="text-danger">{{ $errors->first('blok') }}</span>
                @endif
                </div>
            </div>
            <div class="form-row mb-3">
                <div class="col">
                    <label for="tipe" class="text-dark">Tipe</label>
                    <select class="form-control form-control-sm" id="tipe" name="tipe">
                        <?php $tipe = ['Laboratorium', 'Kelas']?>
                        <option disabled selected>Pilih tipe</option>
                        @foreach($tipe as $listtipe)
                        <option {{ old('tipe', @$dataRuangan->tipe)=="$listtipe" ? "selected" : '' }}>{{ $listtipe }}</option>
                        @endforeach
                    </select>
                @if ($errors->has('tipe'))
                    <span class="text-danger">{{ $errors->first('tipe') }}</span>
                @endif
                </div>
                <div class="col">
                    <label for="status" class="text-dark">Status</label>
                    <select class="form-control form-control-sm" id="status" name="status">
                        <option disabled selected>Pilih status</option>
                        <option {{ old('status', @$dataRuangan->status)=="Digunakan" ? "selected" : '' }}>Digunakan</option>
                        <option {{ old('status', @$dataRuangan->status)=="Kosong" ? "selected" : '' }}>Kosong</option>
                    </select>
                @if ($errors->has('status'))
                    <span class="text-danger">{{ $errors->first('status') }}</span>
                @endif
                </div>
            </div>
            <div class="form-group">
                <label for="deskripsi">Deskripsi</label>
                <textarea class="form-control" id="deskripsi" rows="6" style="resize: none;" name="deskripsi">{{old('deskripsi',@$dataRuangan->deskripsi)}}</textarea>
                @if ($errors->has('deskripsi'))
                    <span class="text-danger">{{ $errors->first('deskripsi') }}</span>
                @endif
              </div>
              @include('sweetalert::alert')
            <button type="submit" class="btn btn-primary float-right"><?= $action ?></button>
        </form>							
    </div>
</div>

@endsection