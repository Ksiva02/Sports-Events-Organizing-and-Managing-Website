<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require './PHPMailer/PHPMailer/src/Exception.php';
require './PHPMailer/PHPMailer/src/PHPMailer.php';
require './PHPMailer/PHPMailer/src/SMTP.php';

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sports_registration";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sportName = $_POST['sportName'];
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$gender = $_POST['gender'];  
$accommodation = $_POST['accommodation'];

$validSports = ["Basketball", "Football", "Hockey"];
if (!in_array($sportName, $validSports)) {
    die("Invalid sport selection.");
}

$tableName = strtolower(str_replace(" ", "_", $sportName));

$sql = "INSERT INTO $tableName (name, email, phone, gender, accommodation) VALUES (?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssss", $name, $email, $phone, $gender, $accommodation);

if ($stmt->execute()) {
    $last_id = $conn->insert_id;

    $subject = "🏆 Sports Registration Confirmation - Welcome Aboard!";
    $message = "Dear $name,\n\n"
        . "Congratulations! 🎉 You have successfully registered for $sportName.\n\n"
        . "Here are your registration details:\n"
        . "🏅 Registration ID: $last_id\n"
        . "👤 Name: $name\n"
        . "📧 Email: $email\n"
        . "📞 Phone: $phone\n"
        . "🏠 Accommodation: $accommodation\n\n"
        . "Best Regards,\n"
        . "Sports Management Team";

    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'nksivapvp@gmail.com';  
        $mail->Password = 'txbv dzhf pdex wthk';  
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;
        $mail->isHTML(true);

        $mail->setFrom('nksivapvp@gmail.com', 'Sports Management Team');
        $mail->addAddress($email, $name);
        $mail->Subject = $subject;
        $mail->Body = nl2br($message);

        if ($mail->send()) {
            echo "<script>
                    alert('Registration successful! Check your email for confirmation.');
                    window.location.href = 'index.php';
                  </script>";
        } else {
            die("Error sending email.");
        }
    } catch (Exception $e) {
        die("Error sending email: " . $mail->ErrorInfo);
    }
} else {
    die("Error: " . $stmt->error);
}


$stmt->close();
$conn->close();
?>
