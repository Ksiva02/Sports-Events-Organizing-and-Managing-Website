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
        $password="";
        $db="sports_registration";

        $con=new mysqli($servername,$username,$password,$db);

        $sql="create table Football(
                ID INT(3) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                Name varchar(25),
                Email varchar(30),
                Phone bigint(10),
                Gender varchar(15),
                accommodation ENUM('Yes', 'No')
                )";

                if($con->query($sql)===true){
                    echo"TABLE CREATED";
                }
    ?>
</body>
</html>