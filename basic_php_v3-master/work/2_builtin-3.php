<?php

### ファイルを操作
# fopen() ファイルを操作
# fwrite()
# fclose()

# ファイルの新規作成　用意
// names.txt　がなければ新しく作る ファイルポインタ(特殊な変数)を返すので $fp で受け取る
//書き込みモード write の w

// $fp = fopen('names.txt', 'w');
// fwrite($fp, "taro\n");
// fclose($fp);

# Unixコマンド
// cat 中身の確認
// 書き込みモード　実行する度に追加される訳ではなく、上書きされる

# テキストを追加
// 書き込みモード　append の a

// $fp = fopen('names.txt', 'a');
// fwrite($fp, "jiro\n");
// fwrite($fp, "saburo\n");
// fclose($fp); // 実は自動で閉じるので省略可能だけど、分かりやすい

#テキストを読み込む r
// fread() サイズを指定して一気に読み込む
// filesize() ファイルサイズを調べる

// $fp = fopen('names.txt', 'r');
// $contents = fread($fp, filesize('names.txt'));
// fclose($fp);

// echo $contents;

# 一行ずつ読み込む

// $fp = fopen('names.txt', 'r');
// while (($line = fgets($fp)) !== false) {
//     echo $line;
// }
// fclose($fp);


# 新規作成
// $contents = "taro\njiro\nsaburo\n";
// file_put_contents('names.txt', $contents);

# 読み込み
// $contents = file_get_contents('names.txt');
// echo $contents;

# 一行ずつ配列の要素で読み込む
// $lines = file('names.txt');
// $lines = file('names.txt', FILE_IGNORE_NEW_LINES);// 末尾の改行を無視
// var_dump($lines);

### ディレクトリの操作
// file_put_contents('data/taro.txt', "taro\n");
// file_put_contents('data/jiro.txt', "jiro\n");

// $dp = opendir('data');
// while (($item = readdir($dp)) !== false) {
//     if ($item === '.' || $item === '..') {
//         continue;
//     }
//     echo $item . PHP_EOL;
// }

// 上と同じ

// foreach (glob('data/*.txt') as $item) {
//     // echo $item . PHP_EOL; // data/***.txt
//     echo basename($item) . PHP_EOL; // ***.txt
// }

###ファイルのチェック

# file_exists() ディレクトリ・ファイルが存在するかどうか
if (file_exists('data')) {
    echo 'data exists!' . PHP_EOL;
}
# is_writable() 書き込み可能か
if (is_writable('data/taro.txt')) {
    echo 'taro is writable!' . PHP_EOL;
}
# is_readable() 読み込み可能か
if (is_readable('data/taro.txt')) {
    echo 'taro is readable!' . PHP_EOL;
}
# exit 処理を止める
if (!file_exists('data/saburo.txt')) {
    echo 'Saburo not here!' . PHP_EOL;
    exit; // 処理が止まる
}
echo 'end' . PHP_EOL;