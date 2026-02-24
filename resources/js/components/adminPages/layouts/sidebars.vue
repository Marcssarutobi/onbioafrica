<template>
  
  <div class="sidenav-menu">
    <!-- Brand Logo -->
    <RouterLink to="/admins" class="logo">
        <span class="logo logo-light">
            <span class="logo-lg"><img src="/admin/assets/images/logos/logoW.png" height="50" style="height: 50px !important;" alt="logo" /></span>
            <span class="logo-sm"><img src="/admin/assets/images/logos/logoW.png" height="50" style="height: 50px !important;" alt="small logo" /></span>
        </span>

        <span class="logo logo-dark">
            <span class="logo-lg"><img src="/admin/assets/images/logos/logoW.png" height="50" style="height: 50px !important;" alt="dark logo" /></span>
            <span class="logo-sm"><img src="/admin/assets/images/logos/logoW.png" height="50" style="height: 50px !important;" alt="small logo" /></span>
        </span>
    </RouterLink>

    <!-- Sidebar Hover Menu Toggle Button -->
    <button class="button-on-hover">
        <span class="btn-on-hover-icon"></span>
    </button>

    <!-- Full Sidebar Menu Close Button -->
    <button class="button-close-offcanvas">
        <i class="ti ti-menu-4 align-middle"></i>
    </button>

    <div class="scrollbar" data-simplebar="">
        <div id="user-profile-settings" class="sidenav-user" style="background: url(/admin/assets/images/user-bg-pattern.svg)">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <a href="#!" class="link-reset">
                        <img src="/admin/assets/images/users/user-1.jpg" alt="user-image" class="rounded-circle mb-2 avatar-md" />
                        <span class="sidenav-user-name fw-bold">David Dev</span>
                        <span class="fs-12 fw-semibold" data-lang="user-role">Art Director</span>
                    </a>
                </div>
                <div>
                    <a class="dropdown-toggle drop-arrow-none link-reset sidenav-user-set-icon" data-bs-toggle="dropdown" data-bs-offset="0,12" href="#!" aria-haspopup="false" aria-expanded="false">
                        <i class="ti ti-settings fs-24 align-middle ms-1"></i>
                    </a>

                    <div class="dropdown-menu">
                        <!-- Header -->
                        <div class="dropdown-header noti-title">
                            <h6 class="text-overflow m-0">Welcome back!</h6>
                        </div>

                        <!-- My Profile -->
                        <a href="#!" class="dropdown-item">
                            <i class="ti ti-user-circle me-1 fs-lg align-middle"></i>
                            <span class="align-middle">Profile</span>
                        </a>

                        <!-- Settings -->
                        <a href="javascript:void(0);" class="dropdown-item">
                            <i class="ti ti-settings-2 me-1 fs-lg align-middle"></i>
                            <span class="align-middle">Account Settings</span>
                        </a>

                        <!-- Lock -->
                        <a href="auth-lock-screen.html" class="dropdown-item">
                            <i class="ti ti-lock me-1 fs-lg align-middle"></i>
                            <span class="align-middle">Lock Screen</span>
                        </a>

                        <!-- Logout -->
                        <a href="javascript:void(0);" class="dropdown-item text-danger fw-semibold">
                            <i class="ti ti-logout me-1 fs-lg align-middle"></i>
                            <span class="align-middle">Log Out</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!--- Sidenav Menu -->
        <div id="sidenav-menu">
            <ul class="side-nav">
                
                <li class="side-nav-item" :class="{ active: $route.path === '/admins' }">
                    <RouterLink to="/admins" class="side-nav-link">
                        <span class="menu-icon"><i class="fa-light fa-gauge"></i></span>
                        <span class="menu-text" data-lang="dashboards">Dashboard</span>
                    </RouterLink>
                </li>

                <li class="side-nav-item" :class="{ active: $route.path === '/admins/speaker' }">
                    <RouterLink to="/admins/speaker" class="side-nav-link">
                        <span class="menu-icon"><i class="fa-light fa-microphone"></i></span>
                        <span class="menu-text" data-lang="dashboards">Speaker</span>
                    </RouterLink>
                </li>

                <li class="side-nav-item" :class="{ active: $route.path === '/admins/program' }">
                    <RouterLink to="/admins/program" class="side-nav-link">
                        <span class="menu-icon"><i class="fa-light fa-calendar-days"></i></span>
                        <span class="menu-text" data-lang="dashboards">Program</span>
                    </RouterLink>
                </li>

                <li class="side-nav-item" :class="{ active: $route.path === '/admins/guest' }">
                        <RouterLink to="/admins/guest" class="side-nav-link">
                        <span class="menu-icon"><i class="fa-light fa-users"></i></span>
                        <span class="menu-text" data-lang="dashboards">Guest</span>
                    </RouterLink>
                </li>

                <li class="side-nav-item" :class="{ active: $route.path === '/admins/abstract' }">
                    <RouterLink to="/admins/abstract" class="side-nav-link">
                        <span class="menu-icon"><i class="fa-light fa-file-text"></i></span>
                        <span class="menu-text" data-lang="dashboards">Abstract</span>
                    </RouterLink>
                </li>

                <li class="side-nav-item" :class="{ active: $route.path === '/admins/travel' }">
                    <RouterLink to="/admins/travel" class="side-nav-link">
                        <span class="menu-icon"><i class="fa-light fa-plane"></i></span>
                        <span class="menu-text" data-lang="dashboards">Travel</span>
                    </RouterLink>
                </li>

                <li class="side-nav-item" :class="{ active: $route.path === '/admins/sponsor' }">
                    <RouterLink to="/admins/sponsor" class="side-nav-link">
                        <span class="menu-icon"><i class="fa-light fa-handshake-simple"></i></span>
                        <span class="menu-text" data-lang="dashboards">Sponsor</span>
                    </RouterLink>
                </li>   

                <li class="side-nav-item" :class="{ active: $route.path === '/admins/comite' }">
                    <RouterLink to="/admins/comite" class="side-nav-link">
                        <span class="menu-icon"><i class="fa-light fa-user-hat-tie"></i></span>
                        <span class="menu-text" data-lang="dashboards">Comite</span>
                    </RouterLink>
                </li>

                <li class="side-nav-item" :class="{ active: $route.path === '/admins/user' }">
                    <RouterLink to="/admins/user" class="side-nav-link">
                        <span class="menu-icon"><i class="fa-light fa-user"></i></span>
                        <span class="menu-text" data-lang="dashboards">Users</span>
                    </RouterLink>
                </li>

            </ul>
        </div>
    </div>
</div>

</template>

<script>
export default {

}
</script>

<style>

</style>