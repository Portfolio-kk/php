<?php

require('../app/k_functions.php');

// 直接アドレスにアクセスすると、 ... が増えるので
// POSTされたかどうかを $_SERVER という特殊な変数で調べる
// REQUEST_METHOD が POST だったら次の処理をしなさい　条件分岐

// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
//     // POSTされた値
//     $message = trim(filter_input(INPUT_POST, 'message'));
//     $message = $message !== '' ? $message : '...';
//     // を、txtにadd 改行をつけて
//     $filename = '../app/k_messages.txt';
//     $fp = fopen($filename, 'a');
//     fwrite($fp, $message . "\n");
//     fclose($fp);
// } else {
//     // POSTでアクセスでなければ処理を止める
//     exit('Invalid Request');
// }

include('../app/_parts/_k_header.php');

// var_dump($message);
?>
<p>Message added!</p>
  <p><a href="k_index.php">Go back</a></p>

<?php

include('../app/_parts/_footer.php');