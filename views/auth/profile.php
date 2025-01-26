<?php require 'templates/header.php'; ?>

<?php 
      
 ?>

<div class="container-profil">
    <div class="profil-title">
         <h2>Profile</h2>
    </div>
    <div class="details">
         <div class="row flex gap-10">
            <label for="">Prenom:</label>
            <span><?php echo $_SESSION["user"]["first_name"] ?></span>
         </div>
         <div class="row flex gap-10">
            <label for="">Nom:</label>
            <span><?php echo $_SESSION["user"]["last_name"] ?></span>
         </div>
         <div class="row flex gap-10">
            <label for="">Email:</label>
            <span><a href=""><?php echo $_SESSION["user"]["email"] ?></a></span>
         </div>
         <div class="row flex gap-10">
            <label for="">Telephone:</label>
            <span><a tel=""><?php echo $_SESSION["user"]["phone"] ?></a></span>
         </div>
         <div class="row flex column">
            <label for="">Description:</label>
            <p><?php echo isset($_SESSION["user"]["description"]) ? $_SESSION["user"]["description"] : "" ?></p>
         </div>
         <div class="row-btn">
            <a href="/?route=editProfile">Modifier</a>
         </div>
    </div>
</div>






<?php require 'templates/footer.php'; ?>