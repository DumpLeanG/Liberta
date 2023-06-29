<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <link rel="stylesheet" type="text/css" href="assets/css/main.css">
    <title>Liberta - Спецпредложения</title>
</head>
<body>
    <?php
        session_start();
        include "php-connect/connect.php";
        include "php-handler/header.php"
    ?>
    <main>
        <section class="start offers_start">
            <div class="container start_block">
                <h1 class="start_block_title">Пятизвездочный отель Москвы Liberta</h1>
                <span class="start_block_txt">Гостиница Liberta рада предложить вам уникальные возможности для незабываемого отдыха. Мы подготовили для вас спецпредложения, которые помогут улучшить качество вашего пребывания в нашей гостинице.</span>
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
        <section class="offers">
            <div class="container offers_block">
                <ul class="offers_block_list">
                    <?php
                        $select_offers = "SELECT * FROM special_offers;";
                        $offers_result = mysqli_query($connect, $select_offers) or die(mysqli_error($connect));
                        while ($offers_row = mysqli_fetch_assoc($offers_result)) {
                            $offers_array[] = $offers_row;
                        }
                        foreach ($offers_array as $array) {
                            if ($array['id_special_offer'] % 2 == '0') {
                                echo"<li class='offers_block_list_card'>
                                    <div class='offers_block_list_card_right'>
                                        <div class='offers_block_list_card_right_block'>
                                            <span class='offers_block_list_card_right_block_number'>0".$array['id_special_offer']."</span>
                                            <a href='offer.php?id_special_offer=".$array['id_special_offer']."' class='title_link'><h1 class='offers_block_list_card_right_block_title'>".$array['name']."</h1></a>
                                        </div>
                                        <p class='offers_block_list_card_right_txt'>".$array['short_description']."</p>
                                        <a href='offer.php?id_special_offer=".$array['id_special_offer']."' class='offers_block_list_card_right_link'>Подробнее<img src='assets/images/warrow.svg' class='offers_block_list_card_right_link_img' alt=''></a>
                                    </div>
                                    <div class='offers_block_list_card_bg'>
                                        <a href='offer.php?id_special_offer=".$array['id_special_offer']."' class='img_link'><img src='assets/images/".$array['image']."' alt='' class='offers_block_list_card_bg_img'><span class='offers_block_list_card_bg_right_shadow'></span></a>
                                    </div>
                                </li>";
                            } else {
                                echo"<li class='offers_block_list_card'>
                                    <div class='offers_block_list_card_bg'>
                                        <a href='offer.php?id_special_offer=".$array['id_special_offer']."' class='img_link'><img src='assets/images/".$array['image']."' alt='' class='offers_block_list_card_bg_img'><span class='offers_block_list_card_bg_left_shadow'></span></a>
                                    </div>
                                    <div class='offers_block_list_card_left'>
                                        <div class='offers_block_list_card_left_block'>
                                            <span class='offers_block_list_card_left_block_number'>0".$array['id_special_offer']."</span>
                                            <a href='offer.php?id_special_offer=".$array['id_special_offer']."' class='title_link'><h1 class='offers_block_list_card_left_block_title'>".$array['name']."</h1></a>
                                        </div>
                                        <p class='offers_block_list_card_left_txt'>".$array['short_description']."</p>
                                        <a href='offer.php?id_special_offer=".$array['id_special_offer']."' class='offers_block_list_card_left_link'>Подробнее<img src='assets/images/warrow.svg' class='offers_block_list_card_left_link_img' alt=''></a>
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