function openNav() {
    document.getElementById("menu").style.width = "250px";
}

function closeNav() {
    document.getElementById("menu").style.width = "0";
}

 $(function(){   
   $(".alert-message").delegate("a.close", "click", function(event) {
        event.preventDefault();
        $(this).closest(".alert-message").fadeOut(function(event){
            $(this).remove();
        });
    });
   });