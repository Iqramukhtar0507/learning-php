// 

$(document).ready(function () {
   
    console.log("");
    let dataTable = $("#expense-table").DataTable({
        "processing": true,
        "serverSide": true,
        "Order": [],
        "ajax" : {
        type : "POST",
        url: "action/calExpen.php",
        // data: "data",
        // dataType: "dataType",
        // success: function (response) {
        // }
        },
        drawCallback:function(setting){
        
            $('#total_expenses').html(setting.json.total);
        }
    
    });
});

