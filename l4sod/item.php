<?php
$itemtype="Electronics";
//purchasing quantity
$quantity=
$totalPrice=0;
switch($itemtype){
case"Electronics":
$pricePerItem=500;
break;
case"clothing":
 $pricePerItem=100;
 break;
 case"books":
    $pricePeritem=30;
    break;
    default:
    echo"invalid item type!";
    exit();
    $totalPrice=$itemtype*10;
    if($quantity=="books">10){
        $totalPrice*=10 ;
    }
    if($itemType=="quantity"){
        $totalPrice*=10;
    }
    echo"the total price for purchasing".$quantity."".$itemtyp." is:$".number_format($totalPrice);           
}
?>