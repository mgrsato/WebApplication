<!-- Dependency Analysis -->

<?php
// $appid = '<あなたのアプリケーションID>';
$appid = 'dj00aiZpPVF6dUlRdUdpTHZIVSZzPWNvbnN1bWVyc2VjcmV0Jng9MTE-';

// $str = '横浜市西区の天気は雨です';
$str = "";
if(isset($_GET['str'])) {
    $str = htmlspecialchars($_GET['str']);
}

$url = 'https://jlp.yahooapis.jp/DAService/V1/parse?appid=' . $appid . '&sentence=' . urlencode($str);
$xml = simplexml_load_file($url);
// foreach( $xml->Result->ChunkList->Chunk->MorphemList->Morphem as $list){
//     print '<p>Surface : ' . $list->Surface . '</p>';
//     print '<p>Reading : ' . $list->Reading . '</p>';
//     print '<p>Feature : ' . $list->Feature . '</p>';
//     print '<br>';
// }
foreach( $xml->Result->ChunkList->Chunk as $list){
    if(strpos($list->MorphemList->Morphem->Feature,'地名行政区分') !== false){
        // print '<p>Surface : ' . $list->MorphemList->Morphem->Surface . '</p>';
        // print '<p>Reading : ' . $list->MorphemList->Morphem->Reading . '</p>';
        // print '<p>Feature : ' . $list->MorphemList->Morphem->Feature . '</p>';
        print '<p>' . $list->MorphemList->Morphem->Surface . '(' . $list->MorphemList->Morphem->Reading . ')</p>';
        print '<br>';
    }
}

$url_2 = 'https://map.yahooapis.jp/geocode/V1/geoCoder?appid=' . $appid . '&query=' . urlencode($list->MorphemList->Morphem->Surface);
$xml_2 = simplexml_load_file($url_2);
foreach( $xml2->Feature->Geometry as $list_2){
        print '<p>Lat,Lng : ' . $list_2->Coordinates . '</p>';
        print '<br>';  
}

?>