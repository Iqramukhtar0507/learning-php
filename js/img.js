$(document).ready(function(){
$("#user_form").on("submit",function(e){
  e.preventDefault();
  
  let formData = new FormData(this);
  $.ajax({
    type: "POST",
    url: "action/img.php",
    data: formData,
    contentType: false,
    processData: false,
    success: function (response) {
      $("#img_preview").html(response);
      $("#upload_file").val('');
    }
  });
});
//delete image
$(document).on("click","#delete_btn", function(){
  if(confirm("are you sure you want to delete image?")){
    var path = $("#delete_btn").data("path");
    $.ajax({
      type: "POST",
      url: "action/img.php",
      data: "data",
      dataType: {path: path},
      success: function (response) {
        alert("ok")
        if(response !=''){
          $("#img_preview").html('');
        }
      }
    });
  }
});
});

