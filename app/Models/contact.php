<?php


  class contact
  {
      private $pdo ;

      function __construct($pdo)
      {
           $this->pdo=$pdo ;
      }

      function createContact($data)
      { if (Utilities::checkEmail($data["email"],"contacts",$this->pdo)) {
            $error="cet email est dejà associer à un contact existant." ;
            require "views/users/addContact.php" ; exit ;
        }

        $sql="INSERT INTO contacts (user_id,first_name,last_name,email,
           phone,adresse,description) VALUES 
           (:user_id,:first_name,:last_name,:email,:phone,:adresse,:description)" ;
         $stmt=$this->pdo->prepare($sql) ;
         return $stmt->execute($data) ;
      }

      function getContactsUser($user_id)
      {
          $stmt = $this->pdo->prepare("SELECT * FROM contacts WHERE user_id=:user_id");
          $stmt->execute(['user_id' => $user_id]);
          return $stmt->fetchAll(PDO::FETCH_ASSOC);
      }

      function getContactsById($contact_id,$table)
      {   $sql="SELECT * FROM ".$table ;
          $stmt = $this->pdo->prepare($sql." WHERE id=:id");
          $stmt->execute(['id' => $contact_id]);
          return $stmt->fetch(PDO::FETCH_ASSOC);
      }
     
      function updateContact($contact_id,$data,$table)
      { $sql="UPDATE ".$table ;
        $sql.=" SET
          first_name=:first_name,
          last_name=:last_name,
          email=:email,
          phone=:phone,
          adresse=:adresse,
          description=:description 
          WHERE id=:id" ;
          $data['id']=$contact_id ;
        $stmt=$this->pdo->prepare($sql) ;
        return $stmt->execute($data) ;
      }

      function deleteContact($contact_id,$table)
      {  $sql="DELETE FROM ".$table ;
         $sql.=" WHERE id=:id" ;
         $stmt=$this->pdo->prepare($sql) ;
         return $stmt->execute(array("id"=>$contact_id)) ;
      }

      function getContactBy_($selectValue,$search,$table)
      { $sql="SELECT * FROM ".$table ;
        switch ($selectValue) {
          case 'Prenom':
            $stmt = $this->pdo->prepare($sql." WHERE first_name=:first_name");
            $stmt->execute(['first_name' => $search]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
            break;
          
          case 'Nom':
            $stmt = $this->pdo->prepare($sql." WHERE last_name=:last_name");
            $stmt->execute(['last_name' => $search]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
            break;
          
          case 'Email':
            $stmt = $this->pdo->prepare($sql." WHERE email=:email");
            $stmt->execute(['email' => $search]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
            break;
          
          case 'Telephone':
            $stmt = $this->pdo->prepare($sql." WHERE phone=:phone");
            $stmt->execute(['phone' => $search]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
            break;
          
          default:
            header("Location: /") ;
            break;
        }
      }

       /**
       * La table external contact 
       */
      function getExternalContacts()
      {
          $stmt = $this->pdo->prepare("SELECT * FROM external_contacts");
          $stmt->execute();
          return $stmt->fetchAll(PDO::FETCH_ASSOC);
      }

      function createExternalContact($data)
      {  if (Utilities::checkEmail($data["email"],"external_contacts",$this->pdo)) {
            $error="cet email est dejà associer à un contact existant." ;
            require "views/users/addContact.php" ; exit ;
        }
        $sql="INSERT INTO external_contacts (first_name,last_name,email,
           phone,adresse,description) VALUES 
           (:first_name,:last_name,:email,:phone,:adresse,:description)" ;
         $stmt=$this->pdo->prepare($sql) ;
         return $stmt->execute($data) ;
      }

  }
?>