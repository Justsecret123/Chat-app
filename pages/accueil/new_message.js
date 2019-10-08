$(document).ready(function () {
  $("#form").submit(function(event) {
	event.preventDefault();
    $.post("search_user.php",$("#form").serialize(),function(data,status){
        //alert(data);
    if(data == "Cet utilisateur n'existe pas.")
        {alert(data);}
    else
    {$.post("new_conv.php",$("#form").serialize(),function(data,status){
        //alert(data);
        window.close();
    });}
            });
    });
    });
