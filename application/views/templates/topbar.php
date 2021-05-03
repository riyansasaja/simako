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
                    <small class="text-primary">ADMIN <?= strtoupper($this->session->userdata('name')); ?></small>
                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"></span>
                                <i class="fas fa-fw fa-user-astronaut"></i>
                                <!-- <img class="img-profile rounded-circle" src=""> -->
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    My Profile
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="<?= base_url('auth/logout'); ?>" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
                        <div class="dropdown">
                            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm dropdown-toggle" data-toggle="dropdown"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>

                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <?php $role_id = $this->session->userdata['role_id']; ?>
                                <?php if ($role_id == 3) : ?>
                                    <a class="dropdown-item" href="<?= base_url('exportexcel/cetaktkbykodeunor/') . $this->session->userdata('id'); ?>">Cetak Program Kegiatan (excel)</a>
                                    <a class="dropdown-item" href="#">Cetak Program Kegiatan (pdf)</a>
                                    <a class="dropdown-item" href="<?= base_url('exportexcelrtp/cetakrtpbykodeunor/') . $this->session->userdata('id'); ?>">Cetak RTP (excel)</a>
                                    <a class="dropdown-item" href="#">Cetak RTP (pdf)</a>

                                    <a class="dropdown-item" href="#">Cetak Identifikasi dan Analis Resiko (Excel)</a>
                                    <a class="dropdown-item" href="#">Cetak Identifikasi dan Analis Resiko (pdf)</a>
                                    <a class="dropdown-item" href="#">Cetak Realisasi (Excel)</a>
                                    <a class="dropdown-item" href="#">Cetak Realisasi (pdf)</a>


                                <?php elseif ($role_id == 2) : ?>
                                    <a class="dropdown-item" href="<?= base_url('exportexcel/cetaktkbyid/') . $this->session->userdata('id'); ?>">Cetak Program Kegiatan (excel)</a>
                                    <a class="dropdown-item" href="#">Cetak Program Kegiatan (pdf)</a>
                                    <a class="dropdown-item" href="<?= base_url('exportexcelrtp/cetakrtpbyid/') . $this->session->userdata('id'); ?>">Cetak RTP (excel)</a>
                                    <a class="dropdown-item" href="#">Cetak RTP (pdf)</a>
                                    <a class="dropdown-item" href="<?= base_url('exportexcelhistoris/cetakhistorisbyid/') . $this->session->userdata('id'); ?>">Cetak Data Historis Resiko (Excel)</a>
                                    <a class="dropdown-item" href="#">Cetak Data Historis Resiko (pdf)</a>

                                <?php else : ?>
                                    <a class="dropdown-item" href="<?= base_url('exportexcel/cetaktkall/') ?>">Cetak Program Kegiatan (excel)</a>
                                    <a class="dropdown-item" href="#">Cetak Program Kegiatan (pdf)</a>
                                    <a class="dropdown-item" href="<?= base_url('exportexcelrtp/cetakrtpall/') ?>">Cetak RTP (excel)</a>
                                    <a class="dropdown-item" href="#">Cetak RTP (pdf)</a><a class="dropdown-item" href="<?= base_url('exportexcelhistoris/cetakhistorisall/') . $this->session->userdata('id'); ?>">Cetak Data Historis Resiko (Excel)</a>
                                    <a class="dropdown-item" href="#">Cetak Data Historis Resiko (pdf)</a>

                                <?php endif; ?>
                            </div>
                        </div>
                    </div>