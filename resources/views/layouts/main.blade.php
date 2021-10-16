<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="user-id" content="{{ Auth::user()->id }}">

    <title>Dashboard</title>

    <!-- Custom fonts for this template-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('css/sb-admin.min.css') }}" rel="stylesheet">

</head>

<body id="page-top">
        <!-- Page Wrapper -->
        <div id="wrapper">

            <!-- Sidebar -->
            <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

                <!-- Nav Item - Dashboard -->
                <li class="nav-item active">
                    <a class="nav-link" href="/tickets-system/public/dashboard">
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span>Dashboard</span></a>
                </li>

                <!-- Divider -->
                <hr class="sidebar-divider">

                <!-- Nav Item - Knowledge Bases Collapse Menu -->
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseKB"
                        aria-expanded="true" aria-controls="collapseKB">
                        <i class="fas fa-fw fa-cog"></i>
                        <span>Knowledge Bases</span>
                    </a>
                    <div id="collapseKB" class="collapse" aria-labelledby="headingKB"
                        data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Knowledge Bases</h6>
                            <a class="collapse-item" href="/tickets-system/public/knowledge-bases">Knowledge Bases</a>
                            <a class="collapse-item" href="/tickets-system/public/categories">Categories</a>
                            <a class="collapse-item" href="/tickets-system/public/sub-categories">Sub Categories</a>
                        </div>
                    </div>
                </li>

                <!-- Nav Item - FAQ Collapse Menu -->
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFAQ"
                        aria-expanded="true" aria-controls="collapseFAQ">
                        <i class="fas fa-fw fa-wrench"></i>
                        <span>FAQ</span>
                    </a>
                    <div id="collapseFAQ" class="collapse" aria-labelledby="headingFAQ"
                        data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">FAQ</h6>
                            <a class="collapse-item" href="/tickets-system/public/faqs">FAQs</a>
                            <a class="collapse-item" href="/tickets-system/public/faq-categories">Categories</a>
                        </div>
                    </div>
                </li>

                <!-- Departments -->
                <li class="nav-item">
                    <a class="nav-link" href="/tickets-system/public/departments">
                        <span>Departments</span></a>
                </li>

                <!-- Priority -->
                <li class="nav-item">
                    <a class="nav-link" href="/tickets-system/public/priorities">
                        <span>Priority</span></a>
                </li>

                <!-- Nav Item - Tickets Collapse Menu -->
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTickets"
                        aria-expanded="true" aria-controls="collapseTickets">
                        <i class="fas fa-fw fa-wrench"></i>
                        <span>Tickets</span>
                    </a>
                    <div id="collapseTickets" class="collapse" aria-labelledby="headingTickets"
                        data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Tickets</h6>
                            <a class="collapse-item" href="/tickets-system/public/canned-messages">Canned Messages</a>
                            <a class="collapse-item" href="/tickets-system/public/tickets">All Tickets</a>
                            <a class="collapse-item" href="utilities-border.html">Unassigned Tickets</a>
                            <a class="collapse-item" href="utilities-border.html">Open Tickets</a>
                            <a class="collapse-item" href="utilities-border.html">Closed Tickets</a>
                        </div>
                    </div>
                </li>

                <!-- Customers -->
                <li class="nav-item">
                    <a class="nav-link" href="index.html">
                        <span>Customers</span></a>
                </li>

                <!-- Nav Item - Users Collapse Menu -->
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUsers"
                        aria-expanded="true" aria-controls="collapseUsers">
                        <i class="fas fa-fw fa-wrench"></i>
                        <span>Users</span>
                    </a>
                    <div id="collapseUsers" class="collapse" aria-labelledby="headingUsers"
                        data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Users</h6>
                            <a class="collapse-item" href="utilities-color.html">Roles</a>
                            <a class="collapse-item" href="/tickets-system/public/users">Users</a>
                        </div>
                    </div>
                </li>

                <!-- Nav Item - Settings Collapse Menu -->
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSettings"
                        aria-expanded="true" aria-controls="collapseSettings">
                        <i class="fas fa-fw fa-wrench"></i>
                        <span>Settings</span>
                    </a>
                    <div id="collapseSettings" class="collapse" aria-labelledby="headingSettings"
                        data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Settings</h6>
                            <a class="collapse-item" href="utilities-color.html">General Settings</a>
                            <a class="collapse-item" href="utilities-border.html">Language Settings</a>
                            <a class="collapse-item" href="utilities-border.html">API Settings</a>
                            <a class="collapse-item" href="utilities-border.html">Frontend Settings</a>
                            <a class="collapse-item" href="utilities-border.html">Ticket Settings</a>
                            <a class="collapse-item" href="utilities-border.html">Email Settings</a>
                            <a class="collapse-item" href="utilities-border.html">Email Templates</a>
                        </div>
                    </div>
                </li>
            </ul>
            <!-- End of Sidebar -->

            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">

                <!-- Main Content -->
                <div id="content">

                    <!-- Topbar -->
                    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                        <!-- Sidebar Toggle (Topbar) -->
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>

                        <!-- Topbar Navbar -->
                        <ul class="navbar-nav ml-auto">

                            <div class="topbar-divider d-none d-sm-block"></div>

                            <!-- Nav Item - User Information -->
                            <li class="nav-item dropdown no-arrow">
                                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span
                                        class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->name }}</span>
                                    <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
                                </a>
                                <!-- Dropdown - User Information -->
                                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                    aria-labelledby="userDropdown">
                                    <a class="dropdown-item" href="#">
                                        <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Settings
                                    </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>

                        </ul>

                    </nav>
                    <!-- End of Topbar -->

                    <!-- Begin Page Content -->
                    <div class="container-fluid">


                        @yield('content')


                    </div>
                    <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->

                <!-- Footer -->
                <footer class="sticky-footer bg-white">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                            <span>Copyright &copy; Your Website 2021</span>
                        </div>
                    </div>
                </footer>
                <!-- End of Footer -->

            </div>
            <!-- End of Content Wrapper -->

        </div>
        <!-- End of Page Wrapper -->

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>

        {{-- <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> --}}.

        <script src="{{ asset('js/app.js') }}"></script>

        {{-- <!-- Bootstrap core JavaScript-->
    <script src="{{ mix('js/app.js') }}"></script> <--------------doesn't work for some reason --}}

        <!-- Custom scripts for all pages-->
        <script src="{{ asset('js/sb-admin.min.js') }}"></script>
</body>

</html>
