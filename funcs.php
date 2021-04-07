<?php
//共通に使う関数を記述

//XSS対応（ echoする場所で使用！それ以外はNG ）
function h($str)
{
    return htmlspecialchars($str, ENT_QUOTES);
}

// DBに繋ぐ関数
function connectDB(){

    try {
        $pdo = new PDO('mysql:dbname=ra-men_db;charset=utf8;host=localhost', 'root', 'root');
        return $pdo;
    } catch (PDOException $e) {
        exit('DBConnectError:' . $e->getMessage());
    }
}

// ファイル名を元に拡張子を返す関数
function getExtension(string $file): string{
    return pathinfo($file, PATHINFO_EXTENSION);
}

function sql_error($stmt)
{
    $error = $stmt->errorInfo();
    exit("SQLError:" . print_r($error, true));
}

//リダイレクト関数: redirect($file_name)
function redirect($file_name)
{
    header("Location: " . $file_name );
    exit();
}
