<!-- map_3.php?name=サンクス -->
<?php
    $dsn = 'mysql:host=localhost;dbname=acy_db;charset=utf8';
    $user = 'dbuser';
    $password = 'dbuserpass';

    $name = "";
    if(isset($_GET['name'])) {
        $name = htmlspecialchars($_GET['name']);
    }

    try {
        $dbh = new PDO($dsn, $user, $password);
        // $sql = "SELECT * FROM convenience_store";
        $sql = "SELECT * FROM convenience_store where name like '%".$name."%' limit 10";
        $stmt = $dbh->query($sql);
        $i = 0;
        foreach ($stmt as $row) {
            // id, lat, lng, name
            $id[$i] = $row['id'];
            $lat[$i] = $row['lat'];
            $lng[$i] = $row['lng'];
            $name[$i] = $row['name'];
            $i = $i + 1;
        }
        $dbh = null;
    } catch (PDOException $e) {
        echo 'データベースにアクセスできません！' . $e->getMessage();
        exit;
    }
?>

<!DOCTYPE html>
<html>
<head>
  <title>map_3</title>
  <style>
    #mapStage {
      height: 600px;
      width: 100%;
    }
  </style>
  <!-- Rewrite YOUR_API_KEY to API key associated with your project. Go to https://developers.google.com/maps/documentation/javascript/get-api-key -->
  <script async defer src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initMap"></script>
  <script>
    function initMap() {
      var centerOfMap = {
        lat: 35.465521,
        lng: 139.615434
      };
      var map1 = new google.maps.Map(document.getElementById('mapStage'), {
        zoom: 16,
        center: centerOfMap
      });

      // var latlng1 = { lat: 35.458880, lng: 139.607262 }; //セブンイレブン 横浜浅間町店
      // var marker = new google.maps.Marker({ position: latlng1, map: map1 });
      <?php
        echo "\n";
        for ($i = 0; $i < count($id); $i++) {
          echo "var latlng".($i+1)." = { lat: ".$lat[$i].", lng: ".$lng[$i]." }; //".$name[$i]."\n";
        }
        for ($i = 0; $i < count($id); $i++) {
          echo "var marker = new google.maps.Marker({ position: latlng".($i+1).", map: map1 });\n";
        }
      ?>

    }
  </script>
</head>

<body>
  <h3>コンビニ</h3>
  <div id="mapStage"></div>
</body>

</html>