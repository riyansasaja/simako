$(document).ready(function () {
    const path = 'http://localhost/simako/dashboard/';

    // ---tampil data table
    let showtable = $('#tableDashboard').DataTable( {
        "ajax": `${path}getdashboard`,
        "columns": [
            { 
                "data": null,"sortable": false, 
                 render: function (data, type, row, meta) {
                 return meta.row + meta.settings._iDisplayStart + 1;}  
            },
            { "data": "program" },
            { "data": "kegiatan" },
            { "data": "total1" },
            { "data": "total2" },
            { "data": "total3" },
            
        ]
    } );
    // ------


    
});



