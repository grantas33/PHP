<?php
require 'Controllers/SmoothieController.php';
$title = "Orders";
$smoothieController = new SmoothieController();

$content = $smoothieController->CreateOrderTable();

include './Template.php';
?>



