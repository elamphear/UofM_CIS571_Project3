<?php
   session_start();

   $login_session = $_SESSION['login_user'];
   
   $overall_price = $_SESSION['price'];
   
   $dttm = $_SESSION['dttm'];
   
   $final_destination = $_SESSION['destination'];
   $final_departure = $_SESSION['departure'];
   $final_leavedate = $_SESSION['leavedate'];
   $final_returndate = $_SESSION['returndate'];
   $final_airline = $_SESSION['airline'];
   $final_seattype = $_SESSION['seattype'];
   $final_rentalcar = $_SESSION['rentalcar'];
   $final_hotel = $_SESSION['hotel'];
   $final_meal = $_SESSION['meal'];
      
   if(!isset($_SESSION['login_user'])){
      header("location:index.php");
      die();
   }
?>