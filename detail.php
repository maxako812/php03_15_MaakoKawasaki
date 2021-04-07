
<!-- とりあえず全部コピ -->

<?php
require_once('funcs.php');
$pdo = connectDB();
$id = $_GET['id'];
//２．データ登録SQL作成
$sql = "SELECT * FROM gs_bm_table WHERE id=" . $id . ";";
$stmt = $pdo->prepare($sql);
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
    <title>My RAMEN ROAD</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/my.css" rel="stylesheet">

</head>
<body>
    <header>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                <a class="navbar-brand" href="select.php">データ一覧</a></div>
            </div>
        </nav>
    </header>
    <!-- method, action, 各inputのnameを確認してください。  -->
    <form name="upload-form" action="update.php" method="POST" enctype="multipart/form-data">
        <div class="jumbotron">
            <fieldset>
                <legend>ラーメンDB</legend>
                <label>店名：<input type="text" name="shopname" value="<?= $result['shopname'] ?>"></label><br>
                <label>訪問日：<input type="date" name="visitdate" value="<?= $result['visitdate'] ?>"></label><br>
                <label>食べたメニュー：<input type="text" name="menu" value="<?= $result['menu'] ?>"></label><br>
                <div class="rating">
                    <input id="rating1" type="radio" name="rating" value="1" checked><label for="rating1">★</label>
                    <input id="rating2" type="radio" name="rating" value="2">
                    <label for="rating2">★</label>
                    <input id="rating3" type="radio" name="rating" value="3">
                    <label for="rating3">★</label>
                    <input id="rating4" type="radio" name="rating" value="4">
                    <label for="rating4">★</label>
                    <input id="rating5" type="radio" name="rating" value="5">
                    <label for="rating5">★</label>
                </div>
                <textarea name="detail" rows="4" cols="40"><?= $result['detail'] ?></textarea><br>
                <img src=./images/<?=$result['image']?> width="300" height="300"><br>
                <label>画像を選択</label>
                <!-- アップロード上限サイズは２MB -->
                <input type="hidden" name="max_file_size" value="2097152">
                <input type="file" class="custom-file-input" name="image1"><br>
                <!-- ↓追加 -->
                <input type="hidden" name="id" value="<?= $result['id'] ?>">
                <button class="btn btn-default" type="submit" value="update">更新する</button>
                <!-- ★BUTTONでの書き方がよくわからない -->
                <!-- <button class="btn btn-default" onclick="location.href='delete.php?id=<?= $result['id'] ?>'" type="submit" value="delete">削除する</button> -->
                <a href="delete.php?id=<?= $result['id'] ?>">削除する</a>

            </fieldset>
        </div>
    </form>
</body>
</html>