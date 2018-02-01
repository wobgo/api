<?php


require '../../Core/DBconnect.class.php';
require '../../Core/request.class.php';

header("Access-Control-Allow-Origin: *");
header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');


$usrcon = new iniat\Control();

$usrcon->table='connexion';

$usrdata = array(); 

$usrcon->bdd =  bdd();

///////////////////////////////////////

$usr = new iniat\Control();

$usr->table='usrinfo';

//$usrdata = array(); 

$usr->bdd =  bdd();

///////////////////////////////////////////////////////

$newParam = file_get_contents("php://input");

if (isset($newParam) && $newParam!=""){


 $newParam = utf8_encode($newParam);

 $usrParam = json_decode($newParam);


//////////////////////////////////////////////////////////////////////


  $n = $usrParam->del;

  if(isset($n) && $n !=""){

   // $name = $usrParam->nameup;
    if (isset($log) && $log !=""){

    $log = $usrParam->loginup;

    $pd = $usrParam->passup;
            
    $usrcon->updateData(array("champ"=>"Login='$log',Password='$pd'","condition"=>"ConnexionID='$n'"));

  } else{ $usrdata['update'] = 'Log indisponible';  }
	//$usr->updateData(array("UserName='$name'","condition"=>"ConnexionID='$n'"));
    
    $usrdata['update'] = 'Ok';
 }

}else{

  $usrdata['update'] = 'Impossible';

}


echo json_encode($usrdata);
