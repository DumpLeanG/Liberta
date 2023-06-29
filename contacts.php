<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <link rel="stylesheet" type="text/css" href="assets/css/main.css">
    <title>Liberta - Контакты</title>
</head>
<body>
    <?php
        session_start();
        include "php-connect/connect.php";
        include "php-handler/header.php"
    ?>
    <main>
        <section class="start contacts_start">
            <div class="container start_block">
                <h1 class="start_block_title">Пятизвездочный отель Москвы Liberta</h1>
                <span class="start_block_txt">Мы всегда рады помочь вам с любыми вопросами, связанными с проживанием в нашем отеле.</span>
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
        <section class="contacts">
            <div class="container contacts_block">
                <div class="contacts_block_left">
                    <ul class="contacts_block_left_list">
                        <li class="contacts_block_left_list_item">
                            <h2 class="contacts_block_left_list_item_title">Номера телефонов</h2>
                            <span class="contacts_block_left_list_item_txt">+7-968-999-03-04</span>
                            <span class="contacts_block_left_list_item_txt">+7-968-999-03-05</span>
                        </li>
                        <li class="contacts_block_left_list_item">
                            <h2 class="contacts_block_left_list_item_title">Адрес</h2>
                            <span class="contacts_block_left_list_item_txt">129226, Москва, улица Вильгельма Пика, 16 </span>
                        </li>
                        <li class="contacts_block_left_list_item">
                            <h2 class="contacts_block_left_list_item_title">Ссылки на социальные сети</h2>
                            <a href="#" class="contacts_block_left_list_item_link">Вконтакте</a>
                            <a href="#" class="contacts_block_left_list_item_link">Инстаграм</a>
                            <a href="#" class="contacts_block_left_list_item_link">Телеграм</a>
                        </li>
                        <li class="contacts_block_left_list_item">
                            <h2 class="contacts_block_left_list_item_title">Электронныая почта</h2>
                            <span class="contacts_block_left_list_item_txt">Для сотрудничества: partner@liberta.ru </span>
                            <span class="contacts_block_left_list_item_txt">Для вопросов: question@liberta.ru</span>
                        </li>
                    </ul>
                </div>
                <div class="contacts_block_right">
                    <div style="position:relative;overflow:hidden;"><a href="https://yandex.ru/maps/213/moscow/?utm_medium=mapframe&utm_source=maps" style="color:#eee;font-size:12px;position:absolute;top:0px;">Москва</a><a href="https://yandex.ru/maps/213/moscow/house/ulitsa_vilgelma_pika_16/Z04YcARkTkcGQFtvfXR1dXRkZA==/?ll=37.633317%2C55.844287&utm_medium=mapframe&utm_source=maps&z=15.71" style="color:#eee;font-size:12px;position:absolute;top:14px;">Улица Вильгельма Пика, 16 — Яндекс Карты</a><iframe src="https://yandex.ru/map-widget/v1/?ll=37.633317%2C55.844287&mode=search&ol=geo&ouri=ymapsbm1%3A%2F%2Fgeo%3Fdata%3DCgoyNjMyMDQyMTE0EkjQoNC-0YHRgdC40Y8sINCc0L7RgdC60LLQsCwg0YPQu9C40YbQsCDQktC40LvRjNCz0LXQu9GM0LzQsCDQn9C40LrQsCwgMTYiCg30iRZCFSZhX0I%2C&z=15.71" width="1000" height="850" frameborder="0" allowfullscreen="true" style="position:relative;"></iframe></div>
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