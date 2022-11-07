$(document).ready(function(){
   
    $("#search").on("input", function(){
  
        let search_term = $(this).val()
          console.log(search_term)
        $.ajax({
            type: "POST",
            url: "action/ajax-live-search.php",
            data: {search:search_term},
            
            success: function (response) {
              
                $("#showsearch").html(response);
            }
        });
    });
});