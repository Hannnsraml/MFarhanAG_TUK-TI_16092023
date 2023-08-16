<!DOCTYPE html>
<html lang="en">

<!-- ======= Head ======= -->
@include('layouts.head')
<!-- End Head -->

<body onload="window.print()">


    <!-- ======= Header ======= -->
    @include('layouts.header')
    <!-- End Header -->

    <!-- ======= Sidebar ======= -->
    {{-- @include('layouts.sidebar') --}}
    <!-- End Sidebar-->


    <main id="main" class="main">

        <section class="section">
            <div class="row">
                <div class="pagetitle">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h1>Surat Keluar</h1>
                            <nav>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                                    <li class="breadcrumb-item active">Surat Keluar</li>
                                </ol>
                            </nav>
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
                                    <th scope="col">No Surat</th>
                                    <th scope="col">Penerima</th>
                                    <th scope="col">Waktu</th>
                                    <th scope="col">Tempat</th>
                                    <th scope="col">Perihal</th>
                                    <th scope="col">Pengesah</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($surat_keluar as $sm)
                                    <tr>
                                        <td>{{ $sm->nomor }}</td>
                                        <td>{{ $sm->penerima }}</td>
                                        <td>{{ $sm->waktu }}</td>
                                        <td>{{ $sm->tempat }}</td>
                                        <td>{{ $sm->perihal }}</td>
                                        <td>{{ $sm->nama }}</td>
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

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    @include('layouts.footer')
    <!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>


    @include('layouts.script')
</body>

</html>
