<?php

declare(strict_types=1);

#配列
$scores = [
    90,
    40,
    100,
];
$scores[1] = 60; // 再代入
echo $scores[1] . PHP_EOL; // 40 → 60

echo $scores . PHP_EOL;
// Array

var_dump($scores);
// array(3) {
//   [0]=>
//   int(90)
//   [1]=>
//   int(60)
//   [2]=>
//   int(100)
// }

print_r($scores);
// Array
// (
//     [0] => 90
//     [1] => 60
//     [2] => 100
// )
echo '-------' . PHP_EOL;
#キーを設定
$eachScores = [
    'tagichi' => 90,
    'f-koji'  => 40,
    'kikyo'   => 100,
];
var_dump($eachScores);
// array(3) {
//     ["tagichi"]=>
//     int(90)
//     ["f-koji"]=>
//     int(40)
//     ["kikyo"]=>
//     int(100)
//   }
print_r($eachScores);
//   Array
//   (
//       [tagichi] => 90
//       [f-koji] => 40
//       [kikyo] => 100
//   )
echo $eachScores['kikyo']. PHP_EOL;

#配列を全て出力
#foreach
foreach ($eachScores as $value) {
    echo $value . PHP_EOL;
}
// 90
// 40
// 100
foreach ($eachScores as $key => $value) {
    echo $key . ' - ' . $value . PHP_EOL;
}
// tagichi - 90
// f-koji - 40
// kikyo - 100

#配列の中の配列
#jsスプレット構文のような
// $score1 = [
//     55,
//     72,
// ];
// $score2 = [
//     90,
//     40,
//     ...$score1,
//     100,
// ];
// print_r($score2);
#PHP ver.7.4以上

$scores1 = [
    55,
    72,
    'perfect',
    [90, 42, 88],
];
print_r($scores1);
print_r($scores1[3][2]); // 88

echo '--------------' . PHP_EOL;
#配列の関数　可変長引数
// function sum($a, $b, $c) {
//     return $a + $b + $c;
// }

function sum(...$numbers) {
    $total = 0;
    foreach($numbers as $number) {
        $total += $number;
    }
    return $total;
}
echo sum(1, 3, 5) . PHP_EOL; // 9
echo sum(1, 3, 5, 6) . PHP_EOL; // 15

#複数の返り値を受け取る
function getStats(...$numbers) {
    $total = 0;
    foreach($numbers as $number) {
        $total += $number;
    }
    return [$total, $total / count($numbers)];
}
print_r(getStats(1, 3, 5));// 合計：9 平均：3
// 配列の個数 count($***) jsの.length

#変数に一気に代入 list()
list($sum, $average) = getStats(1, 3, 5);
[$sum, $average] = getStats(1, 3, 5);
echo $sum . PHP_EOL; // 9
echo $average . PHP_EOL; // 3