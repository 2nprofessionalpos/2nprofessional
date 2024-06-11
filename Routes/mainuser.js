$(document).ready(function() {

    $(".content-principal").load("../Views/welcome.php");   
    
    $("#viewuser").on('click', function(evento){
       evento.preventDefault();
         $(".content-principal").fadeIn(500).load("../Views/user/Formusermain.php");
    });

   $("#viewcustomer").on('click', function(evento){
      evento.preventDefault();
      $(".content-principal").fadeIn(500).load("../Views/customer/Formcustomermain.php");
   });

   $("#viewproduct").on('click', function(evento){
      evento.preventDefault();
      $(".content-principal").fadeIn(500).load("../Views/product/Formproductmain.php");
   });

   $("#vieworder").on('click', function(evento){
      evento.preventDefault();
      $(".content-principal").fadeIn(500).load("../Views/order/Formordermain.php");
   });
 
   $("#viewlogout").on('click', function(evento){
      evento.preventDefault();
      $(".content-principal").fadeIn(500).load("../Views/order/Logout.php");
      $(location).attr("href","../index.html");
   });
 
 });