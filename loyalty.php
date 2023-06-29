<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <link rel="stylesheet" type="text/css" href="assets/css/main.css">
    <title>Liberta - Программа лояльности</title>
</head>
<body>
    <?php
        session_start();
        include "php-connect/connect.php";
        include "php-handler/header.php"
    ?>
    <main>
        <section class="start loyalty_start">
            <div class="container start_block">
                <h1 class="start_block_title">Пятизвездочный отель Москвы Liberta</h1>
                <span class="start_block_txt">Liberta Honors - программа лояльности, разработанная для постоянных гостей группы отеля Liberta. Регистрируйтесь и получайте самые выгодные условия при размещении в номерах гостиницы Liberta.</span>
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
        <section class="loyalty">
            <div class="container loyalty_block">
                <div class="loyalty_block_advantages">
                    <h1 class="loyalty_block_advantages_title">Преимущества программы лояльности</h1>
                    <div class="loyalty_block_advantages_bottom">
                        <div class="loyalty_block_advantages_bottom_left">
                            <div class="loyalty_block_advantages_bottom_left_item">
                                <h2 class="loyalty_block_advantages_bottom_left_item_title">Привилегии сразу</h2>
                                <p class="loyalty_block_advantages_bottom_left_item_txt">Вам не нужно копить баллы. Отличительная особенность программы в том, что привилегии предоставляются сразу же, с момента приобретения карты.</p>
                            </div>
                            <div class="loyalty_block_advantages_bottom_left_item">
                                <h2 class="loyalty_block_advantages_bottom_left_item_title">Скидки на все</h2>
                                <p class="loyalty_block_advantages_bottom_left_item_txt">Привилегии распространяются не только на проживание, но и на дополнительные услуги.</p>
                            </div>
                        </div>
                        <img src="assets/images/Преимущества.png" alt="" class="loyalty_block_advantages_bottom_right">
                    </div>
                </div>
                <div class="loyalty_block_conditions">
                    <h1 class="loyalty_block_conditions_title">Условия программы лояльности</h1>
                    <table class="loyalty_block_conditions_table"><!--Таблица-->
                        <thead class="loyalty_block_conditions_table_head">
                            <tr class="loyalty_block_conditions_table_head_line"><!--Строка таблицы-->
                                <th class="loyalty_block_conditions_table_head_line_possibilities">ВОЗМОЖНОСТИ</th> <!--Заголовочная ячейка-->
                                <th class="loyalty_block_conditions_table_head_line_silver">СЕРЕБРЯНЫЙ</th>
                                <th class="loyalty_block_conditions_table_head_line_gold">ЗОЛОТОЙ</th>
                            </tr>
                            <tr class="loyalty_block_conditions_table_head_line loyalty_block_conditions_table_head_greyline">
                                <td class="loyalty_block_conditions_table_head_line_first">Стоимость годового участия</td> <!--Ячейка-->
                                <td class="loyalty_block_conditions_table_head_line_second">5000 руб.</td>
                                <td class="loyalty_block_conditions_table_head_line_third">8000 руб.</td>
                            </tr>
                            <tr class="loyalty_block_conditions_table_head_line">
                                <td class="loyalty_block_conditions_table_head_line_first">Cкидки на услуги проживания</td>
                                <td class="loyalty_block_conditions_table_head_line_second">5%</td>
                                <td class="loyalty_block_conditions_table_head_line_third">10%</td>
                            </tr>
                            <tr class="loyalty_block_conditions_table_head_line loyalty_block_conditions_table_head_greyline">
                                <td class="loyalty_block_conditions_table_head_line_first">Скидки на услуги питания</td>
                                <td class="loyalty_block_conditions_table_head_line_second">10%</td>
                                <td class="loyalty_block_conditions_table_head_line_third">15%</td>
                            </tr>
                            <tr class="loyalty_block_conditions_table_head_line">
                                <td class="loyalty_block_conditions_table_head_line_first">Ранний заезд</td>
                                <td class="loyalty_block_conditions_table_head_line_second">—</td>
                                <td class="loyalty_block_conditions_table_head_line_third">09:00</td>
                            </tr>
                            <tr class="loyalty_block_conditions_table_head_line loyalty_block_conditions_table_head_greyline">
                                <td class="loyalty_block_conditions_table_head_line_first">Поздний выезд</td>
                                <td class="loyalty_block_conditions_table_head_line_second">15:00</td>
                                <td class="loyalty_block_conditions_table_head_line_third">18:00</td>
                            </tr>
                            <tr class="loyalty_block_conditions_table_head_line">
                                <td class="loyalty_block_conditions_table_head_line_first">Скидки на услуги химчистки</td>
                                <td class="loyalty_block_conditions_table_head_line_second">нет</td>
                                <td class="loyalty_block_conditions_table_head_line_third">10%</td>
                            </tr>
                            <tr class="loyalty_block_conditions_table_head_line loyalty_block_conditions_table_head_greyline">
                                <td class="loyalty_block_conditions_table_head_line_first">Скидки на парковку автомобиля</td>
                                <td class="loyalty_block_conditions_table_head_line_second">нет</td>
                                <td class="loyalty_block_conditions_table_head_line_third">25%</td>
                            </tr>
                        </thead>
                    </table>
                </div>
                <div class="loyalty_block_period">
                    <h1 class="loyalty_block_period_title">Преимущества программы лояльности</h1>
                    <div class="loyalty_block_period_bottom">
                        <div class="loyalty_block_period_bottom_left">
                           <p class="loyalty_block_period_bottom_left_txt">Карта начинает действовать с момента приобретения. Карта выдается сроком на 1 год.</p>
                           <p class="loyalty_block_period_bottom_left_txt">Окончание срока действия карты - последний день указанного на карте месяца.</p>
                           <p class="loyalty_block_period_bottom_left_txt">Карта действует только во время проживания гостя в гостинице.</p>
                           <p class="loyalty_block_period_bottom_left_txt">Возврат карты не предусмотрен условиями договора. «Заморозка» карты не предусмотрена условиями договора.</p>
                           <p class="loyalty_block_period_bottom_left_txt">
                            Суммирование скидок и привилегий карты с любыми другими специальными предложениями в гостинице не предусмотрено условиями договора.</p>
                        </div>
                        <img src="assets/images/Liberta_Honors.png" alt="" class="loyalty_block_period_bottom_right">
                    </div>
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