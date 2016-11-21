<?php

class Login extends MysqliDb {

    function __construct() {
        parent::__construct();
    }

    function validarAcceso($usuario, $contrasena) {

        $this->where("login_usuario", $usuario);
        $this->where("pass_usuario", md5($contrasena));

        if($this->has("usuarios")) {
            $this->where("login_usuario", $usuario);
            $this->where("pass_usuario", md5($contrasena));
            $this->rCampos = $this->get ('usuarios');
            $this->runSession();
            return true;
        }else{
            return false;
        }
        $this->close();
    }

    private function runSession() {
        $_SESSION["idSession"] = session_id();
        $_SESSION['islogin'] = 1;
        foreach ($this->rCampos as $clave => $valor) {
            $_SESSION['id_usuario'] = $valor['id_usuario'];
            $_SESSION['login_usuario'] = $valor['login_usuario'];
            $_SESSION['nombre_usuario'] = $valor['nombre_usuario'];
            $_SESSION['apellido_usuario'] = $valor['apellido_usuario'];
            $_SESSION['id_perfil'] = $valor['id_perfil'];
        }
    }

    function validarLoginON() {
        if ($_SESSION['islogin'] == 1) {
            return true;
        } else {
            return false;
        }
    }

    function getIdUsuario() {
        return $_SESSION['cod_usuario'];
    }

    function getUsuario() {
        return $_SESSION['usuario'];
    }

    function getNombreApellidoUSuario() {
        return $_SESSION['nombreyapellido'];
    }

    function getClaveUsuario() {
        return $_SESSION['clave'];
    }

    function getUltimoLogin() {
        return $_SESSION['ultimo_login'];
    }

    function getIdSessionActual() {
        return $_SESSION["idSession"];
    }

    function getStatusUsuario() {
        return $_SESSION["estatus"];
    }

    function logout() {
        session_unset();
        session_destroy();
    }

}

?>
