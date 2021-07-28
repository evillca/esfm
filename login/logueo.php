<?php
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'penelope_db');

class Login {

    private $db_connection = null;
    public $errors = array();
    public $messages = array();

    public function __construct() {
        session_start();
        if (isset($_GET["logout"])) {
            $this->doLogout();
        } elseif (isset($_POST["login"])) {
            $this->dologinWithPostData();
        }
    }

    private function dologinWithPostData() {
        $this->db_connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        if (!$this->db_connection->connect_errno) { //verificar la conexion a la base de datos
            $usuario = $this->db_connection->real_escape_string($_POST['usuario']);
            $sql = "SELECT * FROM usuarios WHERE (usuario = '" . $usuario .  "' OR email= '".$usuario."') and estado_u=1";

            $verificar_usuario = $this->db_connection->query($sql); 
            if ($verificar_usuario->num_rows == 1) {
                $resultado = $verificar_usuario->fetch_object();

                if (password_verify($_POST['password'], $resultado->pass)) {
                    $_SESSION['user_login_status'] = 1;
                    $_SESSION['nombre_u'] = $resultado->nombre_u;
                    $_SESSION['id_usuario'] = $resultado->id_usuario;
                    $_SESSION['appterno_u'] = $resultado->appaterno_u;
                    $_SESSION['apmaterno_u'] = $resultado->apmaterno_u;
                    $_SESSION['usuario'] = $resultado->usuario;
                    $_SESSION['id_ilc'] = $resultado->id_ilc;
                    $_SESSION['id_departamento'] = $resultado->id_departamento;
                    $_SESSION['email'] = $resultado->email;

                    
                    


                } else {
                    $this->errors[] = "Usuario y/o contraseña incorrectos.";
                }
            } else {
                $this->errors[] = "Usuario y/o contraseña incorrectos..";
            }
        } else {
            $this->errors[] = "Problema de conexión de base de datos.";
        }
    }
//codigo para cerrar se
    public function doLogout() {
        $_SESSION = array();
        session_destroy();
        $this->messages[] = "Acabas de cerrar Sesión.";
        

    }

 public function isUserLoggedIn()
    {
        if (isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] == 1) {
            return true;
        }
        return false;
    }

}
