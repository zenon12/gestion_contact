<?php require 'templates/header.php'; ?>


<div class="addContact">
  <div class="contact-message success"><?php echo isset($success)? $success :"" ?></div>
  <div class="contact-message fail"><?php echo isset($fail)? $fail :"" ?></div>
  <form action="" method="post">
  
    <div class="form-row flex column">
      <label>Prénom:</label>
      <input type="text" name="first_name" required>
    </div>
    <div class="form-row flex column">
      <label>Nom:</label>
      <input type="text" name="last_name" required>
    </div>
    <div class="form-row flex column">
      <label>Email:</label>
      <input type="email" name="email">
    </div>
    <div class="form-row flex column">
      <label>Numero de telephone:</label>
      <input type="number" name="phone" required>
    </div>
    <div class="form-row flex column">
      <label>Adresse:</label>
      <input type="text" name="adresse">
    </div>
    <div class="form-row flex column">
      <label>Description:</label>
      <textarea name="description" id="description" cols="30" rows="10"></textarea>
    </div>
  
    <div class="form-row">
       <button type="submit" class="btn-submit">Ajouter un contact</button>
    </div>
    
  </form>
</div>







<?php require 'templates/footer.php'; ?>