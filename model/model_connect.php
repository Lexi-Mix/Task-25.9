<?php
//ini_set('display_errors', 1);

require 'config.php';
//class for doing requests to the API db
class Connect {
    public function getUser($login, $password) {
        $link=new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

        if ($link->connect_error) {
            die("Connection failed: ". $link->connect_error);
        }

        $result=$link->query("SELECT * FROM users WHERE login ='$login'");

        if ($result->num_rows > 0) {
            $user=$result->fetch_assoc();
            if (password_verify($password, $user['hash_pass'])) {
                return $user;
            }

            else {
                return false;
            }
        }
    }

    public function addUser($login, $password) {
        $link=new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

        if ($link->connect_error) {
            die("Connection failed: ". $link->connect_error);
        }

        if ($link->query("SELECT * FROM users WHERE login='$login'")->num_rows > 0) {
            
            return false;
        }

        else {
            $hash_pass=password_hash($password, PASSWORD_DEFAULT);
            $link->query("INSERT INTO users (login, hash_pass) VALUES ('$login', '$hash_pass')");

            if($link->affected_rows > 0) {
                return true;
            }

            else {
                return false;
            }
        }
    }

    public function getAllPosts () {
        $link=new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

        if ($link->connect_error) {
            die("Connection failed: ". $link->connect_error);
        }

        $result=$link->query("SELECT * FROM posts");
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
            $Data[] = $row;
            }
            return $Data;
        }
    }
    public function getComments($postId) {
        $link=new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

        if ($link->connect_error) {
            die("Connection failed: ". $link->connect_error);
        }
        $result = $link->query("SELECT c_id, p_id, title  FROM comments WHERE p_id = $postId");
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
            $Data[] = $row;
            }
            return $Data;
        }
        else {
            return false;
        }
    }
    public function putPost($links,$user_id)
    {
        $link=new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

        if ($link->connect_error) {
            die("Connection failed: ". $link->connect_error);
        }
        return $link->query("INSERT INTO posts (link_file,user_id) VALUES ('$links',$user_id)");
    }
    public function delPost($post_id)
    {
        $link=new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

        if ($link->connect_error) {
            die("Connection failed: ". $link->connect_error);
        }
        return $link->query("DELETE FROM posts WHERE p_id = $post_id");
    }
    public function putComment($p_id,$title)
    {
        $link=new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

        if ($link->connect_error) {
            die("Connection failed: ". $link->connect_error);
        }
        $result=$link->query("SELECT * FROM posts WHERE p_id = $p_id");
        if ($result->num_rows > 0) {
        return $link->query("INSERT INTO comments (title,user_id,p_id) VALUES ('$title',{$_SESSION['user']['user_id']},$p_id)");
        }
        else {
                return false;
            }
    }
    public function delComment($c_id)
    {
        $link=new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

        if ($link->connect_error) {
            die("Connection failed: ". $link->connect_error);
        }
        $result=$link->query("SELECT * FROM comments WHERE c_id = $c_id");
        if ($result->num_rows > 0) {
        return $link->query("DELETE FROM comments WHERE c_id = $c_id");
        }
        else {
                return false;
            }
    }
}
?>