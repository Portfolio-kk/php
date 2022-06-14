<?php

// #12-13 クラスの継承
class Post // 親クラス Superクラス
{
    private $text;

    public function __construct($text)
    {
        $this->text = $text;
    }
    
    public function show()
    {
        printf('%s' . PHP_EOL, $this->text);
    }
}
// 新しいクラスを作成
// extends Post で Post を継承
//SponsoredPostクラス が Postクラス を継承した
class SponsoredPost extends Post // 子クラス Subクラス
{
    private $sponsor;

    public function __construct($text, $sponsor)
    {
        // 親クラスのコンストラクタにあるので
        parent::__construct($text);
        $this->sponsor = $sponsor;
    }
    public function showSponsor()
    {
        printf('%s' . PHP_EOL, $this->sponsor);
    }
}
$posts = [];

$posts[0] = new Post('hello'); // hello
$posts[1] = new Post('hello again'); // hello again
// $posts[2] = new SponsoredPost('hello hello'); // 中身が空でも表示される hello hello
$posts[2] = new SponsoredPost('hello hello', 'dotinstall');

$posts[0]->show(); // hello
$posts[1]->show(); // hello again
$posts[2]->show(); // hello hello
$posts[2]->showSponsor(); // dotinstall
