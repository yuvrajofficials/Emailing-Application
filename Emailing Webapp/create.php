<?php

include("database.php");


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 400px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
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
</head>

<body>
    <?php
    include("header.php");
    ?>
    <div class="container">
        <h2>Admin Registration</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" id="create">
            <input type="text" placeholder="First Name" name="fname">
            <input type="text" placeholder="Last Name" name="lname">
            <input type="text" placeholder="Username" name="username">
            <input type="text" placeholder="Email" name="email">
            <input type="text" placeholder="Phone" name="phone">
            <input type="password" placeholder="Create Password" name="createpassword">
            <input type="password" placeholder="Confirm Password" name="confirmpassword">
            <input type="submit" name="submit" value="Register">
        </form>

    </div>
</body>

</html>


<?php

if (!empty($_POST["createpassword"]) && !empty($_POST["confirmpassword"])) {

$cr = $_POST["createpassword"];
$cf = $_POST["confirmpassword"];


if ($cr == $cf) {




    if (!empty($_POST["username"]) && !empty($_POST["confirmpassword"])) {



        echo " matched";

        $fname = $_POST["fname"];
        $lname = $_POST["lname"];
        $username = $_POST["username"];
        $email = $_POST["email"];
        $phone = $_POST["phone"];
        $pass = $_POST["confirmpassword"];

        $hash = password_hash($pass, PASSWORD_DEFAULT);

        $sql = "INSERT INTO mail (fname,lname,username,email,phone,password)
  VALUES('$fname','$lname','$username','$email','$phone','$hash')";

        mysqli_query($conn, $sql);



        header("Location: inbox.php");
    }
} else {
    echo "not matched";
}

}
?>