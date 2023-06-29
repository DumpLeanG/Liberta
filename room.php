<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <link rel="stylesheet" type="text/css" href="assets/css/main.css">
    <title>Liberta - Номер</title>
</head>
<body>
    <?php
        session_start();
        include "php-connect/connect.php";
        include "php-handler/active_header.php"
    ?>
    <main>
        <section class="room">
            <div class="container room_block">
            <?php
                $id_room_type = $_GET['id_room_type'];
                $select_rooms = "SELECT room_types.id_room_type, room_types.name, room_types.image, room_types.short_description, room_types.description, room_types.space, room_types.capacity, rooms.bed_type 
                FROM room_types 
                INNER JOIN rooms ON room_types.id_room_type = rooms.id_room_type
                WHERE room_types.id_room_type = '$id_room_type';";
                $rooms_result = mysqli_query($connect, $select_rooms) or die(mysqli_error($connect));
                $rooms_row = mysqli_fetch_array($rooms_result);

                echo "<div class='room_block_left'>
                <span class='room_block_left_features'>".$rooms_row['space']." / ".$rooms_row['capacity']."</span>
                <h1 class='room_block_left_title'>".$rooms_row['name']."</h1>
                <span class='room_block_left_time'>Заезд в 14:00 - Выезд в 12:00</span>
                <p class='room_block_left_txt'>".$rooms_row['short_description']."</p>
                <a href='booking.php' class='room_block_left_btn'>Забронировать</a>
                <ul class='room_block_left_list'>
                    <li class='room_block_left_list_item'>
                        <img src='assets/images/Парковка.svg' alt=' class='room_block_left_list_item_img'>
                        <span class='room_block_left_list_item_txt'>Парковка (за дополнительную оплату)</span>
                    </li>
                    <li class='room_block_left_list_item'>
                        <img src='assets/images/Интернет.svg' alt=' class='room_block_left_list_item_img'>
                        <span class='room_block_left_list_item_txt'>Бесплатный Wi-Fi интернет</span>
                    </li>
                    <li class='room_block_left_list_item'>
                        <img src='assets/images/Бассейн.svg' alt=' class='room_block_left_list_item_img'>
                        <span class='room_block_left_list_item_txt'>Бесплатный доступ в бассейн</span>
                    </li>
                </ul>
            </div>
            <div class='room_block_right'>
                <img src='assets/images/".$rooms_row['image']."' alt=' class='room_block_right_img'>
                <div class='room_block_right_block'>
                    <img src='assets/images/".$rooms_row['image']."' alt='' class='room_block_right_block_img room_block_right_block_actual_img'>
                    <img src='assets/images/".$rooms_row['image']."' alt='' class='room_block_right_block_img'>
                    <img src='assets/images/".$rooms_row['image']."' alt='' class='room_block_right_block_img'>
                    <img src='assets/images/".$rooms_row['image']."' alt='' class='room_block_right_block_img'>
                    <img src='assets/images/".$rooms_row['image']."' alt='' class='room_block_right_block_img'>
                </div>
            </div>
            <div class='room_block_bottom'>
                <h2 class='room_block_bottom_title'>Удобства в номере</h2>
                <p class='room_block_bottom_txt'>".$rooms_row['description']."</p>
            </div>";
            ?>
            </div>
        </section>
    </main>
    <?php
        include "php-handler/footer.php";
        include "php-handler/login_form.php";
        include "php-handler/register_form.php";
        include "php-handler/password_form.php";
    ?>
</body>
</html>