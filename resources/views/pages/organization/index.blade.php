@extends('layouts.layout')

@section('content')
    <section class="section">
        <div class="row">
            <div class="pagetitle">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h1>UKM</h1>
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active">UKM</li>
                            </ol>
                        </nav>
                    </div>

                    <div class="pb-2">
                        <a href="{{ route('organization.create') }}" class="btn btn-primary"><i class="bi bi-plus"></i>
                            Tambah Data</a>
                        <a href="{{ route('organization.print') }}" target="_blank" class="btn btn-success"><i
                                class="bi bi-printer"></i>
                            Cetak Data</a>
                        <a href="{{ route('organization.export') }}" target="_blank" class="btn btn-success"><i
                                class="bi bi-file-earmark-excel"></i>
                            Export Excel</a>
                    </div>
                </div>
            </div><!-- End Page Title -->

            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                    </div>
                    <table class="table datatable">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama UKM</th>
                                <th scope="col">Deskripsi</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($organizations as $organization)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $organization->ukm_name }}</td>
                                    <td>{{ $organization->deskripsi }}</td>
                                    <td>
                                        <div>
                                            <a href="{{ route('organization.show', $organization->id) }}"
                                                class="btn btn-primary btn-sm me-2 my-2">
                                                <i class="bi bi-eye"></i>
                                            </a>
                                            <a href="{{ route('organization.edit', $organization->id) }}"
                                                class="btn btn-warning btn-sm me-2 my-2">
                                                <i class="bi bi-pencil-square"></i>
                                            </a>
                                            <button type="button" class="btn btn-danger btn-sm my-2" data-bs-toggle="modal"
                                                data-bs-target="#ModalDeleteDetailSkill{{ $organization->id }}">
                                                <span class="btn-label">
                                                    <i class="bi bi-trash"></i>
                                                </span>
                                            </button>

                                            {{-- modal delete --}}
                                            <div class="modal fade" id="ModalDeleteDetailSkill{{ $organization->id }}"
                                                tabindex="-1"
                                                aria-labelledby="ModalDeleteDetailSkill{{ $organization->id }}Label"
                                                aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title"
                                                                id="ModalDeleteDetailSkill{{ $organization->id }}Label">
                                                                Apakah anda yakin menghapus UKM
                                                                "{{ $organization->ukm_name }}"?
                                                            </h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Cancel</button>
                                                            {{-- Delete button --}}
                                                            <form
                                                                action="{{ route('organization.destroy', $organization->id) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-labeled btn-danger">
                                                                    Hapus
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!-- End Table with stripped rows -->
                </div>
            </div>
        </div>
        </div>
    </section>
@endsection
