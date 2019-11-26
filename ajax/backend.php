<?php
	$host = 'localhost';
	$dbname = 'acy_db';
	$charset = 'utf8';
	$user = 'dbuser';
	$password = 'dbuserpass';

	$dsn = 'mysql:host='.$host.';dbname='.$dbname.';charset='.$charset;
	$dbh = new PDO($dsn, $user, $password);

    $name = "";
    if(isset($_GET['name'])) {
        $name = htmlspecialchars($_GET['name']);
    }

    //$sql = 'SELECT * FROM user WHERE name LIKE "%'.$name.'%";';
    $sql = "SELECT * FROM user WHERE name LIKE '%".$name."%';";
    $stmt = $dbh->query($sql);

    // create xml
    header('Content-type: text/xml; charset=utf-8');
    print "<?xml version=1.0?>";
    print "<list>";

    foreach ($stmt as $row) {
        print "<user>";
        print "<id>".$row['id']."</id>";
        print "<email>".$row['email']."</email>";
        print "<password>".$row['password']."</password>";
        print "<last_login>".$row['last_login']."</last_login>";
        print "<name>".$row['name']."</name>";
        print "<gender>".$row['gender']."</gender>";
        print "<birthday>".$row['birthday']."</birthday>";
        print "<age>".$row['age']."</age>";
        print "<postal_code>".$row['postal_code']."</postal_code>";
        print "<prefecture>".$row['prefecture']."</prefecture>";
        print "<phone>".$row['phone']."</phone>";
    }

    print "</list>";
?>
