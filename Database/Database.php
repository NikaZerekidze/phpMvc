<?php


class Database
{
    private  PDO $pdo;

    public function __construct()
    {
        $this->pdo = new PDO('mysql:host = localhost;port=3306;dbname=Products','admin','Qwerty123!');
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    }

    public function getProducts($search='')
    {
        if(isset($_GET['search']))
        {   
            $search=$_GET['search'];
            $statement=$this->pdo->prepare("SELECT * FROM products WHERE title LIKE :title AND  deleted_at IS NULL ORDER BY create_date DESC");
            $statement->bindValue(':title',"%$search%");

        }
        else
        {
            $statement=$this->pdo->prepare("SELECT * FROM products WHERE deleted_at IS NULL ORDER BY create_date DESC  ");

        }

        $statement->execute();
        $products=$statement->fetchAll(PDO::FETCH_ASSOC);
        return $products;
    }




    public function getPreviusValues()
    {
        if(isset($_GET['id']))
        {
            $id=$_GET['id'];
            $statementForId=$this->pdo->prepare('
            SELECT p.id , p.price ,  p.title , p.description, p.create_date , p.image , c.comment , c.comment_date 
            FROM products p LEFT JOIN comments c ON p.id=c.productId 
            WHERE p.id=? ORDER BY c.comment_date DESC');
           
            $statementForId->execute([$id]);
            $stmt=$statementForId->fetchAll(PDO::FETCH_ASSOC); 
      
            return $stmt;
        }
       
    }

    public function getCreate($products=[])
    {
       
        if(isset($_GET['id']))
        {
            $id=$_GET['id'];
            $statement = $this->pdo->prepare("UPDATE products SET title = ? , `description` = ? , `image` = ? , price = ? , create_date = ?  WHERE id LIKE ? ");
            $statement->execute([$products['title'],$products['description'], $products['image'] , $products['price'] , date("Y-m-d H:i:s") , $id]);
         
        }
        else{
            
            
            $statement = $this->pdo->prepare('INSERT INTO products (title, image ,`description` , price , create_date ) VALUES (?, ?, ?, ?, ?)');
            $statement->execute([$products['title'],$products['image'],$products['description'],$products['price'],date("Y-m-d H:i:s")]);
      
        
        }

       
    }

    public function deleteProducts(int $id)
    {
      
        $statment= $this->pdo->prepare("UPDATE products SET deleted_at = ? WHERE Id = ?");
        $statment->execute([date("Y-m-d H:i:s"),$id]);
    }

    public function createComment($comments=[])
    {

            $id=$_GET['id'];

            $stmt=$this->pdo->prepare("INSERT INTO comments (productId, comment , comment_date) VALUES (? , ? , ?)");
            $stmt->execute([$id, $comments['comment'] , date("Y-m-d H:i:s")]);

    }   




    public function register($register=[])
    {
        $stmt=$this->pdo->prepare("INSERT INTO users (name, email , password , created_at) VALUES (? , ? , ? , ?)");
        $stmt->execute([$register['name'], $register['email'] ,$register['password'], date("Y-m-d H:i:s")]);
    }

    public function getUser($login=[])
    {
        $stmt=$this->pdo->prepare('SELECT * FROM users WHERE email = ? AND `password` = ? ');
        $stmt->execute([$login['email'],$login['password']]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);


    }

}