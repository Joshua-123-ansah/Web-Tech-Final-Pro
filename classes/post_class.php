<?php
require("../model/db_class.php");


//This is a class that will handle all my query
class Post extends db_connection {
    public function create($id,$fullname,$email,$password,$status,$DOB,$token){
        $sql = "INSERT INTO `user_table`(`id`,`fullname`,`email`,`password`,`status`,`DOB`,`token`) VALUES 
        ('$id','$fullname','$email','$password','$status','$DOB','$token')";

        // run query
        return $this->db_query($sql);
    }

    public function getallproduct(){
        //sql query
        $sql = "SELECT * FROM `product_table`";

        //run query
        return $this->db_query($sql);
    }

    public function getremaining(){
        //sql query
        $sql = 'SELECT S.name_of_product,P.quantity_in_stock,SUM(S.quantity_per_purchase) 
        AS "Quantity Sold", P.quantity_in_stock-SUM(S.quantity_per_purchase) AS "Good_Left"
        FROM sales_table AS S
        CROSS JOIN product_table AS P ON S.name_of_product=P.name_of_product
        GROUP BY S.name_of_product
        ORDER BY P.quantity_in_stock-SUM(S.quantity_per_purchase) DESC; 
        ';

        //run query
        return $this->db_query($sql);
    }

    public function getSinglePost($password,$email){
        // echo "I am here";

        // sql query
        $sql = "SELECT * FROM `user_table` WHERE `password`='$password' AND `email`='$email'";

        // run query
        return $this->db_query($sql);
    }

    public function getemailPost($email){
      
        // sql query
        $sql = "SELECT * FROM `user_table` WHERE `email`='$email'";

        // run query
        return $this->db_query($sql);
    }

    public function updateuserinfo($password,$email){
        
        // sql query
        $sql = "UPDATE `user_table` SET `password`='$password' WHERE `email`='$email'";

        // run query
        return $this->db_query($sql);
    }

    public function deleteuser($fullname){
        // sql query
        $sql = "DELETE FROM `user_table` WHERE `fullname`='$fullname'";

        // run query
        return $this->db_query($sql);
    }




    //PRODUCTS RELETED QUERIES
    public function getproduct($product_name){
        // echo "I am here";

        // sql query
        $sql = "SELECT * FROM `product_table`  WHERE `name_of_product`='$product_name'";

        // run query
        return $this->db_query($sql);
    }


    public function updateproductinfo($quantity,$product_name){
        // echo $product_name;
        // echo $quantity;
        
        // sql query
        $sql = "UPDATE `product_table` SET `quantity_in_stock`='$quantity' WHERE `name_of_product`='$product_name'";

        // run query
        return $this->db_query($sql);
    }

    public function addproduct($name_of_product,$quantity,$date){
        $sql = "INSERT INTO `product_table`(`name_of_product`,`quantity_in_stock`,`date_product_was_bought`) VALUES 
        ('$name_of_product','$quantity','$date')";

        // run query
        return $this->db_query($sql);
    }

    




    //SALES CONTROLLERS 
    public function salespost($name_of_product,$quantity,$price,$id_of_seller,$date){
        $sql = "INSERT INTO `sales_table`(`id_of_user`,`name_of_product`,`price`,`quantity_per_purchase`,`date_of_sale`) VALUES 
        ('$id_of_seller','$name_of_product','$price','$quantity','$date')";

        // run query
        return $this->db_query($sql);
    }


    //Revenue
    public function getrevenue(){
        //sql query
        $sql = 'SELECT SUM(price*quantity_per_purchase) AS "Revenue"
        FROM sales_table
        WHERE MONTH(date_of_sale)=MONTH(CURRENT_DATE())
        ';

        //run query
        return $this->db_query($sql);
    }


    //Get Goods that moves faster

    public function getgoodsthatmovesfast(){
        //sql query
        $sql = 'SELECT name_of_product,SUM(quantity_per_purchase) AS "Quantity_Sold"
        FROM sales_table
        GROUP BY name_of_product
        ORDER BY SUM(quantity_per_purchase) DESC;
        ';

        //run query
        return $this->db_query($sql);
    }
}


?>