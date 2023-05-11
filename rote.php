<?php
class Rote
{
    public function rote()
    {
        //create a new rote object in switch construction
        //defaul route is /gallery/index
        $rote = explode("/", $_SERVER['REQUEST_URI']);

        $constructor = "constructor_" . $rote[1];
        $action = "actions_" . $rote[2];

        switch ($constructor) {
            case 'constructor_login':
                require_once './construcrot/' . $constructor . ".php";
                $constructor = new $constructor;
                if (method_exists($constructor,$action)) {
                    $constructor->$action();
                }
                else {
                    header("Location: ../404.php");
                }
                break;

                case 'constructor_gallery':
                    require_once './construcrot/' . $constructor . ".php";
                    $constructor = new $constructor;
                    if (method_exists($constructor,$action)) {
                        $constructor->$action();
                    }
                    else {
                        header("Location: ../404.php");
                    }
                    break;

                case 'constructor_reg':
                    require_once './construcrot/' . $constructor . ".php";
                    $constructor = new $constructor;
                    if (method_exists($constructor,$action)) {
                    $constructor->$action();
                    }
                    else {
                        header("Location: ../404.php");
                    }
                    break;
                case 'constructor_addposts':
                    require_once './construcrot/' . $constructor . ".php";
                    $constructor = new $constructor;
                    if (method_exists($constructor,$action)) {
                    $constructor->$action();
                    }
                    else {
                        header("Location: ../404.php");
                    }
                    break;
                case 'constructor_delposts':
                        require_once './construcrot/' . $constructor . ".php";
                        $constructor = new $constructor;
                        if (method_exists($constructor,$action)) {
                        $constructor->$action();
                        }
                        else {
                            header("Location: ../404.php");
                        }
                        break;
                case 'constructor_addcomments':
                            require_once './construcrot/' . $constructor . ".php";
                            $constructor = new $constructor;
                            if (method_exists($constructor,$action)) {
                            $constructor->$action();
                            }
                            else {
                                header("Location: ../404.php");
                            }
                            break;
                        case 'constructor_delcomments':
                                require_once './construcrot/' . $constructor . ".php";
                                $constructor = new $constructor;
                                if (method_exists($constructor,$action)) {
                                $constructor->$action();
                                }
                                else {
                                    header("Location: ../404.php");
                                }
                                break; 

            default:
                    header("Location:../gallery/index");
                break;
        }
    }
}

?>