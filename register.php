<?php

    require_once 'funcs.php';

    $pdo = connectDB();


    $stmt = $pdo->prepare(
        "INSERT INTO
            gs__table(id, name, email, naiyou, indate)
        VALUES(
            NULL, :name, :email, :naiyou, sysdate())"
    );
