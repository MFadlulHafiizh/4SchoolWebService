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
<?php
    if (!empty($sarpras)) {
        
        $action = "Edit";
        $judulForm = "Edit Data Sarpras";
    }else{
        $action = "Tambah";
        $judulForm = "Form Data Sarpras";
    }
?>
         

    @if (session('error'))
    <div class="alert alert-danger">
        <h5>{{ session('error') }}</h5>
    </div>
    @endif

    @if ($errors->all())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session('success'))
    <div class="alert alert-success">
        <h5>{{ session('success') }}</h5>
    </div>
    @endif
         
    <div class="card mt-4">
        <div class="card-header">
            <div class="d-flex justify-content-start">
                <a href="{{ route('sarpras.index') }}" class="btn btn-primary mr-3"><i
                        class="fas fa-arrow-left mt-1 fa-xs"></i></a>
                <h5 class="mt-2">Form Data Sarana Prasarana</h5>
            </div>
        </div>
        <div class="card-body p-4 layout">
            <form method="POST" action="{{ url('/sarpras', @$sarpras->id) }}">
                 @csrf
                    @if(!empty($sarpras))
                    @method('PATCH')
                    @endif
                <div class="form-row mb-3">
                    <div class="col">
                        <label for="nama">Nama</label>
                        <input class="form-control form-control-sm" type="text" placeholder="Masukan Nama Item" id="nama"
                            name="nama" value="{{ @$sarpras->nama }}">
                    </div>
                    <div class="col">
                        <label for="id_ruangan" class="text-dark">Ruangan</label>
                        <select class="form-control form-control-sm" id="id_ruangan" name="id_ruangan">

                        @if(isset($ruangan))
                            @foreach ($ruangan as $dataRuangan)
                                <option value="{{ $dataRuangan->id }}" {{ $dataRuangan->id == @$sarpras->id_ruangan ? "selected" : "" }}> {{ $dataRuangan->nama }}</option>
                            @endforeach
                        @endif    
            
                        </select>
                    </div>
                </div>
                <div class="form-row mb-3">
                    <div class="col">
                        <label for="jumlah" class="text-dark">Jumlah</label>
                        <input class="form-control form-control-sm" value="{{ @$sarpras->jumlah }}" type="number" placeholder="Masukan Jumlah Item"
                            id="jumlah" name="jumlah" min="1">

                    </div>
                    <div class="col">
                        <label for="kondisi" class="text-dark">Kondisi</label>
                        <select class="form-control form-control-sm" id="kondisi" name="kondisi">
                            <option value="Sangat Baik" {{ @$sarpras->kondisi == "Sangat Baik" ? "selected" : "" }}>Sangat Baik</option>
                            <option value="Baik" {{ @$sarpras->kondisi == "Baik" ? "selected" : "" }}>Baik</option>
                            <option value="Kurang Baik" {{ @$sarpras->kondisi == "Kurang Baik" ? "selected" : "" }}>Kurang Baik</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="catatan">Catatan</label>
                    <textarea class="form-control" id="catatan" rows="6" style="resize: none;" name="catatan">{{ @$sarpras->catatan }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary float-right">Submit</button>
            </form>
        </div>
    </div>

@endsection
