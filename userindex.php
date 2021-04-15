<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>ユーザー登録</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style>
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
                <div class="navbar-header"><a class="navbar-brand" href="userlist.php">ユーザー一覧</a></div>
            </div>
        </nav>
    </header>

    <!-- method, action, 各inputのnameを確認してください。  -->
    <form method="POST" action="userregist.php">
        <div class="jumbotron">
            <fieldset>
                <legend>ユーザー登録</legend>
                <label>名前：<input type="text" name="name" required></label><br>
                <label>ユーザーID：<input type="text" name="userid" required></label><br>
                <label>パスワード：<input type="password" name="password" required></label><br>
                <label>管理者フラグ：<input type="number" name="kanri_flg" min=0 max=1></label><br>
                <label>退職者フラグ：<input type="number" name="life_flg" min=0 max=1></label><br>
                <input type="submit" value="送信">
            </fieldset>
        </div>
    </form>
</body>

</html>
