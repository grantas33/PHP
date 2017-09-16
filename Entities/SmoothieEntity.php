<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SmoothieEntity
 *
 * @author Vartotojas
 */
class SmoothieEntity {
    public $id;
    public $name;
    public $quantity;
    public $ordername;
    public $orderadress;
    public $price;
    
    function __construct($id, $name, $quantity, $ordername, $orderadress, $price) {
        $this->id = $id;
        $this->name = $name;
        $this->quantity = $quantity;
        $this->ordername = $ordername;
        $this->orderadress = $orderadress;
        $this->price = $price;
    }

    
}
