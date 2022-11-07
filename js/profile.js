$(document).ready(function () {

    //insert data
    $('#addProfileForm').on('submit', function (e) {
        e.preventDefault();
        let formData = new FormData(this);
        console.log(formData)
        $.ajax({
            type: "POST",
            url: "action/profile-update.php",
            data: formData,
            contentType: false,
            processData: false,
            success: function (response) {
              alert(response)
                $('#profile-edit').trigger('reset');
                if (jQuery.trim(response) === "successfull") {
                    $("#profile-overview").html(response);
                }

            }
        });

    });

    //update form part 2
    $('#editProfileForm').on('submit', function (e) {
        e.preventDefault();
        let formData = $(this).serialize();
        $.ajax({
            type: "POST",
            url: "action/profile-update.php",
            data: formData,
            success: function (response) {
                if (jQuery.trim(response) === "successfull") {
                    alert(response)
                    document.getElementById('responseOfUpdate').innerHTML = `<div class="alert alert-success" role="alert">
                   Profile Updated
                  </div>`;
                  
                }

            }
        });
    });



});//jquery end
//display data
// function displayData(showData) {
//     $.ajax({
//         type: "POST",
//         url: "action/expenses.php",
//         data: showData,
//         success: function (response) {
//             alert(response)
//             // $("#tableShowexp").html(response);
//         }

//     });
// }

//delete data
function deleteData(delData) {

    let getdelId = delData.getAttribute('data-del_Id')
    $.ajax({
        type: "POST",
        url: "action/profile-update.php",
        data: { sendingDelId: getdelId },

        success: function (response) {
            if (jQuery.trim(response) === "successfull") {
                alert(response);
                //window.location.href = '#profile-overview';
            }

        }
    });
}
