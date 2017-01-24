<?php
class Conexion extends mysqli{
   private $datos = [ 
   // 'database_host'=> '';
   // 'database_name'=>'';
   //'database_user'=>'';
   // 'database_passwd'=>'';
   // 'database_part' => ''
     ];    



}
   public function __get($keyname){
       if(array_key_exists($keyname, $datos))
       return $this->datos[$keyname]; 
   }
     
     public function __set($keyname, $value){
         if(array_key_exists($keyname, $datos))
         $this->datos[$keyname] = $value;
     }
}

$objeto = new conexion();
$objeto-set_database_host('127.0.0.1')
echo $objeto->get_database_host();