<?php

// #15 型の継承
// プロパティやメソッドの他に、データ型も継承している
// SponsoredPost　は　Post型としても扱える
class Post
{
    protected $text;

    public function __construct($text)
    {
        $this->text = $text;
    }
    
    public function show()
    {
        printf('%s' . PHP_EOL, $this->text);
    }
}

class SponsoredPost extends Post
{
    private $sponsor;

    public function __construct($text, $sponsor)
    {
        parent::__construct($text);
        $this->sponsor = $sponsor;
    }
    
    public function show()
    {
        printf('%s by %s' . PHP_EOL, $this->text, $this->sponsor);
    }
}
$posts = [];

$posts[0] = new Post('hello');
$posts[1] = new Post('hello again');
$posts[2] = new SponsoredPost('hello hello', 'dotinstall');

// Post型の変数を受け取って処理する関数を作り、確かめる
function processPost(Post $post)// Post型のpostのみ受け付ける
{
    $post->show();
}

foreach ($posts as $post) {
    processPost($post);
}
// 同じ結果に。 SponsoredPostもPost型として扱えるという事
// $posts[0]->show(); // hello
// $posts[1]->show(); // hello again
// $posts[2]->show(); // hello hello by dotinstall
