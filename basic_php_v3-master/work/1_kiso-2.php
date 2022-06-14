<?php
declare(strict_types=1);

#if
$score = 85;
$score = 70;
$score = 40;

if ($score >= 80) {
    echo 'Great!' . PHP_EOL;
} else if ($score >= 60) {
    echo 'Good!' . PHP_EOL;
} else {
    echo 'OK!' . PHP_EOL;
}

#比較演算子
// >= 〜以上
// <= 〜以下
// > 〜より大きい
// < 〜より小さい
// === 〜と等しい
// !== 〜と等しくない

#falseと評価される値
// false
// ±0
// ±0.0
// '0' 文字列
// ''
// null
// []　空の配列

#swith文
$signal = 'green';

switch ($signal) {
    case 'red':
        echo 'Stop!' . PHP_EOL;
        break;
    case 'yellow':
        echo 'Caution!' . PHP_EOL;
        break;
    case 'blur':
    case 'green':
        echo 'Go!' . PHP_EOL;
        break;
    default:
        echo 'Wrong signal!' . PHP_EOL;
        break;
}

#ループ
for ($i=1; $i < 5; $i++) { 
    // echo 'Hello' . PHP_EOL;
    echo "$i - Hello" . PHP_EOL;
}
$hp = 100;
while ($hp > 0) {
    echo "Your HP: $hp" . PHP_EOL;
    $hp -= 15;// 書き忘れると無限ループに！
}
#条件が満たされない場合は一回も実行されない
echo "-------" . PHP_EOL;
#一回だけは実行したい場合
$hp = -50;
do {
    echo "Your HP: $hp" . PHP_EOL;
    $hp -= 15;
} while($hp > 0);

#for while でのスキップ・ブレイク
for ($i=1; $i < 10; $i++) { 
    // if ($i === 4) { // 4
    if ($i % 3 === 0) { // 3の倍数
        continue;// スキップ
    }
    if ($i === 7) {
        break;// ループを抜ける
    }
    echo $i . PHP_EOL;
}
// 1 2 4 5

#関数
function showAd($message = 'Ad') { // 仮引数 = 'デフォルト値'
    echo "------------------" . PHP_EOL;
    echo "--- $message ---" . PHP_EOL;
    echo "------------------" . PHP_EOL;
}
showAd('Header Ad');// 実引数
echo "Tom is great!" . PHP_EOL;
echo "Bob is great!" . PHP_EOL;
showAd();
echo "Steve is great!" . PHP_EOL;
echo "Bob is great!" . PHP_EOL;
showAd('Footer Ad');

// $rate = 1.1;
// function sum($a, $b, $c) {
//     global $rate;// 関数外で定義された変数を使える宣言　（分かりづらくなる）
//     return ($a + $b + $c) * $rate;
// }
// echo sum(100, 200, 300) + sum(300, 400, 500) . PHP_EOL; // 1980

$rate = 1.1; // グローバルスコープ
function sum($a, $b, $c) {
    $rate = 1.08; // ローカルスコープ
    // global $rate;// 関数外で定義された変数を使える宣言　（分かりづらくなる）
    return ($a + $b + $c) * $rate;
}    
echo sum(100, 200, 300) + sum(300, 400, 500) . PHP_EOL; //ローカルスコープ1.08が使われるので、 1944

#無名関数(クロージャー)　代入する場合はセミコロンあり
#無名関数は関数自体を別の関数の引数にして渡す事ができる
$sum = function ($a, $b, $c) {
    return $a + $b + $c;
};
echo $sum(500, 500, 1000) . PHP_EOL;

#条件演算子 条件？値：値
function sumB($a, $b, $c) {
    $total = $a + $b + $c;
    // if ($total < 0) {
    //     return 0;
    // } else {
    //     return $total;
    // }
    return $total < 0 ? 0 : $total;
}
echo sumB(100, 300, 500) . PHP_EOL; // 900
echo sumB(-1000, 300, 500) . PHP_EOL; // 0

#引数の型を指定
# 引数の前に型を指定　（弱い型付け）'4' > 4にしてしまう
# 強い型付け ファイルの文頭に　declare(strict_types=1);
function showInfo (string $name, int $score) : void // 返り値がない場合
{
    echo $name . ': ' . $score . PHP_EOL;
}
showInfo('taguchi' , 40);
// showInfo('taguchi' , 'dot');
// showInfo('taguchi' , '4');

#null を渡す
function getAward(?int $score): ?string // 型の前に ? をつけると、null か ○○ か という意味になる
{
    return $score >= 100 ? 'Gold Medal' : null;
}
echo getAward(150) . PHP_EOL;
echo getAward(40) . PHP_EOL;
echo getAward(null) . PHP_EOL;