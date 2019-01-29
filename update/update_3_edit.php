<HTML>
<HEAD>
	<META http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<TITLE>UPDATE 3 EDIT</TITLE>
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
	<H1>3. UPDATE内容編集</H1>
<?php
	$host = 'localhost';
	$dbname = 'acy_db';
	$charset = 'utf8';
	$user = 'dbuser';
	$password = 'dbuserpass';

	$dsn = 'mysql:host='.$host.';dbname='.$dbname.';charset='.$charset;
	$dbh = new PDO($dsn, $user, $password);

	//フォームに入力された文字列を受け取り，変数「$search_keyword」に格納
    $search_keyword = "";
    if(isset($_GET['search_keyword'])) {
        $search_keyword = htmlspecialchars($_GET['search_keyword']);
    }

	//フォームに入力された文字列「$search_keyword」を使って検索
	$sql = 'SELECT * FROM user where id = "'.$search_keyword.'"';

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

	print("<form action='update_4_confirm.php' method='get' name='update_confirm'>");
	foreach ($stmt as $row) {
		print("<tr>");
		//「id」は変更不可とするのでそのまま表示
		print("<td>".$row['id']."</td>");
		//ただし「id」のデータはhiddenで送る
		print("<input type='hidden' name='id' value='".$row['id']."'/>");
		//「id」以外は変更可能とするため，変更可能なテキストとして表示
		print("<td><input type='text' name='email' value='".$row['email']."'/></td>");
		print("<td><input type='text' name='password' value='".$row['password']."'/></td>");
		print("<td><input type='text' name='last_login' value='".$row['last_login']."'/></td>");
		print("<td><input type='text' name='name' value='".$row['name']."'/></td>");
		print("<td><input type='text' name='gender' value='".$row['gender']."'/></td>");
		print("<td><input type='text' name='birthday' value='".$row['birthday']."'/></td>");
		print("<td><input type='text' name='age' value='".$row['age']."'/></td>");
		print("<td><input type='text' name='postal_code' value='".$row['postal_code']."'/></td>");
		print("<td><input type='text' name='prefecture' value='".$row['prefecture']."'/></td>");
		print("<td><input type='text' name='phone' value='".$row['phone']."'/></td>");
		print("<td><input type='text' name='is_deleted' value='".$row['is_deleted']."'/></td>");
		print("</tr>");
	}
	print("</table>");

	print("<input style='width: 90px; height: 24px;' type='submit' value='変更'>");
	print("</form>");
	print("<button style='width: 90px; height: 24px;' type='button' onclick='history.back()'>戻る</button>");

	$dbh = null;
?>
</BODY>
</HTML>
