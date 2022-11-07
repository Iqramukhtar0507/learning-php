$(document).ready(function(){
    $('#product').on('submit', function (e) {
        e.preventDefault();
        let dataPack = $(this).serialize();

        $.ajax({
            type: "POST",
            url: "action/product.php",
            data: dataPack,
            success: function (response) {
                alert(response)
                $('#product').trigger('reset');
                if (jQuery.trim(response) === "successfull") {
                    $("#product-table").html(response);
                }

            }
        });
    });
    //update form 
    $('#updateproduct').on('submit', function (e) {
        e.preventDefault();
        let formData = $(this).serialize();
        $.ajax({
            type: "POST",
            url: "action/product.php",
            data: formData,
            success: function (response) {

                if (jQuery.trim(response) === "successfull") {
                    document.getElementById('responseOfProduct').innerHTML = `<div class="alert alert-success" role="alert">
                   Product Updated
                  </div>`;
                    setTimeout(() => {
                        window.location.href = 'table-product.php';
                    }, 1500);
                }

            }
        });
    });


});

//display data
function displayData(showData) {
    $.ajax({
        type: "POST",
        url: "action/product.php",
        data: showData,
        success: function (response) {
            $("#tableShowprod").html(response);
        }

    });
}
//delete data
function deleteData(delData) {

    let getdelId = delData.getAttribute('data-del_Id')
    $.ajax({
        type: "POST",
        url: "action/product.php",
        data: { sendingDelId: getdelId },
        success: function (response) {
            if (jQuery.trim(response) === "successfull") {
                alert(response);
                window.location.href = 'table-product.php';
            }
        }
    });
}
