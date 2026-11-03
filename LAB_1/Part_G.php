<?php
// PART G
class Vehicles{
    protected $brand;

    function __construct($brand){
        $this->brand = $brand;
    }

    function start(){
        echo "The vehicle is starting"."<br>";
    }
}

class Car extends Vehicles{

    function showBrand(){
        echo "Car brand: " . $this->brand . "<br>";
    }
}


$car1 = new Car("BMW");
$car1->start();
$car1->showBrand();

?>