$(document).ready(function(){
$('#vendor').on('submit', function(e){
    e.preventDefault();
    let dataPack = new FormData(this);

        $.ajax({
        type: "POST",
        url: "action/vendor.php",
        data: dataPack,
        contentType:false,
        processData:false,
        success: function (response) {
            alert(response)

            $('#vendor').trigger('reset');
            if(jQuery.trim(response)==="successfull"){
                $("#vendor-table").html(response); 
        }
            
        }
        });
})

//update Data
$('#updatevendor').on('submit', function (e) {
    e.preventDefault();
    let formData = $(this).serialize();
    $.ajax({
        type: "POST",
        url: "action/vendor.php",
        data: formData,
        success: function (response) {

            if (jQuery.trim(response) === "successfull") {
                document.getElementById('responseOfVendor').innerHTML = `<div class="alert alert-success" role="alert">
               Vendor Updated
              </div>`;
                setTimeout(() => {
                    window.location.href = 'table-vendor.php';
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
        url: "action/vendor.php",
        data: showData,
        success: function (response) {
            $("#tableShowvendor").html(response);
        }

    });
} 
//delete data
function deleteData(delData){

    let getdelId = delData.getAttribute('data-del_Id')
    $.ajax({
        type: "POST",
        url: "action/vendor.php",
        data:{sendingDelId:getdelId},
        
        success: function (response) {
            
            if(jQuery.trim(response)==="successfull"){
                alert(response);
                window.location.href = 'table-vendor.php';
        }
    }
    });
}
