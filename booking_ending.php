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
                <div class="booking_block_ending">
                    <?php
                        if((isset($_GET['arrival_date'])) and (isset($_GET['departure_date'])) and (isset($_GET['guests'])) and (isset($_GET['id_room']))) {
                            $arrival_date = $_GET['arrival_date'];
                            $departure_date = $_GET['departure_date'];
                            $guests = $_GET['guests'];
                            $id_room = $_GET['id_room'];
                            echo "<a href='booking.php?arrival_date=$arrival_date&departure_date=$departure_date&guests=$guests' class='booking_block_ending_link'><img src='assets/images/Vector.svg' class='booking_block_ending_link_img' alt=''>Вернуться</a>";
                            if((isset($_GET['arrival_date'])) and (isset($_GET['departure_date'])) and (isset($_GET['guests']))) {
                                $selected_room = "SELECT room_types.name, room_types.price
                                FROM room_types 
                                INNER JOIN rooms ON room_types.id_room_type = rooms.id_room_type
                                WHERE rooms.id_room = '$id_room'";
                                $selected_room_result = mysqli_query($connect, $selected_room) or die(mysqli_error($connect));
                                $info_selected_room = mysqli_fetch_array($selected_room_result);
                            }
                            echo "<div class='booking_block_ending_info'>
                                <span class='booking_block_ending_info_txt'>".$arrival_date." — ".$departure_date.", ".$info_selected_room['name'].", ".$guests."</span>
                                <div class='booking_block_ending_info_price'>
                                    <span class='booking_block_ending_info_price_title'>Общая стоимость:</span>
                                    <span class='booking_block_ending_info_price_txt'>".$info_selected_room['price']." руб.</span>
                                </div>
                            </div>
                            <form action='php-handler/create_booking.php?arrival_date=$arrival_date&departure_date=$departure_date&guests=$guests&id_room=$id_room' class='booking_block_ending_form' method='post'>";
                    ?>
                        <div class="booking_block_ending_form_contact">
                            <h1 class="booking_block_ending_form_contact_title">Контактные данные</h1>
                            <div class="booking_block_ending_form_contact_block">
                                <?php
                                    if(!empty($_SESSION['id_guest'])) {
                                        $id_guest = $_SESSION['id_guest'];
                                        $second_name = $_SESSION['second_name'];
                                        $first_name = $_SESSION['first_name'];
                                        $patronymic = $_SESSION['patronymic'];
                                        $nationality = $_SESSION['id_nationality'];
                                        $phone_number = $_SESSION['phone_number'];
                                        $email_address = $_SESSION['email_address'];
                                ?>
                                <div class="booking_block_ending_form_contact_block_category">
                                    <div class="booking_block_ending_form_contact_block_category_item">
                                        <label class="booking_block_ending_form_contact_block_category_item_label">Фамилия</label>
                                        <input type="text" class="booking_block_ending_form_contact_block_category_item_input" name="second_name" value ="<?php echo $first_name;?>" required>
                                    </div>
                                    <div class="booking_block_ending_form_contact_block_category_item">
                                        <label class="booking_block_ending_form_contact_block_category_item_label">Имя</label>
                                        <input type="text" class="booking_block_ending_form_contact_block_category_item_input" name="first_name" value ="<?php echo $second_name;?>" required>
                                    </div>
                                    <div class="booking_block_ending_form_contact_block_category_item">
                                        <label  class="booking_block_ending_form_contact_block_category_item_label">Отчество</label>
                                        <input type="text" class="booking_block_ending_form_contact_block_category_item_input" name="patronymic" value ="<?php echo $patronymic;?>" required>
                                    </div>
                                </div>
                                <div class="booking_block_ending_form_contact_block_category">
                                    <div class="booking_block_ending_form_contact_block_category_item">
                                        <label class="booking_block_ending_form_contact_block_category_item_label">Номер телефона</label>
                                        <input type="tel" class="booking_block_ending_form_contact_block_category_item_input" name="phone_number" id="phone_number" value ="<?php echo $phone_number;?>" required>
                                    </div>
                                    <div class="booking_block_ending_form_contact_block_category_item">
                                        <label  class="booking_block_ending_form_contact_block_category_item_label">Электронный адрес</label>
                                        <input type="email" class="booking_block_ending_form_contact_block_category_item_input" name="email_address" value ="<?php echo $email_address;?>" required>
                                    </div>
                                    <div class="booking_block_ending_form_guests_block_category_item">
                                        <label class="booking_block_ending_form_guests_block_category_item_label">Гражданство</label>
                                        <div class="booking_block_ending_form_guests_block_category_item_select">
                                            <select name="nationality"  class="booking_block_ending_form_guests_block_category_item_select_input" required>
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
                                            <img src="assets/images/down_arrow.svg" alt="" class="booking_block_ending_form_guests_block_category_item_select_arrow">
                                        </div>
                                    </div>
                                </div>
                                <?php
                                    } else {
                                        echo "<BODY onLoad='openRegisterForm()'></script>";
                                ?>
                                <div class="booking_block_ending_form_contact_block_category">
                                    <div class="booking_block_ending_form_contact_block_category_item">
                                        <label class="booking_block_ending_form_contact_block_category_item_label">Фамилия</label>
                                        <input type="text" class="booking_block_ending_form_contact_block_category_item_input" name="second_name" required>
                                    </div>
                                    <div class="booking_block_ending_form_contact_block_category_item">
                                        <label class="booking_block_ending_form_contact_block_category_item_label">Имя</label>
                                        <input type="text" class="booking_block_ending_form_contact_block_category_item_input" name="first_name" required>
                                    </div>
                                    <div class="booking_block_ending_form_contact_block_category_item">
                                        <label  class="booking_block_ending_form_contact_block_category_item_label">Отчество</label>
                                        <input type="text" class="booking_block_ending_form_contact_block_category_item_input" name="patronymic" required>
                                    </div>
                                </div>
                                <div class="booking_block_ending_form_contact_block_category">
                                    <div class="booking_block_ending_form_contact_block_category_item">
                                        <label class="booking_block_ending_form_contact_block_category_item_label">Номер телефона</label>
                                        <input type="tel" class="booking_block_ending_form_contact_block_category_item_input" id="phone_number" name="phone_number" required>
                                    </div>
                                    <div class="booking_block_ending_form_contact_block_category_item">
                                        <label  class="booking_block_ending_form_contact_block_category_item_label">Электронный адрес</label>
                                        <input type="email" class="booking_block_ending_form_contact_block_category_item_input" name="email_address" required>
                                    </div>
                                    <div class="booking_block_ending_form_guests_block_category_item">
                                        <label class="booking_block_ending_form_guests_block_category_item_label">Гражданство</label>
                                        <div class="booking_block_ending_form_guests_block_category_item_select">
                                            <select name="nationality"  class="booking_block_ending_form_guests_block_category_item_select_input" required>
                                            <?php 
                                            $select_nationality = "SELECT * FROM `nationalities`";
                                            $select_result = mysqli_query($connect, $select_nationality) or die(mysqli_error($connect));
                                            while ($nationality_row = mysqli_fetch_assoc($select_result)) {
                                                $nationality_array[] = $nationality_row;
                                            }
                                            
                                            foreach ($nationality_array as $array){
                                                echo "<option value='".$array['id_nationality']."'>".$array['name']."</option>";
                                            }
                                            ?>
                                            </select>
                                            <img src="assets/images/down_arrow.svg" alt="" class="booking_block_ending_form_guests_block_category_item_select_arrow">
                                        </div>
                                    </div>
                                </div>
                                <?php
                                    }
                                ?>
                            </div>
                        </div>
                        <div class="booking_block_ending_form_time">
                            <h1 class="booking_block_ending_form_time_title">Время заезда и выезда</h1>
                            <div class="booking_block_ending_form_time_block">
                                <div class="booking_block_ending_form_time_block_category">
                                    <div class="booking_block_ending_form_time_block_category_item">
                                        <label class="booking_block_ending_form_time_block_category_item_label">Заезд</label>
                                        <div class="booking_block_ending_form_time_block_category_item_select">
                                            <select name="arrival_time"  class="booking_block_ending_form_time_block_category_item_select_input" required>
                                                <option>12:00</option>
                                                <option>12:30</option>
                                                <option>13:00</option>
                                                <option>13:30</option>
                                                <option>14:00</option>
                                                <option>14:30</option>
                                                <option>15:00</option>
                                                <option>15:30</option>
                                                <option>16:00</option>
                                                <option>16:30</option>
                                                <option>17:00</option>
                                                <option>17:30</option>
                                                <option>18:00</option>
                                                <option>18:30</option>
                                                <option>19:00</option>
                                                <option>19:30</option>
                                                <option>20:00</option>
                                                <option>20:30</option>
                                                <option>21:00</option>
                                                <option>21:30</option>
                                                <option>22:00</option>
                                                <option>22:30</option>
                                                <option>23:00</option>
                                                <option>23:30</option>
                                            </select>
                                            <img src="assets/images/down_arrow.svg" alt="" class="booking_block_ending_form_time_block_category_item_select_arrow">
                                        </div>
                                    </div>
                                    <div class="booking_block_ending_form_time_block_category_item">
                                        <label   class="booking_block_ending_form_time_block_category_item_label">Выезд</label>
                                        <div class="booking_block_ending_form_time_block_category_item_select">
                                            <select name="departure_time"  class="booking_block_ending_form_time_block_category_item_select_input" required>
                                                <option>12:00</option>
                                                <option>12:30</option>
                                                <option>13:00</option>
                                                <option>13:30</option>
                                                <option>14:00</option>
                                                <option>14:30</option>
                                                <option>15:00</option>
                                                <option>15:30</option>
                                                <option>16:00</option>
                                                <option>16:30</option>
                                                <option>17:00</option>
                                                <option>17:30</option>
                                                <option>18:00</option>
                                                <option>18:30</option>
                                                <option>19:00</option>
                                                <option>19:30</option>
                                                <option>20:00</option>
                                                <option>20:30</option>
                                                <option>21:00</option>
                                                <option>21:30</option>
                                                <option>22:00</option>
                                                <option>22:30</option>
                                                <option>23:00</option>
                                                <option>23:30</option>
                                            </select>
                                            <img src="assets/images/down_arrow.svg" alt="" class="booking_block_ending_form_time_block_category_item_select_arrow">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="booking_block_ending_form_time">
                            <h1 class="booking_block_ending_form_time_title">Способ оплаты</h1>
                            <div class="booking_block_ending_form_time_block">
                                <div class="booking_block_ending_form_time_block_category">
                                    <div class="booking_block_ending_form_time_block_category_item">
                                        <label class="booking_block_ending_form_time_block_category_item_label">Заезд</label>
                                        <div class="booking_block_ending_form_time_block_category_item_select">
                                            <select name="payment_method"  class="booking_block_ending_form_time_block_category_item_select_input" required>
                                                <option>Наличными</option>
                                                <option>Картой</option>
                                                <option>Картой онлайн</option>
                                            </select>
                                            <img src="assets/images/down_arrow.svg" alt="" class="booking_block_ending_form_time_block_category_item_select_arrow">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="booking_block_ending_form_submit">
                            <div class="booking_block_ending_form_submit_item">
                                <input type="checkbox" class="booking_block_ending_form_submit_item_checkbox" required>
                                <span class="booking_block_ending_form_submit_item_txt">Я согласен с правилами онлайн-бронирования, обработкой персональных данных и политикой конфиденциальности</span>
                            </div>
                            <button class="booking_block_ending_form_submit_btn" type="submit">Забронировать</button>
                        </div>
                    </form>
                    <?php
                        }
                    ?>    
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
</body>
</html>