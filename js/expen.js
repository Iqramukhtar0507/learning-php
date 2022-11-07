$(document).ready(function () {

    //insert data
    $('#expense').on('submit', function (e) {
        e.preventDefault();
        let dataPack = new FormData(this);

        $.ajax({
            type: "POST",
            url: "action/expenses.php",
            data: dataPack,
            contentType: false,
            processData: false,
            success: function (response) {
                alert(response)

                $('#expense').trigger('reset');
                if (jQuery.trim(response) === "successfull") {
                    $("#expense-table").html(response);
                }

            }
        });

    });

    //update form part 2
    $('#updateexpense').on('submit', function (e) {
        e.preventDefault();
        let formData = $(this).serialize();
        $.ajax({
            type: "POST",
            url: "action/expenses.php",
            data: formData,
            success: function (response) {

                if (jQuery.trim(response) === "successfull") {
                    alert(response)
                    document.getElementById('responseOfExpanse').innerHTML = `<div class="alert alert-success" role="alert">
                   Expanse Updated
                  </div>`;
                    setTimeout(() => {
                        window.location.href = 'table-expenses.php';
                    }, 1500);
                }

            }
        });
    });



});//jquery end
//display data
function displayData(showData) {
    $.ajax({
        type: "POST",
        url: "action/expenses.php",
        data: showData,
        success: function (response) {
            alert(response)
            // $("#tableShowexp").html(response);
        }

    });
}

//delete data
function deleteData(delData) {

    let getdelId = delData.getAttribute('data-del_Id')
    $.ajax({
        type: "POST",
        url: "action/expenses.php",
        data: { sendingDelId: getdelId },

        success: function (response) {
            if (jQuery.trim(response) === "successfull") {
                alert(response);
                window.location.href = 'table-expenses.php';
            }

        }
    });
}
