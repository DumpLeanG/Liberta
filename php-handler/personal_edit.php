<?php
    session_start();
    include "../php-connect/connect.php";
   
    if (isset($_POST['second_name'])) {
        $second_name = $_POST['second_name'];
        if($second_name === '') {
            unset($second_name);
        }
    }
    $second_name = trim($_POST['second_name']);

    if (isset($_POST['first_name'])) {
        $first_name = $_POST['first_name'];
        if($first_name === '') {
            unset($first_name);
        }
    }
    $first_name = trim($_POST['first_name']);

    if (isset($_POST['patronymic'])) {
        $patronymic = $_POST['patronymic'];
        if($patronymic === '') {
            unset($patronymic);
        }
    }
    $patronymic = trim($_POST['patronymic']);

    if (isset($_POST['phone_number'])) {
        $phone_number = $_POST['phone_number'];
        if($phone_number === '') {
            unset($phone_number);
        }
    }
    $phone_number = trim($_POST['phone_number']);

    if (isset($_POST['email_address'])) {
        $email_address = $_POST['email_address'];
        if($email_address === '') {
            unset($email_address);
        }
    }
    $email_address = trim($_POST['email_address']);

    if (isset($_POST['nationality'])) {
        $nationality = $_POST['nationality'];
        if($nationality === '') {
            unset($nationality);
        }
    }
    $nationality = trim($_POST['nationality']);

    $id_guest = $_SESSION['id_guest'];

    $select_guest = "SELECT * FROM `guests` WHERE `id_guest` = '$id_guest'";
    $result = mysqli_query($connect, $select_guest);
    $info_guest = mysqli_fetch_array($result);

    if (($second_name != $info_guest['second_name']) or ($first_name != $info_guest['first_name']) or ($patronymic != $info_guest['patronymic']) or ($phone_number != $info_guest['phone_number']) or ($email_address != $info_guest['email_address']) or ($nationality != $info_guest['id_nationality'])) {
        $edit_line = "UPDATE `guests` SET `second_name` = '$second_name', `first_name` = '$first_name', `patronymic` = '$patronymic', `phone_number` = '$phone_number', `email_address` = '$email_address', `id_nationality` = '$nationality' WHERE id_guest = '$id_guest'";
        addslashes($edit_line);
        $edit_result = mysqli_query($connect, $edit_line) or die(mysqli_error($connect));

        $new_select_guest = "SELECT * FROM `guests` WHERE `id_guest` = '$id_guest'";
        $new_result = mysqli_query($connect, $new_select_guest);
        $new_info_guest = mysqli_fetch_array($new_result);

            $_SESSION['id_guest'] = $new_info_guest['id_guest'];
            $_SESSION['second_name'] = $new_info_guest['second_name'];
            $_SESSION['first_name'] = $new_info_guest['first_name'];
            $_SESSION['patronymic'] = $new_info_guest['patronymic'];
            $_SESSION['birthday'] = $new_info_guest['birthday'];
            $_SESSION['id_nationality'] = $new_info_guest['id_nationality'];
            $_SESSION['phone_number'] = $new_info_guest['phone_number'];
            $_SESSION['email_address'] = $new_info_guest['email_address'];
            $_SESSION['password'] = $new_info_guest['password'];
            $_SESSION['id_program_level'] = $new_info_guest['id_program_level'];

        header("location: ../personal_area.php");
    } else {
        header("location: ../personal_area.php");
    }
?>
