    <aside
        class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark"
        id="sidenav-main">
        <div class="sidenav-header">
            <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
                aria-hidden="true" id="iconSidenav"></i>
            <a class="navbar-brand m-0" href=" https://demos.creative-tim.com/material-dashboard/pages/dashboard "
                target="_blank">
                <img src="../assets/img/employee.png" class="navbar-brand-img h-100" alt="main_logo">
                <span class="ms-1 font-weight-bold text-white">Employee Recording</span>
            </a>
        </div>
        <hr class="horizontal light mt-0 mb-2">
        <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
            <ul class="navbar-nav">
                <li class="nav-item mt-3">
                    <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Main
                    </h6>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white {{ Request::routeIs('dashboard') ? 'active bg-gradient-primary' : '' }}"
                        href="{{ route('dashboard') }}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">dashboard</i>
                        </div>
                        <span class="nav-link-text ms-1">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white {{ Request::routeIs('employeelist') ? 'active bg-gradient-primary' : '' }}"
                        href="{{ route('employeelist') }}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">badge</i>
                        </div>
                        <span class="nav-link-text ms-1">Employee List</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white {{ Request::routeIs('employeedit') ? 'active bg-gradient-primary' : '' }}"
                        href="{{ route('employeedit') }}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">edit_square</i>
                        </div>
                        <span class="nav-link-text ms-1">Employee Edit</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white {{ Request::routeIs('employeedetail') ? 'active bg-gradient-primary' : '' }}"
                        href="{{ route('employeedetail') }}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">info</i>
                        </div>
                        <span class="nav-link-text ms-1">Employee Detail</span>
                    </a>
                </li>

                <li class="nav-item mt-3">
                    <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Action
                    </h6>
                </li>
                <li class="nav-item">
                    <a id="loginLink" class="nav-link text-white" href="#">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">login</i>
                        </div>
                        <span class="nav-link-text ms-1">Login</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a id="registerLink" class="nav-link text-white" href="#">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">how_to_reg</i>
                        </div>
                        <span class="nav-link-text ms-1">Register</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="#"
                        onclick="event.preventDefault(); showLogoutConfirmation();">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">logout</i>
                        </div>
                        <span class="nav-link-text ms-1">Logout</span>
                    </a>
                    <form id="logout-form" method="POST" action="{{ route('logout') }}" style="display: none;">
                        @csrf
                    </form>
                </li>
                <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
                <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                <script>
                    $(document).ready(function() {
                        // Handle click event for Login link
                        $('#loginLink').on('click', function(event) {
                            event.preventDefault(); // Prevent default behavior of the link
                            Swal.fire({
                                title: "Login",
                                text: "You need to logout first to log in again.",
                                icon: "info",
                                showClass: {
                                    popup: `
                                    animate__animated
                                    animate__fadeInUp
                                    animate__faster
                                    `
                                },
                                hideClass: {
                                    popup: `
                                    animate__animated
                                    animate__fadeOutDown
                                    animate__faster
                                    `
                                }
                            });
                        });

                        // Handle click event for Register link
                        $('#registerLink').on('click', function(event) {
                            event.preventDefault(); // Prevent default behavior of the link
                            Swal.fire({
                                title: "Register",
                                text: "You need to logout first to register a new account.",
                                icon: "info",
                                showClass: {
                                    popup: `
                                    animate__animated
                                    animate__fadeInUp
                                    animate__faster
                                    `
                                },
                                hideClass: {
                                    popup: `
                                    animate__animated
                                    animate__fadeOutDown
                                    animate__faster
                                    `
                                }
                            });
                        });
                    });

                    function showLogoutConfirmation() {
                        Swal.fire({
                            title: "Are you sure?",
                            text: "You won't be able to revert this!",
                            icon: "warning",
                            showCancelButton: true,
                            confirmButtonColor: "#3085d6",
                            cancelButtonColor: "#d33",
                            confirmButtonText: "Yes, log me out!"
                        }).then((result) => {
                            if (result.isConfirmed) {
                                document.getElementById('logout-form').submit();
                            }
                        });
                    }
                </script>
            </ul>
        </div>
    </aside>
