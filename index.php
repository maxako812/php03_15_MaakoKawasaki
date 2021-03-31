<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>My RAMEN LOAD</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <!-- Head[Start] -->
    <header>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header"><a class="navbar-brand" href="select.php">データ一覧</a></div>
            </div>
        </nav>
    </header>
    <!-- Head[End] -->

    <!-- Main[Start] -->
    <form method="POST" action="confirm.php">
        <div class="jumbotron">
            <fieldset>
                <legend>ラーメンDB</legend>
                <label>店名：<input type="text" name="shopname"></label><br>
                <label>訪問日：<input type="text" name="shopname"></label><br>
                <label>食べたメニュー：<input type="text" name="menu"></label><br>
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
                <label><textArea name="detail" rows="4" cols="40"></textArea></label><br>
                <div class="form-group">
                    <label>画像を選択</label>
                    <input type="file" name="image">
                </div>
                <input type="submit" value="登録する">
            </fieldset>
        </div>
    </form>
    <!-- Main[End] -->


</body>

</html>
