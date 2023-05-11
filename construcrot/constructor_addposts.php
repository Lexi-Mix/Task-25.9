<?php
class constructor_addposts{
    function actions_index()
    {
        if (!isset($_POST['Send'])) {
            require './views/addpost.php';
        } else {
                if ($_FILES['post']['error'] == '0' && $_FILES['post']['type'] == 'image/png') {
                        $basename = basename($_FILES['post']['name']);
                        $user_id = $_SESSION['user']['user_id'];
                        $uploads = '/var/www/html/img/' . $basename;
                        move_uploaded_file($_FILES['post']['tmp_name'], $uploads);
                        require_once './model/model_connect.php';
                        $result = new Connect();
                        $result = $result->putPost("./img/$basename",$user_id);
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
                                <p><a class="link-opacity-100" href="../addposts/index">Addpots</a></p>
                            </div>
                        <?php
                        }
            } else {?>
                            <div class="container text-center">
                                <div class="alert alert-warning" role="alert">
                                    Not correct format
                                </div>
                                <p><a class="link-opacity-100" href="../addposts/index">Addpots</a></p>
                            </div>
            <?php }
        }
         
    }
}
?>