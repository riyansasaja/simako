$(document).ready(function () {
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
});