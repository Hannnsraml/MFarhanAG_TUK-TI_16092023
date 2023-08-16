@extends('layouts.layout')

@section('content')
    <div class="pagetitle">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <h1>{{ $title }}</h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('surat-masuk.index') }}">Surat Masuk</a></li>
                        <li class="breadcrumb-item active">{{ $title }}</li>
                    </ol>
                </nav>
            </div>

            <div class="pb-2">
                <a href="{{ url()->previous() }}" class="btn btn-secondary"><i
                        class="bi bi-arrow-left
                    "></i>
                    Kembali</a>
            </div>
        </div>
    </div><!-- End Page Title -->


    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"></h5>

                        <!-- General Form Elements -->
                        <form action="{{ $url }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @if (@$surat_masuk)
                                @method('PUT')
                            @endif
                            <input type="hidden" name="id_jenis_surat" value="1">
                            <div class="row mb-3">
                                <label for="nomor" class="col-sm-2 col-form-label">Nomor Surat</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="nomor" name="nomor"
                                        value="{{ @$surat_masuk->nomor ?? old('nomor') }}" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="pengirim" class="col-sm-2 col-form-label">Nama Pengirim</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="pengirim" name="pengirim"
                                        value="{{ @$surat_masuk->pengirim ?? old('pengirim') }}" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="waktu" class="col-sm-2 col-form-label">Waktu</label>
                                <div class="col-sm-10">
                                    <input type="date" class="form-control" id="waktu" name="waktu"
                                        value="{{ @$surat_masuk->waktu ?? old('waktu') }}" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="lampiran" class="col-sm-2 col-form-label">Lampiran</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="lampiran" name="lampiran"
                                        value="{{ @$surat_masuk->lampiran ?? old('lampiran') }}" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="perihal" class="col-sm-2 col-form-label">Perihal</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="perihal" name="perihal"
                                        value="{{ @$surat_masuk->perihal ?? old('perihal') }}" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="penerima" class="col-sm-2 col-form-label">Nama Penerima</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="penerima" name="penerima"
                                        value="{{ @$surat_masuk->penerima ?? old('penerima') }}" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="isi" class="col-sm-2 col-form-label">Isi Surat</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" style="height: 100px" id="isi" name="isi" required>{{ @$surat_masuk->isi ?? old('isi') }}</textarea>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Unit Penerbit</label>
                                <div class="col-sm-10">
                                    <select class="form-select" aria-label="Default select example" name="id_unit_penerbit">
                                        <option selected>Pilih Unit</option>
                                        @foreach ($unit_penerbit as $up)
                                            <option {{ @$surat_masuk->id_unit_penerbit == $up->id ? 'selected' : '' }}
                                                value="{{ $up->id }}">{{ $up->unit }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="tempat" class="col-sm-2 col-form-label">Tempat</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="tempat" name="tempat"
                                        value="{{ @$surat_masuk->tempat ?? old('tempat') }}" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Pengesah</label>
                                <div class="col-sm-10">
                                    <select class="form-select" aria-label="Default select example" name="id_pengesah">
                                        <option selected>Pilih Pengesah</option>
                                        @foreach ($pengesah as $p)
                                            <option {{ @$surat_masuk->id_pengesah == $p->id ? 'selected' : '' }}
                                                value="{{ $p->id }}">{{ $p->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="tembusan" class="col-sm-2 col-form-label">Tembusan</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="tembusan" name="tembusan"
                                        value="{{ @$surat_masuk->tembusan ?? old('tembusan') }}" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="surat_file" class="col-sm-2 col-form-label">File Scan</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="file" id="surat_file" name="surat_file"
                                        {{ @$surat_masuk ? '' : 'required' }}>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 text-center">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </div>
                        </form><!-- End General Form Elements -->

                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
