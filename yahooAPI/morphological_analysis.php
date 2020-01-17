<!-- Morphological analysis -->

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
    print '<p>surface : ' . $list->surface . '</p>';
    print '<p>reading : ' . $list->reading . '</p>';
    print '<p>pos : ' . $list->pos . '</p>';
    print '<br>';
}
?>
