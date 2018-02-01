<?php


session_start();

require '../../Core/DBconnect.class.php';
require '../../Core/request.class.php';


$usr = new iniat\Control();

$usr->table='webUser';

$usrdata = array(); 

$usr->bdd =  bdd();


if(isset($_GET['t'])){
    
$usr->condition ='WebID'; 

$usr->delete($_GET['t']);
    
    
}

/*
if(isset($_GET['modif'])){
    
    
    $rep =$_GET['n'];
    $modif = $_GET['modif'];
    
    $usr->updateData(array("champ"=>"FieldDist='$rep'","condition"=>"DistrictID='$modif'"));
    
}
*/


if(isset($_GET['mod'])){
    
    $u = htmlentities($_GET['mod']); 
    
    $usr->condition=" WHERE DistrictID ='$u'";
    
    foreach ($usr->readData() as $getusr ){
    
    $usrdata['FieldDist'] = $getusr['FieldDist']; 
 }
 
 
} 



if(isset($_GET['c']) && !empty($_GET['c'])){
    
    if($_GET['c']==1){
    
    $usr->condition = 'ORDER BY FieldDist';
    }
    foreach ($usr->readData() as $getusr ){
    
    $usrdata[] = $getusr; 
    
    }
   
}else{

foreach ($usr->readData() as $getusr ){
    
    $usrdata[] = $getusr; 
    
    
}
}

echo json_encode($usrdata);

