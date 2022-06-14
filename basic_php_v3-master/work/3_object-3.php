<?php
// クラス #09〜
//　declare(strict_types=1); // 強い型付け
// class Post
// {
//     private $text;
//     // private string $text; // string　の型付け　PHPverで使えない　弱い型付け数値を入れても文字列に変更　強くしたければ declare

//     // public function __construct(string $text)
//     public function __construct($text)
//     {
//         $this->text = $text;
//     }
    
//     public function show()
//     {
//         printf('%s' . PHP_EOL, $this->text);
//     }
//     public static function showInfo() {

//     }
// }
// $posts = [];

// $posts[0] = new Post(5);
// $posts[1] = new Post('hello again');

// $posts[0]->show();
// $posts[1]->show();


// #10 11
class Post
{
    private $text;

    // static クラス自身のプロパティやメソッドを設定 (アクセス修飾子の後)
    // self::$***　でアクセス
    private static $count = 0; // クラスプロパティ
    // private const VERSION = 0.1; //オブジェクト定数
    public const VERSION = 0.1; //定数 の場合は変更される心配がないので public でも問題なし

    public function __construct($text)
    {
        $this->text = $text;
        self::$count++;
    }
    
    public function show()
    {
        printf('%s' . PHP_EOL, $this->text);
    }
    // classに紐付いたメソッド　static function
    public static function showInfo() { // クラスメソッド
        printf('Count: %d' . PHP_EOL, self::$count);
        printf('Version: %.1f' . PHP_EOL, self::VERSION);
    }
}
$posts = [];

$posts[0] = new Post('hello');
$posts[1] = new Post('hello again');

$posts[0]->show(); // hello
$posts[1]->show(); // hello again

// classから直接実行
Post::showInfo();// Count:2 インスタンスを作った数
echo Post::VERSION . PHP_EOL; // 0.1