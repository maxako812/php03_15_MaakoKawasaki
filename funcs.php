<?php
//共通に使う関数を記述

//XSS対応（ echoする場所で使用！それ以外はNG ）
function h($str)
{
    return htmlspecialchars($str, ENT_QUOTES);
}

function connectDB(){

    try {
        $pdo = new PDO('mysql:dbname=ramen_db;charset=utf8;host=localhost', 'root', 'root');
    } catch (PDOException $e) {
        exit('DBConnectError:' . $e->getMessage());
    }
}

