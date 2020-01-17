<!-- Dependency Analysis -->

<?php
$appid = '<あなたのアプリケーションID>';

// $str = '横浜市西区の天気は雨です';
$str = "";
if(isset($_GET['str'])) {
    $str = htmlspecialchars($_GET['str']);
}

$url = 'https://jlp.yahooapis.jp/DAService/V1/parse?appid=' . $appid . '&sentence=' . urlencode($str);
$xml = simplexml_load_file($url);
foreach( $xml->Result->ChunkList->Chunk as $list){
    if(strpos($list->MorphemList->Morphem->Feature,'地名行政区分') !== false){
        $surface = $list->MorphemList->Morphem->Surface;
	print '<p>surface : ' . $surface . '</p>';

	$url_2 = 'https://map.yahooapis.jp/geocode/V1/geoCoder?appid=' . $appid . '&query=' . urlencode($surface);
	$xml_2 = simplexml_load_file($url_2);
	foreach( $xml_2->Feature->Geometry as $list_2){
//        	print '<p>Lat,Lng : ' . $list_2->Coordinates . '</p>';
		$latlng = explode(",",  $list_2->Coordinates);
		$lat = $latlng[0];
		$lng = $latlng[1];
		print '<p>Lat : ' . $lat . '</p>';
		print '<p>Lng : ' . $lng . '</p>';
        	print '<br>';
	}
    }
}

?>
