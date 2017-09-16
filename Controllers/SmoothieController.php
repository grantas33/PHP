<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SmoothieController
 *
 * @author Vartotojas
 */

require ("Model/SmoothieModel.php");
class SmoothieController {
    
    function CreateOptionValues(array $valueArray)
    {
        $result = "";
        
        foreach($valueArray as $value)
        {
            $result = $result."<option value='$value'>$value</option>";         
        }
        
        return $result;
    }
    
    function GetSmoothieTypes()
    {
        $smoothieModel = new SmoothieModel();
        return $smoothieModel->GetSmoothieTypes();
    }
    
    function GetSmoothieOrders()
    {
        $smoothieModel = new SmoothieModel();
        return $smoothieModel->GetSmoothieOrders();
    }
    
//    function GetSmoothiePrice($name)
//    {
//        $smoothieModel = new SmoothieModel();
//        return $smoothieModel->GetSmoothiePrice($name);
//    }
    
    function InsertSmoothie()
    {
        $namestring = $_POST["ddlName"];
        $dataarray = explode(", ", $namestring);
        $name = $dataarray[0];
        $quantity = $_POST["txtQuantity"];
        $ordername = $_POST["txtOrdername"];
        $orderadress = $_POST["txtOrderadress"];
        $price = substr($dataarray[1], 0, -1);
        
        $smoothie = new SmoothieEntity(-1, $name, $quantity, $ordername, $orderadress, $price * ($quantity/100));
        $smoothieModel = new SmoothieModel();
        $smoothieModel->InsertSmoothie($smoothie);
    }
    
    function CreateOrderTable(){
        $result = "
            <table class='orderTable'>
                <tr>
                    <td><b>Id</b></td>
                    <td><b>Smoothie</b></td>
                    <td><b>Quantity (ml)</b></td>
                    <td><b>Full name</b></td>
                    <td><b>Adress</b></td>
                    <td><b>Total price (€)</b></td>
                </tr>";       
        $smoothieOrders = $this->GetSmoothieOrders();     
        foreach($smoothieOrders as $key => $value){
            $result = $result.
                    "<tr>
                        <td>$value->id</td>
                        <td>$value->name</td>
                        <td>$value->quantity</td>
                        <td>$value->ordername</td>
                        <td>$value->orderadress</td>
                        <td>$value->price</td>
                    </tr>";}
       $result = $result. "</table";   
       return $result;
    }
}
