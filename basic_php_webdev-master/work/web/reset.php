<?php

require('../app/functions.php');

// setcookie('bg', '');//  空文字だとPHPが内部的に、クッキーの有効期限を過去日時にセットし、クッキーが削除される

// session リセットしたい
unset($_SESSION['bg']);

// ページのリロード 
// setcookie同様これ以前に出力は禁止　半角スペース入れる　絶対パスで
header('Location: http://localhost:8080/index.php');