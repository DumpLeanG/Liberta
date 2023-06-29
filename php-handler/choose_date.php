<?php
    session_start();
    include "../php-connect/connect.php";

    if(isset($_POST['check-in'])) {
        $arrival_date = $_POST['check-in'];
        if($arrival_date === '') {
            unset($arrival_date);
        }
    }

    $arrival_date = trim($_POST['check-in']);

    if(isset($_POST['derpature'])) {
        $departure_date = $_POST['derpature'];
        if($departure_date === '') {
            unset($departure_date);
        }
    }

    $departure_date = trim($_POST['departure']);

    if(isset($_POST['guests'])) {
        $guests = $_POST['guests'];
        if($guests === '') {
            unset($guests);
        }
    }

    $guests = trim($_POST['guests']);

    header("location: ../booking.php?arrival_date=$arrival_date&departure_date=$departure_date&guests=$guests")
?>