<?php


class Render
{  
   
    private $views;
    private array $data;

    public function setView($view, $data=[])
    {
        $this->views=$view;
        $this->data=$data;
    }

    public function renderView()
    {
        // var_dump($this->data);
        include_once  './public/views/'.$this->views.'.php';
    } 
    
}