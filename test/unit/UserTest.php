<?php
namespace classes;
require('./controls/classes/post_class.php');

class UserTest extends \PHPUnit\Framework\TestCase 
{
    
    public function test() 
    {
        $crud = new Post;

        $result = $crud->create(1234,'Joshua Owusu Ansah','joshua.ansah@ashesi.edu.gh','joshua','user','2002-04-06','ndjfhdfhjdfjddgsgfhghghutgvfj');

        $this->assertEquals($result, true);
    }
    
    public function getAllProduct() 
    {
        $crud = new classes\Post;

        $result = $crud->getAllProduct();

        !$this->assertCount($result, 0);
    }

    public function getremaining() 
    {
        $crud = new classes\Post;

        $result = $crud->getremaining();

        !$this->assertCount($result, 0);
    }
}

?>