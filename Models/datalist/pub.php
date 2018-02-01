<?php

require '../../Core/DBconnect.class.php';
require '../../Core/request.class.php';


        $col = new iniat\Control();
        
        $col->bdd = bdd();
        
        $col->table = 'webUser';
        
        if(isset($_GET['bodypub'])){
            
              $title = $_GET['title'];
              
            //  $position =$_GET['pos'];
              
              $txtpub = $_GET['bodypub'];
            
             //  $usr  = $_GET['usrID'];
              
              $col->saveData(array("champ"=>"WebName,Publication,DatePub","value"=>"'$title','$txtpub',NOW()"));
            
        }
        
      
