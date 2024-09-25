<?php
include("./config.php");
global $conn;

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $getStudent = $conn->prepare("select * from students where id='$id'");
    $getStudent->execute();
    $student = $getStudent->fetchAll();

    $name = $student[0]['name'];
    $course = $student[0]['course'];
    $batch = $student[0]['batch'];
    $city = $student[0]['city'];
    $year = $student[0]['year'];

}

?>

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
            <h2 style="text-align: center;">Edit User</h2>
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" placeholder="Enter name" name="name" value="<?php echo $name ?>">
            </div>
            <div class="form-group">
                <label for="course">Course</label>
                <input type="text" placeholder="Enter course" name="course" value="<?php echo $course ?>">
            </div>
            <div class="form-group">
                <label for="batch">Batch</label>
                <input type="text" placeholder="Enter batch" name="batch" value="<?php echo $batch ?>">
            </div>
            <div class="form-group">
                <label for="city">City</label>
                <input type="text" placeholder="Enter city" name="city" value="<?php echo $city ?>">
            </div>
            <div class="form-group">
                <label for="year">Year</label>
                <input type="text" placeholder="Enter name" name="year" value="<?php echo $year ?>">
            </div>

            <button value="<?php echo $id ?>" name='update'>Update</button>

        </form>

    </div>
</body>
</html>

<?php 
if (isset($_POST['update'])) {
    $id = $_POST['update'];
    $name = $_POST['name'];
    $course = $_POST['course'];
    $batch = $_POST['batch'];
    $city = $_POST['city'];
    $year = $_POST['year'];

    $updateStudent = $conn->prepare("update students set
                    name='$name',
                    course='$course',
                    batch='$batch',
                    city='$city',
                    year='$year'
                    where id='$id'");

    if ($updateStudent->execute()) {
        header('location:delete_data.php');
    }else {
        echo "Update faliar";
    }

}
?>