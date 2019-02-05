<HTML>
<HEAD>
	<META http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<TITLE>INSERT 2 CONFIRM</TITLE>
	<STYLE TYPE="text/css">
		table {
			border: solid 1px #708090;
			border-collapse: collapse;
		}
		th {
			border: solid 1px #708090;
			text-align: center;
			font-weight: bold;
		}
		td {
			border: solid 1px #708090;
		}
	</STYLE>
</HEAD>

<BODY>
	<H1>２. INSERT実行確認</H1>
<?php
	$host = 'localhost';
	$dbname = 'acy_db';
	$charset = 'utf8';
	$user = 'dbuser';
	$password = 'dbuserpass';

	$dsn = 'mysql:host='.$host.';dbname='.$dbname.';charset='.$charset;
	$dbh = new PDO($dsn, $user, $password);

	//フォームに入力された文字列を受け取り，各変数に格納
	//$id = "";
	//if(isset($_GET['id'])) {
	//	$id = htmlspecialchars($_GET['id']);
	//}
    	$email = "";
    	if(isset($_GET['email'])) {
        	$email = htmlspecialchars($_GET['email']);
    	}
    	$password = "";
    	if(isset($_GET['password'])) {
        	$password = htmlspecialchars($_GET['password']);
    	}
    	$last_login = "";
    	if(isset($_GET['last_login'])) {
        	$last_login = htmlspecialchars($_GET['last_login']);
    	}
    	$name = "";
    	if(isset($_GET['name'])) {
        	$name = htmlspecialchars($_GET['name']);
    	}
    	$gender = "";
    	if(isset($_GET['gender'])) {
        	$gender = htmlspecialchars($_GET['gender']);
    	}
    	$birthday = "";
    	if(isset($_GET['birthday'])) {
        	$birthday = htmlspecialchars($_GET['birthday']);
    	}
    	$age = "";
    	if(isset($_GET['age'])) {
        	$age = htmlspecialchars($_GET['age']);
    	}
    	$postal_code = "";
    	if(isset($_GET['postal_code'])) {
        	$postal_code = htmlspecialchars($_GET['postal_code']);
    	}
    	$prefecture = "";
    	if(isset($_GET['prefecture'])) {
        	$prefecture = htmlspecialchars($_GET['prefecture']);
    	}
    	$phone = "";
    	if(isset($_GET['phone'])) {
        	$phone = htmlspecialchars($_GET['phone']);
    	}
    	$is_deleted = "";
    	if(isset($_GET['is_deleted'])) {
        	$is_deleted = htmlspecialchars($_GET['is_deleted']);
    	}

	//フォームに入力された文字列を使って追加
	$sql = 'INSERT INTO user (email, password, last_login, name, gender, birthday, age, postal_code, prefecture, phone, is_deleted) VALUES ("'.$email.'", "'.$password.'", "'.$last_login.'", "'.$name.'", "'.$gender.'", "'.$birthday.'", "'.$age.'", "'.$postal_code.'", "'.$prefecture.'", "'.$phone.'", "'.$is_deleted.'");';

	$stmt = $dbh->query($sql);

	print("追加が完了しました");
	print("<p>");

	//追加されたデータの表示
	$sql = 'SELECT * FROM user where id > 100000';
	$stmt = $dbh->query($sql);
        $dbh = null;

	print("<table>");

	print("<tr>");
	print("<th>id</th>");
	print("<th>emai</th>");
	print("<th>password</th>");
	print("<th>last_login</th>");
	print("<th>name</th>");
	print("<th>gender</th>");
	print("<th>birthday</th>");
	print("<th>age</th>");
	print("<th>postal_code</th>");
	print("<th>prefecture</th>");
	print("<th>phone</th>");
	print("<th>is_deleted</th>");
	print("</tr>");

	//検索結果が複数なので（１行ではないので），データの出力をループで繰り返す
	foreach ($stmt as $row) {
		print("<tr>");
		print("<td>".$row['id']."</td>");
		print("<td>".$row['email']."</td>");
		print("<td>".$row['password']."</td>");
		print("<td>".$row['last_login']."</td>");
		print("<td>".$row['name']."</td>");
		print("<td>".$row['gender']."</td>");
		print("<td>".$row['birthday']."</td>");
		print("<td>".$row['age']."</td>");
		print("<td>".$row['postal_code']."</td>");
		print("<td>".$row['prefecture']."</td>");
		print("<td>".$row['phone']."</td>");
		print("<td>".$is_deleted['id']."</td>");
		print("</tr>");
	}

	print("</table>");

        print("<p>");
        print("<a href=insert_1_form.html>戻る</a>");
?>
</BODY>
</HTML>
