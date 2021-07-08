$(document).ready(function () {
    const path = window.location.href;

    // ---tampil data table
    let table_dashboard = $('#table_dashboard').DataTable({
        "ajax": `${path}getdashboard`,
        "columns": [
            {
                "data": null, "sortable": false,
                render: function (data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1;
                }
            },
            { "data": "program" },
            { "data": "kegiatan" },
            { "data": "output" },
            { "data": "nilai_reskeg" }
        ],

        rowCallback: function (row, data, index) {
            if (data.nilai_reskeg > 3) {
                $('td', row).addClass('bg-warning text-white')
            }
            if (data.nilai_reskeg > 8) {
                $('td', row).addClass('bg-danger text-white')
            } else {
                $('td', row).addClass('bg-success text-white')
            }
        }
    });
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
                    labels: ['Risiko Rendah (1-3)', 'Risiko Sedang (3<R<9)', 'Risiko Tinggi (9-16)'],
                    datasets: [{
                        // label: '# of Votes',
                        data: [response.lowrisk, response.midlerisk, response.highrisk],
                        backgroundColor: [
                            'rgba(50, 168, 82, 0.5)',
                            'rgba(242, 181, 27, 0.5)',
                            'rgba(255, 99, 132, 0.5)'
                        ],
                        borderColor: [
                            'rgba(50, 168, 82, 1)',
                            'rgba(242, 181, 27, 1)',
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



