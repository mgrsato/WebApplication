<!-- https://developers.google.com/chart/interactive/docs/gallery/linechart -->
<!-- chartjs.php?starting_date=20151201 -->
<?php
    $dsn = 'mysql:host=localhost;dbname=acy_db;charset=utf8';
    $user = 'dbuser';
    $password = 'dbuserpass';

    // $starting_date = "20171201";
    $starting_date = "";
    if(isset($_GET['starting_date'])) {
        $starting_date = htmlspecialchars($_GET['starting_date']);
    }

    try {
        $dbh = new PDO($dsn, $user, $password);
        $sql = "SELECT * FROM weather where date >= ".$starting_date." limit 10";
        $stmt = $dbh->query($sql);

        $i = 0;
        foreach ($stmt as $row) {
            // id, date, temperature, precipitation, sunshine_hours, wind_speed, humidity, snowfall
            $id[$i] = $row['id'];
            $date[$i] = $row['date'];
            $temperature[$i] = $row['temperature'];
            $precipitation[$i] = $row['precipitation'];
            $sunshine_hours[$i] = $row['sunshine_hours'];
            $wind_speed[$i] = $row['wind_speed'];
            $humidity[$i] = $row['humidity'];
            $snowfall[$i] = $row['snowfall'];
            $i = $i + 1;
        }

        $dbh = null;

    } catch (PDOException $e) {
        echo 'データベースにアクセスできません！' . $e->getMessage();
        exit;
    }
?>

<html>
<head>
    <META http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <TITLE>chart</TITLE>
    <STYLE TYPE="text/css">
        table {
            border-collapse: collapse;
            table-layout: fixed;
            font-size: 18px;
            width: 100%;
        }
        table th,
        table td {
            border: 1px solid #CCCCCC;
            padding: 5px 10px;
            text-align: left;
        }
        table td {
            background-color: #FFFFFF;
        }
    </STYLE>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script>
        google.charts.load('current', { packages: ['corechart', 'line'] });
        google.charts.setOnLoadCallback(drawCurveTypes);

        function drawCurveTypes() {
            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Date');
            data.addColumn('number', 'Temperature');
            data.addColumn('number', 'Precipitation');
            data.addColumn('number', 'Sunshine Hours');
            data.addColumn('number', 'Wind Speed');
            data.addColumn('number', 'Humidity');
            data.addColumn('number', 'Snowfall');

            data.addRows([
                ["<?php print($date[0]); ?>", <?php print($temperature[0]); ?>, <?php print($precipitation[0]); ?>, <?php print($sunshine_hours[0]); ?>, <?php print($wind_speed[0]); ?>, <?php print($humidity[0]); ?>, <?php print($snowfall[0]); ?>], 
                ["<?php print($date[1]); ?>", <?php print($temperature[1]); ?>, <?php print($precipitation[1]); ?>, <?php print($sunshine_hours[1]); ?>, <?php print($wind_speed[1]); ?>, <?php print($humidity[1]); ?>, <?php print($snowfall[1]); ?>], 
                ["<?php print($date[2]); ?>", <?php print($temperature[2]); ?>, <?php print($precipitation[2]); ?>, <?php print($sunshine_hours[2]); ?>, <?php print($wind_speed[2]); ?>, <?php print($humidity[2]); ?>, <?php print($snowfall[2]); ?>], 
                ["<?php print($date[3]); ?>", <?php print($temperature[3]); ?>, <?php print($precipitation[3]); ?>, <?php print($sunshine_hours[3]); ?>, <?php print($wind_speed[3]); ?>, <?php print($humidity[3]); ?>, <?php print($snowfall[3]); ?>], 
                ["<?php print($date[4]); ?>", <?php print($temperature[4]); ?>, <?php print($precipitation[4]); ?>, <?php print($sunshine_hours[4]); ?>, <?php print($wind_speed[4]); ?>, <?php print($humidity[4]); ?>, <?php print($snowfall[4]); ?>], 
                ["<?php print($date[5]); ?>", <?php print($temperature[5]); ?>, <?php print($precipitation[5]); ?>, <?php print($sunshine_hours[5]); ?>, <?php print($wind_speed[5]); ?>, <?php print($humidity[5]); ?>, <?php print($snowfall[5]); ?>], 
                ["<?php print($date[6]); ?>", <?php print($temperature[6]); ?>, <?php print($precipitation[6]); ?>, <?php print($sunshine_hours[6]); ?>, <?php print($wind_speed[6]); ?>, <?php print($humidity[6]); ?>, <?php print($snowfall[6]); ?>], 
            ]);

            var options = {
                hAxis: {
                    title: 'Date'
                },
                vAxis: {
                    title: 'Value'
                },

                width: 1200,
                height: 800
            };

            // 折れ線グラフ
            var chart = new google.visualization.LineChart(document.getElementById('chart_div'));
            // 棒グラフ
            // var chart = new google.visualization.BarChart(document.getElementById('chart_div'));
            
            chart.draw(data, options);
        }
    </script>
