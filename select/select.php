<HTML>

<HEAD> 
	<META http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<TITLE>SELECT | INSERT | UPDATE | DELETE</TITLE>
</HEAD>

<BODY>
<H1>SELECT</H1>
<?php
	//ホスト名
	$host = 'localhost';

	//データベース名
	$dbname = 'acy_db';

	//文字エンコード
	$charset = 'utf8';

	//ユーザー名
	$user = 'dbuser';

	//パスワード
	$password = 'dbuserpass';

	//PDOインスタンスを生成
	$dsn = 'mysql:host='.$host.';dbname='.$dbname.';charset='.$charset;
	$dbh = new PDO($dsn, $user, $password);

	//SELECT文を変数「$sql」に格納
	$sql = 'SELECT * FROM user where id = 5';

	//SQLステートメント(stmt)を実行し、結果を変数「$stmt」に格納
	$stmt = $dbh->query($sql);
	    
	//foreach文で結果が格納された配列の中身を一行ずつ出力
	foreach ($stmt as $row) {
		//データベースのフィールド名で取り出し，同名のPHPの変数に格納
		$id = $row['id'];
		$email = $row['email'];
		$password = $row['password'];
		$last_login = $row['last_login'];
		$name = $row['name'];
		$gender = $row['gender'];
		$birthday = $row['birthday'];
		$age = $row['age'];
		$postal_code = $row['postal_code'];
		$prefecture = $row['prefecture'];
		$phone = $row['phone'];
		$is_deleted = $is_deleted['id'];
	}

	//データベースとの接続を閉じる
	$dbh = null;

	//PHPの変数に格納されたデータベースのデータを，HTMLとして出力
	print("<p>id          = ".$id."</p>");
	print("<p>emai        = ".$email."</p>");
	print("<p>password    = ".$password."</p>");
	print("<p>last_login  = ".$last_login."</p>");
	print("<p>name        = ".$name."</p>");
	print("<p>gender      = ".$gender."</p>");
	print("<p>birthday    = ".$birthday."</p>");
	print("<p>age         = ".$age."</p>");
	print("<p>postal_code = ".$postal_code."</p>");
	print("<p>prefecture  = ".$prefecture."</p>");
	print("<p>phone       = ".$phone."</p>");
	print("<p>is_deleted  = ".$is_deleted."</p>");
?>
</BODY>

</HTML>