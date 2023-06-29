<?php

?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <link rel="stylesheet" type="text/css" href="assets/css/main.css">
    <title>Liberta - Личный кабинет</title>
</head>
<body>
    <?php
        session_start();
        include "php-connect/connect.php";
        include "php-handler/header.php";
    ?>
    <main>
        <section class="start personal_area_start">
            <div class="container start_block">
                <h1 class="start_block_title">Пятизвездочный отель Москвы Liberta</h1>
                <span class="start_block_txt">Добро пожаловать в ваш личный кабинет нашей гостиницы! Здесь вы можете вносить изменения в свои личные данные, оплачивать свои бронирования и получать доступ к эксклюзивным предложениям и распродажам. ы надеемся, что наш личный кабинет сделает ваше пребывание в нашей гостинице еще более комфортным и удобным!</span>
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
        <section class="personal_area">
            <div class="container personal_area_block">
                <div class="personal_area_block_top">
                    <ul class="personal_area_block_top_list">
                        <li class="personal_area_block_top_list_item personal_area_block_top_list_actual_item" id="personal_area_form" onclick="openForm()">Профиль</li>
                        <li class="personal_area_block_top_list_item" id="personal_area_bookings" onclick="openBookings()">Мои бронирования</li>
                        <li class="personal_area_block_top_list_item" id="personal_area_loyalty" onclick="openLoyalty()">Программа лояльности</li>
                    </ul>
                </div>
                <div class="personal_area_block_bottom">
                    <form action="php-handler/personal_edit.php" class="personal_area_block_bottom_form" method="post">
                        <h1 class="personal_area_block_bottom_form_title">Персональные данные</h1>
                        <span class="personal_area_block_bottom_form_txt">Эти данные необходимы, чтобы автоматически заполнять соответствующие поля и ускорять процесс бронирования</span>
                        <div class="personal_area_block_bottom_form_block">
                            <div class="personal_area_block_bottom_form_block_category">
                                <div class="personal_area_block_bottom_form_block_category_item">
                                    <label   class="personal_area_block_bottom_form_block_category_item_label">Фамилия</label>
                                    <input type="text" class="personal_area_block_bottom_form_block_category_item_input" name="second_name" value="<?php echo $_SESSION['second_name'] ?>" required>
                                </div>
                                <div class="personal_area_block_bottom_form_block_category_item">
                                    <label   class="personal_area_block_bottom_form_block_category_item_label">Имя</label>
                                    <input type="text" class="personal_area_block_bottom_form_block_category_item_input" name="first_name" value="<?php echo $_SESSION['first_name'] ?>" required>
                                </div>
                                <div class="personal_area_block_bottom_form_block_category_item">
                                    <label  class="personal_area_block_bottom_form_block_category_item_label">Отчество</label>
                                    <input type="text" class="personal_area_block_bottom_form_block_category_item_input" name="patronymic" value="<?php echo $_SESSION['patronymic'] ?>" required>
                                </div>
                            </div>
                            <div class="personal_area_block_bottom_form_block_category">
                                <div class="personal_area_block_bottom_form_block_category_item">
                                    <label  class="personal_area_block_bottom_form_block_category_item_label">Дата рождения</label>
                                    <input type="date" class="personal_area_block_bottom_form_block_category_item_input" name="birthday" value="<?php echo $_SESSION['birthday'] ?>" required>
                                </div>
                                <div class="personal_area_block_bottom_form_block_category_item">
                                    <label   class="personal_area_block_bottom_form_block_category_item_label">Гражданство</label>
                                    <div class="personal_area_block_bottom_form_block_category_item_select">
                                        <select name="nationality"  class="personal_area_block_bottom_form_block_category_item_select_input" required>
                                            <?php 
                                            $select_nationality = "SELECT * FROM `nationalities`";
                                            $select_result = mysqli_query($connect, $select_nationality) or die(mysqli_error($connect));
                                            while ($nationality_row = mysqli_fetch_assoc($select_result)) {
                                                $nationality_array[] = $nationality_row;
                                            }
                                            
                                            foreach ($nationality_array as $array){
                                                if($_SESSION['id_nationality'] === $array['id_nationality']) {
                                                    echo "<option selected value='".$array['id_nationality']."'>".$array['name']."</option>";
                                                } else {
                                                    echo "<option value='".$array['id_nationality']."'>".$array['name']."</option>";
                                                }
                                            }
                                            ?>
                                        </select>
                                        <img src="assets/images/down_arrow.svg" alt="" class="personal_area_block_bottom_form_block_category_item_select_arrow">
                                    </div>
                                </div>
                            </div>
                            <div class="personal_area_block_bottom_form_block_category">
                                <div class="personal_area_block_bottom_form_block_category_item">
                                    <label  class="personal_area_block_bottom_form_block_category_item_label">Номер телефона</label>
                                    <input type="tel" class="personal_area_block_bottom_form_block_category_item_input" id="phone_number" name="phone_number" value="<?php echo $_SESSION['phone_number'] ?>" required>
                                </div>
                                <div class="personal_area_block_bottom_form_block_category_item">
                                    <label  class="personal_area_block_bottom_form_block_category_item_label">Электронный адрес</label>
                                    <input type="email" class="personal_area_block_bottom_form_block_category_item_input" name="email_address" value="<?php echo $_SESSION['email_address'] ?>" required>
                                </div>
                                <div class="personal_area_block_bottom_form_block_category_item">
                                    <label  class="personal_area_block_bottom_form_block_category_item_label">Пароль</label>
                                    <input type="password" class="personal_area_block_bottom_form_block_category_item_input" name="password" value="<?php echo $_SESSION['password'] ?>" required>
                                </div>
                            </div>
                            <button class="personal_area_block_bottom_form_block_btn" type="submit">Сохранить</button>
                        </div>
                    </form>
                    <div class="personal_area_block_bottom_bookings">
                        <h1 class="personal_area_block_bottom_bookings_title">Ваши ближайшие бронирования</h1>
                        <table class="personal_area_block_bottom_bookings_table">
                            <thead class="personal_area_block_bottom_bookings_table_head">
                                <tr class="personal_area_block_bottom_bookings_table_head_line">
                                    <th class="personal_area_block_bottom_bookings_table_head_line_check-in">Заезд</th> 
                                    <th class="personal_area_block_bottom_bookings_table_head_line_departure">Выезд</th>
                                    <th class="personal_area_block_bottom_bookings_table_head_line_guests">Кол-во гостей</th>
                                    <th class="personal_area_block_bottom_bookings_table_head_line_room">Номер</th>
                                </tr>
                            </thead>
                            <tbody class="personal_area_block_bottom_bookings_table_body">
                                <?php 
                                    $id_guest = $_SESSION['id_guest'];
                                    $guest_bookings = "SELECT bookings.arrival_date, bookings.departure_date, bookings.amount_of_guests, room_types.name FROM `bookings`
                                    INNER JOIN `rooms` ON rooms.id_room = bookings.id_room
                                    INNER JOIN `room_types` ON room_types.id_room_type = rooms.id_room_type
                                    WHERE `id_guest` = '$id_guest'";
                                    $bookings_result = mysqli_query($connect, $guest_bookings) or die(mysqli_error($connect));
                                    while ($bookings_row = mysqli_fetch_assoc($bookings_result)) {
                                        $bookings_array[] = $bookings_row;
                                    }

                                    foreach ($bookings_array as $array){
                                        echo "<tr class='personal_area_block_bottom_bookings_table_head_line'>";
                                        echo "<td class='personal_area_block_bottom_bookings_table_body_line_check-in'>".$array['arrival_date']."</td>";
                                        echo "<td class='personal_area_block_bottom_bookings_table_body_line_departure'>".$array['departure_date']."</td>";
                                        echo "<td class='personal_area_block_bottom_bookings_table_body_line_guests'>".$array['amount_of_guests']."</td>";
                                        echo "<td class='personal_area_block_bottom_bookings_table_body_line_room'>".$array['name']."</td>";
                                        echo "</tr>";
                                    }
                                ?> 
                            </tbody>
                        </table>
                    </div>
                    <div class="personal_area_block_bottom_loyalty">
                        <h1 class="personal_area_block_bottom_loyalty_title">Ваш уровень программы лояльности</h1>
                        <table class="personal_area_block_bottom_loyalty_table"> <!--Это надо доделать-->
                        <?php
                                    $program_level_one = "SELECT * FROM `program_levels` WHERE `id_program_level` = '1'";

                                    $program_level_one_result = mysqli_query($connect, $program_level_one) or die(mysqli_error($connect));

                                    $program_level_two = "SELECT * FROM `program_levels` WHERE `id_program_level` = '2'";

                                    $program_level_two_result = mysqli_query($connect, $program_level_two) or die(mysqli_error($connect));
                                
                                    $program_level_one_row = mysqli_fetch_array($program_level_one_result);
                                    $program_level_two_row = mysqli_fetch_array($program_level_two_result);
                                ?>
                                <?php
                                if ($_SESSION['id_program_level'] === '1') {
                                ?>
                                <thead class="personal_area_block_bottom_loyalty_table_head">
                                    <tr class="personal_area_block_bottom_loyalty_table_head_line">
                                        <th class="personal_area_block_bottom_loyalty_table_head_line_possibilities">ВОЗМОЖНОСТИ</th>
                                        <th class="personal_area_block_bottom_loyalty_table_head_line_silver personal_area_block_bottom_loyalty_table_head_line_your"><?php echo $program_level_one_row['name'];?></th>
                                        <th class="personal_area_block_bottom_loyalty_table_head_line_gold"><?php echo $program_level_two_row['name'];?></th>
                                    </tr>
                                    <tr class="personal_area_block_bottom_loyalty_table_head_line personal_area_block_bottom_loyalty_table_head_greyline">
                                        <td class="personal_area_block_bottom_loyalty_table_head_line_first">Стоимость годового участия</td>
                                        <td class="personal_area_block_bottom_loyalty_table_head_line_second personal_area_block_bottom_loyalty_table_head_line_your"><?php echo $program_level_one_row['year_cost'];?></td>
                                        <td class="personal_area_block_bottom_loyalty_table_head_line_third"><?php echo $program_level_two_row['year_cost'];?></td>
                                    </tr>
                                    <tr class="personal_area_block_bottom_loyalty_table_head_line personal_area_block_bottom_loyalty_table_head_greyline">
                                        <td class="personal_area_block_bottom_loyalty_table_head_line_first">Скидки на услуги проживания</td>
                                        <td class="personal_area_block_bottom_loyalty_table_head_line_second personal_area_block_bottom_loyalty_table_head_line_your"><?php echo $program_level_one_row['stay_discounts'];?></td>
                                        <td class="personal_area_block_bottom_loyalty_table_head_line_third"><?php echo $program_level_two_row['stay_discounts'];?></td>
                                    </tr>
                                    <tr class="personal_area_block_bottom_loyalty_table_head_line personal_area_block_bottom_loyalty_table_head_greyline">
                                        <td class="personal_area_block_bottom_loyalty_table_head_line_first">Скидки на услуги питания</td>
                                        <td class="personal_area_block_bottom_loyalty_table_head_line_second personal_area_block_bottom_loyalty_table_head_line_your"><?php echo $program_level_one_row['food_discounts'];?></td>
                                        <td class="personal_area_block_bottom_loyalty_table_head_line_third"><?php echo $program_level_two_row['food_discounts'];?></td>
                                    </tr>
                                    <tr class="personal_area_block_bottom_loyalty_table_head_line">
                                        <td class="personal_area_block_bottom_loyalty_table_head_line_first">Ранний заезд</td>
                                        <td class="personal_area_block_bottom_loyalty_table_head_line_second personal_area_block_bottom_loyalty_table_head_line_your"><?php echo $program_level_one_row['early_arrival'];?></td>
                                        <td class="personal_area_block_bottom_loyalty_table_head_line_third"><?php echo $program_level_two_row['early_arrival'];?></td>
                                    </tr>
                                    <tr class="personal_area_block_bottom_loyalty_table_head_line personal_area_block_bottom_loyalty_table_head_greyline">
                                        <td class="personal_area_block_bottom_loyalty_table_head_line_first">Поздний выезд</td>
                                        <td class="personal_area_block_bottom_loyalty_table_head_line_second personal_area_block_bottom_loyalty_table_head_line_your"><?php echo $program_level_one_row['late_departure'];?></td>
                                        <td class="personal_area_block_bottom_loyalty_table_head_line_third"><?php echo $program_level_two_row['late_departure'];?></td>
                                    </tr>
                                    <tr class="personal_area_block_bottom_loyalty_table_head_line">
                                        <td class="personal_area_block_bottom_loyalty_table_head_line_first">Скидки на услуги химчистки</td>
                                        <td class="personal_area_block_bottom_loyalty_table_head_line_second personal_area_block_bottom_loyalty_table_head_line_your"><?php echo $program_level_one_row['cleaning_discounts'];?></td>
                                        <td class="personal_area_block_bottom_loyalty_table_head_line_third"><?php echo $program_level_two_row['cleaning_discounts'];?></td>
                                    </tr>
                                    <tr class="personal_area_block_bottom_loyalty_table_head_line personal_area_block_bottom_loyalty_table_head_greyline">
                                        <td class="personal_area_block_bottom_loyalty_table_head_line_first">Скидки на парковку автомобиля</td>
                                        <td class="personal_area_block_bottom_loyalty_table_head_line_second personal_area_block_bottom_loyalty_table_head_line_your"><?php echo $program_level_one_row['parking_discounts'];?></td>
                                        <td class="personal_area_block_bottom_loyalty_table_head_line_third"><?php echo $program_level_two_row['parking_discounts'];?></td>
                                    </tr>
                                </thead>
                            <?php
                            } else if ($_SESSION['id_program_level'] === '2') {
                                ?>
                                <thead class="personal_area_block_bottom_loyalty_table_head">
                                    <tr class="personal_area_block_bottom_loyalty_table_head_line">
                                        <th class="personal_area_block_bottom_loyalty_table_head_line_possibilities">ВОЗМОЖНОСТИ</th>
                                        <th class="personal_area_block_bottom_loyalty_table_head_line_silver"><?php echo $program_level_one_row['name'];?></th>
                                        <th class="personal_area_block_bottom_loyalty_table_head_line_gold personal_area_block_bottom_loyalty_table_head_line_your"><?php echo $program_level_two_row['name'];?></th>
                                    </tr>
                                    <tr class="personal_area_block_bottom_loyalty_table_head_line personal_area_block_bottom_loyalty_table_head_greyline">
                                        <td class="personal_area_block_bottom_loyalty_table_head_line_first">Стоимость годового участия</td>
                                        <td class="personal_area_block_bottom_loyalty_table_head_line_second"><?php echo $program_level_one_row['year_cost'];?></td>
                                        <td class="personal_area_block_bottom_loyalty_table_head_line_third personal_area_block_bottom_loyalty_table_head_line_your"><?php echo $program_level_two_row['year_cost'];?></td>
                                    </tr>
                                    <tr class="personal_area_block_bottom_loyalty_table_head_line personal_area_block_bottom_loyalty_table_head_greyline">
                                        <td class="personal_area_block_bottom_loyalty_table_head_line_first">Скидки на услуги проживания</td>
                                        <td class="personal_area_block_bottom_loyalty_table_head_line_second"><?php echo $program_level_one_row['stay_discounts'];?></td>
                                        <td class="personal_area_block_bottom_loyalty_table_head_line_third personal_area_block_bottom_loyalty_table_head_line_your"><?php echo $program_level_two_row['stay_discounts'];?></td>
                                    </tr>
                                    <tr class="personal_area_block_bottom_loyalty_table_head_line personal_area_block_bottom_loyalty_table_head_greyline">
                                        <td class="personal_area_block_bottom_loyalty_table_head_line_first">Скидки на услуги питания</td>
                                        <td class="personal_area_block_bottom_loyalty_table_head_line_second"><?php echo $program_level_one_row['food_discounts'];?></td>
                                        <td class="personal_area_block_bottom_loyalty_table_head_line_third personal_area_block_bottom_loyalty_table_head_line_your"><?php echo $program_level_two_row['food_discounts'];?></td>
                                    </tr>
                                    <tr class="personal_area_block_bottom_loyalty_table_head_line">
                                        <td class="personal_area_block_bottom_loyalty_table_head_line_first">Ранний заезд</td>
                                        <td class="personal_area_block_bottom_loyalty_table_head_line_second"><?php echo $program_level_one_row['early_arrival'];?></td>
                                        <td class="personal_area_block_bottom_loyalty_table_head_line_third personal_area_block_bottom_loyalty_table_head_line_your"><?php echo $program_level_two_row['early_arrival'];?></td>
                                    </tr>
                                    <tr class="personal_area_block_bottom_loyalty_table_head_line personal_area_block_bottom_loyalty_table_head_greyline">
                                        <td class="personal_area_block_bottom_loyalty_table_head_line_first">Поздний выезд</td>
                                        <td class="personal_area_block_bottom_loyalty_table_head_line_second"><?php echo $program_level_one_row['late_departure'];?></td>
                                        <td class="personal_area_block_bottom_loyalty_table_head_line_third personal_area_block_bottom_loyalty_table_head_line_your"><?php echo $program_level_two_row['late_departure'];?></td>
                                    </tr>
                                    <tr class="personal_area_block_bottom_loyalty_table_head_line">
                                        <td class="personal_area_block_bottom_loyalty_table_head_line_first">Скидки на услуги химчистки</td>
                                        <td class="personal_area_block_bottom_loyalty_table_head_line_second"><?php echo $program_level_one_row['cleaning_discounts'];?></td>
                                        <td class="personal_area_block_bottom_loyalty_table_head_line_third personal_area_block_bottom_loyalty_table_head_line_your"><?php echo $program_level_two_row['cleaning_discounts'];?></td>
                                    </tr>
                                    <tr class="personal_area_block_bottom_loyalty_table_head_line personal_area_block_bottom_loyalty_table_head_greyline">
                                        <td class="personal_area_block_bottom_loyalty_table_head_line_first">Скидки на парковку автомобиля</td>
                                        <td class="personal_area_block_bottom_loyalty_table_head_line_second"><?php echo $program_level_one_row['parking_discounts'];?></td>
                                        <td class="personal_area_block_bottom_loyalty_table_head_line_third personal_area_block_bottom_loyalty_table_head_line_your"><?php echo $program_level_two_row['parking_discounts'];?></td>
                                    </tr>
                                </thead>
                                <?php
                            } else {
                                ?>
                                <thead class="personal_area_block_bottom_loyalty_table_head">
                                    <tr class="personal_area_block_bottom_loyalty_table_head_line">
                                        <th class="personal_area_block_bottom_loyalty_table_head_line_possibilities">ВОЗМОЖНОСТИ</th>
                                        <th class="personal_area_block_bottom_loyalty_table_head_line_silver"><?php echo $program_level_one_row['name'];?></th>
                                        <th class="personal_area_block_bottom_loyalty_table_head_line_gold"><?php echo $program_level_two_row['name'];?></th>
                                    </tr>
                                    <tr class="personal_area_block_bottom_loyalty_table_head_line personal_area_block_bottom_loyalty_table_head_greyline">
                                        <td class="personal_area_block_bottom_loyalty_table_head_line_first">Стоимость годового участия</td>
                                        <td class="personal_area_block_bottom_loyalty_table_head_line_second"><?php echo $program_level_one_row['year_cost'];?></td>
                                        <td class="personal_area_block_bottom_loyalty_table_head_line_third"><?php echo $program_level_two_row['year_cost'];?></td>
                                    </tr>
                                    <tr class="personal_area_block_bottom_loyalty_table_head_line personal_area_block_bottom_loyalty_table_head_greyline">
                                        <td class="personal_area_block_bottom_loyalty_table_head_line_first">Скидки на услуги проживания</td>
                                        <td class="personal_area_block_bottom_loyalty_table_head_line_second"><?php echo $program_level_one_row['stay_discounts'];?></td>
                                        <td class="personal_area_block_bottom_loyalty_table_head_line_third"><?php echo $program_level_two_row['stay_discounts'];?></td>
                                    </tr>
                                    <tr class="personal_area_block_bottom_loyalty_table_head_line personal_area_block_bottom_loyalty_table_head_greyline">
                                        <td class="personal_area_block_bottom_loyalty_table_head_line_first">Скидки на услуги питания</td>
                                        <td class="personal_area_block_bottom_loyalty_table_head_line_second"><?php echo $program_level_one_row['food_discounts'];?></td>
                                        <td class="personal_area_block_bottom_loyalty_table_head_line_third"><?php echo $program_level_two_row['food_discounts'];?></td>
                                    </tr>
                                    <tr class="personal_area_block_bottom_loyalty_table_head_line">
                                        <td class="personal_area_block_bottom_loyalty_table_head_line_first">Ранний заезд</td>
                                        <td class="personal_area_block_bottom_loyalty_table_head_line_second"><?php echo $program_level_one_row['early_arrival'];?></td>
                                        <td class="personal_area_block_bottom_loyalty_table_head_line_third"><?php echo $program_level_two_row['early_arrival'];?></td>
                                    </tr>
                                    <tr class="personal_area_block_bottom_loyalty_table_head_line personal_area_block_bottom_loyalty_table_head_greyline">
                                        <td class="personal_area_block_bottom_loyalty_table_head_line_first">Поздний выезд</td>
                                        <td class="personal_area_block_bottom_loyalty_table_head_line_second"><?php echo $program_level_one_row['late_departure'];?></td>
                                        <td class="personal_area_block_bottom_loyalty_table_head_line_third"><?php echo $program_level_two_row['late_departure'];?></td>
                                    </tr>
                                    <tr class="personal_area_block_bottom_loyalty_table_head_line">
                                        <td class="personal_area_block_bottom_loyalty_table_head_line_first">Скидки на услуги химчистки</td>
                                        <td class="personal_area_block_bottom_loyalty_table_head_line_second"><?php echo $program_level_one_row['cleaning_discounts'];?></td>
                                        <td class="personal_area_block_bottom_loyalty_table_head_line_third"><?php echo $program_level_two_row['cleaning_discounts'];?></td>
                                    </tr>
                                    <tr class="personal_area_block_bottom_loyalty_table_head_line personal_area_block_bottom_loyalty_table_head_greyline">
                                        <td class="personal_area_block_bottom_loyalty_table_head_line_first">Скидки на парковку автомобиля</td>
                                        <td class="personal_area_block_bottom_loyalty_table_head_line_second"><?php echo $program_level_one_row['parking_discounts'];?></td>
                                        <td class="personal_area_block_bottom_loyalty_table_head_line_third"><?php echo $program_level_two_row['parking_discounts'];?></td>
                                    </tr>
                                </thead>
                                <?php
                            }
                                ?>  
                        </table>
                    </div>
                    <a class="personal_area_block_bottom_exit" href="php-handler/session_exit.php">Выйти</a>
                </div>
            </div>
        </section>
    </main>
    <?php
        include "php-handler/footer.php";
        include "php-handler/login_form.php";
        include "php-handler/register_form.php";
        include "php-handler/password_form.php";
    ?>
    <script src="assets/js/personal_area_script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.2.1/dist/jquery.min.js" type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery.maskedinput@1.4.1/src/jquery.maskedinput.min.js" type="text/javascript"></script>
    <script src="assets/js/mask.js"></script>
</body>
</html>