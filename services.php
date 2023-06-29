<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <link rel="stylesheet" type="text/css" href="assets/css/main.css">
    <title>Liberta - Услуги</title>
</head>
<body>
    <?php
        session_start();
        include "php-connect/connect.php";
        include "php-handler/header.php"
    ?>
    <main>
        <section class="start services_start">
            <div class="container start_block">
                <h1 class="start_block_title">Пятизвездочный отель Москвы Liberta</h1>
                <span class="start_block_txt">Мы рады предложить вам отличные возможности для отдыха и работы. У нас вы найдете ресторан высокого уровня с разнообразным меню, прекрасный бассейн, где можно расслабиться и зарядиться бодростью, а также современный фитнес-центр, где вы сможете поддерживать свою форму в любое время года. В нашем распоряжении также имеются комфортабельные конференц-залы, оснащенные всем необходимым для проведения успешных деловых встреч и мероприятий. Мы заботимся о вашем комфорте и готовы предложить все условия для незабываемого пребывания у нас.</span>
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
        <section class="services">
            <div class="container services_block">
                <ul class="services_block_list">
                    <?php
                        $select_services = "SELECT * FROM services;";
                        $services_result = mysqli_query($connect, $select_services) or die(mysqli_error($connect));
                        while ($services_row = mysqli_fetch_assoc($services_result)) {
                            $services_array[] = $services_row;
                        }
                        foreach ($services_array as $array){
                            echo"<li class='services_block_list_card'>
                            <div class='services_block_list_card_left'>
                                <a href='service.php?id_service=".$array['id_service']."' class='title_link'><h1 class='services_block_list_card_left_title'>".$array['name']."</h1></a>
                                <p class='services_block_list_card_left_txt'>".$array['short_description']."</p>
                                <a href='service.php?id_service=".$array['id_service']."' class='services_block_list_card_left_link'>Подробнее<img src='assets/images/Vector.svg' class='services_block_list_card_left_link_img' alt=''></a>
                            </div>
                            <div class='services_block_list_card_right'>
                                <a href='service.php?id_service=".$array['id_service']."' class='img_link'><img src='assets/images/".$array['image']."' alt='' class='services_block_list_card_right_img'></a>
                                <div class='services_block_list_card_right_features'>
                                    <div class='services_block_list_card_right_features_block'>
                                        <span class='services_block_list_card_right_features_block_title'>РАСПОЛОЖЕНИЕ</span>
                                        <span class='services_block_list_card_right_features_block_txt'>".$array['floor']."</span>
                                    </div>
                                    <div class='services_block_list_card_right_features_block'>
                                        <span class='services_block_list_card_right_features_block_title'>ЧАСЫ РАБОТЫ</span>
                                        <span class='services_block_list_card_right_features_block_txt'>Ежедневно с ".$array['opening_time']." до ".$array['closing_time']."</span>
                                    </div>
                                </div>
                            </div>
                            <span class='services_block_list_card_number'>0".$array['id_service']."</span>
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