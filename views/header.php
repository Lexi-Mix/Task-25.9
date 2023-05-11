<?php
if (isset($_GET['Logout'])) {
    session_destroy();
    header("Location: /login/index");
}
?>
<div class="container">
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <?php
                        if ($_SESSION['user']['auth'] == true):
                    ?>
                    <li class="nav-item">
                        <a class="nav-link" href="../gallery/index">Gallery</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../addposts/index">Add Post</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../delposts/index">Delete Post</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../addcomments/index">Add Comment</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../delcomments/index">Delete Comment</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="../login/logout">Log out</a>
                    </li>
                    <?php
                        else:
                    ?>
                    <li class="nav-item">
                        <a class="nav-link" href="../gallery/index">Gallery</a>
                    </li>
                    <li class="nav-item">
                        
                        <a class="nav-link active" href="../login/index">Log in</a>
                    </li>
                    <?php
                        endif;
                   ?>
                </ul>
            </div>
        </div>
    </nav>
</div>