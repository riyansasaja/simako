<!-- Bootstrap core JavaScript-->
<script src="<?= base_url('assets/') ?>vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url('assets/') ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url('assets/') ?>vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url('assets/') ?>js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="<?= base_url('assets/') ?>vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/') ?>vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="<?= base_url('assets/') ?>js/demo/datatables-demo.js"></script>


<!-- script tambahan khusus input program method -->
<script>
    $(document).ready(function() {

        tampil_data();

        // tampil program
        function tampil_data() {
            $.ajax({
                type: "GET",
                url: "<?php echo base_url() ?>/opd/get_kegiatan/",
                async: true,
                dataType: "json",
                success: function(data) {
                    let html = '';

                    $.each(data, function(i, d) {
                        html += ` <tr>
                            <td>${d.tujuan_pd}</td>
                            <td>${d.program}</td>
                            <td>${d.output_kegiatan}</td>
                            <td>
                            <a href="#" class="badge badge-pill badge-primary">Detail</a>
                            <a href="#" class="badge badge-pill badge-warning">Edit</a>
                            <a href="#" class="badge badge-pill badge-danger">Delete</a>
</td>
</tr>`;
                    });
                    $('#showdata').html(html);
                }
            });
        }
        //end program

        //add program
        $('#btn_simpan').on('click', function() {

            // tangkap hasil
            let tujuan_pd = $('#tujuan_pd').val();
            let sasaran_pd = $('#sasaran_pd').val();
            let program = $('#program').val();
            let kegiatan = $('#kegiatan').val();
            let output_kegiatan = $('#output_kegiatan').val();
            let tujuan_kegiatan = $('#tujuan_kegiatan').val();
            let sifat_kegiatan = $('#sifat_kegiatan').val();
            let unor_tujuan = $('#unor_tujuan').val();

            // validsi
            if (tujuan_pd == "") {
                alert('Tujuan PD Tidak Boleh Kosong');
                return;
            }
            if (sasaran_pd == "") {
                alert('Sasaran Perangkat Daerah Tidak Boleh Kosong');
                return
            }
            if (program == "") {
                alert('Program Tidak Boleh Kosong');
                return
            }
            if (kegiatan == "") {
                alert('Tujuan PD Tidak Boleh Kosong');
                return
            }
            if (output_kegiatan == "") {
                alert('Tujuan PD Tidak Boleh Kosong');
                return
            }
            if (tujuan_kegiatan == "") {
                alert('Tujuan PD Tidak Boleh Kosong');
            } else {
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url() ?>/opd/addkegiatan/",
                    dataType: "JSON",
                    cache: false,
                    data: {
                        tujuan_pd: tujuan_pd,
                        sasaran_pd: sasaran_pd,
                        program: program,
                        kegiatan: kegiatan,
                        output_kegiatan: output_kegiatan,
                        tujuan_kegiatan: tujuan_kegiatan,
                        sifat_kegiatan: sifat_kegiatan,
                        unor_tujuan: unor_tujuan
                    },
                    cache: false,
                    success: function(data) {
                        $('[name="tujuan_pd"]').val("");
                        $('[name="sasaran_pd"]').val("");
                        $('[name="program"]').val("");
                        $('[name="kegiatan"]').val("");
                        $('[name="output_kegiatan"]').val("");
                        $('[name="tujuan_kegiatan"]').val("");
                        $('[name="sifat_kegiatan"]').val("");
                        $('[name="unor_tujuan"]').val("");
                        $('#addModal').modal('hide');
                        tampil_data();
                    }
                });
                return false;
            }

        });
        //end add program



    });
</script>