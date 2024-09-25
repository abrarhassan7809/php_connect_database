<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        .user_form_div {
            height: 500px;
            width: 500px;
            align-content: center;
            margin-left: auto;
            margin-right: auto;
        }
        input[type=text], input[type=password] {
            width: 100%;
            padding: 15px;
            margin: 5px 0 22px 0;
            display: inline-block;
            border: none;
            background: #f1f1f1;
        }

        input[type=text]:focus, input[type=password]:focus {
            background-color: #ddd;
            outline: none;
        }
        button {
            background-color: dimgrey;
            height: 30px;
            width: 80px;
            margin-top: 30px;
            justify-content: center;
        }
    </style>
    <title></title>
</head>

<body>
    <div class="user_form_div">
        <form class="user_form" action="", method="post">
            <h2 style="text-align: center;">User Form</h2>
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" placeholder="Enter name", name="name">
            </div>
            <div class="form-group">
                <label for="course">Course</label>
                <input type="text" placeholder="Enter course", name="course">
            </div>
            <div class="form-group">
                <label for="batch">Batch</label>
                <input type="text" placeholder="Enter batch", name="batch">
            </div>
            <div class="form-group">
                <label for="city">City</label>
                <input type="text" placeholder="Enter city", name="city">
            </div>
            <div class="form-group">
                <label for="year">Year</label>
                <input type="text" placeholder="Enter name", name="year">
            </div>

            <button type="submit">Submit</button>

        </form>

    </div>
</body>
</html>

<?php
include("./config.php");
global $conn;

if (isset($_POST['name'])) {
    $name = $_POST['name'];
    $course = $_POST['course'];
    $batch = $_POST['batch'];
    $city = $_POST['city'];
    $year = $_POST['year'];

    $student = $conn->prepare("
        INSERT INTO students (`name`, `course`, `batch`, `city`, `year`) 
        VALUES ('$name', '$course', '$batch', '$city', '$year')
    ");

    $result = $student->execute();

    if ($result) {
        echo "Data Inserted";
    } else {
        echo "Data not Inserted";
    }
}

?>
