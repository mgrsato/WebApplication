<?php
    session_start();

    $no_login_url = "index.php";

    if(!isset($_SESSION["entered_user_name"])) {
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
    ログインに成功しました．
<?php
    echo "<p>" . $_SESSION["registered_name"] . "さん，こんにちは</p>";
    echo "<p><a href='next.php'>次へ</a></p>";
?>
</body>

</html>