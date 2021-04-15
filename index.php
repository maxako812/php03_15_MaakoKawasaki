<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>My RAMEN ROAD</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/my.css" rel="stylesheet">

</head>

<body id="main">

    <!-- Head[Start] -->
    <header>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="select.php">データ一覧</a>
                    <div class="navbar-header"><a class="navbar-brand" href="login.php">ログイン</a></div>
                <div class="navbar-header"><a class="navbar-brand" href="logout.php">ログアウト</a></div>
                </div>
            </div>
        </nav>
    </header>
    <!-- Head[End] -->

    <!-- Main[Start] -->
    <!-- <form name="ramenform" method="POST" action="register.php"　enctype="multipart/form-data"> -->

    <form name="upload-form" action="register.php" method="POST" enctype="multipart/form-data">
        <div class="jumbotron">
            <fieldset>
                <legend>ラーメンDB</legend>
                <label>店名：<input type="text" name="shopname" required></label><br>
                <label>訪問日：<input type="date" name="visitdate" required></label><br>
                <label>食べたメニュー：<input type="text" name="menu" required></label><br>
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
                <label><textArea name="detail" rows="4" cols="40" required></textArea></label><br>
                <!-- <div class="form-group"> -->
                <label>画像を選択</label>
                <!-- アップロード上限サイズは２MB -->
                <input type="hidden" name="max_file_size" value="2097152">
                <input type="file" class="custom-file-input" name="image1"><br>
                <!-- </div> -->
                <!-- <input type="submit" value="登録する"> -->
                <button class="btn btn-default" type="submit" value="upload">登録する</button>
            </fieldset>
        </div>
    </form>
    <!-- Main[End] -->


</body>

</html>
