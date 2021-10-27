<?php
require_once 'Validate.php';
session_start();

    class RegisterController
    {


        private $ViewsRender;
        private $validate;

        public function __construct()
        {
            $this->ViewsRender= new Render();
            $this->validate=new Validate();

        }
        public function register()
        {       
            $validateErrors=$this->validate->ValidateRegister();
            $this->ViewsRender->setView('register' , ['errors' => $validateErrors]);
            $this->ViewsRender->renderView();   

        }  
        
        

        public function login()
        {
            $validate=$this->validate->ValidateLogin();
      
            if(!empty($validate))
            {
                // var_dump(  $_SESSION['login'] );
                // die;
                $_SESSION['login']=true;
                header('Location: /');
            } 

            $this->ViewsRender->setView('login' );
            $this->ViewsRender->renderView(); 
        }


        public function logout()
        {
            $_SESSION['login']=false;
            header('Location: /');

        }





    }






?>