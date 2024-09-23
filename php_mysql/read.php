<?php
include("./config.php");
global $conn;
$getStudents = $conn->prepare("SELECT * FROM students");
$getStudents->execute();
$students = $getStudents->fetchAll();
echo "<br>";
print_r($students);

foreach($students as $student){
    echo $student['name'];
    echo "<br>";
}
?>

