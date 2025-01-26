<?php
session_start();
require 'config/database.php';
require 'config/controllers.php';



// Routing basique
  $route = $_GET['route'] ?? 'home';
switch ($route) {
    // Routes d'authentification
  case 'login':
    $authController->login();
    break;
  case 'logout':
    $authController->logout();
    break;
  case 'register':
    $authController->register();
    break;
  case 'profile':
    $authController->profile();
    break;
  case 'editProfile':
    $authController->editProfile();
    break;
  // Routes pour la geston des contacts
  case 'add_contact':
    $contactController->addUserContact();
    break;
  case 'update':
    $contactController->update($_GET['id']);
    break;
  case 'delete':
    $contactController->delete($_GET['id']);
    break;
  case 'searchContact':
    $contactController->searchContact();
    break;
  
    // Route par défaut
  default:
    $contactController->displayContact();
}
