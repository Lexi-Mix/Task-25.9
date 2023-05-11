<?php
class constructor_gallery{
    function actions_index()
    {
        require_once './model/model_connect.php';
        $result = new Connect();
        $result = $result->getAllPosts();
        require_once './views/gallery.php';
    }
}

?>