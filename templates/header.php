<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gestion Contacts</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" 
  crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="src/css/main.css">
</head>
<body>
  <header class="flex jcsb aic">
     <div class="logo">
        Gestion Contacts
     </div>
     <nav>
        <ul class="unlisted flex gap-10 jcc aic">
            <?php if(isset($_SESSION["user"])): ?>
            <li class="nav-item"><a href="/">Accueil</a></li>
            <li class="nav-item"><a href="/?route=profile">Profile</a></li>
            <li class="nav-item"><a href="/?route=logout">Deconnexion</a></li>
            <?php else : ?>
            <li class="nav-item"><a href="/?route=external_contact">Contacts</a></li>
            <li class="nav-item"><a href="/?route=add_contact">Ajouter contact</a></li>
            <li class="nav-item"><a href="/?route=register">Inscription</a></li>
            <li class="nav-item"><a href="/?route=login">Connexion</a></li>
            <?php endif ; ?>
        </ul>
     </nav>
  </header>

  <div class="container">
