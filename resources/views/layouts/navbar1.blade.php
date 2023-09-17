<style>
    #palet{
        color: #222831;
        color: #393E46;
        color: #00ADB5;
        color: #EEEEEE;
        color: #EB5353;
        color: #F9D923;
        color: #36AE7C;
        color: #187498;
    }
    .navbarku{
        background-color: #222831;
    }
    .bi-nav{
        color: #00ADB5
    }
    .nav-link {
        color: #EEEEEE
    }
    .nav-link:hover {
        color: #71757c
    }
    .nav-link:focus {
        color: #EEEEEE
    }
</style>


<div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 navbarku position-fixed shadow-lg" style="height: 100vh; overflow-y: auto;">
    <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
        <a href="{{ route('dashboards.index') }}" class="d-flex align-items-center pb-3 mt-4 mb-md-0 me-md-auto text-white text-decoration-none">
            <img src="{{ asset('storage/logo/LogoOnly2.png')}}" class="ms-3" alt="Logo" style="width:150px"><br><br>
        </a>
        {{-- NAV ITEM --}}
        <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
            <li class="nav-item">
                <a href="{{ route('dashboards.index') }}" class="nav-link align-middle px-0">
                    <i class="fs-4 bi bi-house-fill bi-nav"></i> <span class="ms-1 d-none d-sm-inline"></span>Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('suppliers.index') }}" class="nav-link px-0 align-middle">
                    <i class="fs-4 bi bi-dropbox bi-nav"></i> <span class="ms-1 d-none d-sm-inline"></span>Supplier
                </a>
            </li>
            <li class="nav-item">
                <a href="#submenu2" data-bs-toggle="collapse" class="nav-link px-0 align-middle " >
                    <i class="fs-4 bi bi-person-fill bi-nav"></i> <span class="ms-1 d-none d-sm-inline"></span>Karyawan <i class="bi-caret-down-fill align-middle bi-nav"></i>
                </a>
                <ul class="collapse nav flex-column ms-1 " id="submenu2" data-bs-parent="#menu">
                    <li class="w-100">
                        <a href="{{ route('absensis.index') }}" class="nav-link px-0 ps-2">
                            <span class="d-none d-sm-inline submenu-toggle"><i class="bi bi-caret-right bi-nav"></i> </span> Absensi
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('onproses.index') }}" class="nav-link px-0 ps-2">
                            <span class="d-none d-sm-inline submenu-toggle"><i class="bi bi-caret-right bi-nav"></i> </span> Onproses
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('gajis.index') }}" class="nav-link px-0 ps-2">
                            <span class="d-none d-sm-inline submenu-toggle"><i class="bi bi-caret-right bi-nav"></i> </span> Gaji
                        </a>
                    </li>

                </ul>
            </li>

            <li class="nav-item">
                <a href="{{ route('incomes.index') }}" class="nav-link px-0 align-middle">
                    <i class="fs-4 bi bi-cash-coin bi-nav"></i> <span class="ms-1 d-none d-sm-inline"></span>Incomes</a>
            </li>
        </ul>
        {{-- NAV ITEM --}}
        <hr>
        <div class="dropdown pb-4">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                {{ Auth::user()->name }}
            </a>

            <div class="dropdown-menu dropdown-menu-dark dropdown-menu-end" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" style="color: #FFFFFF;" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                   <i class="bi bi-box-arrow-left fs-5 me-2"></i> LOGOUT
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </div>
    </div>
</div>
