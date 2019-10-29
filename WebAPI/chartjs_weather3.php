<!-- https://developers.google.com/chart/interactive/docs/gallery/linechart -->
<!-- chartjs.php?starting_date=20151201 -->
<?php
    $dsn = 'mysql:host=localhost;dbname=acy_db;charset=utf8';
    $user = 'dbuser';
    $password = 'dbuserpass';

    // $starting_date = "";
    // if(isset($_GET['starting_date'])) {
    //     $starting_date = htmlspecialchars($_GET['starting_date']);
    // }

    try {
        $dbh = new PDO($dsn, $user, $password);
        // $sql = "SELECT * FROM weather where date >= ".$starting_date." limit 10";
        $sql = "SELECT * FROM weather3 ORDER BY obs_time DESC LIMIT 10;";
        $stmt = $dbh->query($sql);

        $i = 0;
        foreach ($stmt as $row) {
            // id, date, temperature, precipitation, sunshine_hours, wind_speed, humidity, snowfall
            // $id[$i] = $row['id'];
            // $date[$i] = $row['date'];
            // $temperature[$i] = $row['temperature'];
            // $precipitation[$i] = $row['precipitation'];
            // $sunshine_hours[$i] = $row['sunshine_hours'];
            // $wind_speed[$i] = $row['wind_speed'];
            // $humidity[$i] = $row['humidity'];
            // $snowfall[$i] = $row['snowfall'];

            // id, obs_time, obs_weather, obs_temperature, obs_humidity, obs_pressure, obs_wind_direction, obs_wind_speed
            $id[$i] = $row['id'];
            $obs_time[$i] = $row['obs_time'];
            $obs_weather[$i] = $row['obs_weather'];
            $obs_temperature[$i] = $row['obs_temperature'];
            $obs_humidity[$i] = $row['obs_humidity'];
            $obs_pressure[$i] = $row['obs_pressure'];
            $obs_wind_direction[$i] = $row['obs_wind_direction'];
            $obs_wind_speed[$i] = $row['obs_wind_speed'];
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
            // data.addColumn('string', 'Weather');
            data.addColumn('number', 'Temperature');
            data.addColumn('number', 'Humidity');
            data.addColumn('number', 'Pressure');
            // data.addColumn('string', 'Wind Direction');
            data.addColumn('number', 'Wind Speed');

            data.addRows([
                [
                    "<?php print($obs_time[0]); ?>", 
                    // "<?php print($obs_weather[0]); ?>", 
                    <?php print($obs_temperature[0]); ?>, 
                    <?php print($obs_humidity[0]); ?>, 
                    <?php print($obs_pressure[0]); ?>, 
                    // "<?php print($obs_wind_direction[0]); ?>", 
                    <?php print($obs_wind_speed[0]); ?>
                ], 
                [
                    "<?php print($obs_time[1]); ?>", 
                    // "<?php print($obs_weather[1]); ?>", 
                    <?php print($obs_temperature[1]); ?>, 
                    <?php print($obs_humidity[1]); ?>, 
                    <?php print($obs_pressure[1]); ?>, 
                    // "<?php print($obs_wind_direction[1]); ?>", 
                    <?php print($obs_wind_speed[1]); ?>
                ], 
                [
                    "<?php print($obs_time[2]); ?>", 
                    // "<?php print($obs_weather[2]); ?>", 
                    <?php print($obs_temperature[2]); ?>, 
                    <?php print($obs_humidity[2]); ?>, 
                    <?php print($obs_pressure[2]); ?>, 
                    // "<?php print($obs_wind_direction[2]); ?>", 
                    <?php print($obs_wind_speed[2]); ?>
                ], 
                [
                    "<?php print($obs_time[3]); ?>", 
                    // "<?php print($obs_weather[3]); ?>", 
                    <?php print($obs_temperature[3]); ?>, 
                    <?php print($obs_humidity[3]); ?>, 
                    <?php print($obs_pressure[3]); ?>, 
                    // "<?php print($obs_wind_direction[3]); ?>", 
                    <?php print($obs_wind_speed[3]); ?>
                ], 
                [
                    "<?php print($obs_time[4]); ?>", 
                    // "<?php print($obs_weather[4]); ?>", 
                    <?php print($obs_temperature[4]); ?>, 
                    <?php print($obs_humidity[4]); ?>, 
                    <?php print($obs_pressure[4]); ?>, 
                    // "<?php print($obs_wind_direction[4]); ?>", 
                    <?php print($obs_wind_speed[4]); ?>
                ], 
                [
                    "<?php print($obs_time[5]); ?>", 
                    // "<?php print($obs_weather[5]); ?>", 
                    <?php print($obs_temperature[5]); ?>, 
                    <?php print($obs_humidity[5]); ?>, 
                    <?php print($obs_pressure[5]); ?>, 
                    // "<?php print($obs_wind_direction[5]); ?>", 
                    <?php print($obs_wind_speed[5]); ?>
                ], 
                [
                    "<?php print($obs_time[6]); ?>", 
                    // "<?php print($obs_weather[6]); ?>", 
                    <?php print($obs_temperature[6]); ?>, 
                    <?php print($obs_humidity[6]); ?>, 
                    <?php print($obs_pressure[6]); ?>, 
                    // "<?php print($obs_wind_direction[6]); ?>", 
                    <?php print($obs_wind_speed[6]); ?>
                ], 
                [
                    "<?php print($obs_time[7]); ?>", 
                    // "<?php print($obs_weather[7]); ?>", 
                    <?php print($obs_temperature[7]); ?>, 
                    <?php print($obs_humidity[7]); ?>, 
                    <?php print($obs_pressure[7]); ?>, 
                    // "<?php print($obs_wind_direction[7]); ?>", 
                    <?php print($obs_wind_speed[7]); ?>
                ], 
                [
                    "<?php print($obs_time[8]); ?>", 
                    // "<?php print($obs_weather[8]); ?>", 
                    <?php print($obs_temperature[8]); ?>, 
                    <?php print($obs_humidity[8]); ?>, 
                    <?php print($obs_pressure[8]); ?>, 
                    // "<?php print($obs_wind_direction[8]); ?>", 
                    <?php print($obs_wind_speed[8]); ?>
                ], 
                [
                    "<?php print($obs_time[9]); ?>", 
                    // "<?php print($obs_weather[9]); ?>", 
                    <?php print($obs_temperature[9]); ?>, 
                    <?php print($obs_humidity[9]); ?>, 
                    <?php print($obs_pressure[9]); ?>, 
                    // "<?php print($obs_wind_direction[9]); ?>", 
                    <?php print($obs_wind_speed[9]); ?>
                ], 
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
            <th>TIME</th>
            <th>Weather</th>
            <th>Temperature</th>
            <th>Humidity</th>
            <th>Pressure</th>
            <th>Wind Direction</th>
            <th>Wind Speed</th>
        </tr>
        <tr>
            <td><?php print($obs_time[0]); ?></td>
            <td><?php print($obs_weather[0]); ?></td>
            <td><?php print($obs_temperature[0]); ?></td>
            <td><?php print($obs_humidity[0]); ?></td>
            <td><?php print($obs_pressure[0]); ?></td>
            <td><?php print($obs_wind_direction[0]); ?></td>
            <td><?php print($obs_wind_speed[0]); ?></td>
        </tr>
        <tr>
            <td><?php print($obs_time[1]); ?></td>
            <td><?php print($obs_weather[1]); ?></td>
            <td><?php print($obs_temperature[1]); ?></td>
            <td><?php print($obs_humidity[1]); ?></td>
            <td><?php print($obs_pressure[1]); ?></td>
            <td><?php print($obs_wind_direction[1]); ?></td>
            <td><?php print($obs_wind_speed[1]); ?></td>
        </tr>
        <tr>
            <td><?php print($obs_time[2]); ?></td>
            <td><?php print($obs_weather[2]); ?></td>
            <td><?php print($obs_temperature[2]); ?></td>
            <td><?php print($obs_humidity[2]); ?></td>
            <td><?php print($obs_pressure[2]); ?></td>
            <td><?php print($obs_wind_direction[2]); ?></td>
            <td><?php print($obs_wind_speed[2]); ?></td>
        </tr>
        <tr>
            <td><?php print($obs_time[3]); ?></td>
            <td><?php print($obs_weather[3]); ?></td>
            <td><?php print($obs_temperature[3]); ?></td>
            <td><?php print($obs_humidity[3]); ?></td>
            <td><?php print($obs_pressure[3]); ?></td>
            <td><?php print($obs_wind_direction[3]); ?></td>
            <td><?php print($obs_wind_speed[3]); ?></td>
        </tr>
        <tr>
            <td><?php print($obs_time[4]); ?></td>
            <td><?php print($obs_weather[4]); ?></td>
            <td><?php print($obs_temperature[4]); ?></td>
            <td><?php print($obs_humidity[4]); ?></td>
            <td><?php print($obs_pressure[4]); ?></td>
            <td><?php print($obs_wind_direction[4]); ?></td>
            <td><?php print($obs_wind_speed[4]); ?></td>
        </tr>
        <tr>
            <td><?php print($obs_time[5]); ?></td>
            <td><?php print($obs_weather[5]); ?></td>
            <td><?php print($obs_temperature[5]); ?></td>
            <td><?php print($obs_humidity[5]); ?></td>
            <td><?php print($obs_pressure[5]); ?></td>
            <td><?php print($obs_wind_direction[5]); ?></td>
            <td><?php print($obs_wind_speed[5]); ?></td>
        </tr>
        <tr>
            <td><?php print($obs_time[6]); ?></td>
            <td><?php print($obs_weather[6]); ?></td>
            <td><?php print($obs_temperature[6]); ?></td>
            <td><?php print($obs_humidity[6]); ?></td>
            <td><?php print($obs_pressure[6]); ?></td>
            <td><?php print($obs_wind_direction[6]); ?></td>
            <td><?php print($obs_wind_speed[6]); ?></td>
        </tr>
        <tr>
            <td><?php print($obs_time[7]); ?></td>
            <td><?php print($obs_weather[7]); ?></td>
            <td><?php print($obs_temperature[7]); ?></td>
            <td><?php print($obs_humidity[7]); ?></td>
            <td><?php print($obs_pressure[7]); ?></td>
            <td><?php print($obs_wind_direction[7]); ?></td>
            <td><?php print($obs_wind_speed[7]); ?></td>
        </tr>
        <tr>
            <td><?php print($obs_time[8]); ?></td>
            <td><?php print($obs_weather[8]); ?></td>
            <td><?php print($obs_temperature[8]); ?></td>
            <td><?php print($obs_humidity[8]); ?></td>
            <td><?php print($obs_pressure[8]); ?></td>
            <td><?php print($obs_wind_direction[8]); ?></td>
            <td><?php print($obs_wind_speed[8]); ?></td>
        </tr>
        <tr>
            <td><?php print($obs_time[9]); ?></td>
            <td><?php print($obs_weather[9]); ?></td>
            <td><?php print($obs_temperature[9]); ?></td>
            <td><?php print($obs_humidity[9]); ?></td>
            <td><?php print($obs_pressure[9]); ?></td>
            <td><?php print($obs_wind_direction[9]); ?></td>
            <td><?php print($obs_wind_speed[9]); ?></td>
        </tr>
    </table>
</body>
</html>
