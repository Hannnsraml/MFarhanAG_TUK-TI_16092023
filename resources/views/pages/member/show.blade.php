@extends('layouts.layout')

@section('content')
    <div class="pagetitle">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <h1>{{ $title }}</h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('member.index') }}">{{ $member->student->name }}</a>
                        </li>
                    </ol>
                </nav>
            </div>

            <div class="pb-2">
                <a href="{{ route('member.index') }}" class="btn btn-secondary"><i
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
                                <label class="col-sm-2 col-form-label">Mahasiswa</label>
                                <div class="col-sm-10">
                                    <select disabled class="form-select" aria-label="Default select example"
                                        name="student_id">
                                        <option selected>Pilih Mahasiswa</option>
                                        @foreach ($students as $student)
                                            <option {{ @$member->student_id == $student->id ? 'selected' : '' }}
                                                value="{{ $student->id }}">{{ $student->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">UKM</label>
                                <div class="col-sm-10">
                                    <select disabled class="form-select" aria-label="Default select example"
                                        name="organization_id">
                                        <option selected>Pilih UKM</option>
                                        @foreach ($organizations as $organization)
                                            <option {{ @$member->organization_id == $organization->id ? 'selected' : '' }}
                                                value="{{ $organization->id }}">{{ $organization->ukm_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </form><!-- End General Form Elements -->

                    </div>
                </div>

            </div>

        </div>
    </section>
@endsection
