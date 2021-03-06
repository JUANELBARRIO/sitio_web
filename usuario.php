<?php
class Usuario {
    private $datos = [
        'id'        => '',
        'username'  => '',
        'nombre'    => '',
        'apellidos' => '',
        'email'     => ''
    ];
    public static function login($user, $passwd) {
        $datos = ['data' => [ 'login' => '' ]];
        // $datos = array('data' => array( 'login' => '' ));
        $cnn = new Conexion();
        $sql = sprintf("select * from usuarios where username='%s' and password='%s'",$user,md5($passwd));
        $rst = $cnn->query($sql); // mysqli_result || false
        $cnn->close();
        if ($rst) {
            if ($rst->num_rows == 1) {
                $r = $rst->fetch_assoc();
                $usuario = new Usuario();
                $usuario->id = $r['id'];
                $usuario->username = $r['username'];
                $usuario->nombre = $r['nombre'];
                $usuario->apellidos = $r['apellidos'];
                $usuario->email = $r['email'];
                $datos['data']['login'] = true;
                $datos['data']['usuario'] = $usuario->datos;
                
                if (!$_SESSION['user']) {
                    $token = md5($usuario->username.date());
                    $datos['data']['token'] = $token;
                    $_SESSION['user'] = $datos;
                }
            } else {
                $datos['data']['login'] = false;
            }
        } else {
            $datos['data']['login'] = 'fail';
        }
        
        return json_encode($datos, JSON_PRETTY_PRINT);
    }
    public function __get($campo) {
        if (array_key_exists($campo, $this->datos))
            return $this->datos[$campo];
    }
    public function __set($campo, $valor) {
        if (array_key_exists($campo, $this->datos))
            $this->datos[$campo] = $valor;
    }
}
// $u = Usuario::login('bidkar','123');
// var_dump($u);