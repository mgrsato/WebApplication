<?php
$db_user  = "dbuser"; //database user name
$db_password = "dbuserpass"; //database password
$db_name = "acy_db"; //database name
$db_table_name = "user"; //database table name
$db_host  = "localhost";

// create xml
header('Content-type: text/xml; charset=utf-8');
echo '<?xml version="1.0"?>';
echo '<list>';

$name = null;

if (isset($_GET['name'])) {
    $name = $_GET['name'];

    $con = mysql_connect($db_host, $db_user, $db_password) or die("Error!");
    mysql_select_db($db_name, $con) or die("DB is not exist");
    $strsql = "SET CHARACTER SET UTF8";
    mysql_query($strsql, $con);
    $strsql = "SELECT id, name, gender, birthday, age, postal_code, prefecture, phone FROM " . $db_table_name . " WHERE name LIKE '%" . $name . "%';";
    $res = mysql_query($strsql, $con);

    while ($item = mysql_fetch_array($res)) {
        print "<user>";
        print "<id>" . $item[0] . "</id>";
        print "<name>" . $item[1] . "</name>";
        print "<gender>" . $item[2] . "</gender>";
        print "<birthday>" . $item[3] . "</birthday>";
        print "<age>" . $item[4] . "</age>";
        print "<postal_code>" . $item[5] . "</postal_code>";
        print "<prefecture>" . $item[6] . "</prefecture>";
        print "<phone>" . $item[7] . "</phone>";
        print "</user>";
    }
    mysql_close($con);
}

echo '</list>';
?>