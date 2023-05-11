<?php
class constructor_addcomments{
    function actions_index()
    {
        if(!isset($_POST['Send'])){
            require './views/addcomment.php';
        }
        else {
            require_once './model/model_connect.php';
            $result = new Connect();
            $result = $result->putComment($_POST['post_id'], $_POST['title']);
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
                            Error add comment
                        </div>
                        <p><a class="link-opacity-100" href="../addcomments/index">add comment</a></p>
                    </div>
                <?php
                }
        }

    }
}

?>