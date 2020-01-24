<HTML>
<HEAD>
	<META http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<TITLE>Dependency Analysis</TITLE>
	<STYLE TYPE="text/css">
		div {
			width: 400px;
			/* height: 400px; */
			border: solid 1px #708090;
			padding: 15px;
			/* margin-bottom: 10px; */
			margin: 10px;
			border-radius: 4px;
			float:left;
		}
	</STYLE>
</HEAD>
<BODY>

<?php
	$appid = '<あなたのアプリケーションID>';

	$url_1 = 'https://news.yahoo.co.jp/pickup/local/rss.xml';
	$xml_1 = simplexml_load_file($url_1);
	foreach( $xml_1->channel->item as $list_1){
		print '<div>';
		print '<H2>' . $list_1->title . '</H2>';
		$str = $list_1->title;
		$url_2 = $list_1->link;

		$html = file_get_contents($url_2);
		$domDocument = new DOMDocument();
		$domDocument->loadHTML($html);
		$xmlString = $domDocument->saveXML();
		$xmlObject = simplexml_load_string($xmlString);
		// var_dump($xmlObject);
		$array = json_decode(json_encode($xmlObject), true);
		$text = $domDocument->getElementById('tpcNews')->nodeValue;
		print '<p>' . $text . '<A HREF="' . $url_2 . '">[LINK]</A></p>';

		// $url_3 = 'https://jlp.yahooapis.jp/DAService/V1/parse?appid=' . $appid . '&sentence=' . urlencode($str);
		// $url_3 = 'https://jlp.yahooapis.jp/DAService/V1/parse?appid=' . $appid . '&sentence=' . urlencode($text);
		$url_3 = 'https://jlp.yahooapis.jp/KeyphraseService/V1/extract?appid=' . $appid . '&sentence=' . urlencode($text);
		$xml_3 = simplexml_load_file($url_3);
		$query = '';
		//var_dump($xml_3);
		foreach( $xml_3->Result as $list_3){
			if($list_3->Score == '100'){
				$query = $query . ' ' . $list_3->Keyphrase;
			}
		}
		print '<hr>';
		print '<p>query : ' . $query . '</p>';

		$url_4 = 'http://shopping.yahooapis.jp/ShoppingWebService/V1/itemSearch?appid=' . $appid . '&condition=new&type=all&query=' . urlencode($query);
		$xml_4 = simplexml_load_file($url_4);
		//foreach( $xml_4->Result->Hit as $list_4){
			print '<p>';
			print '<h3>' . $xml_4->Result->Hit->Name . '</h3>';
			print '<p>' . $xml_4->Result->Hit->Description . '</p>';
			print '<p><a href="' . $xml_4->Result->Hit->Url . '"><img src="' . $xml_4->Result->Hit->Image->Medium . '"></a></p>';
			print '</p>';
		//}
		print '</div>';
	}
?>
