<?php

/*connection to all database
 *
 *  use new pdo connection 
 * 
 *  */

function bdd(){
    
    
         try
        {
	     
            $pdo_options[PDO::ATTR_ERRMODE]= PDO::ERRMODE_EXCEPTION;
            $bdd = new PDO('mysql:host=localhost;dbname=scolarys','root','',$pdo_options);
             
       } 
       catch(Exception $e)
        {
              die('Erreur : '.$e->getMessage());
        }

        return $bdd;

}
