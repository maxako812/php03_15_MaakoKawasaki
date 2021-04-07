<!-- とりあえず全部コピ -->

<?php
//PHP:コード記述/修正の流れ
//1. insert.phpの処理をマルっとコピー。
//   POSTデータ受信 → DB接続 → SQL実行 → 前ページへ戻る
//2. $id = POST["id"]を追加
//3. SQL修正
//   "UPDATE テーブル名 SET 変更したいカラムを並べる WHERE 条件"
//   bindValueにも「id」の項目を追加
//4. header関数"Location"を「select.php」に変更

//1. POSTデータ取得
$shopname = $_POST['shopname'];
$visitdate = $_POST['visitdate'];
$menu = $_POST['menu'];
$rating = $_POST['rating'];
$detail = $_POST['detail'];
$id = $_POST["id"];

//2. DB接続します
require_once('funcs.php');
$pdo = connectDB();
$sql = "UPDATE gs_bm_table SET shopname=:shopname, visitdate=:visitdate, menu=:menu, rating=:rating, detail=:detail, created=sysdate() WHERE id= :id;";
//３．データ登録SQL作成
$stmt = $pdo->prepare($sql);
// 数値の場合 PDO::PARAM_INT
// 文字の場合 PDO::PARAM_STR
$stmt->bindValue(':shopname', $shopname, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':visitdate', $visitdate, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':menu', $menu, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':rating', $rating, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':detail', $detail, PDO::PARAM_STR);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);

$status = $stmt->execute(); //実行
//４．データ登録処理後
if ($status == false) {
    sql_error($stmt);
} else {
    redirect('index.php');
}