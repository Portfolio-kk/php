<?php

# 日付 UNIX タイムスタンプ 1970/01/01 00:00:00 GMT
// time() ↑からの経過秒数
// 一日分　+24*60*60 +24h*60m*60s

# data(フォーマット, UNIXタイムスタンプ)　見やすい形式に戻す
// PHPが稼働しているマシンのタイムゾーンを考慮してローカルタイムになる

# data('Y-m-d', time());
// Y 年を4桁で
// m 月を2桁で
// d 日を2桁で

# data('H:i:s', time());
// 時:分:秒 を2桁ずつ

# data('l', time());
// 英語の曜日

# data('W', time());
// 一年の内の第何周目か

echo time() . PHP_EOL;// 1655139737
// echo date('Y-m-d l', time()) . PHP_EOL; // 2022-06-13 Monday
echo date('Y-m-d l') . PHP_EOL; // 単に現在日時を表示する場合は time() を省略可

// 特定日時のタイムスタンプを計算するのは面倒
# mktime() 引数の順番に注意　時　分　秒　月　日　年
echo date('Y-m-d l', mktime(0, 0, 0, 5, 1, 2000)) . PHP_EOL;// 2000-05-01 Monday

// 日時っぽい文字列から
echo date('Y-m-d l', strtotime('2022-06-14')) . PHP_EOL;
echo date('Y-m-d l', strtotime('2022-06-14 +1 day')) . PHP_EOL;

// ※ date() mktime() strtotime() 32bitのマシンでは2038年以降うまく動作しない
// DateTimeクラス　が一般的　難しいのでまた