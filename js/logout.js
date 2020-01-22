$(document).on("click", ".logout", function(){
    $.ajax({
        url: 'php/ajax/usuario.php',
        type: 'POST',
         data: {
                metodo: "logout"            
              },
        cache: false,
        datatype: "json",
        error: function(jqXHR) {
            console.log(jqXHR.responseText, "Error");
        },
        success: function() {
            window.location.reload(1);
        },
    });
});