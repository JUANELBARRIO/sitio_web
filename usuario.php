<?php
class usuarios{
    private $datos =[
        'id' =>'',
        'username'=>'',
        'password'=>'',
        'nombre'=>'',
        'apellidos'=>'',
        'email'=>''
    ];

    public function __construct(){
        }

    public static function login ($user,$passwd){
        $cnn = new conexion();
        $sql = sprintf("select * from where username='%s' and password '%s'",$user,md5($passwd)
        );
        $rst = $cnn->query($sql);
        if ($rst){
            if($rst->num_rows == 1){
              $r = $rst->fetch_assoc();  
              $usuario = new usuario();
              $usuario->id = $r['id'];
              $usuario->username = $r['username'];
              $usuario->nombre = $r['nombre'];
              $usuario->apellidos = $r['apellidos'];
              $usuario->email = $r['email'];

              return $usuario;
            } else {
                return null;
            }
        }else{
            return false;
        }  

    }

    public function __get($campo){
        if(array_key_exists($campo, $datos))
        return $this->datos[$campo];
    }
     
     public function __set($campo,$valor){
        if(array_key_exists($campo, $datos))
        return $this->datos[$campo] = $valor;
   }

}

$u = Usuario ::login('juansinmiedo','123')
var_dump($u);