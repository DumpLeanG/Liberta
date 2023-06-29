<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <link rel="stylesheet" type="text/css" href="assets/css/main.css">
    <title>Liberta - Номера</title>
</head>
<body>
    <?php
        session_start();
        include "php-connect/connect.php";
        include "php-handler/header.php"
    ?>
    <main>
        <section class="start rooms_start">
            <div class="container start_block">
                <h1 class="start_block_title">Пятизвездочный отель Москвы Liberta</h1>
                <span class="start_block_txt">В отеле 100 номеров различных категорий: 50 номеров категории «Супериор», 20 номеров «Делюкс», 15 «Полулюксов» и 5 номеров категории «Люкс». Все номера с панорамными окнами и видами на парк и город</span>
                <div class="start_block_booking">
                    <form action="php-handler/choose_date.php" class="start_block_booking_form" method="post"> <!--Форма для поиска номеров-->
                        <div class="start_block_booking_form_item">
                            <label class="start_block_booking_form_item_label">Заезд</label> <!--Надпись для поля-->
                            <input type="date" class="start_block_booking_form_item_input" name="check-in" id="arrival_date"> <!--Поле для выбора даты-->
                        </div>
                        <div class="start_block_booking_form_item">
                            <label class="start_block_booking_form_item_label">Выезд</label>
                            <input type="date" class="start_block_booking_form_item_input" name="departure" id="departure_date">
                        </div>
                        <script src="assets/js/date.js"></script>
                        <div class="start_block_booking_form_item">
                            <label lass="start_block_booking_form_item_label">Количество гостей</label>
                            <div class="start_block_booking_form_item_block">
                                <select name="guests" class="start_block_booking_form_item_block_input"> <!--Выпадающий список-->
                                    <option>1 гость</option> <!--Элемент выпадающего списка-->
                                    <option>2 гостя</option>
                                    <option>3 гостя</option>
                                </select>
                                <img src="assets/images/down_arrow.svg" alt="" class="start_block_booking_form_item_block_arrow"> <!--Картинка стрелки-->
                            </div>
                        </div>
                        <button type="submit" class="start_block_booking_form_btn">Найти номер</button> <!--Кнопка для отправки формы-->
                    </form>
                </div>
            </div>
        </section>
        <section class="rooms">
            <div class="container rooms_block">
                <ul class="rooms_block_list">
                    <?php
                        $select_rooms = "SELECT room_types.id_room_type, room_types.name, room_types.image, room_types.short_description, room_types.description, room_types.space, room_types.capacity, rooms.bed_type 
                        FROM room_types 
                        INNER JOIN rooms ON room_types.id_room_type = rooms.id_room_type;";
                        $rooms_result = mysqli_query($connect, $select_rooms) or die(mysqli_error($connect));
                        while ($rooms_row = mysqli_fetch_assoc($rooms_result)) {
                            $rooms_array[] = $rooms_row;
                        }
                        foreach ($rooms_array as $array){
                            echo"<li class='rooms_block_list_card'>
                                <div class='rooms_Фblock_list_card_left'>
                                    <a href='room.php?id_room_type=".$array['id_room_type']."' class='title_link'><h1 class='rooms_block_list_card_left_title'>".$array['name']."</h1></a>
                                    <p class='rooms_block_list_card_left_txt'>".$array['short_description']."</p>
                                    <a href='booking.php' class='rooms_block_list_card_left_btn'>Забронировать</a>
                                </div>
                                <div class='rooms_block_list_card_right'>
                                    <a href='room.php?id_room_type=".$array['id_room_type']."' class='img_link'><img src='assets/images/".$array['image']."' alt='' class='rooms_block_list_card_right_img'></a>
                                    <div class='rooms_block_list_card_right_features'>
                                        <div class='rooms_block_list_card_right_features_block'>
                                            <span class='rooms_block_list_card_right_features_block_title'>ПЛОЩАДЬ</span>
                                            <span class='rooms_block_list_card_right_features_block_txt'>".$array['space']."</span>
                                        </div>
                                        <div class='rooms_block_list_card_right_features_block'>
                                            <span class='rooms_block_list_card_right_features_block_title'>ВМЕСТИМОСТЬ</span>
                                            <span class='rooms_block_list_card_right_features_block_txt'>".$array['capacity']."</span>
                                        </div>
                                        <div class='rooms_block_list_card_right_features_block'>
                                            <span class='rooms_block_list_card_right_features_block_title'>ТИП КРОВАТИ</span>
                                            <span class='rooms_block_list_card_right_features_block_txt'>".$array['bed_type']."</span>
                                        </div>
                                    </div>
                                </div>
                                <span class='rooms_block_list_card_number'>0".$array['id_room_type']."</span>
                            </li>";
                        }
                    ?>
                </ul>
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