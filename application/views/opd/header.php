<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?= $judul; ?></title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url('assets/') ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url('assets/') ?>css/sb-admin-2.min.css" rel="stylesheet">

    <!-- style for data table -->
    <link href="<?= base_url('assets/') ?>vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    <!-- costum css -->
    <link href="<?= base_url('assets/') ?>css/costum.css" rel="stylesheet">

</head>

<body>

    <!-- start nav -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
        <div class="container">
            <a class="navbar-brand" href="<?= base_url('opd/') ?>">SIMAKO</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ml-auto">
                    <a class="nav-link <?= $judul == 'Dashboard' ? 'active' : ''; ?>" href="<?= base_url('opd/') ?>">Dashboard <span class="sr-only">(current)</span></a>
                    <a class="nav-link <?= $judul == 'Input Program' ? 'active' : ''; ?>" href="<?= base_url('opd/input/') ?>">Input Program</a>
                    <a class="nav-link <?= $judul == 'Output' ? 'active' : ''; ?>" href="<?= base_url('opd/output/') ?>">Output</a>
                </div>
            </div>
            <!-- Example single danger button -->
            <div class="btn-group">
                <button type="button" class="btn btn-primary tombol dropdown-toggle ml-2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    User
                </button>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="<?= base_url('opd/adduser/') ?>">Add User</a>
                    <a class="dropdown-item" href="#">Detail</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?= base_url('auth/logout/') ?>">Logout</a>
                </div>
            </div>
        </div>
    </nav>
    <!-- end nav -->