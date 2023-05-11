<?php
class constructor_reg{
    function actions_index()
    {
        if(!isset($_POST['Reg'])){
            require './views/reg.php';
        }
        else {
            require_once './model/model_connect.php';
            $result = new Connect();
            $result = $result->addUser($_POST['login'],$_POST['password']);
            if ($result) {
                require './views/reg_ok.php';
            }
            else require_once './views/reg_error.php';
        }

    }
}

?>