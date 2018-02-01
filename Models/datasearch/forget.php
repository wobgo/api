<?php

require '../../Core/DBconnect.class.php';
require '../../Core/request.class.php';


header("Access-Control-Allow-Origin: *");
//header("Content-Type: application/json; charset=UTF-8");
header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');

$parent = new iniat\Control();

/////////////////////////////////////

 $parent->bdd =  bdd();

 $parent->table ='usrinfo';

 $usrdata = array();


/////////////////////////////////////////////////////////

 $newParent = file_get_contents("php://input");

 $newParent = utf8_encode($newParent);

 $newdecoded = json_decode($newParent);

/////////////////////////////////////////////////////////////////////////////////

	$UserName=$newdecoded->username;

	$ParentName=$newdecoded->forgetPname;

	$ParentEmail=$newdecoded->forgetPmail;

	$ParentContact=$newdecoded->forgetPnumb;

 
$findUsr = $parent->findData(array("condition"=>"UserName='$UserName' AND ParentName='$ParentName' AND ParentEmail='$ParentEmail' AND ParentContact='$ParentContact'")) ;



  if($findUsr!="") {
               
             
              $usrdata['findUsr'] = $findUsr['ConnexionREF'];
            
            
        } else {
            
                  
                  $usrdata['findUsr'] ='erreur';
            
        }
           
   


echo json_encode($usrdata);
