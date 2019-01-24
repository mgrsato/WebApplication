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

	//フォームに入力された文字列を受け取り，変数「$prefecture」に格納
    $prefecture = "";
    if(isset($_GET['prefecture'])) {
        $prefecture = htmlspecialchars($_GET['prefecture']);
    }

	//フォームに入力された文字列「$prefecture」を使って検索
	$sql = 'SELECT * FROM user where prefecture = "'.$prefecture.'"';

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
