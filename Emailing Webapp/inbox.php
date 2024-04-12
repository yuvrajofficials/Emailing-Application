


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
<?php

include("header.php");
?>
    <div class="container">
        <h2 style="padding: 20px 15px; margin: 0;">Email Inbox</h2>
        <?php
        $scriptUrl = ""; //google app script url
        $limit = 12;
        $offset = 0;
        $data = array(
            "action" => "inboxList",
            "limit" => $limit,
            "offset" => $offset
        );

        $ch = curl_init($scriptUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        $result = curl_exec($ch);
        $result = json_decode($result, true);

        if ($result['status'] == 'success') {
            foreach ($result['data'] as $inbox) {
                ?>
                <div class="email-card">
                    <div class="email-card-content">
                        <h3><?php echo $inbox['subject']; ?></h3>
                        <p><?php echo $inbox['date']; ?></p>
                    </div>
                    <p>From: <?php echo $inbox['from']; ?></p>
                    <a href="read_mail.php?id=<?php echo $inbox['id']; ?>">Read more</a>
                </div>
                <?php
            }
        }
        ?>
    </div>
</body>
</html>
