<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.

   main class 

 * 
 *   Interaction with database 
 *
 *      *** use insert, update , delete for request sql***
 *          to query database
 *  ****/

namespace iniat;

   class Control{
   
   
       
       public $table;
       public $condition;
       public $restrict;
       public $bdd;
    
       var $ID;
       
       //limit informations
       
     //public $offset = (int) $offset;
    //public $limit = (int) $limit;
      
       //use convert broad 
       
    /*function to read data from table*/   
    public function readData($fields=null){
           
          //verification de la variable fields
           if($fields==null){
               
               $fields ='*';
               
           }
           
                    
            $sql = 'SELECT '. $fields .'  FROM '.$this->table.' '. 
            $this->condition; 
   
          //   echo $sql;
          
            $req = $this->bdd->query($sql);
            
            $data = $req->fetchAll();
            
            return $data;
       }
               
/*function to delete data from table*/  
     public function delete($id){
       
      $sql = 'DELETE FROM '.$this->table.' WHERE '. $this->condition. ' = '. (int)$id; 
       
      //  echo $sql;
      
      $this->bdd->query($sql);
      
     }
   
   /*function to search row data from table*/  
   public function findData($data = array()){
       
       $condition ='1=1';
       $fields = '*';
       $limit ='';
       $order='';
    
       if(isset($data['condition'])){
           $condition = $data['condition'];
       }
       
     
      
       if(isset($data['fields'])){
           $fields = $data['fields'];
       }
       
        if(isset($data['order'])){
           $order = $data['order'];
       }
       
       if(isset($data['limit'])){
           $limit = ' LIMIT '.$data['limit'];
       }
       
     
       $sql=  ' SELECT '  . $fields .  ' FROM ' .$this->table.
              ' WHERE ' . $condition .' '.$order . $limit ;
      
       //echo $sql;
       
       $req = $this->bdd->query($sql);
      
       
       $datas = $req->fetch();
           
       
      return $datas;
       
      
   }
   
   /*function to save data into table*/  
   public function saveData($data = array()){
      
        $sql = 'INSERT INTO ' . $this->table . '('.$data['champ'].') VALUES('.htmlentities($data['value']).')' ;
    
        //echo $sql;
        
        $this->bdd->query($sql);
   
               
   }
   
   
   /*function to update data from table*/  
   public function updateData($up = array()){
       
       
       $sql =' UPDATE ' . $this->table . ' SET ' . $up['champ'] . ' WHERE '.  $up['condition'] ;
       
      // echo  $sql;
       
       $this->bdd->query($sql);
       
   }
   
   
 }
   
 
