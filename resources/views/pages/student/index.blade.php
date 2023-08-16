@extends('layouts.layout')

@section('content')
    <section class="section">
        <div class="row">
            <div class="pagetitle">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h1>Mahasiswa</h1>
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active">Mahasiswa</li>
                            </ol>
                        </nav>
                    </div>

                    <div class="pb-2">
                        <a href="{{ route('student.create') }}" class="btn btn-primary"><i class="bi bi-plus"></i>
                            Tambah Data</a>
                        <a href="{{ route('student.print') }}" target="_blank" class="btn btn-success"><i
                                class="bi bi-printer"></i>
                            Cetak Data</a>
                        <a href="{{ route('student.export') }}" target="_blank" class="btn btn-success"><i
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
                                <th scope="col">Nama</th>
                                <th scope="col">NIM</th>
                                <th scope="col">Tanggal Lahir</th>
                                <th scope="col">Alamat</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($students as $student)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $student->name }}</td>
                                    <td>{{ $student->nim }}</td>
                                    <td>{{ $student->ttl }}</td>
                                    <td>{{ $student->alamat }}</td>
                                    <td>
                                        <div>
                                            <a href="{{ route('student.show', $student->id) }}"
                                                class="btn btn-primary btn-sm me-2 my-2">
                                                <i class="bi bi-eye"></i>
                                            </a>
                                            <a href="{{ route('student.edit', $student->id) }}"
                                                class="btn btn-warning btn-sm me-2 my-2">
                                                <i class="bi bi-pencil-square"></i>
                                            </a>
                                            <button type="button" class="btn btn-danger btn-sm my-2" data-bs-toggle="modal"
                                                data-bs-target="#ModalDeleteDetailSkill{{ $student->id }}">
                                                <span class="btn-label">
                                                    <i class="bi bi-trash"></i>
                                                </span>
                                            </button>

                                            {{-- modal delete --}}
                                            <div class="modal fade" id="ModalDeleteDetailSkill{{ $student->id }}"
                                                tabindex="-1"
                                                aria-labelledby="ModalDeleteDetailSkill{{ $student->id }}Label"
                                                aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title"
                                                                id="ModalDeleteDetailSkill{{ $student->id }}Label">
                                                                Apakah anda yakin menghapus Data Mahasiswa
                                                                "{{ $student->name }}"?
                                                            </h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Cancel</button>
                                                            {{-- Delete button --}}
                                                            <form action="{{ route('student.destroy', $student->id) }}"
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
