<?php
$host = getenv('DB_HOST') ??  'localhost';
$dbname = getenv('DB_NAME') ??  'contact_db';
$username = getenv('DB_USER') ??  'root';
$password = getenv('DB_PASSWORD') ??  '';

try {
  $options = [
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8mb4',
  ];
  // print_r(array($host,$dbname,$password,$options)) ; exit() ; 
  $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password, $options);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
  die("Erreur de connexion : " . $e->getMessage());
}


require_once 'app/Models/User.php';
require_once 'app/Models/contact.php';

$userModel = new User($pdo);
$userContact = new contact($pdo);

