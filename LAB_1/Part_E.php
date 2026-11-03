<?php
// PART E and F

class Person{
    public $name;

    function __construct($name){
        $this->name = $name;
    }

    function introduce(){
        echo "My Name is " . $this->name . "<br>";
    }
}


class OOPStudent extends Person{
    function study(){
        echo $this->name . " is studying.<br>";
    }
}
$student3 = new OOPStudent("Gholam");
$student3->introduce();
$student3->study();


?>