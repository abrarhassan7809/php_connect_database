<?php
include("./config.php");
global $conn;

$getStudent = $conn->prepare("select id, name from students");
$getStudent->execute();
$studentData = $getStudent->fetchAll();

echo "<select>";
echo "<option disabled>Select Name</option>";
foreach ($studentData as $student) {
    echo "<option value=".$student['name'].">".$student['name']."</option>";
}
echo "</select>";

?>