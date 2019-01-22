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

	//下記のSQL文を一つずつ有効にして，それぞれどのような結果になるか試してみましょう
	$sql = 'SELECT * FROM user where id < 5';
	//$sql = 'SELECT * FROM user where prefecture = "神奈川県"';
	//$sql = 'SELECT * FROM user where prefecture like "%山%"';
	//$sql = 'SELECT * FROM user where name like "鈴木%"';
	//$sql = 'SELECT * FROM user where age > 60';
	//$sql = 'SELECT * FROM user where name like "鈴木%" and age > 60';

	$stmt = $dbh->query($sql);


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

	$dbh = null;
?>
</BODY>
</HTML>