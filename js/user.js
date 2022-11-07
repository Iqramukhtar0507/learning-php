$(document).ready(function(){
$('#user').on('submit', function(e){
    e.preventDefault();
    let dataPack = new FormData(this);

        $.ajax({
        type: "POST",
        url: "action/user.php",
        data: dataPack,
        contentType:false,
        processData:false,
        success: function (response) {
            alert(response)
            $('#user').trigger('reset');
            if(jQuery.trim(response)==="successfull"){
                $("#user-table").html(response); 
        }
            
        }
        });
        
});
//update Data
$('#updateuser').on('submit', function (e) {
    e.preventDefault();
    let formData = $(this).serialize();
    $.ajax({
        type: "POST",
        url: "action/user.php",
        data: formData,
        success: function (response) {

            if (jQuery.trim(response) === "successfull") {
                document.getElementById('responseOfUser').innerHTML = `<div class="alert alert-success" role="alert">
               user Updated
              </div>`;
                setTimeout(() => {
                    window.location.href = 'table-user.php';
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
        url: "action/user.php",
        data: showData,
        success: function (response) {
            $("#tableShowuser").html(response);
        }

    });
} 
//delete data
function deleteData(delData){

    let getdelId = delData.getAttribute('data-del_Id')
    $.ajax({
        type: "POST",
        url: "action/user.php",
        data:{sendingDelId:getdelId},
        
        success: function (response) {
            
            if(jQuery.trim(response)==="successfull"){
                alert(response);
                window.location.href = 'table-user.php';
        }
    }
    });

}
