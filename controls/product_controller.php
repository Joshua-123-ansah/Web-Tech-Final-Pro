<?php
    //connect to post class
    require("../classes/post_class.php");


    function addProduct($name_of_product,$quantity,$date){
      
        // Create new post object
        $post = new Post;
    
        // Run query
        $runQuery = $post->addproduct($name_of_product,$quantity,$date);
    
        if($runQuery){
            return $runQuery;
        }else{
            return false;
        }
    }


    function getProduct($product_name){
    
        // Create new post object
        $post = new Post;

        // Run query
        $runQuery = $post->getproduct($product_name);
    
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



    function updateProductInfo($quantity,$product_name){
        // Create new post object
        
        $post = new Post;
    
        // Run query
        $runQuery = $post->updateproductinfo($quantity,$product_name);
    
        if($runQuery){
            return $runQuery;
        }else{
            return false;
        }
    }
?>