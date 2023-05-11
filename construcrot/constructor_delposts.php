<?php
class constructor_delposts{
    function actions_index()
    {
        if(!isset($_POST['delete'])){
            require './views/delpost.php';
        }
        else {
            require_once './model/model_connect.php';
            $result = new Connect();
            $result = $result->delPost($_POST['post']);
            if($result){
                ?>
                    <div class="containter text-center">
                        <div class="alert alert-primary" role="alert">
                            You have successfully added post
                        </div>
                        <p><a class="link-opacity-100" href="../gallery/index">Gallery</a></p>
                    </div>

                <?php
                }
                else{
                ?>
                    <div class="container text-center">
                        <div class="alert alert-warning" role="alert">
                            Error add posts
                        </div>
                        <p><a class="link-opacity-100" href="../delposts/index">Delete post</a></p>
                    </div>
                <?php
                }
        }

    }
}

?>