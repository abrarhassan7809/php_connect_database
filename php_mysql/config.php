<?php
$host = "localhost";
$username = "root";
$password = null;

try {
    $conn = new PDO("mysql:host=$host;dbname=database_name",$username,$password);
    $conn = setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connection Successfully";
}catch(PDOException $err) {
    echo "Connection Failed $err->getMessage()";
}

echo "<br>";
$result = $conn->query("show tables");

while($row = $result->fetch(PDO::FETCH_NUM)){
    print_r($row);
}

?>

