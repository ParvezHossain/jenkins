<?php

include("./connection.php");

class Student{
    private $name;
    private $age;
    private $gender;

    public function __construct($name, $age, $gender = "Male")
    {
        $this->name = $name;
        $this->age = $age;
        $this->gender = $gender;
    }

    public function save($conn){
        $sql = "INSERT INTO dummy_table (name, age, gender) VALUES ('$this->name', '$this->age', '$this->gender')";
        $conn->exec($sql);
    }

}
$std = new Student("Parvez", 27, "FeMale");
$std->save($myConnection);
