<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>My RAMEN ROAD</title>
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="css/main.css" />
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/my.css" rel="stylesheet">
</head>

<body>

    <header>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.php">ログイン</a>
                </div>
            </div>
        </nav>
    </header>
    <!-- lLOGINogin_act.php は認証処理用のPHPです。 -->
    <form action="login_act.php" method="post">
        ID:<input type="text" name="lid" /><br><br>
        PW:<input type="password" name="lpw" /><br><br>
        <button class="btn btn-default" type="submit" value="login">LOGIN</button>
    </form>


</body>

</html>
