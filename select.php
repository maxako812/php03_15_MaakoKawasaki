<?php
session_start();
require_once('funcs.php');
// 0.ログイン確認
loginCheck();

//1.  DB接続します
$pdo = connectDB();

//２．データ取得SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_bm_table ORDER BY visitdate DESC");
$status = $stmt->execute();

//３．データ表示
$view = "";
if ($status == false) {
    //execute（SQL実行時にエラーがある場合）
    $error = $stmt->errorInfo();
    exit('ErrorQuery:' . print_r($error, true));
} else {
    //Selectデータの数だけ自動でループしてくれる
    //FETCH_ASSOC=http://php.net/manual/ja/pdostatement.fetch.php
    while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $view .= '<tr class= "clickable-row" data-href = "detail.php?id=' . h($result['id']) . '">';
        $view .= '<td>' . h($result['shopname']) . '</td>';
        $view .= '<td>' . h($result['visitdate']) . '</td>';
        $view .= '<td>' . h($result['menu']) . '</td>';
        $view .= '<td>' . '<img src="./images/' . $result['image'].  '" width="300" height="300">'. '</td>';
        $view .= '<td>' . h($result['rating']) . '</td>';
        $view .= '<td>' . h($result['detail']) . '</td></tr>';
    }
}
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ラーメンロード</title>
    <!-- <link rel="stylesheet" href="css/range.css"> -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- JQuery -->

</head>

<body id="main">
    <!-- Head[Start] -->
    <header>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.php">データ登録</a>
                </div>
            </div>
        </nav>
    </header>
    <!-- Head[End] -->

    <!-- Main[Start] -->
    <div>
        <div class="container jumbotron">
        <table class="table table-striped">
            <tr>
                <th>店名</th>
                <th>訪問日</th>
                <th>メニュー</th>
                <th>写真</th>
                <th>評価</th>
                <th>詳細</th>
            </tr>
            <?= $view ?>
        </table>
        </div>
    </div>
    <!-- Main[End] -->

    <script>
       $(function($) {
            $(".clickable-row").css("cursor","pointer").click(function() {
            location.href = $(this).data("href");
            });
        });
    </script>
</body>

</html>