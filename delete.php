<!-- とりあえず全部コピ -->

<?php
$id   = $_GET['id'];
require_once('funcs.php');
// DBに繋ぐ関数の呼び出し
$pdo = connectDB();
// ①画像ファイル削除処理：まずは画像のファイル名を呼び出す
$sql_select = 'SELECT image FROM gs_bm_table WHERE id = :id';
$stmt = $pdo->prepare($sql_select);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute(); //実行

// ①SQLエラーチェック
if ($status == false) {
    sql_error($status);
} else {
    $result = $stmt->fetch();
}

$filepath = "./images/" . $result['image'];
// pathにファイルが存在すれば削除する
if(file_exists($filepath)){
    unlink($filepath);
}

// ②DB削除処理
$sql_delete = "DELETE FROM gs_bm_table WHERE id = :id;";
$stmt = $pdo->prepare($sql_delete);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute(); //実行

// ②SQLエラーチェック
if ($status == false) {
    sql_error($stmt);
} else {
    redirect('select.php');
}