$(document).ready(function () {
    $(".clickable-row").on('dblclick', function () {
        window.location = $(this).data("href");
    });
});