<?php

require_once 'Render.php';
require_once 'Database/Database.php';

class Controller
{
    private $ViewsRender;
    private $db;

    public function __construct()
    {
        $this->ViewsRender= new Render();
        $this->db=new Database();

    }
/////////////// 
    public function index()  
    {
        $products=$this->db->getProducts();
        $this->ViewsRender->setView('index', $products);
        $this->ViewsRender->renderView();

    }
/////////////////////
    public function Delete()
    {
        $id = $_POST['id'] ?? null;
        if(!$id)
        { 
             header('Location: /');
             exit; 
        };

        $this->db->deleteProducts($id);
        header('Location: /');

    }

/////////////////
    public function show()
    {

        $id = $_GET['id'] ?? null;

        $comments = [
            "comment" => '',    
        ];

        if(!$id)
        {
            header('Location: /');
            exit;
        }   
        if($_SERVER['REQUEST_METHOD'] === "POST")
            {
                if(isset($_POST['comment']))
                {

                    $comments['comment'] = $_POST['comment'];
                    $this->db->createComment($comments);

                }

             
            }       

        $showData = $this->db->getPreviusValues();

        $this->ViewsRender->setView('show', ['showProduct' => $showData]);
        $this->ViewsRender->renderView();


    }



    
    public function create()
    {       
            $product = [
                "title" => '',
                "description" => '',
                "price" =>  0,
                "image" => ''
        
            ];

            $errors=[];
    
            if($_SERVER['REQUEST_METHOD']==='POST')
            {
              

                if(!empty($_POST['title']))
                {
                    $product['title']= $_POST['title'];

                }
                else
                {
                    $errors[]='title is required';
                }
                if(!empty($_POST['description']))
                {

                    $product['description']= $_POST['description'];

                }
                else
                {
                    $errors[]='description is required';

                }
            
                if(!empty($_POST['price']))
                {

                    $product['price']= $_POST['price'];

                }
                else
                {
                    $errors[]='price is required';

                }
                if(empty($errors))
                {          
    
                    $createProduct=$this->db->getCreate($product);
                    header('Location:/');
    
                }
       
            }
            $this->ViewsRender->setView('create', ['product' => $product , 'errors' => $errors]);
            $this->ViewsRender->renderView();
    }

  

   


    public function update()
    {
        $id = $_GET['id'] ?? null;

        if(!$id)
        { 
             header('Location: /');
             exit; 
        };

        $product = [
            "title" => '',
            "description" => '',
            "price" =>  0,
            "image" => ''
    
        ];

        $errors=[];
        $createProduct = $this->db->getPreviusValues();

        if($_SERVER['REQUEST_METHOD']==='POST')
        {
            if(!empty($_POST['title']))
            {
                $product['title']= $_POST['title'];

            }
            else
            {
                $errors[]='title is required';
            }
            if(!empty($_POST['description']))
            {

                $product['description']= $_POST['description'];

            }
            else
            {
                $errors[]='description is required';

            }
        
            if(!empty($_POST['price']))
            {

                $product['price']= $_POST['price'];

            }
            else
            {
                $errors[]='price is required';

            }

            if(empty($errors))
            {
               
                $this->db->getCreate($product);

                header('Location:/');

            }
        }
        $this->ViewsRender->setView('update', ['product' => $createProduct , 'errors' => $errors]);
        $this->ViewsRender->renderView();

    }



}