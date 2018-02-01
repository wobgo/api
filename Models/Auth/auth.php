<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of auth
 *
 * @author wendila
*/ 
require '../../Core/DBconnect.class.php';
require '../../Core/request.class.php';

class auth extends iniat\Control{
    
    protected $login;
    protected $passwd;
    protected $redirect;

    public function __construct($login,$passwd) {
            
        $this->login = $login;
        $this->passwd = $passwd;
        
        //$this->redirect = '../../index.php';
        $this->table ='connexion';
        
        $this->bdd = bdd();
        
    }

    public function Authen(){
       
        
        $findUsr = $this->findData(array("condition"=>"Login='$this->login' AND Password='$this->passwd'"));
        
        
        //re define login to database parameter
        
        $this->login = $findUsr['ConnexionID'];
        
        $this->passwd = $findUsr['Login'];
       
       if(($findUsr!="")  &&  ($findUsr['Isblock']=='0')){
               
             
               return $this->passwd.'##'.$findUsr['ConnexionID'];
            
            
        } else {
            
                  
                   return $err='';
            
        }
           
    }
    
    /*
    protected function getUsrData(){
        
        $this->table='usrinfo';
        
        $this->passwd = $this->findData(array("condition"=>"UserID='$this->login'"));
        
        return $this->passwd['UserName']; 
     }
*/
   
}


