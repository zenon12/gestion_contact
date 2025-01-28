<?php require 'templates/header.php'; ?>


<div class="addContact">
  <div class="contact-message success"><?php echo isset($success)? $success :"" ?></div>
  <div class="contact-message fail"><?php echo isset($fail)? $fail :"" ?></div>
  <form action="" method="post">
  
    <div class="form-row flex column">
      <label>Prénom:</label>
      <input type="text" name="first_name"
      value="<?php echo isset($_POST["first_name"])? $_POST["first_name"] :"" ?>" required>
    </div>
    <div class="form-row flex column">
      <label>Nom:</label>
      <input type="text" name="last_name"
      value="<?php echo isset($_POST["last_name"])? $_POST["last_name"] :"" ?>" required>
    </div>
    <div class="form-row flex column">
      <label>Email:</label>
      <input type="email" name="email"
      value="<?php echo isset($_POST["email"])? $_POST["email"] :"" ?>">
    </div>
    <div class="form-error"><?php echo isset($error)? $error :"" ?></div>
    <div class="form-row flex column">
      <label>Numero de telephone:</label>
      <input type="number" name="phone"
      value="<?php echo isset($_POST["phone"])? $_POST["phone"] :"" ?>" required>
    </div>
    <div class="form-row flex column">
      <label>Adresse:</label>
      <input type="text" name="adresse"
      value="<?php echo isset($_POST["adresse"])? $_POST["adresse"] :"" ?>">
    </div>
    <div class="form-row flex column">
      <label>Description:</label>
      <textarea name="description" id="description" cols="30" rows="10">
       <?php echo isset($_POST["description"])? $_POST["description"] :"" ?>
      </textarea>
    </div>
  
    <div class="form-row">
       <button type="submit" class="btn-submit">Ajouter un contact</button>
    </div>
    
  </form>
</div>







<?php require 'templates/footer.php'; ?>