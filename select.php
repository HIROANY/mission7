<?php

$dateGraph = [];//日付グラフ
$bookCount = [];//冊数カウント

$php_json ="";//jsonエンコード

$ageCount[] = "";//課題7の年齢カウント
$personCount[] = "";//課題7の人数カウント

?>

<?php

//1.  DB接続します
try{
    $pdo = new PDO('mysql:dbname=gs_db_test;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
    exit('データベースに接続できませんでした！'.$e->getMessage());
}

//２．データ表示SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_test_table");

$status = $stmt->execute();

//３．データ表示
$view="";
if($status==false){
    //execute（SQL実行時にエラーがある場合）
    $error = $stmt->errorInfo();
    exit("ErrorQuery".$error[2]);
}else{
    //Selectデータの数だけ自動でループしてくれる
    //FETCH_ASSOC=http://php.net/manual/ja/pdostatement.fetch.php
    while($result = $stmt->fetch(PDO::FETCH_ASSOC)){
        //$resultにデータが入ってくるのでそれを活用して[html]に表示させる為の変数を作成して代入する
        $view .= "<table>";
        $view .= 
            "<tr><td>id</td><td>".$result["id"]."</td></tr>".
            "<tr><td>日付</td><td>".$result["indate"]."</td></tr>".
            "<tr><td>書籍名</td><td>".$result["bookname"]."</td></tr>".
            "<tr><td>書籍URL</td><td>".$result["bookurl"]."</td></tr>".
            "<tr><td>書籍コメント</td><td>".$result["bookcomment"]."</td></tr>".
            "<tr><td>年齢</td><td>".$result["age"]."歳"."</td></tr><br>";
        $view .= "</table>";
    }
}

?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>フリーアンケート表示</title>
<link rel="stylesheet" href="css/range.css">
<link href="css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.anychart.com/js/latest/anychart-bundle.min.js"></script>
<style>div{font-size:16px;}</style>
</head>
<body id="main">

<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
      <a class="navbar-brand" href="index.php">データ登録に戻る</a>
      </div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<div>
    <h2 align="center">データ一覧（全データ表示）</h2>
    <div id="container"></div>
    <div class="container jumbotron"><?=$view?></div>
</div>
<!-- Main[End] -->

<?php

//1.  DB接続します
try{
    $pdo = new PDO('mysql:dbname=gs_db_test;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
    exit('データベースに接続できませんでした！'.$e->getMessage());
}

//２．データ表示SQL作成
$stmt = $pdo->prepare("SELECT * , count(*) from gs_test_table GROUP by sdate;");

$status = $stmt->execute();

//３．データ表示
if($status==false){
    //execute（SQL実行時にエラーがある場合）
    $error = $stmt2->errorInfo();
    exit("ErrorQuery".$error[2]);
}else{
    //Selectデータの数だけ自動でループしてくれる
    //FETCH_ASSOC=http://php.net/manual/ja/pdostatement.fetch.php
    while($result = $stmt->fetch(PDO::FETCH_ASSOC)){
        $dateGraph[] = $result["sdate"];
        $bookCount[] = $result["count(*)"];
    }
        //PHPからJavascriptにデータを渡すためにjsonエンコード
        $php_json1 = json_encode($dateGraph);
        $php_json2 = json_encode($bookCount);
}
?>

<script>
let chart_array = [];

//jsonにエンコードした配列をjsの配列に代入
let js_array1 = <?php echo $php_json1; ?>;
let js_array2 = <?php echo $php_json2; ?>;

//上記2つの配列を1つにまとめる
for(i=0;i<=js_array1.length-1;i++){

chart_array[i] = [js_array1[i], js_array2[i]];

}

//日付ごとの登録冊数を棒グラフ化する
anychart.onDocumentLoad(function() {
  // create a chart and set the data
  let chart = anychart.column(chart_array);
  // set chart title
  chart.title("登録日付・登録冊数グラフ");
  // set chart container and draw
  chart.container("container").draw();
});
</script>

<?php
//課題1
//1.  DB接続します
try{
    $pdo = new PDO('mysql:dbname=gs_db_test;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
    exit('データベースに接続できませんでした！'.$e->getMessage());
}

//２．データ表示SQL作成
//課題1：id 1,3,5だけ抽出するSQL
$stmt = $pdo->prepare("SELECT * FROM gs_test_table WHERE id = 1 OR id = 3 OR id = 5;");

$status = $stmt->execute();

//３．データ表示
$view1="";
if($status==false){
    //execute（SQL実行時にエラーがある場合）
    $error = $stmt->errorInfo();
    exit("ErrorQuery".$error[2]);
}else{
    //Selectデータの数だけ自動でループしてくれる
    //FETCH_ASSOC=http://php.net/manual/ja/pdostatement.fetch.php
    while($result = $stmt->fetch(PDO::FETCH_ASSOC)){
        //$resultにデータが入ってくるのでそれを活用して[html]に表示させる為の変数を作成して代入する
        $view1 .= "<table>";
        $view1 .= 
            "<tr><td>id</td><td>".$result["id"]."</td></tr>".
            "<tr><td>日付</td><td>".$result["indate"]."</td></tr>".
            "<tr><td>書籍名</td><td>".$result["bookname"]."</td></tr>".
            "<tr><td>書籍URL</td><td>".$result["bookurl"]."</td></tr>".
            "<tr><td>書籍コメント</td><td>".$result["bookcomment"]."</td></tr>".
            "<tr><td>年齢</td><td>".$result["age"]."歳"."</td></tr><br>";
        $view1 .= "</table>";

    }
}
?>

<!-- Main[Start] -->
<div>
    <h2 align="center">データ一覧（課題1: id 1,3,5だけ抽出）</h2>
    <div class="container jumbotron"><?=$view1?></div>
</div>
<!-- Main[End] -->

<?php
//課題2
//1.  DB接続します
try{
    $pdo = new PDO('mysql:dbname=gs_db_test;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
    exit('データベースに接続できませんでした！'.$e->getMessage());
}

//２．データ表示SQL作成
//課題2：id 4〜8だけ抽出するSQL
$stmt = $pdo->prepare("SELECT * FROM gs_test_table WHERE id >= 4 AND id <= 8;");

$status = $stmt->execute();

//３．データ表示
$view2="";
if($status==false){
    //execute（SQL実行時にエラーがある場合）
    $error = $stmt->errorInfo();
    exit("ErrorQuery".$error[2]);
}else{
    //Selectデータの数だけ自動でループしてくれる
    //FETCH_ASSOC=http://php.net/manual/ja/pdostatement.fetch.php
    while($result = $stmt->fetch(PDO::FETCH_ASSOC)){
        //$resultにデータが入ってくるのでそれを活用して[html]に表示させる為の変数を作成して代入する
        $view2 .= "<table>";
        $view2 .= 
            "<tr><td>id</td><td>".$result["id"]."</td></tr>".
            "<tr><td>日付</td><td>".$result["indate"]."</td></tr>".
            "<tr><td>書籍名</td><td>".$result["bookname"]."</td></tr>".
            "<tr><td>書籍URL</td><td>".$result["bookurl"]."</td></tr>".
            "<tr><td>書籍コメント</td><td>".$result["bookcomment"]."</td></tr>".
            "<tr><td>年齢</td><td>".$result["age"]."歳"."</td></tr><br>";
        $view2 .= "</table>";

    }
}
?>

<!-- Main[Start] -->
<div>
    <h2 align="center">データ一覧（課題2: id 4〜8だけ抽出）</h2>
    <div class="container jumbotron"><?=$view2?></div>
</div>
<!-- Main[End] -->

<?php
//課題3
//1.  DB接続します
try{
    $pdo = new PDO('mysql:dbname=gs_db_test;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
    exit('データベースに接続できませんでした！'.$e->getMessage());
}

//２．データ表示SQL作成
//課題3：urlにfffを含むレコードを抽出するSQL
$stmt = $pdo->prepare("SELECT * FROM gs_test_table WHERE bookurl LIKE '%fff%';");

$status = $stmt->execute();

//３．データ表示
$view3="";
if($status==false){
    //execute（SQL実行時にエラーがある場合）
    $error = $stmt->errorInfo();
    exit("ErrorQuery".$error[2]);
}else{
    //Selectデータの数だけ自動でループしてくれる
    //FETCH_ASSOC=http://php.net/manual/ja/pdostatement.fetch.php
    while($result = $stmt->fetch(PDO::FETCH_ASSOC)){
        //$resultにデータが入ってくるのでそれを活用して[html]に表示させる為の変数を作成して代入する
        $view3 .= "<table>";
        $view3 .= 
            "<tr><td>id</td><td>".$result["id"]."</td></tr>".
            "<tr><td>日付</td><td>".$result["indate"]."</td></tr>".
            "<tr><td>書籍名</td><td>".$result["bookname"]."</td></tr>".
            "<tr><td>書籍URL</td><td>".$result["bookurl"]."</td></tr>".
            "<tr><td>書籍コメント</td><td>".$result["bookcomment"]."</td></tr>".
            "<tr><td>年齢</td><td>".$result["age"]."歳"."</td></tr><br>";
        $view3 .= "</table>";

    }
}
?>

<!-- Main[Start] -->
<div>
    <h2 align="center">データ一覧（課題3: urlにfffを含むレコード抽出）</h2>
    <div class="container jumbotron"><?=$view3?></div>
</div>
<!-- Main[End] -->

<?php
//課題4
//1.  DB接続します
try{
    $pdo = new PDO('mysql:dbname=gs_db_test;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
    exit('データベースに接続できませんでした！'.$e->getMessage());
}

//２．データ表示SQL作成
//課題4：新しい日付順に抽出するSQL
$stmt = $pdo->prepare("SELECT * FROM gs_test_table ORDER BY indate DESC;");

$status = $stmt->execute();

//３．データ表示
$view4="";
if($status==false){
    //execute（SQL実行時にエラーがある場合）
    $error = $stmt->errorInfo();
    exit("ErrorQuery".$error[2]);
}else{
    //Selectデータの数だけ自動でループしてくれる
    //FETCH_ASSOC=http://php.net/manual/ja/pdostatement.fetch.php
    while($result = $stmt->fetch(PDO::FETCH_ASSOC)){
        //$resultにデータが入ってくるのでそれを活用して[html]に表示させる為の変数を作成して代入する
        $view4 .= "<table>";
        $view4 .= 
            "<tr><td>id</td><td>".$result["id"]."</td></tr>".
            "<tr><td>日付</td><td>".$result["indate"]."</td></tr>".
            "<tr><td>書籍名</td><td>".$result["bookname"]."</td></tr>".
            "<tr><td>書籍URL</td><td>".$result["bookurl"]."</td></tr>".
            "<tr><td>書籍コメント</td><td>".$result["bookcomment"]."</td></tr>".
            "<tr><td>年齢</td><td>".$result["age"]."歳"."</td></tr><br>";
        $view4 .= "</table>";

    }
}
?>

<!-- Main[Start] -->
<div>
    <h2 align="center">データ一覧（課題4: 新しい日付順に抽出）</h2>
    <div class="container jumbotron"><?=$view4?></div>
</div>
<!-- Main[End] -->

<?php
//課題5
//1.  DB接続します
try{
    $pdo = new PDO('mysql:dbname=gs_db_test;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
    exit('データベースに接続できませんでした！'.$e->getMessage());
}

//２．データ表示SQL作成
//課題5：age 20かつ2019-05-27を抽出するSQL
$stmt = $pdo->prepare("SELECT * FROM gs_test_table WHERE age = 20 AND indate LIKE '2019-05-27%';");

$status = $stmt->execute();

//３．データ表示
$view5="";
if($status==false){
    //execute（SQL実行時にエラーがある場合）
    $error = $stmt->errorInfo();
    exit("ErrorQuery".$error[2]);
}else{
    //Selectデータの数だけ自動でループしてくれる
    //FETCH_ASSOC=http://php.net/manual/ja/pdostatement.fetch.php
    while($result = $stmt->fetch(PDO::FETCH_ASSOC)){
        $view5 .= "<table>";
        $view5 .= 
            "<tr><td>id</td><td>".$result["id"]."</td></tr>".
            "<tr><td>日付</td><td>".$result["indate"]."</td></tr>".
            "<tr><td>書籍名</td><td>".$result["bookname"]."</td></tr>".
            "<tr><td>書籍URL</td><td>".$result["bookurl"]."</td></tr>".
            "<tr><td>書籍コメント</td><td>".$result["bookcomment"]."</td></tr>".
            "<tr><td>年齢</td><td>".$result["age"]."歳"."</td></tr><br>";
        $view5 .= "</table>";

    }
}
?>

<!-- Main[Start] -->
<div>
    <h2 align="center">データ一覧（課題5: 20歳かつ2019-05-27を抽出）</h2>
    <div class="container jumbotron"><?=$view5?></div>
</div>
<!-- Main[End] -->

<?php
//課題6
//1.  DB接続します
try{
    $pdo = new PDO('mysql:dbname=gs_db_test;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
    exit('データベースに接続できませんでした！'.$e->getMessage());
}

//２．データ表示SQL作成
//課題6：新しい日付順で5個データを抽出するSQL
$stmt = $pdo->prepare("SELECT * FROM gs_test_table ORDER BY indate DESC LIMIT 5;");

$status = $stmt->execute();

//３．データ表示
$view6="";
if($status==false){
    //execute（SQL実行時にエラーがある場合）
    $error = $stmt->errorInfo();
    exit("ErrorQuery".$error[2]);
}else{
    //Selectデータの数だけ自動でループしてくれる
    //FETCH_ASSOC=http://php.net/manual/ja/pdostatement.fetch.php
    while($result = $stmt->fetch(PDO::FETCH_ASSOC)){
        //$resultにデータが入ってくるのでそれを活用して[html]に表示させる為の変数を作成して代入する
        $view6 .= "<table>";
        $view6 .= 
            "<tr><td>id</td><td>".$result["id"]."</td></tr>".
            "<tr><td>日付</td><td>".$result["indate"]."</td></tr>".
            "<tr><td>書籍名</td><td>".$result["bookname"]."</td></tr>".
            "<tr><td>書籍URL</td><td>".$result["bookurl"]."</td></tr>".
            "<tr><td>書籍コメント</td><td>".$result["bookcomment"]."</td></tr>".
            "<tr><td>年齢</td><td>".$result["age"]."歳"."</td></tr><br>";
        $view6 .= "</table>";

    }
}
?>

<!-- Main[Start] -->
<div>
    <h2 align="center">データ一覧（課題6: 新しい日付順で5個データを抽出）</h2>
    <div class="container jumbotron"><?=$view6?></div>
</div>
<!-- Main[End] -->

<?php
//課題7
//1.  DB接続します
try{
    $pdo = new PDO('mysql:dbname=gs_db_test;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
    exit('データベースに接続できませんでした！'.$e->getMessage());
}

//２．データ表示SQL作成
//課題7: age 10,20,30,40の人数を集計するSOL
$stmt = $pdo->prepare("SELECT * , count(*) from gs_test_table WHERE age = 10 OR age = 20 OR age = 30 OR age =40 GROUP by age;");

$status = $stmt->execute();

//３．データ表示
$view7="";
if($status==false){
    //execute（SQL実行時にエラーがある場合）
    $error = $stmt->errorInfo();
    exit("ErrorQuery".$error[2]);
}else{
    //Selectデータの数だけ自動でループしてくれる
    //FETCH_ASSOC=http://php.net/manual/ja/pdostatement.fetch.php
    while($result = $stmt->fetch(PDO::FETCH_ASSOC)){
        //$resultにデータが入ってくるのでそれを活用して[html]に表示させる為の変数を作成して代入する
        $view7 .= "<p>";
        $view7 .= $result["age"]."歳".":".$result["count(*)"]."人";
        $view7 .= "</p>";
        $ageCount[] = $result["age"];
        $personCount[] = $result["count(*)"];
    }
}
?>

<!-- Main[Start] -->
<div>
    <h2 align="center">データ一覧（課題7: 年齢（10,20,30,40）の人数を集計）</h2>
    <div id="container7"></div>
    <div class="container jumbotron"><?=$view7?></div>
</div>
<!-- Main[End] -->

<script>

//集計した人数（jsonにエンコードした配列をjsの配列に代入）
let pc1 = "<?php echo ($personCount[1]); ?>";
let pc2 = "<?php echo ($personCount[2]); ?>";
let pc3 = "<?php echo ($personCount[3]); ?>";
let pc4 = "<?php echo ($personCount[4]); ?>";

//年齢（jsonにエンコードした配列をjsの配列に代入）
let ac1 = "<?php echo ($ageCount[1]); ?>";
let ac2 = "<?php echo ($ageCount[2]); ?>";
let ac3 = "<?php echo ($ageCount[3]); ?>";
let ac4 = "<?php echo ($ageCount[4]); ?>";

//年齢ごとに集計した人数を円グラフ化する
anychart.onDocumentLoad(function() {
  // create a chart and set the data
  // as Array of Arrays
  let chart = anychart.pie([
    [ac1, pc1],
    [ac2, pc2],
    [ac3,pc3],
    [ac4, pc4]
  ]);
  chart.title("年齢別人数");
  chart.container("container7").draw();
});
</script>

</body>
</html>