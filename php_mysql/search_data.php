<form action="" method="post">
    <input type="text" name="search" placeholder="search here...">
    <button>search</button>

</form>

<?php
include("./config.php");
global $conn;

if (isset($_POST['search'])) {
    $search = $_POST['search'];
    $students = $conn->prepare("select * from students where name like '%$search%'");
    $students->execute();
    $result = $students->fetchAll();

    echo "<table border='1'>";
    foreach($result as $student) {
        echo "<tr>
            <td style=width:100px;>".$student['name']."</td>
            <td style=width:100px;>".$student['course']."</td>
            <td style=width:100px;>".$student['batch']."</td>
            <td style=width:100px;>".$student['city']."</td>
            <td style=width:100px;>".$student['year']."</td>

        </tr>";
    }
    echo "</table>";

}

?>