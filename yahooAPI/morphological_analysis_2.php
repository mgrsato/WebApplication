<HTML>
<HEAD>
	<META http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<TITLE>Morphological analysis</TITLE>
	<STYLE TYPE="text/css">
		div {
			width: 160px;
			height: 80px;
			border: solid 1px #708090;
			padding: 15px;
			margin-bottom: 20px;
			border-radius: 4px;
			float:left;
		}
	</STYLE>
</HEAD>
<BODY>

<?php
$appid = '<あなたのアプリケーションID>';

// $str = '今日は良い天気ですね';
$str = "";
if(isset($_GET['str'])) {
    $str = htmlspecialchars($_GET['str']);
}

$url = 'https://jlp.yahooapis.jp/MAService/V1/parse?appid=' . $appid . '&results=ma,uniq&uniq_filter=9%7C10&sentence=' . urlencode($str);
$xml = simplexml_load_file($url);

foreach( $xml->ma_result->word_list->word as $list){
//	if($list->surface != $list->reading){
	if(strcmp($list->surface, $list->reading) != 0){
		print '<ruby>';
		print '<rb>' . $list->surface . '</rb>';
		print '<rt>' . $list->reading . '</rt>';
		print '</ruby>';
		print '　';
	}else{
                print $list->surface;
                print '　';
	}
}

print '<HR>';

foreach( $xml->ma_result->word_list->word as $list){
    print '<div>';
    print 'surface : ' . $list->surface . '<br>';
    print 'reading : ' . $list->reading . '<br>';
    print 'pos : ' . $list->pos . '';
    print '</div>';
}

?>

</BODY>
</HTML>
