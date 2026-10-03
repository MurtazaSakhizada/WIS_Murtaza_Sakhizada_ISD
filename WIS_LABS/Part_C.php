<?php
// PART C 

class Student{

    public $name;
    public $studentId;
    public $department; 


    function __construct($name, $studentId, $department)
    {
        $this->name = $name;
        $this->studentId = $studentId;
        $this->department = $department;
    }
    function showInfo()
    {
        echo "Name: " . $this->name . "<br>";
        echo "Student ID: " . $this->studentId . "<br>";
        echo "Department: " . $this->department . "<br>";
    }
}

$student2 = new Student("Sara", 1002, "Information Systems");
$student2->showInfo();


/* 
   Q: How many classes did you create?
   A: only One       
   Q: How many objects did you create?
   A: two st1 & st2
*/

?>