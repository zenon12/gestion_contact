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
}

?>