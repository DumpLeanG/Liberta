<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <link rel="stylesheet" type="text/css" href="assets/css/main.css">
    <title>Liberta - Бронировние</title>
</head>
<body>
    <?php
        session_start();
        include "php-connect/connect.php";
        include "php-handler/active_header.php"
    ?>
    <main>
        <section class="booking">
            <div class="container booking_block">
                <div class="booking_block_selecting">
                    <div class="booking_block_selecting_booking">
                        <?php
                            if((isset($_GET['arrival_date'])) and (isset($_GET['departure_date'])) and (isset($_GET['guests']))) {
                                $arrival_date = $_GET['arrival_date'];
                                $departure_date = $_GET['departure_date'];
                                $guests = $_GET['guests'];
                        ?>
                        <form action="php-handler/choose_date.php" class="booking_block_selecting_booking_form" method="post">
                            <div class="start_block_booking_form_item">
                                <label class="start_block_booking_form_item_label">Заезд</label> <!--Надпись для поля-->
                                <input type="date" class="start_block_booking_form_item_input" name="check-in" id="arrival_date" value="<?php echo $arrival_date ?>"> <!--Поле для выбора даты-->
                            </div>
                            <div class="start_block_booking_form_item">
                                <label class="start_block_booking_form_item_label">Выезд</label>
                                <input type="date" class="start_block_booking_form_item_input" name="departure" id="departure_date" value="<?php echo $departure_date ?>">
                            </div>
                            <script src="assets/js/date.js"></script>
                            <div class="booking_block_selecting_booking_form_item">
                                <label class="booking_block_selecting_booking_form_item_label">Количество гостей</label>
                                <div class="booking_block_selecting_booking_form_item_block">
                                    <select name="guests" class="booking_block_selecting_booking_form_item_block_input">
                                        <?php
                                            if ($guests === '1 гость') {
                                                echo "<option selected>1 гость</option>
                                                <option>2 гостя</option>
                                                <option>3 гостя</option>";
                                            } elseif ($guests === '2 гостя') {
                                                echo "<option>1 гость</option>
                                                <option selected>2 гостя</option>
                                                <option>3 гостя</option>";
                                            } else {
                                                echo "<option>1 гость</option>
                                                <option>2 гостя</option>
                                                <option selected>3 гостя</option>";
                                            }
                                        ?>
                                    </select>
                                    <img src="assets/images/down_arrow.svg" alt="" class="booking_block_selecting_booking_form_item_block_arrow">
                                </div>
                            </div>
                            <button type="submit" class="booking_block_selecting_booking_form_btn">Найти номер</button>
                        </form>
                        <?php
                            } else {
                        ?>
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
                        <?php
                            }
                        ?>
                    </div>
                        <?php
                            if((isset($_GET['arrival_date'])) and (isset($_GET['departure_date'])) and (isset($_GET['guests']))) {
                        ?>
                    <ul class="booking_block_selecting_list">
                        <?php
                        $select_free_rooms = "SELECT room_types.id_room_type, room_types.name, room_types.image, room_types.short_description, room_types.description, room_types.space, room_types.capacity, room_types.price, rooms.id_room, rooms.room, rooms.bed_type 
                        FROM room_types 
                        INNER JOIN rooms ON room_types.id_room_type = rooms.id_room_type
                        WHERE rooms.id_room NOT IN(SELECT bookings.id_room FROM bookings WHERE bookings.arrival_date >= '$arrival_date' and bookings.departure_date <= '$departure_date'); ";
                        $free_rooms_result = mysqli_query($connect, $select_free_rooms) or die(mysqli_error($connect));
                        while ($free_rooms_row = mysqli_fetch_assoc($free_rooms_result)) {
                            $free_rooms_array[] = $free_rooms_row;
                        }
                        foreach ($free_rooms_array as $array){
                            $selected_room = $array['id_room'];
                            echo"<li class='booking_block_selecting_list_card'>
                            <img src='assets/images/".$array['image']."' alt='' class='booking_block_selecting_list_card_img'>
                            <div class='booking_block_selecting_list_card_bottom'>
                                <h2 class='booking_block_selecting_list_card_bottom_title'>".$array['name']."</h2>
                                <div class='booking_block_selecting_list_card_bottom_features'>
                                    <div class='booking_block_selecting_list_card_bottom_features_block'>
                                        <span class='booking_block_selecting_list_card_bottom_features_block_title'>ПЛОЩАДЬ</span>
                                        <span class='booking_block_selecting_list_card_bottom_features_block_txt'>".$array['space']."</span>
                                    </div>
                                    <div class='booking_block_selecting_list_card_bottom_features_block'>
                                        <span class='booking_block_selecting_list_card_bottom_features_block_title'>ВМЕСТИМОСТЬ</span>
                                        <span class='booking_block_selecting_list_card_bottom_features_block_txt'>".$array['capacity']."</span>
                                    </div>
                                    <div class='booking_block_selecting_list_card_bottom_features_block'>
                                        <span class='booking_block_selecting_list_card_bottom_features_block_title'>ТИП КРОВАТИ</span>
                                        <span class='booking_block_selecting_list_card_bottom_features_block_txt'>".$array['bed_type']."</span>
                                    </div>
                                </div>
                                <div class='booking_block_selecting_list_card_bottom_buy'>
                                    <span class='booking_block_selecting_list_card_bottom_buy_price'>".$array['price']." руб.</span>
                                    <a class='booking_block_selecting_list_card_bottom_buy_btn' href='booking_ending.php?arrival_date=$arrival_date&departure_date=$departure_date&guests=$guests&id_room=$selected_room'>Выбрать</a>
                                </div>
                            </div>
                        </li>";
                        }
                        ?>
                    </ul>
                    <?php
                            }
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
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.2.1/dist/jquery.min.js" type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery.maskedinput@1.4.1/src/jquery.maskedinput.min.js" type="text/javascript"></script>
    <script src="assets/js/mask.js"></script>
</body>
</html>