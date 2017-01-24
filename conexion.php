<?php
class conexion extends mysqli {
     'database_host'='';
     'database_name'='';
     'database_user'='';
     'database_password'='';
     'datavbase_port'='';

    private $datos= [
                     'database_host'=>'';
                     'database_name'=>'';
                     'database_user'=>'';
                     'database_password'=>'';
                     'database_port'=>'';
                     ];

public function __construct(){
    $this->datos=['database_host'=>'127.0.0.1';
                     'database_name'=>'udo';
                     'database_user'=>'juan';
                     'database_password'=>'123';
                     'database_port'=>'3306';
                     ];
parent::__construct($this->database_host,$this->database_user,$this->database_passwd,
$this->database_name,$this->database_part);
}

public function __construct($host,$name,$user,$password,$port){
    $this->datos=['database_host'=>$host;
                     'database_name'=>$name;
                     'database_user'=>$user;
                     'database_password'=>$password;
                     'database_port'=>$port;
                     ];

                  $cnn->conector();
}

public function conector()
{
 $cnn->connect($this->database_host,
 $this->database_user,
 $this->database_password,
 $this->database_name,
 $this->database_port);
}


    public function __get($keyname){
        if(array_key_exists($keyname, $this->datos))
        return $this->datos[$keyname];
    }                 

    public function __set($keyname, $value){
        if(array_key_exists($keyname, $this->datos))
        $this->datos[$keyname]= $value;
    }

    public function get_database_host() {
        return $this->database_host;
    }
    public function set_database_host(){
        $this->database_host = $value;
    }
}

$objeto = new conexion();

$rst = $objeto->query('select * from usuarios');
$r = $rst->fetch_assoc();

var_dump($rst);
var_dump($r);