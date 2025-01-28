<?php
   require_once "utilities.php" ;


class AuthController
{
    private $user_model ;

    public function __construct($user_model)
    {
        $this->user_model=$user_model ;
    }

    public function register()
    {   if (!empty($_POST)) {
           unset($_POST["confirm_password"]) ;
           //die($_POST["password"]) ;
           $_POST=Utilities::trimData($_POST) ;
            //var_dump($_POST) ;exit ;
           $result=$this->user_model->register($_POST) ;
           if ($result) {
               //success
               header("Location: /?route=login") ; exit ;
           }else {
               //fail
               $fail="Inscription échouée " ;
           }
        
        }
        require "views/auth/register.php" ;
    }

    public function login()
    {
        if (!empty($_POST)) {
            $email=$_POST["email"] ;
            $password=$_POST["password"] ;
            $user=$this->user_model->login($email,$password);
            if ($user) {
                unset($user["password"]) ;
                $_SESSION["user"]=$user ;
                header("Location: /") ; exit ;
            }else {
                $error="echec de connexion, veuillez réessayer" ;
            }
        }
        session_destroy() ; 
        require "views/auth/login.php" ;
    }

    public function logout()
    {
        session_destroy() ;
        header("Location: /?route=login") ;
        exit ; 
    }

    public function profile()
    {
        if (!isset($_SESSION["user"])) {
            require "views/auth/login.php" ; exit ;
        }
        require "views/auth/profile.php" ;
    }

    public function editProfile()
    {
        if (!isset($_SESSION["user"])) {
            require "views/auth/login.php" ; exit ;
        }
        if(!empty($_POST)){
            
            $data=Utilities::trimData($_POST) ;
            $dateTime=new Datetime() ;
            $dateTime=$dateTime->format("Y-m-d H:i:s") ;
            $data["updatedAt"]=$dateTime ;
            $userId=$_SESSION["user"]["id"] ;
            $_SESSION["user"]=$data ;
            $_SESSION["user"]["id"]=$userId ;
            $result=$this->user_model->updateProfile($userId, $data) ;
            if ($result) {
                header("Location: /?route=profile") ;  exit ;
            }
        }
        require "views/auth/edit_profile.php" ; exit ;
    }

    
}




?>