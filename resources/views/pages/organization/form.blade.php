@extends('layouts.layout')

@section('content')
    <div class="pagetitle">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <h1>{{ $title }}</h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('organization.index') }}">UKM</a></li>
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
                            @if (@$organization)
                                @method('PUT')
                            @endif
                            <div class="row mb-3">
                                <label for="ukm_name" class="col-sm-2 col-form-label">Nama UKM</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="ukm_name" name="ukm_name"
                                        value="{{ @$organization->ukm_name ?? old('ukm_name') }}" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="deskripsi" class="col-sm-2 col-form-label">Deskripsi</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" style="height: 100px" id="deskripsi" name="deskripsi" required>{{ @$organization->deskripsi ?? old('deskripsi') }}</textarea>
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
