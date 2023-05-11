<?php
class constructor_delcomments{
    function actions_index()
    {
        if(!isset($_POST['delete'])){
            require './views/delcomment.php';
        }
        else {
            require_once './model/model_connect.php';
            $result = new Connect();
            $result = $result->delComment($_POST['comment']);
            if($result){
                ?>
                    <div class="containter text-center">
                        <div class="alert alert-primary" role="alert">
                            You have successfully added comment
                        </div>
                        <p><a class="link-opacity-100" href="../gallery/index">Gallery</a></p>
                    </div>

                <?php
                }
                else{
                ?>
                    <div class="container text-center">
                        <div class="alert alert-warning" role="alert">
                            Error del comment
                        </div>
                        <p><a class="link-opacity-100" href="../delposts/index">Delete comment</a></p>
                    </div>
                <?php
                }
        }

    }
}

?>