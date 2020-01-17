<HTML>
<HEAD>
	<META http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<TITLE>Dependency Analysis</TITLE>
	<STYLE TYPE="text/css">
		div {
			/* width: 400px; */
			width: 800px;
			/* height: 400px; */
			border: solid 1px #708090;
			padding: 15px;
			/* margin-bottom: 20px; */
			margin: 10px;
			border-radius: 4px;
			float:left;
		}
	</STYLE>
</HEAD>
<BODY>

<?php
	$appid = '<あなたのアプリケーションID>';

	// $str = "";
	// if(isset($_GET['str'])) {
	// 	$str = htmlspecialchars($_GET['str']);
	// }

	// see https://headlines.yahoo.co.jp/rss/list
	// see https://news.google.com/
	$url_1 = 'https://news.yahoo.co.jp/pickup/domestic/rss.xml';
	// $url_1 = 'https://news.google.com/rss?hl=ja&gl=JP&ceid=JP:ja';
	$xml_1 = simplexml_load_file($url_1);
	foreach( $xml_1->channel->item as $list_1){
		print '<div>';
		// print 'item : ' . $list_1->title . '<br>';
		print '<H2>' . $list_1->title . '</H2>';
		$str = $list_1->title;
		$url_2 = $list_1->link;

		// $xml_2 = simplexml_load_file($url_2);
		// var_dump($xml_2);

		$html = file_get_contents($url_2);
		$dom = new DOMDocument();
		@$dom->loadHTML($html);
		$xml_2 = simplexml_import_dom($dom);
		// var_dump($xml_2);

		$str_2 = $xml_2->meta->attributes()->content;
		print 'ニュース本文 : ' . $str_2;

		$url_3 = 'https://jlp.yahooapis.jp/DAService/V1/parse?appid=' . $appid . '&sentence=' . urlencode($str);
		$xml_3 = simplexml_load_file($url_3);
		foreach( $xml_3->Result->ChunkList->Chunk as $list_3){
			// if(strpos($list_3->MorphemList->Morphem->Feature,'地名行政区分') !== false){
			if(strpos($list_3->MorphemList->Morphem->Feature,'地名') !== false){
				$surface = $list_3->MorphemList->Morphem->Surface;
				print '<h3>' . $surface . '</h3>';

				$url_4 = 'https://map.yahooapis.jp/geocode/V1/geoCoder?appid=' . $appid . '&query=' . urlencode($surface);
				$xml_4 = simplexml_load_file($url_4);
				foreach( $xml_4->Feature->Geometry as $list_4){
					$latlng = explode(",",  $list_4->Coordinates);
					$lat = $latlng[1];
					$lng = $latlng[0];
					print '<p><img width="300" height="200" src="https://map.yahooapis.jp/map/V1/static?appid=' . $appid . '&lat=' . $lat . '&lon=' . $lng . '&z=12&width=300&height=200&pointer=on"></p>';
					print '<br>';
				}
			}
		}
		print '</div>';
	}
?>
