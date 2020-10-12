<HTML>
<HEAD>
	<META http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<TITLE>UPDATE 4 CONFIRM</TITLE>
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
	<H1>4. UPDATE実行確認</H1>
<?php
	$host = 'localhost';
	$dbname = 'acy_db';
	$charset = 'utf8';
	$user = 'dbuser';
	$password = 'dbpass';

	$dsn = 'mysql:host='.$host.';dbname='.$dbname.';charset='.$charset;
	$dbh = new PDO($dsn, $user, $password);

	//フォームに入力された文字列を受け取り，各変数に格納
	$id = "";
	if(isset($_GET['id'])) {
		$id = htmlspecialchars($_GET['id']);
	}
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

	//フォームに入力された文字列を使って更新
	//$sql = 'SELECT * FROM user where id = "'.$search_keyword.'"';
	//$sql = 'UPDATE user SET email='.$email.', password='.$password.', last_login='.$last_login.', name='.$name.', gender='.$gender.', birthday='.$birthday.', age='.$age.', postal_code='.$postal_code.', prefecture='.$prefecture.', phone='.$phone.', is_deleted='.$is_deleted.' WHERE id='.$id.';';
	$sql = 'UPDATE user SET email="'.$email.'", password="'.$password.'", last_login="'.$last_login.'", name="'.$name.'", gender="'.$gender.'", birthday="'.$birthday.'", age="'.$age.'", postal_code="'.$postal_code.'", prefecture="'.$prefecture.'", phone="'.$phone.'" WHERE id="'.$id.'";';

	$stmt = $dbh->query($sql);
	$dbh = null;

	print("更新が完了しました");
	print($sql);
	
	print("<p>");
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

        print("<p>");
        print("<a href=update_1_form.html>戻る</a>");
?>
</BODY>
</HTML>

