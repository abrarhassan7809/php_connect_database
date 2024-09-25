<?php 
include("./config.php");
global $conn;

$getStudents = $conn->prepare("select * from students");
$getStudents->execute();
$students = $getStudents->fetchAll();

echo "<table border='1'>";
foreach($students as $student) {
    echo "<tr>
        <td style=width:100px;>".$student['name']."</td>
        <td style=width:100px;>".$student['course']."</td>
        <td style=width:100px;>".$student['batch']."</td>
        <td style=width:100px;>".$student['city']."</td>
        <td style=width:100px;>".$student['year']."</td>

    </tr>";
}
echo "</table>";

?>