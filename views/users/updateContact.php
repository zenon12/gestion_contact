<?php require 'templates/header.php'; ?>
<?php 
   if (!isset($contact)) {
      $contact=array(
        "first_name"=>"",
        "last_name"=>"",
        "email"=>"",
        "adresse"=>"",
        "description"=>""
      ) ;
   }
 ?>

<div class="addContact updateContact">
  <form action="" method="post">
  
    <div class="form-row flex column">
      <label>Prénom:</label>
      <input type="text" name="first_name" value="<?php echo $contact["first_name"] ?>" required>
    </div>
    <div class="form-row flex column">
      <label>Nom:</label>
      <input type="text" name="last_name" value="<?php echo $contact["last_name"] ?>" required>
    </div>
    <div class="form-row flex column">
      <label>Email:</label>
      <input type="email" name="email" value="<?php echo $contact["email"] ?>">
    </div>
    <div class="form-row flex column">
      <label>Numero de telephone:</label>
      <input type="number" name="phone" value="<?php echo $contact["phone"] ?>" required>
    </div>
    <div class="form-row flex column">
      <label>Adresse:</label>
      <input type="text" name="adresse" 
      value="<?php echo isset($contact["adresse"]) ? $contact["adresse"] : "" ?>">
    </div>
    <div class="form-row flex column">
      <label>Description:</label>
      <textarea name="description" id="description" cols="30" rows="10">
      <?php echo isset($contact["description"]) ? $contact["description"] : "" ?>
      </textarea>
    </div>
  
    <div class="form-row">
       <button type="submit" class="btn-submit">Confirmer</button>
    </div>
    
  </form>
</div>







<?php require 'templates/footer.php'; ?>