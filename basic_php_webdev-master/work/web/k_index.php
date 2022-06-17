<?php

require('../app/k_functions.php');

createToken();

// (定数)
define('FILENAME', '../app/k_messages.txt');

// 二重投稿禁止の為、resultから移動
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    validateToken();
    
  // POSTされた値
  $message = trim(filter_input(INPUT_POST, 'message'));
  $message = $message !== '' ? $message : '...';
  // を、txtにadd 改行をつけて
  // $filename = '../app/k_messages.txt';
  // $fp = fopen($filename, 'a');
  $fp = fopen(FILENAME, 'a');
  fwrite($fp, $message . "\n");
  fclose($fp);

  // result にリダイレクト
  header('Location: http://localhost:8080/k_result.php');
  exit;
} 
// else {
//   // POSTでアクセスでなければ処理を止める
//   exit('Invalid Request');
// }



// $filename = '../app/k_messages.txt';
// （末尾の改行を無視し、一行ずつ読み込む）配列
// $messages = file($filename, FILE_IGNORE_NEW_LINES);
$messages = file(FILENAME, FILE_IGNORE_NEW_LINES);

include('../app/_parts/_k_header.php');

?>

<ul>
<?php foreach ($messages as $message): ?>
  <li><?= h($message); ?></li>
<?php endforeach; ?>
</ul>

  <!-- <form action="k_result.php" method="post"> -->
    <!-- result を更新すると二重投稿される為、送り先ファイルを別にする index.phpなら空にしたり、action属性ごと削除でも同意 -->
  <form action="k_index.php" method="post">
    <input type="text" name="message">
    <button>Post</button>
    <input type="hidden" name="token" value="<?= h($_SESSION['token']); ?>">
  </form>

  <a href="index.php">index</a>
<?php

include('../app/_parts/_footer.php');