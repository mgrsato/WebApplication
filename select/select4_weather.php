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

	//フォームに入力された文字列を受け取り，変数「$temperature」に格納
    $temperature = "";
    if(isset($_GET['temperature'])) {
        $temperature = htmlspecialchars($_GET['temperature']);
    }

	//フォームに入力された文字列「$temperature」を使って検索
	$sql = 'select * from weather where (temperature + 0) >= "'.$temperature.'"';

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
