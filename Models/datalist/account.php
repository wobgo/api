<?php


require '../../Core/DBconnect.class.php';
require '../../Core/request.class.php';


header("Access-Control-Allow-Origin: *");
//header("Content-Type: application/json; charset=UTF-8");
header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');


$account = new iniat\Control();

$account->bdd =  bdd();

 $account->table ='personal';

$usrdata = array();


 foreach ($account->readData('MAX(InfoID)') as $l){
      
      
         $usrdata[]= $l ; 
      
  } 


echo json_encode($usrdata);
