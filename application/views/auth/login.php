<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login Page</title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url('assets/') ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url('assets/') ?>css/sb-admin-2.min.css" rel="stylesheet">

    <!-- costum css -->
    <link href="<?= base_url('assets/') ?>css/costum.css" rel="stylesheet">

    <link rel="shortcut icon" href="<?= base_url('assets/img/') ?>international.svg">

    <!-- css animation -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">

</head>

<body class="bg-gradient-secondary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="flash-data" data-flashdata='<?= $this->session->flashdata('message'); ?>'></div>

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row animate__animated animate__fadeIn animate__slow">
                            <div class="col-lg-6 d-none d-lg-block text-right">
                                <!-- gambar -->
                                <img style="width: 110%;" src="<?= base_url('assets/img/') ?>simako-bg-4.png" alt="login pict">
                            </div>
                            <div class="col-lg-6 bg-abu2">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-kedua judul">Selamat Datang</h1>
                                        <p class="mb-4 small">Silahkan Login untuk mengakses SIMAKO </p>
                                    </div>
                                    <form method="POST" action="" class="user">
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Email Address..." name="email" required autofocus>
                                            <?= form_error('email', '<p class="text-danger text-center small">', '</p'); ?>

                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password" name="password" required>
                                            <?= form_error('password', '<p class="text-danger text-center small">', '</p'); ?>
                                        </div>

                                        <div class="form-group">
                                            <label for="tahunanggaran">Tahun Anggaran</label>
                                            <select class="form-control" id="tahunanggaran">
                                                <option selected>2021</option>
                                                <option>2022</option>
                                            </select>
                                        </div>


                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Ingat Saya</label>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-block btn-user bg-kedua text-white">Login</button>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="#!" id="forgotPassword">Lupa Password?</a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url('assets/') ?>vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url('assets/') ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url('assets/') ?>vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url('assets/') ?>js/sb-admin-2.min.js"></script>

    <!-- sweet alert2 -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <script>
        //script untuk tombol forgot password
        $('#forgotPassword').on('click', function(e) {
            e.preventDefault();
            Swal.fire('Hendak Reset Password ?',
                'Silahkan Hubungi Admin Asda!!'
            );
        });

        //script untuk tampilan flash data
        const flashdata = $('.flash-data').data('flashdata');
        //jika ada flash data
        if (flashdata) {
            //tampilkan swal
            Swal.fire({
                icon: 'warning',
                title: flashdata,
                showConfirmButton: false,
                timer: 2000
            })
        }
    </script>



</body>

</html>