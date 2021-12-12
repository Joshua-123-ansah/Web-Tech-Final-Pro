<?php
//connect to post class
require("../classes/post_class.php");

session_start();
// Inserting a new post
function createPost($id,$fullname,$email,$password,$status,$DOB,$token){
  
    // Create new post object
    $post = new Post;

    // Run query
    $runQuery = $post->create($id,$fullname,$email,$password,$status,$DOB,$token);

    if($runQuery){
        return $runQuery;
    }else{
        return false;
    }
}

function getAllProducts(){
    // Create new post object
    $post = new Post;

    // Run query
    $runQuery = $post->getallproduct();

    if($runQuery){
        $posts = array();
        while($record = $post->db_fetch()){
            $posts[] = $record;
        }
        return $posts;
    }else{
        return false;
    }
}

function getRemaining(){
    // Create new post object
    $post = new Post;

    // Run query
    $runQuery = $post->getremaining();

    if($runQuery){
        $posts = array();
        while($record = $post->db_fetch()){
            $posts[] = $record;
        }
        return $posts;
    }else{
        return false;
    }
}

function getSinglePost($password,$email){
    
    // Create new post object
    $post = new Post;
    // Run query
    $runQuery = $post->getSinglePost($password,$email);

    if($runQuery){

        $posts = $post->db_fetch();
        if(!empty($posts)){
            return $posts;
        }else{
            return [];
        }
        
    }else{
        return false;
    }
}

function getemail($email){
    $_SESSION['email'] = $email;
    // Create new post object
    $post = new Post;

    // Run query
    $runQuery = $post->getemailPost($email);

    if($runQuery){

        $posts = $post->db_fetch();
        if($posts){
            return $posts;
        }else{
            return [];
        }
        
    }else{
        return false;
    }
}

function updateUserInfo($password,$email){
    // Create new post object
    
    $post = new Post;

    // Run query
    $runQuery = $post->updateuserinfo($password,$email);

    if($runQuery){
        return $runQuery;
    }else{
        return false;
    }
}

function deleteUser($fullname){
    // Create new post object
    $post = new Post;

    // Run query
    $runQuery = $post->deleteuser($fullname);

    if($runQuery){
        return $runQuery;
    }else{
        return false;
    }
}

?>