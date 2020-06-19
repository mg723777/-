<?php
//1.  DB接続します
try {
    //dbname=gs_db
    //host=localhost
    //Password:MAMP='root', XAMPP=''
    $pdo = new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost','root','root');
} catch (PDOException $e) {
    exit('DBconnectError'.$e->getMessage());
}

//２．POST値取得（POST数に合わせて増やす）
$name   = $_POST["name"];
$email  = $_POST["email"];
$age    = $_POST["age"];
$naiyou = $_POST["naiyou"];


//３．SQL文作成 //*の箇所とテーブル名を変更！！
$sql = "INSERT INTO gs_an_table(name,email,age,naiyou,indate)VALUES(:name, :email, :age, :naiyou, sysdate())";
$stmt = $pdo->prepare($sql);

$stmt->bindValue(":name", $name);
$stmt->bindValue(":email", $email);
$stmt->bindValue(":age", $age);
$stmt->bindValue(":naiyou", $naiyou);


//5. SQL実行
$status = $stmt->execute();

//6. 画面遷移(select.php)
if($status==false) {
    //execute（SQL実行時にエラーがある場合）
    $error = $stmt->errorInfo();
    exit("SQLError:".$error[2]);
}else{
    //header("Location: 行き先ファイル名")
    header("Location: select.php");
    exit();
}



?>