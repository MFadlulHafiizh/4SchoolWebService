@extends('layouts.admin')
@if (!empty($petunjuk))
@section('title', 'Edit Petunjuk')
@else
@section('title', 'Tambah Petunjuk')
@endif

@section('content')

<!-- Main Content -->
<section class="section p-3 w-100">
    <div class="row">
        <h1 class="w-100 text-center mb-4">{{!empty($petunjuk) ? 'Edit Data Petunjuk' : 'Tambah Data Petunjuk'}}</h1>
    </div>

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

    <div class="row d-block">
    <form method="POST" action="{{!empty($petunjuk) ? route('petunjuk.update', @$petunjuk->id) : route('petunjuk.create') }}">
    @csrf

    @if (!empty($petunjuk))
    @method('PATCH')
    @endif

        <div class="row">
            <div class="col">    
                <div class="mb-3">
                    <label class="text-dark">Judul</label>
                    <input type="text" class="form-control" name="judul" value="{{ old('judul', @$petunjuk->judul) }}">
                </div>
            </div>
            <div class="col">    
                <div class="mb-3">
                    <label class="text-dark">Pertanyaan</label>
                    <input type="text" class="form-control" name="pertanyaan" value="{{ old('pertanyaan', @$petunjuk->pertanyaan) }}">
                </div>
            </div>
        </div>
        <div class="mb-3">
            <label class="text-dark">Jawaban</label>
            <textarea class="form-control h-25" id="jawaban" rows="5" name="jawaban">{{ old('jawaban', @$petunjuk->jawaban) }}</textarea>
        </div>
        <div class="mb-3">
            <label class="text-dark">Kategori</label>
            <input type="text" class="form-control" name="kategori" value="{{ old('kategori', @$petunjuk->kategori) }}">
        </div>

        <button type="submit" class="btn btn-primary btn-lg btn-block mt-5">Submit</button>
    </form>
    </div>
</section>
@endsection
