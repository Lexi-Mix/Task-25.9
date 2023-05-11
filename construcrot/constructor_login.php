<?php
class constructor_login{
    function actions_index()
    {
        if (!isset($_POST['SingIn'])) {
            require './views/login.php';
        } else {
            require_once './model/model_connect.php';
            $result = new Connect();
            $result = $result->getUser($_POST['login'],$_POST['password']);
            if (!$result) {
                require_once './views/log_error.php';
            } else {
                $_SESSION['user'] = $result;
                $_SESSION['user']['auth'] = true;
                header("Location: ../gallery/index");
            }
        }   
    }
    function actions_logout()
    {
        session_destroy();
        header("Location: ../gallery/index");
    } 
}

?>