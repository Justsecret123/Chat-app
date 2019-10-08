$(document).ready(function(){
	"use strict";
	$("#texte").hide();
	
  $("#111").change(function(){
 
  $.get("subscribe_verif.php",$("#form").serialize(),function(data,status){
	
  $("#texte").html(data);
  if( $("#texte").text() == "Ce nom d'utilisateur est déjà pris." || $("#texte").text() == "Nom d'utilisateur invalide.")
		{$("#texte").css("cssText", "color: red !important;");}
		else
		{$("#texte").css("cssText", "color: green !important;");}
		 <!-- alert($("#texte").css("color")); -->
  $("#texte").show();
	 });
	 
  });

	$( "#form" ).submit(function( event ) {
	if($("#115").val() != $("#114").val())
	{ alert("Les mots de passe ne correpsondent pas.");
	 event.preventDefault();}
	 if($("#texte").css("color") == 'rgb(255, 0, 0)')
	 {alert("Veuillez changer de nom d'utilisateur.");
	 event.preventDefault();}
	return;
});
});