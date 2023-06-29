<!DOCTYPE html>
<html lang="ru">
<head> <!--Элемент метаданных документа-->
    <meta charset="UTF-8"> <!--Кодировка-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> <!--Версия IE-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!--указывает браузеру, что нужна ширина области просмотра такая же, как и ширина экрана-->
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <link rel="stylesheet" type="text/css" href="assets/css/main.css"> <!--Ссылка на файл css-->
    <title>Liberta - Главная</title> <!--Заголовок документа-->
</head>
<body> <!--Тело документа-->
    <?php
        session_start();
        include "php-connect/connect.php";
        include "php-handler/header.php";
    ?>
    <main> <!--Основной контент сайта-->
        <section class="start index_start"> <!--Секция начального экрана-->
            <div class="container start_block">
                <h1 class="start_block_title">Пятизвездочный отель Москвы Liberta</h1> <!--Заголовок первого порядка-->
                <span class="start_block_txt">Подарите себе моменты истинного удовольствия в лучшем отеле 5 звезд Liberta</span>
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
        <section class="about_section"><!--Секция "о нас"-->
            <div class="container about_section_block">
                <div class="about_section_block_left">
                    <a href="about.php" class="title_link"><h1 class="about_section_block_left_title">О гостинице</h1></a>
                    <p class="about_section_block_left_txt">В гостинице предусмотрены 100 номеров, оформленных в элегантном стиле. Так же на территории гостиницы расположен изысканный ресторан Liberta Restaurant, 10 конференц-залов общей площадью более 1200 кв. м., премиальный фитнес-клуб и большой бассейн, которые являются уникальными особенностями гостиницы Liberta.
                        Впечатляющее масштабом здание предлагает современные технические и дизайнерские решения. Первоклассный сервис, персонализированный подход к каждому гостю и особое внимание к деталям – основы философии Liberta.</p> <!--Элемент текстового абзаца-->
                    <a href="about.php" class="about_section_block_left_link">Подробнее<img src="assets/images/Vector.svg" class="about_section_block_left_link_img" alt=""></a>
                </div>
                <a href="about.php" class="img_link"><img src="assets/images/карта_москвы_1.png" alt="" class="about_section_block_right"></a><!--Картинка-->
            </div>
        </section>
        <section class="rooms_section"><!--Секция "номера"-->
            <div class="container rooms_section_block">
                <div class="rooms_section_block_top">
                    <a href="rooms.php" class="title_link"><h1 class="rooms_section_block_top_title">Номера</h1></a>
                    <a href="rooms.php" class="rooms_section_block_top_link">Подробнее<img src="assets/images/Vector.svg" class="rooms_section_block_top_link_img" alt=""></a>
                </div>
                <ul class="rooms_section_block_bottom">
                    <?php
                        $select_rooms = "SELECT room_types.id_room_type, room_types.name, room_types.image, room_types.short_description, room_types.description, room_types.space, room_types.capacity, rooms.bed_type 
                        FROM room_types 
                        INNER JOIN rooms ON room_types.id_room_type = rooms.id_room_type;";
                        $rooms_result = mysqli_query($connect, $select_rooms) or die(mysqli_error($connect));
                        while ($rooms_row = mysqli_fetch_assoc($rooms_result)) {
                            $rooms_array[] = $rooms_row;
                        }
                        foreach ($rooms_array as $array){
                            echo"<li class='rooms_section_block_bottom_card'>
                                <div class='rooms_section_block_bottom_card_top'>
                                    <div class='rooms_section_block_bottom_card_top_block'>
                                        <span class='rooms_section_block_bottom_card_top_block_number'>0".$array['id_room_type']."</span>
                                        <a href='room.php?id_room_type=".$array['id_room_type']."' class='title_link'><h2 class='rooms_section_block_bottom_card_top_block_title'>".$array['name']."</h2></a>
                                    </div>
                                    <a href='room.php?id_room_type=".$array['id_room_type']."' class='img_link'><img src='assets/images/".$array['image']."' alt='' class='rooms_section_block_bottom_card_top_img'></a>
                                    <p class='rooms_section_block_bottom_card_top_txt'>".$array['short_description']."</p>
                                </div>
                                <div class='rooms_section_block_bottom_card_bottom'>
                                    <a href='booking.php' class='rooms_section_block_bottom_card_bottom_btn'>Забронировать</a><!--Кнопка-->
                                </div>
                            </li>";
                        }
                    ?>
                </ul>
            </div>
        </section>
        <section class="services_section"><!--Секция "услуги"-->
            <div class="container services_section_block">
                <div class="services_section_block_top">
                    <a href="services.php" class="title_link"><h1 class="services_section_block_top_title">Услуги</h1></a>
                    <a href="services.php" class="services_section_block_top_link">Посмотреть ещё<img src="assets/images/Vector.svg" class="services_section_block_top_link_img" alt=""></a>
                </div>
                <ul class="services_section_block_bottom">
                    <?php
                        $select_services = "SELECT * FROM services;";
                        $services_result = mysqli_query($connect, $select_services) or die(mysqli_error($connect));
                        while ($services_row = mysqli_fetch_assoc($services_result)) {
                            $services_array[] = $services_row;
                        }
                        foreach ($services_array as $array){
                            echo"<li class='services_section_block_bottom_card'>
                            <div class='services_section_block_bottom_card_left'>
                                <div class='services_section_block_bottom_card_left_block'>
                                    <span class='services_section_block_bottom_card_left_block_number'>0".$array['id_service']."</span>
                                    <a href='service.php?id_service=".$array['id_service']."' class='title_link'><h2 class='services_section_block_bottom_card_left_block_title'>".$array['name']."</h2></a>
                                </div>
                                <p class='services_section_block_bottom_card_left_txt'>".$array['short_description']."</p>
                                <a href='service.php?id_service=".$array['id_service']."' class='services_section_block_bottom_card_left_link'>Подробнее<img src='assets/images/Vector.svg' class='services_section_block_top_link_img' alt=''></a>
                            </div>
                            <div class='services_section_block_bottom_card_right'>
                                <a href='service.php?id_service=".$array['id_service']."' class='img_link'><img src='assets/images/".$array['image']."' alt='' class='services_section_block_bottom_card_right_img'></a>
                            </div>
                        </li>";
                        }
                    ?>
                </ul>
            </div>
        </section>
        <section class="offers_section"><!--Секция "спецпредложения"-->
            <div class="container offers_section_block">
                <div class="offers_section_block_top">
                    <a href="offers.php" class="title_link"><h1 class="offers_section_block_top_title">Специальные предложения</h1></a>
                    <a href="offers.php" class="offers_section_block_top_link">Посмотреть ещё<img src="assets/images/Vector.svg" class="offers_section_block_top_link_img" alt=""></a>
                </div>
                <ul class="offers_section_block_bottom">
                    <?php
                        $select_offers = "SELECT * FROM special_offers;";
                        $offers_result = mysqli_query($connect, $select_offers) or die(mysqli_error($connect));
                        while ($offers_row = mysqli_fetch_assoc($offers_result)) {
                            $offers_array[] = $offers_row;
                        }
                        foreach ($offers_array as $array) {
                            if ($array['id_special_offer'] % 2 == '0') {
                                echo"<li class='offers_section_block_bottom_card'>
                                    <div class='offers_section_block_bottom_card_left'>
                                        <div class='offers_section_block_bottom_card_left_block'>
                                            <span class='offers_section_block_bottom_card_left_block_number'>0".$array['id_special_offer']."</span>
                                            <a href='offer.php?id_special_offer=".$array['id_special_offer']."' class='title_link'><h2 class='offers_section_block_bottom_card_left_block_title'>".$array['name']."</h2></a>
                                        </div>
                                        <p class='offers_section_block_bottom_card_left_txt'>".$array['short_description']."</p>
                                        <a href='offer.php?id_special_offer=".$array['id_special_offer']."' class='offers_section_block_bottom_card_left_link'>Подробнее<img src='assets/images/Vector.svg' class='offers_section_block_top_link_img' alt=''></a>
                                    </div>
                                    <div class='offers_section_block_bottom_card_right'>
                                        <a href='offer.php?id_special_offer=".$array['id_special_offer']."' class='img_link'><img src='assets/images/".$array['image']."' alt='' class='offers_section_block_bottom_card_right_img'></a>
                                    </div>
                                </li>";
                            } else {
                                echo"<li class='offers_section_block_bottom_card'>
                                    <div class='offers_section_block_bottom_card_left'>
                                        <a href='offer.php?id_special_offer=".$array['id_special_offer']."' class='img_link'><img src='assets/images/".$array['image']."' alt='' class='offers_section_block_bottom_card_left_img'></a>
                                    </div>
                                    <div class='offers_section_block_bottom_card_right'>
                                        <div class='offers_section_block_bottom_card_right_block'>
                                            <span class='offers_section_block_bottom_card_right_block_number'>0".$array['id_special_offer']."</span>
                                            <a href='offer.php?id_special_offer=".$array['id_special_offer']."' class='title_link'><h2 class='offers_section_block_bottom_card_right_block_title'>".$array['name']."</h2></a>
                                        </div>
                                        <p class='offers_section_block_bottom_card_right_txt'>".$array['short_description']."</p>
                                        <a href='offer.php?id_special_offer=".$array['id_special_offer']."' class='offers_section_block_bottom_card_right_link'>Подробнее<img src='assets/images/Vector.svg' class='offers_section_block_top_link_img' alt=''></a>
                                    </div>
                                </li>";
                            }
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