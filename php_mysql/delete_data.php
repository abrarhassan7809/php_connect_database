<?php
include("./config.php");
global $conn;

$students = $conn->prepare("select * from students");
$students->execute();
$results = $students->fetchAll();

echo "<table border='1'>";
foreach($results as $result) {
    echo "<tr>
        <td style=width:100px;>".$result['name']."</td>
        <td style=width:100px;>".$result['course']."</td>
        <td style=width:100px;>".$result['batch']."</td>
        <td style=width:100px;>".$result['city']."</td>
        <td style=width:100px;>".$result['year']."</td>
        <td><form method='post'><button name=delete value=".$result['id'].">Delete</button></form></td>
        <td><a href='update_data.php?id=".$result['id']."'><button>Edit</button></a></td>
    </tr>";
}
echo "</table>";

if (isset($_POST['delete'])) {
    $id = $_POST['delete'];
    $dbStudent = $conn->prepare("delete from students where id='$id'");

    if ($dbStudent->execute()) {
        echo "Data deleted Successfully";
    }else {
        echo "Data not deleted";
    }

}

?>