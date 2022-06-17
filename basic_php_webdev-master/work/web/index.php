<?php
require('../app/functions.php');

// $bg = 'transparent';
// $bg = filter_input(INPUT_COOKIE, 'bg') ?? 'transparent';
// ↑　ヘッダーに移せばページが増えてもOK

include('../app/_parts/_header.php');

$today = date('Y-m-d H:i:s l');
$name = 'Taro';
$name = 'Taro <script>alert(1);</script>';

$names = [
  'Taro',
  'Jiro',
  'Saburo',
];

?>

<h1>開発環境編</h1>
<section>
  <h2>記法</h2>
  <p>Today: <?php echo date('Y-m-d H:i:s l'); ?></p>
  <!-- 短縮記法 -->
  <p>Today: <?= date('Y-m-d H:i:s l'); ?></p>
  <p>Today: <?= $today; ?></p>

</section>

<section>
  <h2>変数</h2>
  <!-- <p>Hello, <?= $name; ?>!</p> -->
  <!-- セキュリティ対策 -->
  <p>Hello, <?= htmlspecialchars($name, ENT_QUOTES, 'UTF-8'); ?>!</p>
  <!-- よく使うので関数に -->
  <p>Hello, <?= h($name); ?>!</p>

</section>

<section>
  <h2>配列</h2>
  <ul>
    <?php if (empty($names)) : ?>
      <li>Nobody!</li>
    <?php else : ?>
      <?php foreach ($names as $name) : ?>
        <li><?= h($name); ?></li>
      <?php endforeach; ?>
    <?php endif ?>
  </ul>
</section>

<section>
  <h2>フォーム部品</h2>
  <h3>input</h3>
  <form action="result.php" method="get">
    <input type="text" name="message">
    <input type="text" name="username">
    <button>Send</button>
  </form>
</section>

<section>
  <h3>テキストエリア</h3>
  <form action="result.php" method="get">
    <textarea name="textarea" id="" cols="30" rows="10"></textarea>
    <button>Send</button>
  </form>
</section>
<section>
  <h3>セレクトBOX</h3>
  <form action="result.php" method="get">
    <!-- <select name="color"> -->
    <select name="colors[]" multiple><!-- 複数選択 -->
      <option value="orange">Orange</option>
      <option value="pink">Pink</option>
      <option value="gold">Gold</option>
    </select>
    <button>Send</button>
  </form>
</section>

<section>
  <h3>チェックボックス</h3>
<form action="result.php" method="get">
    <label><input type="checkbox" name="colors[]" value="orange">Orange</label>
    <label><input type="checkbox" name="colors[]" value="pink">Pink</label>
    <label><input type="checkbox" name="colors[]" value="gold">Gold</label>
  <button>Send</button>
</form>
</section>

<section>
  <h3>ラジオボタン</h3>
<form action="result.php" method="get">
    <label><input type="radio" name="color" value="orange">Orange</label>
    <label><input type="radio" name="color" value="pink">Pink</label>
    <label><input type="radio" name="color" value="gold">Gold</label>
  <button>Send</button>
</form>
</section>

<section>
  <h3>選択した値で背景色を変更</h3>
  <form action="result.php" method="get">
      <label><input type="radio" name="bg" value="orange">Orange</label>
      <label><input type="radio" name="bg" value="pink">Pink</label>
      <label><input type="radio" name="bg" value="gold">Gold</label>
    <button>Send</button>
    <a href="reset.php">[reset]</a>
  </form>

</section>

<section>
  <a href="k_index.php">掲示板</a>
</section>
<?php
include('../app/_parts/_footer.php');
