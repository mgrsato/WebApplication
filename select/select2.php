<HTML>

<HEAD> 
	<META http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<TITLE>SELECT | INSERT | UPDATE | DELETE</TITLE>
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
	<H1>SELECT</H1>
<?php
	$host = 'localhost';
	$dbname = 'acy_db';
	$charset = 'utf8';
	$user = 'dbuser';
	$password = 'dbuserpass';

	$dsn = 'mysql:host='.$host.';dbname='.$dbname.';charset='.$charset;
	$dbh = new PDO($dsn, $user, $password);

	$sql = 'SELECT * FROM user where id = 5';

	$stmt = $dbh->query($sql);

	foreach ($stmt as $row) {
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
	    
	$dbh = null;

	//PHPの変数に格納されたデータベースのデータを，HTMLのテーブルとして出力
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

	print("<tr>");
	print("<td>".$id."</td>");
	print("<td>".$email."</td>");
	print("<td>".$password."</td>");
	print("<td>".$last_login."</td>");
	print("<td>".$name."</td>");
	print("<td>".$gender."</td>");
	print("<td>".$birthday."</td>");
	print("<td>".$age."</td>");
	print("<td>".$postal_code."</td>");
	print("<td>".$prefecture."</td>");
	print("<td>".$phone."</td>");
	print("<td>".$is_deleted."</td>");
	print("</tr>");

	print("</table>");
?>
</BODY>
</HTML>