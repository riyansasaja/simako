$(document).ready(function () {
    const path = window.location.href;

    // ---tampil data table
    let table_dashboard = $('#table_dashboard').DataTable( {
        "ajax": `${path}getdashboard`,
        "columns": [
            { 
                "data": null,"sortable": false, 
                 render: function (data, type, row, meta) {
                 return meta.row + meta.settings._iDisplayStart + 1;}  
            },
            { "data": "program" },
            { "data": "kegiatan" },
            { "data": "output" },
            { "data": "nilai_reskeg" }
            
        ]
    } );
    // ------

    // ambil get data

    $.ajax({
        type: "GET",
        url: `${path}getdashboard`,
        dataType: "json",
        success: function (response) {
            //chart
            var ctx = $('#programChart');
            var myChart = new Chart(ctx, {
            type: 'polarArea',
            data: {
                labels: ['Jumlah Program', 'Nilai Risiko Tinggi'],
                datasets: [{
                    // label: '# of Votes',
                    data: [response.totalrisk, response.highrisk],
                    backgroundColor: [
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 99, 132, 0.2)'
                    ],
                    borderColor: [
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 99, 132, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
        }
    });
  


    
});



