<?php
### オブジェクト編
// 1:構造を定義する　class Post { ... }
// 2:新しい値を作る　$post = new Post();
// 3:オブジェクトを使う　$post->text = 'hello';
// 　　　　　　　　　  　$post->likes = 0;
// 　　　　　　　　　  　$post->show();

// オブジェクトを使わない場合
// $posts = [];
// $posts[0] = ['text' => 'hello', 'likes' => 0];
// $posts[1] = ['text' => 'hello again', 'likes' => 0];

// print_r($posts);
// Array
// (
//     [0] => Array
//         (
//             [text] => hello
//             [likes] => 0
//         )

//     [1] => Array
//         (
//             [text] => hello again
//             [likes] => 0
//         )

// )
// 表示する関数
// function show($post)
// {
//     printf('%s (%d)' . PHP_EOL, $post['text'], $post['likes']);
// }
// show($posts[0]); // hello (0)
// show($posts[1]); // hello again (0)

# class 
// -> アロー演算子　$this->***

// クラス
class Post
{
    // プロパティ
    public $text;
    public $likes = 0;
    
    // コンストラクタ
    // public function __construct($textFromNew, $likesFromNew)
    // {
    //     $this->text = $textFromNew;
    //     $this->likes = $likesFromNew;
    // }
    // 慣れたらプロパティと同じ名前の方が良い
    public function __construct($text)
    {
        $this->text = $text;
    }

    // メソッド
    public function show()
    {
        printf('%s (%d)' . PHP_EOL, $this->text, $this->likes);
    }
}
$posts = [];

// $posts[0] = ['text' => 'hello', 'likes' => 0];
// $posts[0] = new Post();// インスタンス ()なくてもOK
// $posts[0]->text = 'hello';
// $posts[0]->likes = 0;
$posts[0] = new Post('hello');// インスタンス

// $posts[1] = new Post();
// $posts[1]->text = 'hello again';
// $posts[1]->likes = 0;
$posts[1] = new Post('hello again');

// show($posts[0]); // hello (0)
$posts[0]->show(); // hello (0)
$posts[1]->show(); // hello again (0)