<?php

// #14 override
class Post
{
    // private $text;
    protected $text; // protected このクラスと継承したクラスでのみ使用可能

    public function __construct($text)
    {
        $this->text = $text;
    }
    
    // final public function show() // final overrideして欲しくないメソッドをロック(アクセス修飾子の前)
    public function show()
    {
        printf('%s' . PHP_EOL, $this->text);
        // 親クラスで $text は private
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
    public function showSponsor()
    {
        printf('%s' . PHP_EOL, $this->sponsor);
    }
    // メソッドのoverride 親クラスと同名のメソッドを再定義
    public function show()
    {
        printf('%s by %s' . PHP_EOL, $this->text, $this->sponsor);
    }
}
$posts = [];

$posts[0] = new Post('hello'); // hello
$posts[1] = new Post('hello again'); // hello again
// $posts[2] = new SponsoredPost('hello hello'); // 中身が空でも表示される hello hello
$posts[2] = new SponsoredPost('hello hello', 'dotinstall');

$posts[0]->show(); // hello
$posts[1]->show(); // hello again
$posts[2]->show(); // hello hello > hello hello by dotinstall
$posts[2]->showSponsor(); // dotinstall
