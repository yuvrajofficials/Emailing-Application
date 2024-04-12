<?php

include("database.php");

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 400px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }
        input[type="text"],
        input[type="password"],
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 16px;
        }
        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
        .error-message {
            color: red;
            margin-top: 10px;
            text-align: center;
        }
    </style>
     <style>
      
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
       
    
    </style>

</head>
<body>
<div class="navbar">
        <h1 style="color:#ffffff">Email App</h1>
        <ul>
         <li>Welcome !!</li>
        </ul>
    </div>
    <div class="container">
        <h2>Login</h2>
        <form action="login.php" method="post" id="create">
            <input type="text" placeholder="Username" name="username">
            <input type="password" placeholder="Password" name="password">
            <input type="submit" name="submit" value="Login">
        </form>
      
    </div>
</body>
</html>


<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];


    $sql = "Select * from mail where username='$username'";
    $result = mysqli_query($conn, $sql);

    $num = mysqli_num_rows($result);

    if ($num == 1) {
        while ($row = mysqli_fetch_assoc($result)) {
            if (password_verify($password, $row['password'])) {
                $login = true;
                // session_start();
                $_SESSION['loggedin'] = true;
                $_SESSION['username'] = $username;
                $_SESSION['email'] = $row["email"];
                echo "<script>alert('Welcome to App')</script>";
                header("Location: inbox.php");
            }
            
        }
    } else {
    echo "<script>alert('Invalid Credentials')</script>";

    }
}
else {
    echo "<script>console.log('Error occured')</script>";
 }

?>