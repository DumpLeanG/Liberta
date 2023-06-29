<header id="navbar"> <!--Шапка-->
        <div class="container"> <!--Блочный элемент с контейнером-->
            <nav class="menu"> <!--Элемент навигации для меню-->
                <span class="menu_close" onclick="closeBurgerMenu()"></span> <!--Строковый контейнер для закрытия выпадающего меню-->
                <ul class="menu_left"> <!--Список-->
                    <li class="menu_left_item"><a href="rooms.php" class="menu_left_item_link">НОМЕРА</a></li> <!--Элемент списка с ссылкой-->
                    <li class="menu_left_item"><a href="offers.php" class="menu_left_item_link">СПЕЦПРЕДЛОЖЕНИЯ</a></li>
                    <li class="menu_left_item"><a href="services.php" class="menu_left_item_link">УСЛУГИ</a></li>
                    <li class="menu_left_item"><a href="about.php" class="menu_left_item_link">О ГОСТИНИЦЕ</a></li>
                </ul> 
                <a href="index.php" class="menu_logo" id="menu_logo"></a><!--Ссылка для логотипа-->
                <ul class="menu_right">
                    <li class="menu_right_item"><a href="loyalty.php" class="menu_right_item_link">ПРОГРАММА ЛОЯЛЬНОСТИ</a></li>
                    <li class="menu_right_item"><a href="contacts.php" class="menu_right_item_link">КОНТАКТЫ</a></li>
                    <li class="menu_right_item"><a 
                    <?php if ((empty($_SESSION['id_guest'])) and (empty($_SESSION['id_employee']))){ 
                    ?>
                        onclick="openLoginForm()"
                    <?php } elseif(!empty($_SESSION['id_guest'])) {
                    ?>
                        href="personal_area.php"
                    <?php } else {
                    ?>
                        href="admin_area.php"
                    <?php
                    } ?> 
                    class="menu_right_item_link">ЛИЧНЫЙ КАБИНЕТ</a></li>
                </ul>
                <button class="menu_burger" onclick="openBurgerMenu()"></button><!--Кнопка для открытия выпадающего меню-->
                <ul class="menu_vertical">
                    <li class="menu_vertical_item"><a href="rooms.php" class="menu_vertical_item_link">НОМЕРА</a></li>
                    <li class="menu_vertical_item"><a href="offers.php" class="menu_vertical_item_link">СПЕЦПРЕДЛОЖЕНИЯ</a></li>
                    <li class="menu_vertical_item"><a href="services.php" class="menu_vertical_item_link">УСЛУГИ</a></li>
                    <li class="menu_vertical_item"><a href="about.php" class="menu_vertical_item_link">О ГОСТИНИЦЕ</a></li>
                    <li class="menu_vertical_item"><a href="loyalty.php" class="menu_vertical_item_link">ПРОГРАММА ЛОЯЛЬНОСТИ</a></li>
                    <li class="menu_vertical_item"><a href="contacts.php" class="menu_vertical_item_link">КОНТАКТЫ</a></li>
                    <li class="menu_vertical_item"><a onclick="openLoginForm()" class="menu_vertical_item_link">ЛИЧНЫЙ КАБИНЕТ</a></li> <!--Элемент для открытия формы авторизации-->
                </ul>
            </nav>
        </div>
    </header>
    <script src="assets/js/menu.js"></script>
    <script src="assets/js/scroll.js"></script>
    <script src="assets/js/burger.js"></script>