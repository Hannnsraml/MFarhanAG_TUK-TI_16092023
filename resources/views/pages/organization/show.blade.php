@extends('layouts.layout')

@section('content')
    <div class="pagetitle">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <h1>{{ $title }}</h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a
                                href="{{ route('organization.index') }}">{{ $organization->ukm_name }}</a></li>
                    </ol>
                </nav>
            </div>

            <div class="pb-2">
                <a href="{{ route('organization.index') }}" class="btn btn-secondary"><i
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
                                <label for="nomor" class="col-sm-2 col-form-label">Nama UKM</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="nomor" name="nomor"
                                        value="{{ @$organization->ukm_name ?? old('nomor') }}" required disabled>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="isi" class="col-sm-2 col-form-label">Deskripsi</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" style="height: 100px" id="isi" name="isi" required disabled>{{ @$organization->deskripsi ?? old('isi') }}</textarea>
                                </div>
                            </div>
                        </form><!-- End General Form Elements -->

                    </div>
                </div>

            </div>

        </div>
    </section>
@endsection
