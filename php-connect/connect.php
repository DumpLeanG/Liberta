<?php
    $connect = mysqli_connect('localhost', 'root', 'root', 'hotel');
    mysqli_set_charset($connect, 'utf8');
    setlocale (LC_ALL, "UTF-8");

    if (!$connect) {
        printf("Невозможно подключиться к базе данных. Код ошибки: %s\n", mysqli_connect_error());
        exit;
    }
?>