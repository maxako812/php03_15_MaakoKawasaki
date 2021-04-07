
<?php


require_once('funcs.php');

//1. POSTデータ取得
$shopname = $_POST['shopname'];
$visitdate = $_POST['visitdate'];
$menu = $_POST['menu'];
$rating = $_POST['rating'];
$detail = $_POST['detail'];
$id = $_POST["id"];

// // 画像がアップロードされているか確認
if($_FILES['image1']['size'] === 0){//画像がアップロードされていない場合

    $pdo = connectDB();
    $sql = "UPDATE gs_bm_table SET shopname=:shopname, visitdate=:visitdate, menu=:menu, rating=:rating, detail=:detail, created=sysdate() WHERE id= :id;";
    //３．データ登録SQL作成
    $stmt = $pdo->prepare($sql);
    // 数値の場合 PDO::PARAM_INT
    // 文字の場合 PDO::PARAM_STR
    $stmt->bindValue(':shopname', $shopname, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
    $stmt->bindValue(':visitdate', $visitdate, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
    $stmt->bindValue(':menu', $menu, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
    $stmt->bindValue(':rating', $rating, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
    $stmt->bindValue(':detail', $detail, PDO::PARAM_STR);
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);

    $status = $stmt->execute(); //実行

} else {  
        // ファイルがアップロードされている場合の処理
    // 画像のパスを付与
    $image = uniqid(mt_rand(), true); //ファイル名をユニーク化
    $extension = getExtension($_FILES['image1']['name']);//アップロードされたファイルの拡張子を取得
    $image .= '.' . $extension;
    $file = "./images/$image";

    // 画像の不正チェック
    list($result, $message) = validate();
    if ($result == false){
        exit("ErrorMessage:" . print_r($message, true));
        return;
    }

    if ($result == true) {
        $pdo = connectDB();
        // 今ある画像ファイルの削除
        $sql_select = 'SELECT image FROM gs_bm_table WHERE id = :id';
        $stmt = $pdo->prepare($sql_select);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $status = $stmt->execute(); //実行

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

        //アップデート処理
        $sql = "UPDATE gs_bm_table SET shopname=:shopname, visitdate=:visitdate, menu=:menu, rating=:rating, image=:image,detail=:detail, created=sysdate() WHERE id= :id;";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':shopname', $shopname, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
        $stmt->bindValue(':visitdate', $visitdate, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
        $stmt->bindValue(':menu', $menu, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
        $stmt->bindValue(':rating', $rating, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
        $stmt->bindValue(':detail', $detail, PDO::PARAM_STR);
        $stmt->bindValue(':image', $image, PDO::PARAM_STR);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);

        $moved = move_uploaded_file($_FILES['image1']['tmp_name'], './images/' . $image);//imagesディレクトリにファイル保存
        $status = $stmt->execute();
    }

    if ($moved !== true){
        exit("ErrorMessage:" . print_r('アップロードに失敗しました', true));
    }




}



//データ登録処理後
if ($status == false) {
    sql_error($stmt);
} else {
    redirect('select.php');
}