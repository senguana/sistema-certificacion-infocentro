<?php

class Login
{
    /**
     * @var object The database connection
     */
    private $db_connection = null;
    /**
     * @var array Collection of error messages
     */
    public $errors = array();
    /**
     * @var array Collection of success / neutral messages
     */
    public $messages = array();

    public function __construct()
    {
      
      // session_start();

    
        if (isset($_GET["logout"])) {
            $this->doLogout();
        }
       
        elseif (isset($_POST["login"])) {
            $this->dologinWithPostData();
        }
    }

 
    private function dologinWithPostData()
    {
  
        if (empty($_POST['username'])) {
            $this->errors[] = "El campo de nombre de usuario estaba vacío.";
        } elseif (empty($_POST['password'])) {
            $this->errors[] = "El campo de contraseña estaba vacío.";
        } elseif (!empty($_POST['username']) && !empty($_POST['password'])) {

        
            $this->db_connection = new mysqli(HOST_NAME, USER, PASSWORD, DATABASE_NAME);

            
            if (!$this->db_connection->set_charset("utf8")) {
                $this->errors[] = $this->db_connection->error;
            }

            if (!$this->db_connection->connect_errno) {

                
                $user_name = $this->db_connection->real_escape_string($_POST['username']);
                $password = $_POST['password'];

    
                $sql = "SELECT id_usua, username_usua, correo_usua, password_usua
                        FROM usuario
                        WHERE username_usua = '" . $user_name . "' OR correo_usua = '" . $user_name . "';";
                $result_of_login_check = $this->db_connection->query($sql);

                // if this user exists
                if ($result_of_login_check->num_rows == 1) {

                    
                    $result_row = $result_of_login_check->fetch_object();

                    if (password_verify($password, $result_row->password_usua)) {

                        
                        $_SESSION['id_usua'] = $result_row->id_usua;
                        $_SESSION['username_usua'] = $result_row->username_usua;
                        $_SESSION['correo_usua'] = $result_row->correo_usua;
                        $_SESSION['user_login_status'] = 1;

                    } else
                    {
                        $this->errors[] = "Usuario y/o contraseña no coinciden.";
                    }
                } else
                {
                    $this->errors[] = "Usuario y/o contraseña no coinciden.";
                }
            } else
            {
                $this->errors[] = "Problema de conexión de base de datos.";
            }
        }
    }

    /**
     * perform the logout
     */
    public function doLogout()
    {
        // delete the session of the user
        $_SESSION = array();
        session_destroy();
        // return a little feeedback message
        $this->messages[] = "Has sido desconectado.";

    }

    /**
     * simply return the current state of the user's login
     * @return boolean user's login status
     */
    public function isUserLoggedIn()
    {
        if (isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] == 1) {
            return true;
        }
        // default return
        return false;
    }
}
