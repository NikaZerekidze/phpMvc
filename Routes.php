<?php

require_once 'RoutesHendler/Route.php';
require_once 'Controllers/Controller.php';
require_once 'Controllers/RegisterController.php';

$routes= new Route();
$controller= new Controller();
$RegisterController =  new RegisterController();
Route::set('/' , function () use ($controller)
{
    $controller->index();

});


Route::set('/show' , function ()  use ($controller)
{
    $controller->show();
});


Route::set('/products/create' , function ()  use ($controller)
{
    $controller->create();
});

Route::set('/products/delete', function () use ($controller)
{
    $controller->delete();
});

Route::set('/products/show', function() use ($controller){
    $controller->show();
});

Route::set('/products/update', function () use ($controller)
{
    $controller->update();
});

Route::set('/products/comment', function () use ($controller)
{
    $controller->show();
});


Route::set('/register' , function () use ($RegisterController)
{
    $RegisterController->register();

});


Route::set('/login' , function () use ($RegisterController)
{
    $RegisterController->login();

});

Route::set('/logout', function () use ($RegisterController)
{
    $RegisterController->logout();

});



$routes->execute();