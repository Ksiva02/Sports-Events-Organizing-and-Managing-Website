<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $servername="localhost";
        $username="root";

        $con=new mysqli($servername,$username);
        $sql="create database sports_registration";

        if($con->query($sql)===true){
            echo"DATABASE CREATED";
        }

    ?>
</body>
</html>