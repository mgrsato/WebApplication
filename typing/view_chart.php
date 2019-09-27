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

    $sql = 'SELECT * FROM 2019_itip1_typing_result where name = "'.$name.'" ORDER BY id DESC LIMIT 5';
    $stmt = $dbh->query($sql);
    
    $i = 0;
    foreach ($stmt as $row) {
    // id, timestamp, name, number_total, number_miss, time_required
        $db_id[$i] = $row['id'];
        $db_timestamp[$i] = $row['timestamp'];
        $db_name[$i] = $row['name'];
        $db_number_total[$i] = $row['number_total'];
        $db_number_miss[$i] = $row['number_miss'];
        $db_time_required[$i] = $row['time_required'];

        $mistake_rate[$i] = ($db_number_miss[$i] / $db_number_total[$i] * 100);
        $hms = explode(':', $db_time_required[$i]);
        // $sec_time_required[$i] = ($hms[0] * 3600 + $hms[1] * 60 + $hms[2]);
        $min_time_required[$i] = ($hms[0] * 60 + $hms[1]  + $hms[2] / 60);

        $i = $i + 1;
    }

    $dbh = null;
?>

<HEAD>
    <META http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <TITLE>2019 ITIP1 タイピング練習：最新の5件表示</TITLE>
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

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script>
        google.charts.load('current', { packages: ['corechart', 'line'] });
        google.charts.setOnLoadCallback(drawCurveTypes);
        function drawCurveTypes() {
            var data = new google.visualization.DataTable();
            data.addColumn('string', 'timestamp');
            data.addColumn('number', 'mistake_rate');
            data.addColumn('number', 'min_time_required');
            data.addRows([
                ["<?php print($db_timestamp[4]); ?>", <?php print($mistake_rate[4]); ?>, <?php print($min_time_required[4]); ?>], 
                ["<?php print($db_timestamp[3]); ?>", <?php print($mistake_rate[3]); ?>, <?php print($min_time_required[3]); ?>], 
                ["<?php print($db_timestamp[2]); ?>", <?php print($mistake_rate[2]); ?>, <?php print($min_time_required[2]); ?>], 
                ["<?php print($db_timestamp[1]); ?>", <?php print($mistake_rate[1]); ?>, <?php print($min_time_required[1]); ?>], 
                ["<?php print($db_timestamp[0]); ?>", <?php print($mistake_rate[0]); ?>, <?php print($min_time_required[0]); ?>], 
            ]);
            var options = {
                hAxis: {
                    title: '実施日'
                },
                // vAxis: {
                //     title: 'mistake rate[%], time required[sec] '
                // },
                series:{
                    0:{targetAxisIndex:0},
                    1:{targetAxisIndex:1}
                },
                vAxes: {
                    0: {logScale: false, title: 'mistake rate [%]', minValue: 0, maxValue: 100},
                    1: {logScale: false, title: 'time required [min]', minValue: 0, maxValue: 10}
                },
                width: 800,
                height: 400
            };
            // 折れ線グラフ
            var chart = new google.visualization.LineChart(document.getElementById('chart_div'));
            // 棒グラフ
            // var chart = new google.visualization.BarChart(document.getElementById('chart_div'));
            
            chart.draw(data, options);
        }
    </script>
</HEAD>

<BODY>
    <div class='boxElementSearch'>
    <H1>2019 ITIP1 タイピング練習：最新の5件表示(<?php print($db_name[0]); ?>)</H1>
    <div id="chart_div"></div>
    <table>
        <tr>
            <th width='200px'></th>
            <th>5</th>
            <th>4</th>
            <th>3</th>
            <th>2</th>
            <th>1(最新)</th>
        </tr>
        <tr>
            <th>実施日</th>
            <td><?php print($db_timestamp[4]); ?></td>
            <td><?php print($db_timestamp[3]); ?></td>
            <td><?php print($db_timestamp[2]); ?></td>
            <td><?php print($db_timestamp[1]); ?></td>
            <td><?php print($db_timestamp[0]); ?></td>
        </tr>
        <tr>
            <th>総タイプ数(key)</th>
            <td><?php print($db_number_total[4]); ?></td>
            <td><?php print($db_number_total[3]); ?></td>
            <td><?php print($db_number_total[2]); ?></td>
            <td><?php print($db_number_total[1]); ?></td>
            <td><?php print($db_number_total[0]); ?></td>
        </tr>
        <tr>
            <th>ミスタイプ数(key)</th>
            <td><?php print($db_number_miss[4]); ?></td>
            <td><?php print($db_number_miss[3]); ?></td>
            <td><?php print($db_number_miss[2]); ?></td>
            <td><?php print($db_number_miss[1]); ?></td>
            <td><?php print($db_number_miss[0]); ?></td>
        </tr>
        <tr>
            <th>所要時間</th>
            <td><?php print($db_time_required[4]); ?></td>
            <td><?php print($db_time_required[3]); ?></td>
            <td><?php print($db_time_required[2]); ?></td>
            <td><?php print($db_time_required[1]); ?></td>
            <td><?php print($db_time_required[0]); ?></td>
        </tr>
    </table>
    </div>
</BODY>
</HTML>