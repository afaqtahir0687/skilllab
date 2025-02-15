<nav class="navbar navbar-expand border-bottom bg-white navbar-light sticky-top px-4 py-0"
style="height: 80px">
<a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
    <h2 class="text-primary mb-0">LOGO</h2>
</a>
<a href="#"
    class="sidebar-toggler text-decoration-none flex-shrink-0 align-items-center d-inline-flex">
    <i class="fa fa-bars"></i>
</a>
{{-- <form class="d-none d-md-flex ms-4">
    <select class="form-control form-select rounded-5">
        <option>Select Warehouse</option>
        <option>Warehouse 1</option>
        <option>Warehouse 2</option>
        <option>Warehouse 3</option>
    </select>
    <!-- <input class="form-control border-0" type="search" placeholder="Search"> -->
</form> --}}
<div class="navbar-nav align-items-center ms-auto">
    <div class="nav-item dropdown">
        <a href="#" class="nav-link" data-bs-toggle="dropdown">
            <i class="fa fa-bell align-items-center d-inline-flex"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
            <a href="#" class="dropdown-item">
                <h6 class="fw-normal mb-0">Profile updated</h6>
                <small>15 minutes ago</small>
            </a>
            <hr class="dropdown-divider" />
            <a href="#" class="dropdown-item">
                <h6 class="fw-normal mb-0">New user added</h6>
                <small>15 minutes ago</small>
            </a>
            <hr class="dropdown-divider" />
            <a href="#" class="dropdown-item">
                <h6 class="fw-normal mb-0">Password changed</h6>
                <small>15 minutes ago</small>
            </a>
            <hr class="dropdown-divider" />
            <a href="#" class="dropdown-item text-center">See all notifications</a>
        </div>
    </div>
    <div class="nav-item dropdown">
        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
            <img class="rounded-circle me-lg-2" src="{{ asset('assets/img/afaq.jpg') }}" alt=""
                style="width: 50px; height: 50px" />
        </a>
        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
            <a href="{{ url('profile') }}" class="dropdown-item">
                <i class="fa-solid fa-user"></i> &nbsp; My Profile
            </a>
             <a href="#" class="dropdown-item"> <i class="fa-solid fa-gear"></i> &nbsp; Settings</a>
            <a href="{{ url('logout') }}" class="dropdown-item"><i class="fa-solid fa-right-from-bracket"></i> &nbsp; Log Out</a>
        </div>
    </div>
</div>
</nav>