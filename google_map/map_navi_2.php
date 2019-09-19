<?php
    $dsn = 'mysql:host=localhost;dbname=acy_db;charset=utf8';
    $user = 'dbuser';
    $password = 'dbuserpass';

    try {
        $dbh = new PDO($dsn, $user, $password);
        $sql = "SELECT * FROM convenience_store limit 10";
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
  <title>map_navi_2</title>
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
      var map1;
      var directionsService = new google.maps.DirectionsService();
      var directionsRenderer = new google.maps.DirectionsRenderer();
      var latlngStart = { lat: 35.4657858, lng: 139.6223132 }; //横浜駅
      var latlngGoal = { lat: 35.463539, lng: 139.609711 }; //アーツカレッジヨコハマ
      // var latlng1 = { lat: 35.464352, lng: 139.613038 }; //セブンイレブン 横浜浅間町１丁目店
      // var latlng2 = { lat: 35.465976, lng: 139.612381 }; //セブンイレブン 横浜浅間下店
      // var latlng3 = { lat: 35.466907, lng: 139.615903 }; //セブンイレブン 横浜北幸店
      // var latlng4 = { lat: 35.466310, lng: 139.615306 }; //セブンイレブン 横浜北幸２丁目店
      // var latlng5 = { lat: 35.466342, lng: 139.617997 }; //セブンイレブン 横浜北幸中央店
      // var latlng6 = { lat: 35.467740, lng: 139.617796 }; //セブンイレブン 横浜ＳＴビル店
      // var latlng7 = { lat: 35.464508, lng: 139.616281 }; //セブンイレブン 横浜南幸２丁目店
      // var latlng8 = { lat: 35.462268, lng: 139.609640 }; //ファミリーマート 横浜浅間町店
      // var latlng9 = { lat: 35.463849, lng: 139.614515 }; //ファミリーマート 横浜岡野一丁目店
      // var latlng10 = { lat: 35.464559, lng: 139.614380 }; //ファミリーマート 佐野北幸二丁目店
      // var latlng11 = { lat: 35.468830, lng: 139.617336 }; //ファミリーマート 横浜鶴屋町店
      // var latlng12 = { lat: 35.463504, lng: 139.617671 }; //ファミリーマート 横浜南幸二丁目店
      // var latlng13 = { lat: 35.466061, lng: 139.619605 }; //ファミリーマート はまりん横浜駅店
      // var latlng14 = { lat: 35.464839, lng: 139.620264 }; //ファミリーマート はまりん横浜駅ミニ店
      <?php
        echo "\n";
        for ($i = 0; $i < count($id); $i++) {
          echo "var latlng".($i+1)." = { lat: ".$lat[$i].", lng: ".$lng[$i]." }; //".$name[$i]."\n";
        }
      ?>

      var mapOptions = {
        zoom: 10,
        center: latlngStart,
        mapTypeId: google.maps.MapTypeId.ROADMAP,
        scaleControl: true,
      };
      map1 = new google.maps.Map(document.getElementById("mapStage"), mapOptions);
      // see https://developers.google.com/maps/documentation/javascript/directions?hl=ja
      //      var request = {
      //        origin: 'Chicago, IL',
      //        destination: 'Los Angeles, CA',
      //        waypoints: [
      //        {
      //          location: 'Joplin, MO',
      //          stopover: false
      //        },{
      //          location: 'Oklahoma City, OK',
      //          stopover: true
      //        }],
      //        provideRouteAlternatives: false,
      //        travelMode: 'DRIVING',
      //        drivingOptions: {
      //          departureTime: new Date(/* now, or future date */),
      //          trafficModel: 'pessimistic'
      //        },
      //        unitSystem: google.maps.UnitSystem.IMPERIAL
      //      }
      var request = {
        origin: latlngStart,
        destination: latlngGoal,
        waypoints: [
          // {location: latlng1},
          // {location: latlng2},
          // {location: latlng3},
          // {location: latlng4},
          // {location: latlng5},
          // {location: latlng6},
          // {location: latlng7},
          // {location: latlng8},
          // {location: latlng9},
          // {location: latlng10},
          // {location: latlng11},
          // {location: latlng12},
          // {location: latlng13},
          // {location: latlng14}
          <?php
            echo "\n";
            for ($i = 0; $i < count($id); $i++) {
              echo "{location: latlng".($i+1)."},\n";
            }
          ?>
        ],

        //Travel Mode
        //travelMode: 'DRIVING',
        //travelMode: 'BICYCLING',
        //travelMode: 'TRANSIT',
        travelMode: 'WALKING',

        //Routing
        //optimizeWaypoints: false,
        optimizeWaypoints: true,
      }
      directionsService.route(request, function (result, status) {
        directionsRenderer.setDirections(result);
        directionsRenderer.setMap(map1);
      });
    }
  </script>
</head>

<body>
  <h3>コンビニ・ナビ</h3>
  <div id="mapStage"></div>
</body>

</html>