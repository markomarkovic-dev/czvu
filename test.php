<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<body>
<?php
    // Define the connection parameters
    $servername = 'cvu.hardcode.solutions';
    $dbname = 'your_database_name';
    $username = 'your_username';
    $password = 'your_password';

    // Create a new PDO instance
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo 'Connected successfully!';
    } catch (PDOException $e) {
        echo 'Connection failed: ' . $e->getMessage();
    }
?>

</body>
</body>
</html>