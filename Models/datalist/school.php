<?php



//convert rawdata to json


header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');

require '../../Core/DBconnect.class.php';
require '../../Core/request.class.php';


$usr = new iniat\Control();

$usr->table='etablissement';

$usrdata = array(); 

$usr->bdd =  bdd();




foreach ($usr->readData() as $getusr ){
    
    $usrdata[] = $getusr; 
    
    
}


echo json_encode($usrdata);



?>
