<?php

include("authcheck.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Inbox</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .navbar {
            background: rgb(63,228,251);
background: radial-gradient(circle, rgba(63,228,251,1) 0%, rgba(70,122,252,1) 100%);
             color: #fff;
            padding: 10px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .navbar ul {
            list-style: none;
            margin: 0;
            padding: 0;
            display: flex;
        }
        .navbar ul li {
            margin-right: 20px;
        }
        .navbar ul li:last-child {
            margin-right: 0;
        }
        .navbar ul li a {
            text-decoration: none;
            color: #fff;
            font-weight: bold;
            transition: color 0.3s ease;
        }
        .navbar ul li a:hover {
            color: #f0f0f0;
        }
        .container {
            max-width: 800px;
            margin: 20px auto;
        }
        .email-card {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-bottom: 20px;
            transition: transform 0.3s ease;
        }
        .email-card:hover {
            transform: translateY(-5px);
        }
        .email-card-content {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .email-card-content h3 {
            margin: 0;
            font-size: 18px;
        }
        .email-card-content p {
            margin: 0;
            color: #666;
        }
        .email-card-content a {
            text-decoration: none;
            color: #333;
            transition: color 0.3s ease;
        }
        .email-card-content a:hover {
            color: #007bff;
        }
    </style>
</head>
<body>
    <div class="navbar">
        <h1 style="color:#ffffff">Email App</h1>
        <ul>
           <li><?php echo $_SESSION["username"]; ?></li>
        <!-- <li><?php // echo $_SESSION["email"]; ?></li>  -->
            <li><a href="/PHP development/Mail Application/inbox.php">Inbox</a></li>
            <li><a href="/PHP development/Mail Application/compose.php">Compose</a></li>
            <li><a href="/PHP development/Mail Application/logout.php" >Logout</a></li>
        </ul>
    </div>
    
</body>
</html>
