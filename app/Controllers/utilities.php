<?php

class Utilities
{
    static public function trimData($tab)
    {   
        
        foreach ($tab as $key => $value) {
            $value=htmlspecialchars(trim($value)) ;
            $value=strip_tags($value) ;
            $tab[$key]=$value ;
        }

        return $tab ;
    }

    static public function checkEmail($email,$table,$pdo){
        $sql="SELECT * FROM ".$table." WHERE email=:email" ;
        try {
            $stmt=$pdo->prepare($sql) ;
            $stmt->execute(array("email"=>$email)) ;
            $data=$stmt->fetch(PDO::FETCH_ASSOC) ;
            if ($data) {
                return TRUE ;
            }else {
                return FALSE ;
            }
        } catch (PDOException $e) {
            return NULL ;
        }
    }
}

?>