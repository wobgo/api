<?php


 
require '../../Core/DBconnect.class.php';
require '../../Core/request.class.php';



header("Access-Control-Allow-Origin: *");
header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');


$parent = new iniat\Control();


 $parent->bdd =  bdd();

 $parent->table ='usrinfo';

 $usrdata = array();

///////////////////////////////////////////

 $newParent = file_get_contents("php://input");

 $newParent = utf8_encode($newParent);

 $newdecoded = json_decode($newParent);

/////////////////////////////////////////////////////////////////////

  $parentName =  $newdecoded->parentName;
  $parentMail =  $newdecoded->parentMail;
  $parentContact = $newdecoded->parentContact;

   if(isset($parentName) && ($parentName !=="")){
            
        
	      //$parentName   =  $newdecoded->parentName;$parentMail$parentContact

    try {
              //$usr  = $_GET['usrID'];
              
              $parent->updateData(array("champ"=>"ParentName='$parentName',ParentEmail='$parentMail',ParentContact='$parentContact'","condition"=>"InfoID = (SELECT MAX(LastInfo) FROM lastid )"));

            
               // Catch any errors in running
      } catch(PDOException $e)

      {
             echo $e->getMessage();

     }                
            $usrdata['retour']= "OK";
 }else{

   	    $usrdata['retour']= "ERREUR";
  
//return ;


  }


 echo json_encode($usrdata);

?>

