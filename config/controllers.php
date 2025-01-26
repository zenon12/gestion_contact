<?php

 require "app/Controllers/authController.php" ;
 require "app/Controllers/contactController.php" ;
 require "app/Controllers/userController.php" ;
 
 //Initialisation des controllers

 $authController= new AuthController($userModel) ;
 $contactController=new contactController($userContact) ;

?>