<?php
require_once('funcs.php');
$pdo = connectDB();
$id = $_GET['id'];
//２．データ登録SQL作成
$stmt = $pdo->prepare('SELECT * FROM gs_user_table WHERE id=' . $id . ';');
$status = $stmt->execute();
//３．データ表示
if ($status == false) {
    sql_error($status);
} else {
    $result = $stmt->fetch();
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>データ登録</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: bisque;
        }
        div {
            padding: 10px;
            font-size: 16px;
        }
    </style>
</head>
<body>
    <header>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header"><a class="navbar-brand" href="userlist.php">データ一覧</a></div>
            </div>
        </nav>
    </header>
    <!-- method, action, 各inputのnameを確認してください。  -->
    <form method="POST" action="userupdate.php">
        <div class="jumbotron">
            <fieldset>
            <legend>ユーザー登録</legend>
                <label>名前：<input type="text" name="name" value=<?= $result['name'] ?>></label><br>
                <label>ユーザーID：<input type="text" name="userid" value=<?= $result['lid'] ?>></label><br>
                <label>パスワード：<input type="password" name="password" value=<?= $result['lpw'] ?>></label><br>
                <label>管理者フラグ：<input type="number" name="kanri_flg" min=0 max=1 value=<?= $result['kanri_flg'] ?>></label><br>
                <label>退職者フラグ：<input type="number" name="life_flg" min=0 max=1 value=<?= $result['life_flg'] ?>></label><br>
                <!-- ↓追加 -->
                <input type="hidden" name="id" value="<?= $result['id'] ?>">
                <input type="submit" value="更新">
            </fieldset>
        </div>
    </form>
</body>
</html>