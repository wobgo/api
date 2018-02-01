<?php


header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');

require '../../Core/DBconnect.class.php';
require '../../Core/request.class.php';


$notif =  new iniat\Control();

$notif->table="notifications";

$notif->bdd =  bdd();

$ionicPost = array();

 $postdata = file_get_contents("php://input");

 $postdata = utf8_encode($postdata);

 $request = json_decode($postdata);

 $_POST['del'] = $request->del;

if (isset($_POST['del'])){

 $deletin = $_POST['del'];

 $notif->condition ='NotifID'; 

 $notif-> delete($deletin);

 $ionicPost['ionicrespns']= 'you re welcome :'.$_POST['del'];

}
 
  //

echo json_encode($ionicPost);

//require '../../Core/DBconnect.class.php';
//require '../../Core/request.class.php';
/*
$usrdata = array();
//function to read the last elemnt of chains
function last(){
    
  $lastid = new iniat\Control();
  
  $lastid->table='webUser';
  
  $lastid->bdd= bdd();
  
  //$lastid->condition="";
  
  foreach ($lastid->readData('MAX(WebID)') as $l){
      
      
         $usrdata['WebID']= $l ; 
      
  } 
 
  return end($usrdata['WebID']) ;//$usrdata['PicID'];
  
}
*/
