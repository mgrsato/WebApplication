<?php
    // ini_set("display_errors", 1);
    // error_reporting(E_ALL);

    $host = 'localhost';
    $dbname = 'typing';
    $charset = 'utf8';
    $user = 'dbuser';
    $password = 'dbuserpass';

    $dsn = 'mysql:host='.$host.';dbname='.$dbname.';charset='.$charset;
    $dbh = new PDO($dsn, $user, $password);

    $name = "";
    if(isset($_GET['name'])) {
        $name = htmlspecialchars($_GET['name']);
    }
    $number_total = "";
    if(isset($_GET['number_total'])) {
        $number_total = htmlspecialchars($_GET['number_total']);
    }
    $number_miss = "";
    if(isset($_GET['number_miss'])) {
        $number_miss = htmlspecialchars($_GET['number_miss']);
    }
    $time_min = "";
    if(isset($_GET['time_min'])) {
        $time_min = htmlspecialchars($_GET['time_min']);
    }
    $time_sec = "";
    if(isset($_GET['time_sec'])) {
        $time_sec = htmlspecialchars($_GET['time_sec']);
    }

    $timestamp = date("Y-m-d H:i:s", time());;
    $time_required = '0:'.$time_min.':'.$time_sec;

    $sql = 'INSERT INTO 2019_itip1_typing_result (timestamp, name, number_total, number_miss, time_required) VALUES ("'.$timestamp.'", "'.$name.'", '.$number_total.', '.$number_miss.', "'.$time_required.'");';
    $stmt = $dbh->query($sql);

    $sql_2 = 'SELECT * FROM 2019_itip1_typing_result where name = "'.$name.'" ORDER BY id DESC LIMIT 1';
    $stmt_2 = $dbh->query($sql_2);
    
    $i = 0;
    foreach ($stmt_2 as $row) {
    // id, timestamp, name, number_total, number_miss, time_required
        $db_id[$i] = $row['id'];
        $db_timestamp[$i] = $row['timestamp'];
        $db_name[$i] = $row['name'];
        $db_number_total[$i] = $row['number_total'];
        $db_number_miss[$i] = $row['number_miss'];
        $db_time_required[$i] = $row['time_required'];

        $i = $i + 1;
    }

    $dbh = null;
?>

<HEAD>
    <META http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <TITLE>2019 ITIP1 タイピング練習：結果登録</TITLE>
    <STYLE TYPE="text/css">
        body {
            font-family: 'Hiragino Kaku Gothic ProN', 'ヒラギノ角ゴ ProN W3', Meiryo, メイリオ, Osaka, 'MS PGothic', arial, helvetica, sans-serif;
            font-size: 12px;
        }

        button,
        input,
        select,
        textarea {
            font-family: inherit;
            font-size: 100%;
            width: 200px;
        }

        table {
            border: 1px solid #708090;
            border-collapse: collapse;
            table-layout: fixed;
            width: 800px;
        }

        th {
            padding: 5px 10px;
            border: 1px solid #CCCCCC;
            text-align: right;
            font-weight: bold;
        }

        td {
            padding: 5px 10px;
            border: 1px solid #CCCCCC;
            text-align: left;
            background-color: #FFFFFF;
        }

        .boxElementSearch {
            border: 1px solid #CCCCCC;
            padding: 10px 10px;
            /* float: left; */
            width: 800px;
            background-color: #eee;
            /* display: flex;
            justify-content: center;
            align-items: center; */
        }
    </STYLE>
</HEAD>

<BODY>
    <div class='boxElementSearch'>
    <H1>2019 ITIP1 タイピング練習：結果登録(<?php print($db_name[0]); ?>)</H1>
    <div id="chart_div"></div>
    <table>
        <tr>
            <th width='200px'>登録内容</th>
            <th></th>
        </tr>
        <tr>
            <th>実施日</th>
            <td><?php print($db_timestamp[0]); ?></td>
        </tr>
        <tr>
            <th>総タイプ数(key)</th>
            <td><?php print($db_number_total[0]); ?></td>
        </tr>
        <tr>
            <th>ミスタイプ数(key)</th>
            <td><?php print($db_number_miss[0]); ?></td>
        </tr>
        <tr>
            <th>所要時間</th>
            <td><?php print($db_time_required[0]); ?></td>
        </tr>
    </table>
    <br />
    <input style='width: 90px; height: 24px;' type="button" onclick="location.href='view_chart.php?name=<?php print($db_name[0]); ?>'" value="chart" />
    </div>
</BODY>
</HTML>