<?php
  require_once "utilities.php" ;


class contactController
{
    private $contact_model ;

    public function __construct($contact_model)
    {
        $this->contact_model=$contact_model ;
    }


    public function addUserContact()
    {
       
        if (!empty($_POST)) {
                $data=Utilities::trimData($_POST) ;
                if (isset($_SESSION["user"])) {
                    $data["user_id"]=$_SESSION["user"]["id"] ;
                    $result=$this->contact_model->createContact($data) ;
                }else {
                    
                    $result=$this->contact_model->createExternalContact($data) ;
                }
                if ($result) {
                    //Contact ajouter avec succes
                    $success="Le contact a été ajouter dans la liste des contacts" ;
                }else{
                    $fail="Echec d'ajout du contact" ;
                }
        }else {
                //$fail="Veuillez remplir le formulaire svp" ;
        }

        require "views/users/addContact.php" ; 
    }

    public function displayContact()
    {
        if (isset($_SESSION["user"])){
            $user_id=$_SESSION["user"]["id"] ;
            $result=$this->contact_model->getContactsUser($user_id) ;
        }else {
            $result=$this->contact_model->getExternalContacts() ;
        }
        if ($result && sizeof($result) !== 0) {
            $contacts=$result ;
            // print_r($contacts); exit ;
        }else{
            $message="La liste des contacts est vide !!!" ;
        }
        require "views/users/listContact.php" ; exit ;
        
    }

    public function delete($contact_id)
    {   if (isset($_SESSION["user"])) {
            $table="contacts" ;
         }else {
            $table="external_contacts" ;
         }
        if ($this->contact_model->deleteContact($contact_id,$table)) {
            //contact supprimer
            header("Location: /") ;
        }else {
            //echec de suppression
        }
    }

    public function update($contact_id)
    {   if (isset($_SESSION["user"])) {
                $table="contacts" ;
        }else{
                $table="external_contacts" ;
        }
        if (!empty($_POST)) {
            $data=Utilities::trimData($_POST) ;
            if ($this->contact_model->updateContact($contact_id,$data,$table)) {
                //mise à jour reussie
                header("Location: /") ; exit ; 
            }else {
                //echec du mise à jour
            }
        }
        $contact=$this->contact_model->getContactsById($contact_id,$table) ;
        require "views/users/updateContact.php" ;
    }

    public function searchContact()
    {
        if (!empty($_POST)) {
            $_POST=Utilities::trimData($_POST) ;
            $selectValue=$_POST["get_by"] ;
            $search=$_POST["search"] ;
            if (isset($_SESSION["user"])) {
                $table="contacts" ;
            }else {
                $table="external_contacts" ;
            }
            $contacts=$this->contact_model->getContactBy_($selectValue,$search,$table) ;
            // print_r($contacts) ; exit ;
            if ($contacts) {
                //found contact
                require "views/users/listContact.php" ;
            }else {
                //on n'a pas trouvé le contact
                
            }
        }
        
    }

    
}












?>