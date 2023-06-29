<?php
    session_start();
    include "../php-connect/connect.php";
    if(isset($_POST['submit'])) {
        if(isset($_POST['email_address'])) {
            $email_address = $_POST['email_address'];
            if ($email_address === '') {
                unset($email_address);
            }
        }
        if(isset($_POST['password'])) {
            $password = $_POST['password'];
            if ($password === '') {
                unset($password);
            }
        }
    }

    if(isset($_POST['g-recaptcha-response'])) {
        $recapcha = $_POST['g-recaptcha-response'];
        if(!$recapcha) {
            $_SESSION['message'] = 'Пожалуйста, подтвердите, что вы не робот';
            header('location: '. $_SERVER['HTTP_REFERER']);
        } else {
            $secretKey = '6LdRA9YmAAAAAN83_X0H_-9yngoKezgRGtm3w8yg';
            $url = 'https://www.google.com/recaptcha/api/siteverify?secret='.$secretKey.'&response='.$recapcha;
            $response = file_get_contents($url);
            $responseKey = json_decode($response, true);
        }
    }
    
    if($responseKey['success']) {

        $email_address = trim($_POST['email_address']);
        $password = trim($_POST['password']);

        $check_guest = "SELECT * FROM `guests` WHERE `email_address` = '$email_address'";
        $result = mysqli_query($connect, $check_guest);
        $info_guest = mysqli_fetch_array($result);

        $check_employee = "SELECT * FROM `employees` WHERE `email_address` = '$email_address'";
        $result = mysqli_query($connect, $check_employee);
        $info_employee = mysqli_fetch_array($result);

        if((empty($info_guest['id_guest'])) and (empty($info_employee['id_employee']))){
            $_SESSION['message'] = 'Неправильный адрес или пароль!';
            header("location: ../index.php");
        } elseif((!empty($info_guest['id_guest'])) and (password_verify($password,$info_guest['password']))) {
            $_SESSION['id_guest'] = $info_guest['id_guest'];
            $_SESSION['second_name'] = $info_guest['second_name'];
            $_SESSION['first_name'] = $info_guest['first_name'];
            $_SESSION['patronymic'] = $info_guest['patronymic'];
            $_SESSION['birthday'] = $info_guest['birthday'];
            $_SESSION['id_nationality'] = $info_guest['id_nationality'];
            $_SESSION['phone_number'] = $info_guest['phone_number'];
            $_SESSION['email_address'] = $info_guest['email_address'];
            $_SESSION['password'] = $info_guest['password'];
            $_SESSION['id_program_level'] = $info_guest['id_program_level'];
            header("location: ../personal_area.php");
        } elseif((!empty($info_employee['id_employee'])) and (password_verify($password,$info_employee['password']))) {
            $_SESSION['id_employee'] = $info_employee['id_employee'];
            $_SESSION['second_name'] = $info_employee['second_name'];
            $_SESSION['first_name'] = $info_employee['first_name'];
            $_SESSION['patronymic'] = $info_employee['patronymic'];
            $_SESSION['phone_number'] = $info_employee['phone_number'];
            $_SESSION['email_address'] = $info_employee['email_address'];
            $_SESSION['password'] = $info_employee['password'];
            header("location: ../admin_area.php");
        } else {
            $_SESSION['message'] = 'Неправильный пароль!';
            header("location: ../index.php");
        }
    }
?>