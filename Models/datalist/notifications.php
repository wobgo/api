<?php



//convert rawdata to json

/**/
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');

require '../../Core/DBconnect.class.php';
require '../../Core/request.class.php';


$notif =  new iniat\Control();

$notif->table="notifications";

$notif->bdd =  bdd();

$getNotifData = array();

// $notif->condition=" WHERE StatusNotif = 1";

//$newcontent = file_get_contents("php://input");

//if(isset($newcontent)){

//$newcontent = utf8_encode($newcontent);

//$newdecodedin = json_decode($newcontent);

 //$_POST['del']  = $newdecodedin->del;

if(isset($_POST['del'])){

 $deletin = $_POST['del'];

 $notif->condition ='NotifID'; 

 $notif-> delete($deletin);
}


//}

//}else{


foreach ($notif->readData() as $getusr ){
    
    $getNotifData[] = $getusr; 
    
    }
echo json_encode($getNotifData);








