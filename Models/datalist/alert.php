<?php


//convert rawdata to json


header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');


session_start();

require '../../Core/DBconnect.class.php';
require '../../Core/request.class.php';


$notifCompt =  new iniat\Control();

$notifCompt->table="notifications";

$notifCompt->bdd =  bdd();

$getNotifDataCompt = array();

 //$notifcomt->condition=" WHERE StatusNotif = 1";


foreach ($notifCompt->readData('COUNT(NotifID) as Badge') as $getusr ){
    
    $getNotifDataCompt['Badge'] = $getusr; 
    
    
}


echo json_encode($getNotifDataCompt);


















?>
