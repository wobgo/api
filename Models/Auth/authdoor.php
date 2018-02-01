<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


//convert rawdata to json


header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');



require './auth.php';

$d = array();

 //$_POST['login']='testuel';$_POST['pd']='testuel';


$content = file_get_contents("php://input");

$content =  utf8_encode($content);

if(isset($content)){

//Attempt to decode the incoming RAW post data from JSON.
$decoded = json_decode($content);

   $usrlogin = $decoded->login;

   $pd   =   $decoded->password;


if(isset($usrlogin) && isset($pd)){
    
    //variables protected
    
    $login = htmlentities($usrlogin);

    $passwd = htmlentities($pd);
    
  // $d['verif'] = 'identifiant ou mot de passe incorrect passe petit !!';  
    
     $authen = new auth($login,$passwd);
     
     $verif = $authen->Authen();
     
     if($verif!==''){
       
     $d['verif'] = $verif;
    
     }  else {
         
     $d['verif']='erreur';
        
     }
   
}else{

 $d['verif'] = 'identifiant ou mot de passe incorrect passe petit !!'; 

}
 echo json_encode($d);
}

