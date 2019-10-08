$(document).ready(function(){
	"use strict";
	$("#texte").hide();
	$("#texte2").hide();
	
  $("#111").change(function(){
 
  $.get("subscribe_verif_login.php",$("#form").serialize(),function(data,status){
	
  $("#texte").html(data);
  if( $("#texte").text() == "Ce nom d'utilisateur est déjà pris." || $("#texte").text() == "Nom d'utilisateur invalide.")
		{$("#texte").css("cssText", "color: red !important;");}
		else
		{$("#texte").css("cssText", "color: green !important;");}
		 <!-- alert($("#texte").css("color")); -->
  $("#texte").show();
	 });
	 
  });
  
    $("#100").change(function(){
 
  $.get("subscribe_verif_email.php",$("#form").serialize(),function(data,status){
	
  $("#texte2").html(data);
  if( $("#texte2").text() == "Cette adresse email est déjà prise.")
		{$("#texte2").css("cssText", "color: red !important;");}
		else
		{$("#texte2").css("cssText", "color: green !important;");}
  $("#texte2").show();
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