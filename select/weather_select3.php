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
	//$sql = 'SELECT * FROM user where id < 5';
	//$sql = 'SELECT * FROM user where prefecture = "神奈川県"';
	//$sql = 'SELECT * FROM user where prefecture like "%山%"';
	//$sql = 'SELECT * FROM user where name like "鈴木%"';
	//$sql = 'SELECT * FROM user where age > 60';
	//$sql = 'SELECT * FROM user where name like "鈴木%" and age > 60';
	$sql = 'select * from weather where temperature <= 2;';

	$stmt = $dbh->query($sql);


	print("<table>");

	print("<tr>");
	print("<th>id</th>");
	print("<th>date</th>");
	print("<th>temperature</th>");
	print("<th>precipitation</th>");
	print("<th>sunshine_hours</th>");
	print("<th>wind_speed</th>");
	print("<th>humidity</th>");
	print("<th>snowfall</th>");
	print("</tr>");

	//検索結果が複数なので（１行ではないので），データの出力をループで繰り返す
	foreach ($stmt as $row) {
		print("<tr>");
		print("<td>".$row['id']."</td>");
		print("<td>".$row['date']."</td>");
		print("<td>".$row['temperature']."</td>");
		print("<td>".$row['precipitation']."</td>");
		print("<td>".$row['sunshine_hours']."</td>");
		print("<td>".$row['wind_speed']."</td>");
		print("<td>".$row['humidity']."</td>");
		print("<td>".$row['snowfall']."</td>");
		print("</tr>");
	}

	print("</table>");

	$dbh = null;
?>
</BODY>
</HTML>
