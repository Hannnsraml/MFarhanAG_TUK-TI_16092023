@extends('layouts.layout')

@section('content')
    <div class="pagetitle">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <h1>{{ $title }}</h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('student.index') }}">Surat Masuk</a></li>
                        <li class="breadcrumb-item active">{{ $title }}</li>
                    </ol>
                </nav>
            </div>

            <div class="pb-2">
                <a href="{{ route('student.index') }}" class="btn btn-secondary"><i
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
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="row mb-3">
                                <label for="nomor" class="col-sm-2 col-form-label">Nama Mahasiswa</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="nomor" name="nomor"
                                        value="{{ @$student->name ?? old('nomor') }}" required disabled>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="pengirim" class="col-sm-2 col-form-label">NIM</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="pengirim" name="pengirim"
                                        value="{{ @$student->nim ?? old('pengirim') }}" required disabled>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="waktu" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                                <div class="col-sm-10">
                                    <input type="date" class="form-control" id="waktu" name="waktu"
                                        value="{{ @$student->ttl ?? old('waktu') }}" required disabled>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="isi" class="col-sm-2 col-form-label">Alamat</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" style="height: 100px" id="isi" name="isi" required disabled>{{ @$student->alamat ?? old('isi') }}</textarea>
                                </div>
                            </div>
                        </form><!-- End General Form Elements -->

                    </div>
                </div>

            </div>

        </div>
    </section>
@endsection
