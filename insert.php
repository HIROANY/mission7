<?php

// index.phpから送られてきたデータを変数で受け取る
$bookname = $_POST["bookname"];
$bookurl = $_POST["bookurl"];
$bookcomment = $_POST["bookcomment"];
$age = $_POST["age"];


//2. DB接続します
try{
    $pdo = new PDO('mysql:dbname=gs_db_test;charset=utf8;host=localhost','root','');
} catch (PDOException $e){
    exit('データベースに接続できませんでした！'.$e->getMessage());
}
//３．データ登録SQL作成
$stmt = $pdo->prepare("INSERT INTO gs_test_table(id,bookname,bookurl,bookcomment,indate,age)VALUE(NULL,:bookname,:bookurl,:bookcomment,sysdate(),:age)");
$stmt->bindValue(':bookname', $bookname, PDO::PARAM_STR);
$stmt->bindValue(':bookurl', $bookurl, PDO::PARAM_STR);
$stmt->bindValue(':bookcomment', $bookcomment, PDO::PARAM_STR);
$stmt->bindValue(':age', $age, PDO::PARAM_INT);

$status = $stmt->execute();

//４．データ登録処理後
if($status==false){
    //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
    $error = $stmt->errorInfo();
    exit("QueryError".$error[2]);
}else{
    //５．index.phpへリダイレクト　この処理がないと画面が切り替わらない
    header("Location: select01.php");
}

?>