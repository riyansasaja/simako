<script>
    let program = document.getElementById('program');
    program.addEventListener("click", function() {
        $('#resiko').empty();
        let id_tk = program.value;
        console.log(id_tk);
        $.ajax({
            type: "POST",
            url: "<?= base_url('bidang/cari_refrr') ?>",
            data: {
                id_tk: id_tk
            },
            dataType: "json",
            success: function(response) {
                $.each(response, function(i, val) {
                    console.log(val.resiko);
                    $('#resiko').append(`<option value="${val.id_refrr}">${val.resiko}</option>`);
                });
            }
        });
    });



    let resiko = document.getElementById('resiko');
    resiko.addEventListener("click", function() {
        const id_refrr = resiko.value;
        $.ajax({
            type: "POST",
            url: "<?= base_url('bidang/autofill/') ?>",
            data: {
                id_refrr: id_refrr
            },
            dataType: "JSON",
            success: function(response) {
                console.log(response);
                $.each(response, function(i, val) {
                    console.log(val.dampak);
                    document.getElementById('sebab').value = val.sebab;
                    document.getElementById('dampak').value = val.dampak;
                });

            }
        });
    });
</script>