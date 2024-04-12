

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Read Gmail</title>
   <style>
      body {
         font-family: Arial, sans-serif;
         margin: 0;
         padding: 20px;
         background-color: #f2f2f2;
      }
      .email-container {
         max-width: 600px;
         margin: 0 auto;
         background-color: #fff;
         padding: 20px;
         border-radius: 8px;
         box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      }
      .email-header {
         border-bottom: 1px solid #ddd;
         padding-bottom: 10px;
         margin-bottom: 20px;
      }
      .email-header b {
         font-size: 18px;
      }
      .email-body {
         line-height: 1.6;
      }
   </style>
</head>
<body>
<?php
include("header.php");
?>

   <div class="email-container">
      <div class="email-header">
         <?php
            $id = isset($_GET['id']) ? $_GET['id'] : "";
            $scriptUrl=""; //your app script url
            $data = array(
               "action" => "inboxRead",
               "id"  => $id,
            );

            $ch = curl_init($scriptUrl);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
            $result = curl_exec($ch);
            $result = json_decode($result, true);

            $from = $result['data']['from'];
            $subject = $result['data']['subject'];
            $body = $result['data']['body'];
            $plainBody = $result['data']['plainBody'];

            echo "<b>From:</b> $from<br><br>";
            echo "<b>Subject:</b> $subject<br><br>";
         ?>
      </div>
      <div class="email-body">
         <?php
            echo $plainBody;
         ?>
      </div>
   </div>
</body>
</html>
