<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SmoothieModel
 *
 * @author Vartotojas
 */
require ("Entities/SmoothieEntity.php"); 
class SmoothieModel {
    
    function GetSmoothieTypes()
    {
        require 'Credentials.php';
        
        $connection = mysqli_connect($host, $user, $passwd, $database); //or die(mysqli_connect_error());
       // mysqli_select_db($database);
        $result = mysqli_query($connection, "SELECT CONCAT(name, ', ', price, '€') FROM defaultsm");
                //or die(mysqli_connect_error());
        $names = array();
        
        while($row = mysqli_fetch_array($result))
        {
            array_push($names, $row[0]);
        }
        
        mysqli_close($connection);
        return $names;
    }
    
    function GetSmoothieOrders()
    {
        require 'Credentials.php';
        
        $connection = mysqli_connect($host, $user, $passwd, $database);
        $result = mysqli_query($connection, "SELECT * FROM johnsshop");
        $smoothies = array();
        while($row = mysqli_fetch_array($result))
        {
            $id = $row[0];
            $name = $row[1];
            $quantity = $row[2];
            $ordername = $row[3];
            $orderadress = $row[4];
            $price = $row[5];
            
            $smoothie = new SmoothieEntity($id, $name, $quantity, $ordername, $orderadress, $price);
            array_push($smoothies, $smoothie);
        }
        
        mysqli_close($connection);
        return $smoothies;
    }
    
    function InsertSmoothie(SmoothieEntity $smoothie)
    {
        require 'Credentials.php';
        
        $connection = mysqli_connect($host, $user, $passwd, $database);
        $query = sprintf("INSERT INTO johnsshop
                (name, quantity, ordername, orderadress, price)
                VALUES
                ('%s','%s','%s','%s','%s')",
        mysqli_real_escape_string($connection, $smoothie->name),
        mysqli_real_escape_string($connection, $smoothie->quantity),
        mysqli_real_escape_string($connection, $smoothie->ordername),
        mysqli_real_escape_string($connection, $smoothie->orderadress),
        mysqli_real_escape_string($connection, $smoothie->price));
        
        mysqli_query($connection, $query);
                
        
        mysqli_close($connection);
    }
    
//    function GetSmoothiePrice($name)
//    {
//        require 'Credentials.php';
//        
//        $connection = mysqli_connect($host, $user, $passwd, $database);      
//        $result = mysqli_query($connection, "SELECT price FROM defaultsm WHERE name = $name");
//        mysqli_close($connection);
//        return $result;
//    }  
    
    
    
}

?>
