@extends('layouts.layout')

@section('content')
    <section class="section dashboard">
        <div class="row">

            <!-- Left side columns -->
            <div class="col-lg-12">
                <div class="row">

                    <!-- Mahasiswa -->
                    <div class="col-xxl-4 col-md-6">
                        <div class="card info-card sales-card">
                            <div class="card-body">
                                <h5 class="card-title">Mahasiswa</h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-people"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{ $student_count }}</h6>
                                        <span><a href="{{ route('student.index') }}">Kelola</a></span>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div><!-- End Mahasiswa -->

                    <!-- UKM -->
                    <div class="col-xxl-4 col-md-6">
                        <div class="card info-card sales-card">
                            <div class="card-body">
                                <h5 class="card-title">UKM</h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-house-fill"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{ $organization_count }}</h6>
                                        <span><a href="{{ route('organization.index') }}">Kelola</a></span>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div><!-- End UKM -->

                    <!-- Anggota UKM -->
                    <div class="col-xxl-4 col-md-6">
                        <div class="card info-card sales-card">
                            <div class="card-body">
                                <h5 class="card-title">Anggota UKM</h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-people-fill"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{ $member_count }}</h6>
                                        <span><a href="{{ route('member.index') }}">Kelola</a></span>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div><!-- End Anggota UKM -->
                </div>
            </div>
        </div>
    </section>
@endsection
