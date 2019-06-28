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
	<H1>SELECT(weather3)</H1>
<?php
	$host = 'localhost';
	$dbname = 'acy_db';
	$charset = 'utf8';
	$user = 'dbuser';
	$password = 'dbuserpass';
	$dsn = 'mysql:host='.$host.';dbname='.$dbname.';charset='.$charset;
	$dbh = new PDO($dsn, $user, $password);
	$sql = 'SELECT * FROM weather3';
	// $sql = 'SELECT * FROM weather3 order by id DESC limit 10';
	$stmt = $dbh->query($sql);
	print("<table>");
	print("<tr>");
    print("<th>id</th>");
    print("<th>obs_time</th>");
    print("<th>obs_weather</th>");
    print("<th>obs_temperature</th>");
    print("<th>obs_humidity</th>");
    print("<th>obs_pressure</th>");
    print("<th>obs_wind_direction</th>");
    print("<th>obs_wind_speed</th>");
	print("</tr>");
	foreach ($stmt as $row) {
		print("<tr>");
        print("<td>".$row['id']."</td>");
        print("<td>".$row['obs_time']."</td>");
        print("<td>".$row['obs_weather']."</td>");
        print("<td>".$row['obs_temperature']."</td>");
        print("<td>".$row['obs_humidity']."</td>");
        print("<td>".$row['obs_pressure']."</td>");
        print("<td>".$row['obs_wind_direction']."</td>");
        print("<td>".$row['obs_wind_speed']."</td>");
		print("</tr>");
	}
	print("</table>");
	$dbh = null;
?>
</BODY>
</HTML>