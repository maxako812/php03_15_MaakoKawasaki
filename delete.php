<!-- とりあえず全部コピ -->

<?php
$id   = $_GET['id'];
require_once('funcs.php');
// DBに繋ぐ関数の呼び出し
$pdo = connectDB();
$sql = "DELETE FROM gs_bm_table WHERE id = :id;";
$stmt = $pdo->prepare($sql);

$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute(); //実行

//４．データ登録処理後
if ($status == false) {
    sql_error($stmt);
} else {
    redirect('select.php');
}