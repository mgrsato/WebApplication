<?php
    session_start();

    $no_login_url = "index.php";

    if(!isset($_SESSION["user_name"])) {
        header("Location: {$no_login_url}");
        exit;
    }
?>

<html>

<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
    <title>LOGIN</title>
</head>

<body>
<?php
    echo "<p>" . $_SESSION["registered_name"] . "さん，こんばんは</p>";
?>
</body>

</html>