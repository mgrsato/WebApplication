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
    print '<p>Surface : ' . $list->MorphemList->Morphem->Surface . '</p>';
    print '<p>Reading : ' . $list->MorphemList->Morphem->Reading . '</p>';
    print '<p>Feature : ' . $list->MorphemList->Morphem->Feature . '</p>';
    print '<br>';
}

print'<HR>';

foreach( $xml->Result->ChunkList->Chunk as $list){
    if(strpos($list->MorphemList->Morphem->Feature,'地名行政区分') !== false){
        print '<p>' . $list->MorphemList->Morphem->Surface . '(' . $list->MorphemList->Morphem->Reading . ')</p>';
        print '<br>';
    }
}

?>
