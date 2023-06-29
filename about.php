<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <link rel="stylesheet" type="text/css" href="assets/css/main.css">
    <title>Liberta - О гостинице</title>
</head>
<body>
    <?php
        session_start();
        include "php-connect/connect.php";
        include "php-handler/header.php"
    ?>
    <main>
        <section class="start about_start">
            <div class="container start_block">
                <h1 class="start_block_title">Пятизвездочный отель Москвы Liberta</h1>
                <span class="start_block_txt">Liberta - это идеальное место для романтического уикенда, семейного отдыха или деловой встречи в самом сердце города.</span>
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
        <section class="about">
            <div class="container about_block">
                <div class="about_block_photos">
                    <img src="assets/images/О_гостинице_фотки.png" alt="" class="about_block_photos_img">
                    <div class="about_block_photos_textblock">
                        <div class="about_block_photos_textblock_item">
                            <span class="about_block_photos_textblock_item_number">100</span>
                            <span class="about_block_photos_textblock_item_category">Номеров</span>
                            <span class="about_block_photos_textblock_item_txt">c элегантным интерьером</span>
                        </div>
                        <div class="about_block_photos_textblock_item">
                            <span class="about_block_photos_textblock_item_number">10</span>
                            <span class="about_block_photos_textblock_item_category">Залов</span>
                            <span class="about_block_photos_textblock_item_txt">для конференций и деловых встреч</span>
                        </div>
                    </div>
                </div>
                <div class="about_block_text">
                    <h1 class="about_block_text_title">О гостинице</h1>
                    <p class="about_block_text_txt">Гостиница Liberta - это особенное место, расположенное в Москве, на улице Вильгельма Пика, 16. Ее история начинается в конце XIX века, когда на этом месте было построено здание в стиле неоклассицизма.
                    </p>
                    <p class="about_block_text_txt">В 2010 году здание было приобретено и полностью реконструировано. Сегодня гостиница Liberta - это искусно сочетающийся простор и уют, стиль и комфорт, красота и функциональность.
                    </p>
                    <p class="about_block_text_txt">Гостиница предлагает своим гостям 100 номеров различных категорий. Внутренний интерьер гостиницы выполнен в современном стиле, который способен придать комнатам изысканность и роскошь. Все номера оборудованы современной мебелью, телевизором с плоским экраном, кондиционерами и бесплатным Wi-Fi.
                    </p>
                    <p class="about_block_text_txt">В гостинице также есть уютный ресторан, где можно отдохнуть после насыщенного дня и насладиться напитками и блюдами европейской, азиатской и национальной кухни. На завтрак гостиница предлагает разнообразные блюда сытного завтрака включенные в стоимость номера.
                    </p>
                    <p class="about_block_text_txt">Если вы путешествуете в рабочих целях, гостиница Liberta предоставит вам комфортабельный конференц-зал вместимостью до 50 человек и с доступом к интернету.
                    </p>
                    <p class="about_block_text_txt">Гостиница Liberta - идеальное место для проведения романтических уик-эндов, деловых командировок и длительных путешествий в Москву. Расположение гостиницы рядом с основными достопримечательностями, метро и транспортными магистралями обеспечивает быстрый доступ ко многим местам.
                    </p>
                </div>
                <div class="about_block_conditions">
                    <h1 class="about_block_conditions_title">Условия проживания</h1>
                    <p class="about_block_conditions_txt">При регистрации заезда гостям из России необходимо предъявить оригинал внутреннего паспорта гражданина Российской Федерации. Заграничные паспорта не принимаются.
                    </p>
                    <p class="about_block_conditions_txt">Согласно Постановлению Правительства РФ от 18.11.2020 N 1853 (ред. от 01.04.2021) в случае непредоставления документов, отель имеет право отказать в предоставлении услуги проживания.
                    </p>
                    <p class="about_block_conditions_txt">Убедительно просим воздержаться от курения в вашем номере и местах общего пользования в соответствии с законодательством Российской Федерации.
                    </p>
                    <p class="about_block_conditions_txt">В отеле предусмотрена возможность проживания с небольшими животными (только кошки и собаки до 8 кг с предоставлением ветеринарного паспорта). Стоимость – 5 000 рублей за весь период проживания и 10 000 рублей – внесение возвратного депозита.
                    </p>
                </div>
                <ul class="about_block_list">
                    <li class="about_block_list_item"><img src="assets/images/награда_1.png" alt="" class="about_block_list_item_img"></li>
                    <li class="about_block_list_item"><img src="assets/images/награда_2.png" alt="" class="about_block_list_item_img"></li>
                    <li class="about_block_list_item"><img src="assets/images/награда_3.png" alt="" class="about_block_list_item_img"></li>
                    <li class="about_block_list_item"><img src="assets/images/награда_4.png" alt="" class="about_block_list_item_img"></li>
                    <li class="about_block_list_item"><img src="assets/images/награда_5.png" alt="" class="about_block_list_item_img"></li>
                    <li class="about_block_list_item"><img src="assets/images/награда_6.png" alt="" class="about_block_list_item_img"></li>
                    <li class="about_block_list_item"><img src="assets/images/награда_7.png" alt="" class="about_block_list_item_img"></li>
                    <li class="about_block_list_item"><img src="assets/images/награда_8.png" alt="" class="about_block_list_item_img"></li>
                    <li class="about_block_list_item"><img src="assets/images/награда_9.png" alt="" class="about_block_list_item_img"></li>
                    <li class="about_block_list_item"><img src="assets/images/награда_10.png" alt="" class="about_block_list_item_img"></li>
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