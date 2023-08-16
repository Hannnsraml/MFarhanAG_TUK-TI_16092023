@extends('layouts.layout')

@section('content')
    <div class="pagetitle">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <h1>{{ $title }}</h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('surat-keluar.index') }}">Surat Keluar</a></li>
                        <li class="breadcrumb-item active">{{ $title }}</li>
                    </ol>
                </nav>
            </div>

            <div class="pb-2">
                <a href="{{ route('surat-keluar.index') }}" class="btn btn-secondary"><i class="bi bi-arrow-left
                "></i>
                    Kembali</a>
            </div>
        </div>
    </div><!-- End Page Title -->


    <section class="section">
        <div class="row">
            <div class="col-lg-7">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"></h5>

                        <!-- General Form Elements -->
                        <form action="" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="id_jenis_surat" value="1">
                            <div class="row mb-3">
                                <label for="nomor" class="col-sm-2 col-form-label">Nomor Surat</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="nomor" name="nomor"
                                        value="{{ @$surat_keluar->nomor ?? old('nomor') }}" required disabled>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="pengirim" class="col-sm-2 col-form-label">Nama Pengirim</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="pengirim" name="pengirim"
                                        value="{{ @$surat_keluar->pengirim ?? old('pengirim') }}" required disabled>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="waktu" class="col-sm-2 col-form-label">Waktu</label>
                                <div class="col-sm-10">
                                    <input type="date" class="form-control" id="waktu" name="waktu"
                                        value="{{ @$surat_keluar->waktu ?? old('waktu') }}" required disabled>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="lampiran" class="col-sm-2 col-form-label">Lampiran</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="lampiran" name="lampiran"
                                        value="{{ @$surat_keluar->lampiran ?? old('lampiran') }}" required disabled>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="perihal" class="col-sm-2 col-form-label">Perihal</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="perihal" name="perihal"
                                        value="{{ @$surat_keluar->perihal ?? old('perihal') }}" required disabled>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="penerima" class="col-sm-2 col-form-label">Nama Penerima</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="penerima" name="penerima"
                                        value="{{ @$surat_keluar->penerima ?? old('penerima') }}" required disabled>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="isi" class="col-sm-2 col-form-label">Isi Surat</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" style="height: 100px" id="isi" name="isi" required disabled>{{ @$surat_keluar->isi ?? old('isi') }}</textarea>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Unit Penerbit</label>
                                <div class="col-sm-10">
                                    <select class="form-select" aria-label="Default select example" name="id_unit_penerbit"
                                        disabled>
                                        <option selected>{{ @$surat_keluar->nama }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="tempat" class="col-sm-2 col-form-label">Tempat</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="tempat" name="tempat"
                                        value="{{ @$surat_keluar->tempat ?? old('tempat') }}" required disabled>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Pengesah</label>
                                <div class="col-sm-10">
                                    <select class="form-select" aria-label="Default select example" name="id_pengesah" required disabled>
                                        <option selected>{{ @$surat_keluar->nama }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="tembusan" class="col-sm-2 col-form-label">Tembusan</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="tembusan" name="tembusan"
                                        value="{{ @$surat_keluar->tembusan ?? old('tembusan') }}" required disabled>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 text-center">
                                    <a href="{{ $surat_keluar->getMedia('surat_file')->first()->getUrl() }}"
                                        class="btn btn-primary" target="_blank">Lihat Surat</a>
                                </div>
                            </div>
                        </form><!-- End General Form Elements -->

                    </div>
                </div>

            </div>

            <div class="col-lg-5">

                <div class="card">
                    <div class="class-body">
                        <div>
                            <img style="object-fit: contain;width:100%;"
                                src="{{ $surat_keluar->getMedia('surat_file')->first()->getUrl() }}"
                                alt="Surat Masuk Nomor {{ $surat_keluar->nomor }}">
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
