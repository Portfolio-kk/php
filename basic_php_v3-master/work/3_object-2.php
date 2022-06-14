<?php
// クラス
class Post
{
    // プロパティ
    public $text; // アクセス修飾子 public　クラス外からもアクセス可能
    private $likes = 0; // private このクラスの中でしか使えない
    // カプセル化：アクセス修飾子を付けて、何が出来るか出来ないかを明確にする事
    
    // コンストラクタ
    public function __construct($text)
    {
        $this->text = $text;
    }

    // メソッド
    public function show()
    {
        printf('%s (%d)' . PHP_EOL, $this->text, $this->likes);
    }
    public function like()
    {
        $this->likes++;

        if ($this->likes > 100) {
            $this->likes = 100;
        }
    }
}
$posts = [];

$posts[0] = new Post('hello');
$posts[1] = new Post('hello again');

// $posts[0]->likes++;
// $posts[0]->likes = -100;

$posts[0]->like();

$posts[0]->show(); // hello (0)
$posts[1]->show(); // hello again (0)
