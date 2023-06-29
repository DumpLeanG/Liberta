<?php
    session_start();
    include "../php-connect/connect.php";

    if(isset($_POST['email_address'])) {
        $email_address = $_POST['email_address'];
        if ($email_address === '') {
            unset($email_address);
        }
    }
    if(isset($_POST['phone_number'])) {
        $phone_number = $_POST['phone_number'];
        if ($phone_number === '') {
            unset($phone_number);
        }
    }
    if(isset($_POST['second_name'])) {
        $second_name = $_POST['second_name'];
        if ($second_name === '') {
            unset($second_name);
        }
    }
    if(isset($_POST['first_name'])) {
        $first_name = $_POST['first_name'];
        if ($first_name === '') {
            unset($first_name);
        }
    }
    if(isset($_POST['password'])) {
        $password = $_POST['password'];
        if ($password === '') {
            unset($password);
        }
    }
    if(isset($_POST['confirm_password'])) {
        $password = $_POST['password'];
        if ($password === '') {
            unset($password);
        }
    }

    $email_address = trim($_POST['email_address']);
    $phone_number = trim($_POST['phone_number']);
    $second_name = trim($_POST['second_name']);
    $first_name = trim($_POST['first_name']);
    $password = trim($_POST['password']);
    $confirm_password = trim($_POST['confirm_password']);

    $hash = password_hash($password, PASSWORD_DEFAULT);

    $check_guest = "SELECT * FROM `guests` WHERE `email_address` = '$email_address'";
    $result = mysqli_query($connect, $check_guest);
    $info_guest = mysqli_fetch_array($result);

    if (!empty($info_guest['id_guest'])) {
        $_SESSION['message'] = 'Пользователь с таким адресом уже существует!';
        header("location: ../index.php");
    } else {
        $reg_guest = "INSERT INTO guests (`email_address`, `phone_number`, `second_name`, `first_name`, `password`) VALUES ('$email_address', '$phone_number', '$second_name', '$first_name', '$hash')";

        if ($password === $confirm_password) {
            $result = mysqli_query($connect, $reg_guest);
            header("location: ../index.php");
        } else {
            $_SESSION['message'] = 'Пароли не совпадают!';
            header("location: ../index.php");
        }
    }
?>