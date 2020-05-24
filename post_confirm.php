<?php
function h($value){
    return htmlspecialchars($value, ENT_QUOTES);
}

$name = $_POST["name"];
$mail = $_POST["mail"];
//$string = $name.$mail;


//File書き込み
//課題は
//名前とメールの変数をカンマ区切りの文字列にして
//ファイルに書き込めるようにしてください
//確認のURL（必ずここから）
//localhost/php01/post.php
$file = fopen("data/data.txt","a");	// ファイル読み込み
fwrite($file, $name.",".$mail."\r\n"); //yama,test@tesy.jp
fclose($file);

?>
<html>
<head>
<meta charset="utf-8">
<title>POST（受信）</title>
</head>
<body>
お名前：<?php echo h($name); ?>
EMAIL：<?php echo h($mail); ?>

<ul>
<li><a href="index.php">index.php</a></li>
</ul>
</body>
</html>