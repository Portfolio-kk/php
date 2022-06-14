<?php
#####文字列系
{
    $name = 'Apple';
    $score = 32.246;

    $info = "[$name][$score]";
    echo $info . PHP_EOL; // [Apple][32.246]
    #sprintf 文字列をフォーマットに従って表示
    #表示の設定 文字列：%s　整数：%d　浮動小数点数：%f
    $info = sprintf("[%15s][%10.2f]", $name, $score);
    echo $info . PHP_EOL; // [          Apple]15文字に収める　[     32.25]10文字 小数点以下２
    $info = sprintf("[%-15s][%010.2f]", $name, $score); // [          Apple]15文字に収める　[     32.25]10文字 小数点以下２
    echo $info . PHP_EOL; // [Apple          ]先頭に　[0000032.25]空欄を0で埋める
    #printf 単にフォーマットに従って表示
    printf("[%-15s][%010.2f]" . PHP_EOL, $name, $score);
} {
    # strlen() 文字数を調べる
    $input = 'dot_taguchi';
    echo strlen($input) . PHP_EOL; // 11
    $input = ' dot_taguchi   ';
    echo strlen($input) . PHP_EOL; // 15

    # trim() 空白・改行を除いて数える
    $input = trim($input);
    echo strlen($input) . PHP_EOL; // 11

    # strpos() ある値が何文字目にヒットするか(0からスタート)
    echo strpos($input, '_') . PHP_EOL; // 3

    # str_replace(対象文字, 置換文字, 値) 置換
    $input = str_replace('_', '^', $input);
    echo $input . PHP_EOL; // dot^taguchi%
} {
    # mb_***() 日本語の場合 マルチバイト
    $ja = 'こんにちは ';
    $ja = trim($ja);

    echo strlen($ja) . PHP_EOL; // 5 > 15
    echo mb_strlen($ja) . PHP_EOL; // 5

    echo strpos($ja, 'に') . PHP_EOL; // 2 > 6
    echo mb_strpos($ja, 'に') . PHP_EOL; // 2

    $ja = str_replace('にち', 'ばん', $ja);
    echo $ja . PHP_EOL; // こんばんは
} {
    #固定長データ substr(文字列, 位置, 桁数)
    #substr_replace(文字列, 置換文字, 位置, 桁数)
    $itemId = '20220613Item-A  1200';
    $date = substr($itemId, 0, 8);
    $product = substr($itemId, 8, 8);
    // $amount = substr($itemId, 16, 4);
    $amount = substr($itemId, 16); // 最後までの桁数は省略可能

    echo $date . PHP_EOL; // 20220613
    echo $product . PHP_EOL; // Item-A__
    echo number_format($amount) . PHP_EOL; // 1,200

    $itemId = substr_replace($itemId, 'Item-B  ', 8, 8);
    echo $itemId . PHP_EOL; // Item-B__
} {
    #文字列を検索・置換 preg_match() preg_match_all()
    $input = 'Call us at 03-3001-1256 or 03-3015-3222';
    $pattern = '/\d{2}-\d{4}-\d{4}/';

    preg_match($pattern, $input, $matches);
    print_r($matches); // 最初に見つかったパターンのみ配列で表示
    preg_match_all($pattern, $input, $matches);
    print_r($matches); // 見つかった全てのパターンを配列で表示

    $input = preg_replace($pattern, '**-****-****', $input);
    echo $input . PHP_EOL; // Call us at **-****-**** or **-****-****
} {
    #文字列と配列を交換
    # implode(区切り文字, 値)　配列 ＞ 文字
    # explode(区切り文字, 値)　文字 ＞ 配列
    $d = [2022, 06, 13];
    echo "$d[0]-$d[1]-$d[2]" . PHP_EOL; // 2022-06-13
    echo implode('-', $d) . PHP_EOL; // 2022-06-13

    $t = '17:32:45';
    print_r(explode(':', $t));
}
##### 数値
{
    #小数点の扱い
    $n = 5.6283;
    echo ceil($n) . PHP_EOL; //切り上げ 6
    echo floor($n) . PHP_EOL; //切り捨て 5
    echo round($n) . PHP_EOL; //四捨五入 6
    echo round($n, 2) . PHP_EOL; //小数点以下２桁で四捨五入 5.63

    echo mt_rand(1, 6) . PHP_EOL; // 1-6のランダムな整数値を作成

    echo max(3, 9, 4) . PHP_EOL; //最大値 9
    echo min(3, 9, 4) . PHP_EOL; //最小値 3

    // 関数ではないけど　便利な定数
    echo M_PI . PHP_EOL; // 円周率 3.14159...
    echo M_SQRT2 . PHP_EOL; // 2の平方根 1.41421...
}