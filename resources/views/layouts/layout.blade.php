<!DOCTYPE html>
<html lang="en">

<!-- ======= Head ======= -->
@include('layouts.head')
<!-- End Head -->

<body>


    <!-- ======= Header ======= -->
    @include('layouts.header')
    <!-- End Header -->

    <!-- ======= Sidebar ======= -->
    @include('layouts.sidebar')
    <!-- End Sidebar-->


    <main id="main" class="main">

        @yield('content')

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    @include('layouts.footer')
    <!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>


    @include('layouts.script')
</body>

</html>
