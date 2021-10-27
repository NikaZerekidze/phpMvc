<?php
require_once 'Database/Database.php';

 class Validate
{
    // abstract public function productsValidate();

    private  $db;

    public  function __construct()
    {
        $this->db=new Database();
       

    }
    public function ValidateRegister()
    {    
        $errors =[];

        $register = [
            "name" => '',
            "email" => '',
            "password" =>  '',
    
        ];

        if($_SERVER['REQUEST_METHOD']==='POST')
        {
        
            if(!empty($_POST['name']))
            {
            $register['name'] = $_POST['name'];

            }
            else
            {
                $errors[]='name is required';
            }
            
            if(!empty($_POST['email']))
            {

                $register['email'] =  $_POST['email'];

            }
            else
            {
                $errors[] ='email is required';

            }
        
            if(!empty($_POST['password']) && !empty($_POST['confPassword']))
            {

                if($_POST['confPassword'] === $_POST['password'])
                {
                    $register['password'] = $_POST['password'];

                }
                else
                {
                    $errors[]='passwords does not match';

                }
        

            }
            else
            {
                $errors[]='password is required';

            }
    
            if(empty($errors))
            {          
              
                $this->db->register($register);
                header('Location:/');
              
            }
            else
            {
                return $errors;
            }
        

        }
    }   
    
    public function ValidateLogin()
    {
        $errors =[];
        $login=[];

        if($_SERVER['REQUEST_METHOD']==='POST')
        {

            if(!empty($_POST['email']) && !empty($_POST['password']))
            {
              
                $login['email']=$_POST['email'];
                $login['password']=$_POST['password'];
                $loginInfo=$this->db->getUser($login);
                return $loginInfo;
            }
            // else
            // {
               
            //     return $errors[] = 'please fill inputs';
            // }

        }
        
    }
}