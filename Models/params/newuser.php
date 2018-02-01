<?php

 
require '../../Core/DBconnect.class.php';
require '../../Core/request.class.php';



header("Access-Control-Allow-Origin: *");
header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');

/*
//convert rawdata to json
header("Content-Type: application/json; charset=UTF-8");


*/

$usr = new iniat\Control();

$savenew = new iniat\Control();

$usr->table='usrinfo';

$savenew->table='connexion';

 $usr->bdd =  bdd();

$usrdata = array();

$savenew->bdd = bdd();

//'{"nlogin":"wendilao","npd":"testuel","username":"autrel"}';

$newcontent = file_get_contents("php://input");


/////////////////////////////////////////////////////


if(isset($newcontent) && $newcontent!="" ){

$newcontent = utf8_encode($newcontent);

$newdecoded = json_decode($newcontent);

//$_POST['create'] = $decoded->{'key'};$_POST['username']

$newusername =  htmlentities($newdecoded->username);

$newlogin = $newdecoded->nlogin;

$_POST['npd'] =  $newdecoded->npd;
////////////////////////////////////////////////////////////////////////////////////////////



   if(isset($newusername) && ($newusername !=="")){
            
        
              $pd =$_POST['npd'];
	      //$parentName   =  $newdecoded->parentName;

    try {
              //$usr  = $_GET['usrID'];$parentMail$parentContact
              
              $usr->saveData(array("champ"=>"UserName,SubscribeDate","value"=>"'$newusername',NOW()"));

              $savenew->saveData(array("champ"=>"Login,Password,Isblock","value"=>"'$newlogin','$pd',0"));
/* 
       	$newaccount = $account->findData(array("condition"=>"InfoID =(SELECT MAX(InfoID) FROM usrinfo)")); 

	if( $newaccount!="") {
               
             
            $usrdata['retour'] = $newaccount['ConnexionREF'].'##'.$newaccount['UserName'];
            
            
        } else {
            
                  
                  $usrdata['retour'] ='inconnu';
            
        } */
            
               // Catch any errors in running
      } catch(PDOException $e)

      {
             echo $e->getMessage();

     }                
           
 }else{

      $usrdata['retour']= "ERREUR";
  
//return ;


  }

/* */
}

 echo json_encode($usrdata);

?>
