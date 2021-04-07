<?php

    require_once 'funcs.php';

    // フォームの入力値を変数に代入
    $shopname = $_POST['shopname'];
    $visitdate = $_POST['visitdate'];
    $menu = $_POST['menu'];
    $rating = $_POST['rating'];
    $detail = $_POST['detail'];

    // 画像のパスを付与
    $image = uniqid(mt_rand(), true);//ファイル名をユニーク化
    $extension = getExtension($_FILES['image1']['name']);//アップロードされたファイルの拡張子を取得
    $image .= '.' . $extension;
    $file = "./images/$image";


    //画像の不正チェック
    list($result, $message) = validate();
    if ($result == false){
        exit("ErrorMessage:" . print_r($message, true));
        return;
    }

    if ($result == true) {
        // DB接続関数を呼び出す
        $pdo = connectDB();

        // SQL文用意
        $sql = "INSERT INTO gs_bm_table(id, shopname, visitdate, menu, rating, detail, image, created) VALUES (NULL, :shopname, :visitdate, :menu, :rating, :detail, :image, sysdate())";
        $stmt = $pdo->prepare($sql);

        //  バインド変数を用意
    $stmt->bindValue(':shopname', $shopname, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
    $stmt->bindValue(':visitdate', $visitdate, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
    $stmt->bindValue(':menu', $menu, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
    $stmt->bindValue(':rating', $rating, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
    $stmt->bindValue(':detail', $detail, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
    $stmt->bindValue(':image', $image, PDO::PARAM_STR);


        // ファイルアップロード
    $moved = move_uploaded_file($_FILES['image1']['tmp_name'], './images/' . $image);//imagesディレクトリにファイル保存
    // SQL文実行
    $status = $stmt->execute();
    }

    //データ登録処理後
    if ($moved !== true){
        exit("ErrorMessage:" . print_r('アップロードに失敗しました', true));
    }

    if ($status == false) {
        //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
        sql_error($stmt);
    } else {
    //５．index.phpへリダイレクト
        redirect('index.php');
    }

