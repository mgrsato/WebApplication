<?php
    session_start();

    $login_success_url = "success.php";

    if(isset($_POST["login"])) {
        $host = 'localhost';
        $dbname = 'acy_db';
        $charset = 'utf8';
        $user = 'dbuser';
        $password = 'dbuserpass';
        $dsn = 'mysql:host='.$host.';dbname='.$dbname.';charset='.$charset;
        $dbh = new PDO($dsn, $user, $password);
        $sql = 'SELECT * FROM user where email = "' . $_POST["entered_user_name"] . '";';
        $stmt = $dbh->query($sql);

        foreach ($stmt as $row) {
            $registered_password = $row['password'];
            $registered_name = $row['name'];
        }
        $dbh = null;

        if($_POST["entered_user_name"] == "") {
            $error_message = "ユーザー名を入力してください．";
        }elseif($_POST["entered_password"] == "") {
            $error_message = "パスワードを入力してください．";
        }elseif($_POST["entered_password"] == $registered_password) {
            $_SESSION["entered_user_name"] = $_POST["entered_user_name"];
            $_SESSION["registered_name"] = $registered_name;
            header("Location: {$login_success_url}");
            exit;
        }else{
            $error_message = "ユーザー名，パスワードの組み合わせが違います．";
        }
    }
?>


<html>

<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
    <title>LOGIN</title>
    <STYLE TYPE="text/css">
    table {
    border: solid 1px #708090;
    border-collapse: collapse;
    width: 800px;
    }
    th {
    border: solid 1px #708090;
    text-align: center;
    font-weight: bold;
    }
    td {
    border: solid 1px #708090;
    }
    .alert {
    padding: 15px;
    margin-bottom: 20px;
    border: 1px solid transparent;
    border-radius: 4px;
    width: 800px;
    height: 20px;

    color: #a94442;
    background-color: #f2dede;
    border-color: #ebccd1;
    }
    </STYLE>
</head>

<body>
    <form action="index2.php" method="POST">
        <p>ユーザー名（メールアドレス）：<input type="text" name="entered_user_name" value=""></p>
        <p>パスワード：<input type="password" name="entered_password" value=""></p>
        <input type="submit" name="login" value="ログイン">
    </form>

    <br>
    <p>参考）登録済みユーザー名，パスワードの組み合わせ</p>
    <p>bn0Ws@sample.jp, fQ9zi64a</p>
    <p>Jnt40P94@sample.org, kwJc5j5i</p>
    <br>

    <div id="alert" class="alert">
        <?php
            if($error_message) {
                echo "「" . $error_message . "」";
            }
        ?>
    </div>
</body>

</html>


