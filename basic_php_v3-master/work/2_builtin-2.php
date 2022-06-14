<?php
#配列の操作
{
    # array_unshift() 先頭に要素を追加
    # array_push() 末尾に要素を追加
    # array_shift()　先頭の要素を削除
    # array_pop()　末尾の要素を削除
    // ★破壊的メソッド

    $scores = [30, 40, 50];
    print_r($scores);

    array_unshift($scores, 10, 20);
    array_push($scores, 60, 70);
    $scores[] = 80; // 1つだけ末尾に追加
    print_r($scores); // 10 20 30 40 50 60 70 80

    array_shift($scores);
    array_pop($scores);
    print_r($scores); // 20 30 40 50 60 70
} 
{
    # array_slice(配列, 位置, 個数) 配列の一部を切り出す　★非破壊メソッド　元配列を変更しない
    $scores = [30, 40, 50, 60, 70];
    // $partial = array_slice($scores, 2, 3); // 最後までの場合は個数を省略可能
    $partial = array_slice($scores, 2); // 同じ意味
    print_r($scores); // 元のまま
    print_r($partial); // 50 60 70

    $partial = array_slice($scores, -2); // 最後から2番目
    print_r($partial); // 60 70
} {
    # array_splice(配列, 位置, 個数) を削除　★破壊的メソッド
    # array_splice(配列, 削除位置, 削除個数, 挿入要素)
    $scores = [30, 40, 50, 60, 70, 80];

    array_splice($scores, 2, 2);
    print_r($scores); // 50 60　を削除して、30 40 70 80

    array_splice($scores, 2, 1, 100);
    print_r($scores); // 70　を削除して、100を入れる　30 40 100 80

    array_splice($scores, 2, 0, 99);
    print_r($scores); // 100を削除せず、99を入れる　30 40 99 100 80
} {
    $scores = [40, 50, 20, 30];
    # sort() rsort() 小さき順　大きい順 
    sort($scores);
    print_r($scores); // 20 30 40 50

    rsort($scores);
    print_r($scores); // 50 40 30 20

    # shuffle() ★破壊
    shuffle($scores);
    print_r($scores); // シャッフル

    # array_rand(値, 数) キーを返す　★非破壊
    // 新しい配列を返すので変数で受ける
    $picked = array_rand($scores, 2);
    print_r($picked); // ランダムに２つの値のキー
    //  値を返したければ
    echo $scores[$picked[0]] . PHP_EOL;
    echo $scores[$picked[1]] . PHP_EOL;
} {
    # array_fill(スタートindex,　終了index,　埋める値)
    $scores = array_fill(0, 5, 10);
    print_r($scores); // 10 10 10 10 10

    # range(スタート,　終了) 配列を作る
    $scores = range(1, 10);
    print_r($scores); // 1 ~ 10
    $scores = range(1, 10, 2);
    print_r($scores); // 1 3 5 7 9

    echo array_sum($scores) . PHP_EOL; // 合計値 25
    echo max($scores) . PHP_EOL; // 9
    echo min($scores) . PHP_EOL; // 1
    echo array_sum($scores) / count($scores) . PHP_EOL; // 平均　5
} {
    $a = [3, 4, 8];
    $b = [4, 8, 12];
    // 複数に配列
    # array_merge(配列A,配列B) 配列の結合
    $merge = array_merge($a, $b);
    // $merge = [...$a, ...$b]; // 上と同じ意味(前出)
    print_r($merge); // 3 4 8 4 8 12

    # array_diff(配列A,配列B) 配列Aから配列Bを引く　差異のあるAが残る
    $diff1 = array_diff($a, $b);
    print_r($diff1); // 3
    $diff2 = array_diff($b, $a);
    print_r($diff2); // 12
    # array_intersect(配列A,配列B) 配列Aと配列Bの共通の値のみ表示

    $common = array_intersect($a, $b);
    print_r($common); // 4 8
} {
    # array_map($fn, $a) それぞれの値に関数を通す
    $prices = [100, 200, 300];
    // 10%の税込みに変更
    $newPrices = array_map(
        function ($n) {
            return $n * 1.1;
        },
        // fn ($n) => $n * 1.1, // アロー関数
        $prices
    );
    print_r($newPrices); // 110 220 330
} {
    # array_filter($a, $fn) // それぞれの値にテストをし true だった値のみを返す
    $numbers = range(1, 10); // 1 ~ 10
    // 偶数のみ
    $evenNumbers = array_filter(
        $numbers,
        function ($n) {
            // if ($n % 2 === 0) {
            //     return true;
            // } else {
            //     return false;
            // } // 条件のみ返しても同じ事
            return $n % 2 === 0;
        }
    );
    // アロー関数
    // $evenNumbers = array_filter(
    //     $numbers,
    //     fn($n) => $n % 2 === 0
    // );
    print_r($evenNumbers); // 2 4 6 8 10
}
{
    #配列のキー、値を操作
    # array_keys() array_values()
    $scores = [
        'taguchi' => 80,
        'hayashi' => 70,
        'kikuchi' => 60,
    ];
    $keys = array_keys($scores);
    print_r($keys); // taguchi ...
    $valurs = array_values($scores);
    print_r($valurs); // 80 70 ...

    # array_key_exists　キーに含まれるか
    if (array_key_exists('taguchi', $scores)) {
        echo 'taguchi is here!' . PHP_EOL;
    }
    # in_array　配列に含まれるか
    if (in_array(80, $scores)) {
        echo '80 is here!' . PHP_EOL;
    }
    # array_search() 値を検索して対応するキーを返す
    echo array_search(70, $scores) . PHP_EOL; // hayashi

    # (前出の sort rsort はキーを削除して連番になる)
    // sort($scores);
    // print_r($scores);
    // rsort($scores);
    // print_r($scores);

    # asort() arsort() キーを保持したまま値でソート
    asort($scores);
    print_r($scores);
    // Array
    // (
    //     [kikuchi] => 60
    //     [hayashi] => 70
    //     [taguchi] => 80
    // )
    arsort($scores);
    print_r($scores);
    // Array
    // (
    //     [taguchi] => 80
    //     [hayashi] => 70
    //     [kikuchi] => 60
    // )

    # ksort() krsort() キーでソートしたい
    ksort($scores);
    print_r($scores);
    // Array
    // (
    //     [hayashi] => 70
    //     [kikuchi] => 60
    //     [taguchi] => 80
    // )
} 
{
    #　複雑な配列でソート
    $data = [
        ['name' => 'taguchi', 'score' => 80],
        ['name' => 'kikuchi', 'score' => 60],
        ['name' => 'hayashi', 'score' => 70],
        ['name' => 'tamachi', 'score' => 60],
    ];
    # usort() 破壊的？　一つの項目でのみソート(比較)可能
    usort(
        $data,
        function ($a, $b) {
            if ($a['score'] === $b['score']) {
                return 0;
            }
            return $a['score'] > $b['score'] ? 1 : -1;
        }
    );
    print_r($data);
}
{
    #　複数の条件のソート
    $data = [
        ['name' => 'taguchi', 'score' => 80],
        ['name' => 'kikuchi', 'score' => 60],
        ['name' => 'hayashi', 'score' => 70],
        ['name' => 'tamachi', 'score' => 60],
    ];
    # array_multisort()　複数の項目でソート(比較)可能　破壊的？
    // scoreで並び替えた後に、nameで並び替える
    // array_multisort($scores, $names, $data)

    # array_column()
    $scores = array_column($data, 'score');
    $names = array_column($data, 'name');
    // print_r($scores);
    // print_r($names);

    // array_multisort(
    //     $scores,
    //     $names,
    //     $data
    // );
    // print_r($data); // 菊池　田町　林　田口

    array_multisort(
        $scores, SORT_DESC, SORT_NUMERIC, // 大きい順　数値
        $names, SORT_DESC, SORT_STRING, // 降順　文字列
        $data
    );
    print_r($data); // 田口　林　田町　菊池
}
