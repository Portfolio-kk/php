<?php
require('../app/functions.php');

$message = trim(filter_input(INPUT_GET, 'message'));
$message = $message !== '' ? $message : '...';

$username = filter_input(INPUT_GET, 'username');
$username = $username !== '' ? $username : '...';

$textarea = filter_input(INPUT_GET, 'textarea');
$textarea = $textarea !== '' ? $textarea : '...';


$colors = filter_input(INPUT_GET, 'colors', FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);
// FILTER_DEFAULT デフォルトで受け取り  FILTER_REQUIRE_ARRAY 配列に
$colors = empty($colors) ? 'None selected' : implode(',', $colors);

// $color = filter_input(INPUT_GET, 'color');
// $color = isset($color) ? $color : 'Null';
// $color = $color ?? 'Null';// 上と同じ
$color = filter_input(INPUT_GET, 'color') ?? 'transparent';

// 背景色を変更
$bgFromGet = filter_input(INPUT_GET, 'bg');
// クッキーにカラーを保存 ★setcookie() 前に何も出力してはいけない
// setcookie('bg', $bgFromGet);

// function.phpで、 session_start();　をしたので $_SESSION 特殊な変数が使える
$_SESSION['bg'] = $bgFromGet; // Cookie と違い、サーバーで値を保持しているのでここで値をセットした直後から使える

include('../app/_parts/_header.php');
?>

<p><?= h($message); ?> by <?= h($username); ?></p>

<p><?= h($textarea); ?></p>

<p><?= h($color); ?></p>
<p><?= h($colors); ?></p>

<p><?= h($bgFromGet); ?></p>

<p><a href="index.php">Go back</a></p>

<?php
include('../app/_parts/_footer.php');
