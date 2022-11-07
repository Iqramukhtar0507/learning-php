$(document).ready(function(){
$('#sales').on('submit', function(e){
    e.preventDefault();

    let dataPack = new FormData(this);

        $.ajax({
        type: "POST",
        url: "action/sales.php",
        data: dataPack,
        contentType:false,
        processData:false,
        success: function (response) {
            alert(response)

            $('#sales').trigger('reset');
            if(jQuery.trim(response)==="successfull"){
                $("#sales-table").html(response); 
        }
            
        }
        });
})
//update Data
$('#updatesales').on('submit', function (e) {
        e.preventDefault();
        let formData = $(this).serialize();
        $.ajax({
            type: "POST",
            url: "action/sales.php",
            data: formData,
            success: function (response) {
                alert(response)
                if (jQuery.trim(response) === "successfull") {
                    document.getElementById('responseOfSales').innerHTML = `<div class="alert alert-success" role="alert">
                   Sales Updated
                  </div>`;
                    setTimeout(() => {
                        window.location.href = 'table-sales.php';
                    }, 1500);
                }

            }
        });
    });
});

//display data
function displayData(showData){
    $.ajax({
        type: "POST",
        url: "action/sales.php",
        data: showData,
        success: function (response) {
            $("#tableShowsale").html(response);
        }

    });
} 
//delete data
function deleteData(delData){

    let getdelId = delData.getAttribute('data-del_Id')
    $.ajax({
        type: "POST",
        url: "action/sales.php",
        data:{sendingDelId:getdelId},
        success: function (response) {
            
            if(jQuery.trim(response)==="successfull"){
                alert(response);
                window.location.href = 'table-sales.php';
        }
    }
    });
}