</head>
<body>
    <div id="chart_div"></div>

    <table>
        <tr>
            <th>Date</th>
            <th>Temperature</th>
            <th>Precipitation</th>
            <th>Sunshine Hours</th>
            <th>Wind Speed</th>
            <th>Humidity</th>
            <th>Snowfall</th>
        </tr>
        <tr>
            <td><?php print($date[0]); ?></td>
            <td><?php print($temperature[0]); ?></td>
            <td><?php print($precipitation[0]); ?></td>
            <td><?php print($sunshine_hours[0]); ?></td>
            <td><?php print($wind_speed[0]); ?></td>
            <td><?php print($humidity[0]); ?></td>
            <td><?php print($snowfall[0]); ?></td>
        </tr>
        <tr>
            <td><?php print($date[1]); ?></td>
            <td><?php print($temperature[1]); ?></td>
            <td><?php print($precipitation[1]); ?></td>
            <td><?php print($sunshine_hours[1]); ?></td>
            <td><?php print($wind_speed[1]); ?></td>
            <td><?php print($humidity[1]); ?></td>
            <td><?php print($snowfall[1]); ?></td>
        </tr>
        <tr>
            <td><?php print($date[2]); ?></td>
            <td><?php print($temperature[2]); ?></td>
            <td><?php print($precipitation[2]); ?></td>
            <td><?php print($sunshine_hours[2]); ?></td>
            <td><?php print($wind_speed[2]); ?></td>
            <td><?php print($humidity[2]); ?></td>
            <td><?php print($snowfall[2]); ?></td>
        </tr>
        <tr>
            <td><?php print($date[3]); ?></td>
            <td><?php print($temperature[3]); ?></td>
            <td><?php print($precipitation[3]); ?></td>
            <td><?php print($sunshine_hours[3]); ?></td>
            <td><?php print($wind_speed[3]); ?></td>
            <td><?php print($humidity[3]); ?></td>
            <td><?php print($snowfall[3]); ?></td>
        </tr>
        <tr>
            <td><?php print($date[4]); ?></td>
            <td><?php print($temperature[4]); ?></td>
            <td><?php print($precipitation[4]); ?></td>
            <td><?php print($sunshine_hours[4]); ?></td>
            <td><?php print($wind_speed[4]); ?></td>
            <td><?php print($humidity[4]); ?></td>
            <td><?php print($snowfall[4]); ?></td>
        </tr>
        <tr>
            <td><?php print($date[5]); ?></td>
            <td><?php print($temperature[5]); ?></td>
            <td><?php print($precipitation[5]); ?></td>
            <td><?php print($sunshine_hours[5]); ?></td>
            <td><?php print($wind_speed[5]); ?></td>
            <td><?php print($humidity[5]); ?></td>
            <td><?php print($snowfall[5]); ?></td>
        </tr>
        <tr>
            <td><?php print($date[6]); ?></td>
            <td><?php print($temperature[6]); ?></td>
            <td><?php print($precipitation[6]); ?></td>
            <td><?php print($sunshine_hours[6]); ?></td>
            <td><?php print($wind_speed[6]); ?></td>
            <td><?php print($humidity[6]); ?></td>
            <td><?php print($snowfall[6]); ?></td>
        </tr>
    </table>
</body>
</html>
