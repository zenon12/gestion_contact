<?php require 'templates/header.php'; ?>


<div class="container-profil">
    <div class="profil-edit">
         <h2>Modifier vos informations personnelles</h2>
    </div>
    <div class="edit-form">
        <form action="" method="post">

            <div class="form-row flex column">
                <label for="">Prenom</label>
                <input type="text" name="first_name" value="<?php echo $_SESSION["user"]["first_name"] ?>" required>
            </div>
            <div class="form-row flex column">
                <label for="">Nom</label>
                <input type="text" name="last_name" value="<?php echo $_SESSION["user"]["last_name"] ?>" required>
            </div>
            <div class="form-row flex column">
                <label for="">Email</label>
                <input type="email" name="email" value="<?php echo $_SESSION["user"]["email"] ?>" required>
            </div>
            <div class="form-row flex column">
                <label for="">Telephone</label>
                <input type="text" name="phone" value="<?php echo $_SESSION["user"]["phone"] ?>" required>
            </div>
            <div class="form-row flex column">
                <label for="">Description</label>
                <textarea name="description" id="description"
                 cols="30" rows="10"><?php echo isset($_SESSION["user"]["description"]) ? $_SESSION["user"]["description"] : "" ?></textarea>
            </div>
            <div class="form-btn">
                <button type="submit" class="">
                    Confirmer
                </button>
            </div>
        </form>
    </div>
    
</div>






<?php require 'templates/footer.php'; ?>