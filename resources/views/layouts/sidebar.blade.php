<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link {{ Request()->routeIs('dashboard') ? '' : 'collapsed' }}" href="{{ route('dashboard') }}">
                <i class="bi bi-grid-1x2"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->

        <li class="nav-item">
            <a class="nav-link {{ Request()->routeIs('student.*') ? '' : 'collapsed' }}"
                href="{{ route('student.index') }}">
                <i class="bi bi-mailbox"></i>
                <span>Mahasiswa</span>
            </a>
        </li><!-- End User Nav -->
        
        <li class="nav-item">
            <a class="nav-link {{ Request()->routeIs('organization.*') ? '' : 'collapsed' }}"
                href="{{ route('organization.index') }}">
                <i class="bi bi-mailbox"></i>
                <span>UKM</span>
            </a>
        </li><!-- End User Nav -->

        <li class="nav-item">
            <a class="nav-link {{ Request()->routeIs('member.*') ? '' : 'collapsed' }}"
                href="{{ route('member.index') }}">
                <i class="bi bi-envelope-open"></i>
                <span>Anggota UKM</span>
            </a>
        </li><!-- End User Nav -->
    </ul>

</aside>
