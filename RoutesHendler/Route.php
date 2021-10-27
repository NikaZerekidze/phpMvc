<?php


class Route
{
    private static $Routes = array();

    

    public static function set($route , $func)
    {       

        self::$Routes[$route]=$func;
        
    }

    public function execute()
    {
        $currentPath=$this->getPath();
  

        if(array_key_exists($currentPath , self::$Routes) )
        {
            call_user_func(self::$Routes[$currentPath]);
        }
        
    }



    public  function getPath()
    {
        $currentURL = $_SERVER['REQUEST_URI'] ?? '/';
        $pos = strpos($currentURL , '?');
        if($pos === false ) 
        {
            return $currentURL;
        }
        else
        {
            return substr($currentURL , 0 , $pos);
        }

    }
    
  
} 