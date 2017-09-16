<?php

require 'Controllers/SmoothieController.php';
$smoothieController = new SmoothieController();

$title = "Welcome";
$content = 
'<h1>110% organic and sugar free smoothies!</h3>
<p>Our smoothies are being made using the latest technology in
juice extraction devices. They are even healthier than water that you
drink every day! Our couriers are more than happy to deliver them
right at your door mat.</p>

<h1>Order now!</h1>'. 
 "<form action='' method='post'>
    <fieldset>
        
        <label for='name'>Smoothie: </label>
        <select class='inputField' name='ddlName' id='ddlName'>"
 //           ."<option value='%'>Select your flavor</option>"
        .$smoothieController->CreateOptionValues($smoothieController->GetSmoothieTypes()).
        "</select>
            <br/>
        
        <label for='quantity'>Quantity: </label>
        <input type='text' class='inputField' name ='txtQuantity' />ml<br/>
        
        <label for='ordername'>Full name: </label>
        <input type='text' class='inputField' name ='txtOrdername' /><br/>
        
        <label for='orderadress'>Adress: </label>
        <input type='text' class='inputField' name ='txtOrderadress' /><br/>
        
        <input type='submit' value='Send order'>
        
        
    </fieldset>    
</form>" ;

if(isset($_POST["txtQuantity"]) and $_POST["txtOrdername"] != '' and $_POST["txtOrderadress"]!='')
{
    $smoothieController->InsertSmoothie();
}
        
include 'Template.php';

?>



