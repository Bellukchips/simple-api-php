<?php

require_once "LaundyController.php";
//
$laundry = new LaundryController();
$method = $_SERVER["REQUEST_METHOD"];
switch ($method) {
    case 'GET':
        $laundry->index();
        break;
    case 'POST':
        if(!empty($_GET['id'])){
            $id = intval($_GET['id']);
            $laundry->update($id);
        }else{
            $laundry->create();
        }
        break;
    case 'PUT':
        $id = intval($_GET['id']);
        $laundry->edit($id);
        break;
    case 'DELETE':
        $id = intval($_GET['id']);
        $laundry->destroy($id);
        break;
    default:
        // Invalid Request Method
        header("HTTP/1.0 405 Method Not Allowed");
        break;
}
