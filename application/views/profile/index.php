<div class="row">
    <div class="col-6">
        <div class="card animate__animated animate__fadeIn animate_slow">
            <div class="card-header">
                <h6><i class="far fa-fw fa-id-card"></i> Profile</h6>
            </div>
            <div class="card-body">
                <ul class="list-group">
                    <li class="list-group-item">
                        <small class="muted">Nama</small> <br>
                        <?php echo $user['name']; ?>
                    </li>
                    <li class="list-group-item">
                        <small class="muted">Email</small> <br>
                        <?php echo $user['email']; ?>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="col-6">
        <div class="card animate__animated animate__fadeIn animate_slower">
            <div class="card">
                <div class="card-header">
                    <h6><i class="fas fa-key"></i> Ganti Password</h6>
                </div>
                <div class="card-body">

                    <?= $this->session->flashdata('message'); ?>

                    <form action="" method="POST">
                        <div class="form-group">
                            <label for="oldPassword">Input Password Sekarang</label>
                            <input type="password" class="form-control" id="oldPassword" name="oldpassword" aria-describedby="oldPasswordHelp">
                            <?= form_error('oldpassword', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Input Password Baru</label>
                            <input type="password" class="form-control" id="exampleInputPassword1" name="newpassword1">
                            <?= form_error('newpassword1', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword2">Konfirmasi Password Baru</label>
                            <input type="password" class="form-control" id="exampleInputPassword2" name="newpassword2">
                            <?= form_error('newpassword2', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <button type="submit" class="btn btn-primary">Ganti Password</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


</div>