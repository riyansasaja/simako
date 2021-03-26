const path = 'http://localhost/simako/dashboard/';
$('#tableDashboard').DataTable();

//ambil json
$.getJSON("http://localhost/simako/dashboard/getdashboard", function (e) {
      // looping
    let x = 1;
    $.each(e.data, function (i, val) { 
        // console.log(val);
        
       
        $('#dashboardisi').html(`
                <tr>
                    <td>${x}</td>
                    <td>${val.program}</td>
                    <td>${val.totalskor}</td>
                </tr>
        
        `);
        x++
       
         
    });


    });