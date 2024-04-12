

<!DOCTYPE html>
<html>
<head>
    <title>Compose</title>
    <meta charset="UTF-8">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f1f1f1;
        }

        .container {
            max-width: 600px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            margin-top: 0;
            margin-bottom: 20px;
            color: #333;
        }

        form {
            display: grid;
            grid-gap: 20px;
        }

        label {
            font-weight: bold;
            color: #333;
        }

        input[type="text"],
        input[type="email"],
        textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        textarea {
            height: 200px;
        }

        button {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
<?php
include("header.php");
?>


    <div class="container">
        <h1 style="text-align:center">Compose</h1>
        <hr>
        <br>
        
        <form method="post" action="">
            <label for="email">To</label>
            <input type="email" name="email" id="email" required>
            
            <label for="subject">Subject</label>
            <input type="text" name="subject" id="subject" required>
            
            <label for="message">Message</label>
            <textarea name="message" id="message" required></textarea>
            
            <button type="submit" name="send">Send</button>
        </form>
    </div>

    <?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require 'phpmailer/src/Exception.php';
    require 'phpmailer/src/PHPMailer.php';
    require 'phpmailer/src/SMTP.php';

    if(isset($_POST["send"])){
        $mail = new PHPMailer(true);

        $mail->isSMTP();
        $mail->SMTPAuth = true;
        $mail->Host = "smtp.gmail.com";
        $mail->Username = ""; // Replace with your Gmail email
        $mail->Password = ""; // Replace with your Gmail password
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;
        
        $mail->setFrom(''); // Replace with your Gmail email
        $mail->addAddress($_POST["email"]);
        $mail->isHTML(true);

        $mail->Subject = $_POST["subject"];
        $mail->Body = $_POST["message"];
        
        try {
            $mail->send();
            echo "<script>alert('Email sent successfully!');</script>";
        } catch (Exception $e) {
            echo "<script>alert('Email could not be sent. Mailer Error: {$mail->ErrorInfo}');</script>";
        }
    }
    ?>
</body>
</html>
