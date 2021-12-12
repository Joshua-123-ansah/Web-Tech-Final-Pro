<?php
require("../classes/post_class.php");

// Inserting a new post
function salesPost($name_of_product,$quantity,$price,$id_of_seller,$date){
    // echo $name_of_product;
    
    // Create new post object
    $post = new Post;

    // Run query
    $runQuery = $post->salespost($name_of_product,$quantity,$price,$id_of_seller,$date);

    if($runQuery){
        return $runQuery;
    }else{
        return false;
    }
}


 //Get Revenue 
function getRevenue(){
    // Create new post object
    $post = new Post;

    // Run query
    $runQuery = $post->getrevenue();

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

//Goods that moves fast
function getGoodsThatMovesFast(){
    // Create new post object
    $post = new Post;

    // Run query
    $runQuery = $post->getgoodsthatmovesfast();

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
?>


