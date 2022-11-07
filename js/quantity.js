$(document).ready(function(){
    $("#status").bootstrapToggle({
        on: 'Deactive',
        off: 'Active',
        onstyle: 'danger',
        offstyle: 'primary'  
    });

    $("#status").change(function(){
        if($(this).prop('checked')){
            $('#hidden_status').val('deactive');
        }else{
            $('#hidden_status').val('active');
        }
      
    });
   
    
    $('#quantity').on('submit', function (e) {
        e.preventDefault();
        if($('#hidden_status').val() !=''){
            let hidden_status = $('#hidden_status').val();
            let dataPack = $(this).serialize();

            $.ajax({
                type: "POST",
                url: "action/quantity.php",
                data: dataPack,
                success: function (response) {
                    alert(response)
                    $('#quantity').trigger('reset');
                    if (jQuery.trim(response) === "successfull") {
                       
                        $('#status').bootstrapToggle('on');
                        $("#quantity-table").html(response);
                        
                    }
    
                }
            });
        }

    });
});
function deleteData(delData){

    let getdelId = delData.getAttribute('data-del_Id')
    $.ajax({
        type: "POST",
        url: "action/quantity.php",
        data:{sendingDelId:getdelId},
        
        success: function (response) {
            
            if(jQuery.trim(response)==="successfull"){
                alert(response);
                window.location.href = 'table-quantity.php';
        }
    }
    });
}