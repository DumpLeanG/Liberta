<?php
    session_start();
    include "../php-connect/connect.php";

    $arrival_date = $_GET['arrival_date'];
    $departure_date = $_GET['departure_date'];
    $guests = substr($_GET['guests'], 0, 1);
    $id_room = $_GET['id_room'];
    $id_guest = $_SESSION['id_guest'];

    $selected_room = "SELECT room_types.name, room_types.price
    FROM room_types 
    INNER JOIN rooms ON room_types.id_room_type = rooms.id_room_type
    WHERE rooms.id_room = '$id_room'";
    $selected_room_result = mysqli_query($connect, $selected_room) or die(mysqli_error($connect));
    $info_selected_room = mysqli_fetch_array($selected_room_result);

    $amount = $info_selected_room['price'];

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

    if (isset($_POST['arrival_time'])) {
        $arrival_time = $_POST['arrival_time'];
        if($arrival_time === '') {
            unset($arrival_time);
        }
    }
    $arrival_time = trim($_POST['arrival_time']);

    if (isset($_POST['departure_time'])) {
        $departure_time = $_POST['departure_time'];
        if($departure_time === '') {
            unset($departure_time);
        }
    }
    $departure_time = trim($_POST['departure_time']);

    if (isset($_POST['payment_method'])) {
        $payment_method = $_POST['payment_method'];
        if($payment_method === '') {
            unset($payment_method);
        }
    }
    $payment_method = trim($_POST['payment_method']);

    if (isset($_POST['payment_method'])) {
        $payment_method = $_POST['payment_method'];
        if($payment_method === '') {
            unset($payment_method);
        }
    }
    $payment_method = trim($_POST['payment_method']);

    $select_guest = "SELECT * FROM `guests` WHERE `id_guest` = '$id_guest'";
    $result = mysqli_query($connect, $select_guest);
    $info_guest = mysqli_fetch_array($result);

    if (($second_name === $info_guest['second_name']) and ($first_name === $info_guest['first_name']) and ($patronymic === $info_guest['patronymic']) and ($phone_number === $info_guest['phone_number']) and ($email_address === $info_guest['email_address']) and ($nationality === $info_guest['id_nationality'])) {
        $create_line = "INSERT INTO `bookings`(`arrival_date`, `departure_date`, `arrival_time`, `departure_time`, `amount_of_guests`, `id_room`, `id_guest`) VALUES ('$arrival_date','$departure_date','$arrival_time','$departure_time','$guests','$id_room','$id_guest')";
        addslashes($create_line);
        $create_result = mysqli_query($connect, $create_line) or die(mysqli_error($connect));

        $select_booking = "SELECT * FROM `bookings` ORDER BY id_booking DESC LIMIT 1";
        $booking_result = mysqli_query($connect, $select_booking);
        $info_booking = mysqli_fetch_array($booking_result);

        $id_booking = $info_booking['id_booking'];

        $create_payment = "INSERT INTO `payments`(`id_booking`, `payment_method`, `amount`) VALUES ('$id_booking','$payment_method','$amount')";
        addslashes($create_payment);
        $create_payment_result = mysqli_query($connect, $create_payment) or die(mysqli_error($connect));

        header("location: ../index.php");
    } else {
        $edit_line = "UPDATE `guests` SET `second_name` = '$second_name', `first_name` = '$first_name', `patronymic` = '$patronymic', `phone_number` = '$phone_number', `email_address` = '$email_address', `id_nationality` = '$nationality' WHERE id_guest = '$id_guest'";
        addslashes($edit_line);
        $edit_result = mysqli_query($connect, $edit_line) or die(mysqli_error($connect));

        $create_line = "INSERT INTO `bookings`(`arrival_date`, `departure_date`, `arrival_time`, `departure_time`, `amount_of_guests`, `id_room`, `id_guest`) VALUES ('$arrival_date','$departure_date','$arrival_time','$departure_time','$guests','$id_room','$id_guest')";
        addslashes($create_line);
        $create_result = mysqli_query($connect, $create_line) or die(mysqli_error($connect));

        $select_booking = "SELECT * FROM `bookings` ORDER BY id_booking DESC LIMIT 1";
        $booking_result = mysqli_query($connect, $select_booking);
        $info_booking = mysqli_fetch_array($booking_result);

        $id_booking = $info_booking['id_booking'];

        $create_payment = "INSERT INTO `payments`(`id_booking`, `payment_method`, `amount`) VALUES ('$id_booking','$payment_method','$amount')";
        addslashes($create_payment);
        $create_payment_result = mysqli_query($connect, $create_payment) or die(mysqli_error($connect));

        header("location: ../index.php");
    }

    
?>