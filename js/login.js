$(document).ready(function(){
	"use strict";
	$("#texte").hide();
	
	
	$("#111").change(function(){
 
  $.post("login.php",$("#form").serialize(),function(data,status){
	
  $("#texte").html(data);
  if( $("#texte").text() == "Ce nom d'utilisateur n'existe pas.")
		{$("#texte").css("cssText", "color: red;");}
   else 
       {$("#texte").css("cssText", "color: green;");}
		 <!-- alert($("#texte").css("color")); -->
	 });
	 
  });
  
  $( "#form" ).submit(function( event ) {
	 if($("#texte").text()=="Ce nom d'utilisateur n'existe pas.")
	 {alert("Veuillez saisir un nom d'utilisateur valide.");}
  });
    });