<?php
echo 'Hello Kyoko';
#改行 end of line > PHP_EOL
#チェーン　つなげる時は　.
echo 'Hello Kyoko' . PHP_EOL;
echo 'Hi Kyoko' . PHP_EOL;

#変数に代入　大文字小文字区別される
$name = 'Kikyo';
echo 'Hello ' . $name . PHP_EOL;
echo 'Hi ' . $Name . PHP_EOL;

#文中の ' を " に変更
echo "It's Sunday. Hello " . $name . PHP_EOL;
# " を使った場合、直接変数を入れれる
echo "It's Sunday. Hello $name" . PHP_EOL;
# " の中で " を使いたい場合 バックスラッシュ \(⌥¥)でエスケープ
echo "It's \"Sunday\". Hello $name" . PHP_EOL;
# その他エスケープ　\t tab \n 改行
echo "It's Sunday\t. Hello\n $name" . PHP_EOL;

#ヒアドキュメント <<<終端記号 改行 終端記号　好きな名前をつけていい　今回はEOT (end of text)
#この間の文字は改行や字下げを保つ　pre のような仕様だが、
#コードを字下げしても終端記号に合わせられる
#終端記号の後は必ず改行　コメントでも書いてはいけない
#終端記号を ' で囲う　変数が使えない　nowdoc ナウドキュメント
#終端記号を " で囲う・または囲わない　変数が使える　heredoc ヒアドキュメント
    $text = <<<"PRE"
    この間の文字は
        改行や字下げを保って
    表示される

    終端記号を""で囲うか囲いなしだと変数の埋め込み可能
    (''で囲うと埋め込めない)
    $name さん
    PRE;
echo $text . PHP_EOL;

#数値
#四則演算
echo 10 + 3 . PHP_EOL; // 13
echo 10 - 3 . PHP_EOL; // 7
echo 10 * 3 . PHP_EOL; // 30
echo 10 / 3 . PHP_EOL; // 3.333...

echo 10 % 3 . PHP_EOL; // 余り　1
echo 10 ** 3 . PHP_EOL; // べき乗　1000

echo 2 + 10 * 3 . PHP_EOL; // 優先度　32
echo (2 + 10) * 3 . PHP_EOL; // ()優先度　36

#数値っぽいものは数値と認識
echo 2 + '3' . PHP_EOL; // 5

#変数を使った演算
$price = 500;
// $price = $price + 100; // 600
$price += 100; // 同じ意味 他の四則演算も

$price++;
$price--;
echo $price . PHP_EOL;

#定数
$name = '名無しさん'; // 変数は書き換えられる
echo $name . PHP_EOL;

// define('NAME', 'Kido');// 定数　全て大文字
const NAME = 'Kido'; // 同じ結果だが、細かい違いはある
echo NAME . PHP_EOL; // $マークつかない

#データ型 jsの console.log(typeof ***) var_dumo(***);
$a = 'hello';
var_dump($a); // string(5) "hello"

$b = 10;
var_dump($b); // int(10)

$c = -1.3;
var_dump($c); // float(-1.3)

$d = null;
var_dump($d); // NULL

$e = true;
var_dump($e); // bool(true)

#型を変換する キャスト
$a = (float)10;
var_dump($a);