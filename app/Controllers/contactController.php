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
        if (isset($_SESSION["user"])) {
            if (!empty($_POST)) {
                $data=Utilities::trimData($_POST) ;
                $data["user_id"]=$_SESSION["user"]["id"] ;
                $result=$this->contact_model->createContact($data) ;
                if ($result) {
                    //Contact ajouter avec succes
                    $success="Le contact a été ajouter dans la liste des contacts" ;
                }else{
                    $fail="Echec d'ajout du contact" ;
                }
            }else {
                //$fail="Veuillez remplir le formulaire svp" ;
            }
        }else {
            $fail="Connecter vous pour ajouter un contact à votre repertoire" ;
        }

        require "views/users/addContact.php" ; 
    }

    public function displayContact()
    {
        if (isset($_SESSION["user"])){
            $user_id=$_SESSION["user"]["id"] ;
            $result=$this->contact_model->getContactsUser($user_id) ;
            if ($result && sizeof($result) !== 0) {
                $contacts=$result ;
                // print_r($contacts); exit ;
            }else{
                $message="La liste des contacts est vide !!!" ;
            }
            require "views/users/listContact.php" ; exit ;
        }
        header("Location: /?route=login");
    }

    public function delete($contact_id)
    {
        if ($this->contact_model->deleteContact($contact_id)) {
            //contact supprimer
            header("Location: /") ;
        }else {
            //echec de suppression
        }
    }

    public function update($contact_id)
    {
        if (!empty($_POST)) {
            $data=Utilities::trimData($_POST) ;
            $dateTime=new Datetime() ;
            $dateTime=$dateTime->format("Y-m-d H:i:s") ;
            $data["updatedAt"]=$dateTime ;
            if ($this->contact_model->updateContact($contact_id,$data)) {
                //mise à jour reussie
                header("Location: /") ; exit ; 
            }else {
                //echec du mise à jour
            }
        }
        $contact=$this->contact_model->getContactsById($contact_id) ;
        require "views/users/updateContact.php" ;
    }

    public function searchContact()
    {
        if (!empty($_POST)) {
            $_POST=Utilities::trimData($_POST) ;
            $selectValue=$_POST["get_by"] ;
            $search=$_POST["search"] ;
            $contacts=$this->contact_model->getContactBy_($selectValue,$search) ;
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