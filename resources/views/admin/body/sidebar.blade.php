<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Menu</li>

                <li>
                    <a href="{{ route('dashboard') }}" class="waves-effect">
                        <i class="ri-dashboard-line"></i><span class="badge rounded-pill bg-success float-end">3</span>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('cars.home') }}" class=" waves-effect">
                        <i class="ri-police-car-fill"></i>
                        <span>Kereta</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('officers.home') }}" class=" waves-effect">
                        <i class="mdi mdi-police-badge-outline"></i>
                        <span>Anggota</span>
                    </a>
                </li>
                
                <li>
                    <a href="{{ route('rosters.home') }}" class=" waves-effect">
                        <i class="ri-file-paper-line"></i>
                        <span>Jadual</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>