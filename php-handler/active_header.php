<header id="navbar" class="active_header">
        <div class="container">
            <nav class="active_menu">
                <ul class="active_menu_left">
                    <li class="active_menu_left_item"><a href="rooms.php" class="active_menu_left_item_link">НОМЕРА</a></li>
                    <li class="active_menu_left_item"><a href="offers.php" class="active_menu_left_item_link">СПЕЦПРЕДЛОЖЕНИЯ</a></li>
                    <li class="active_menu_left_item"><a href="services.php" class="active_menu_left_item_link">УСЛУГИ</a></li>
                    <li class="active_menu_left_item"><a href="about.php" class="active_menu_left_item_link">О ГОСТИНИЦЕ</a></li>
                </ul> 
                <a href="index.php" class="active_menu_logo" id="menu_logo"></a>
                <ul class="active_menu_right">
                    <li class="active_menu_right_item"><a href="loyalty.php" class="active_menu_right_item_link">ПРОГРАММА ЛОЯЛЬНОСТИ</a></li>
                    <li class="active_menu_right_item"><a href="contacts.php" class="active_menu_right_item_link">КОНТАКТЫ</a></li>
                    <li class="active_menu_right_item"><a 
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
                    class="active_menu_right_item_link">ЛИЧНЫЙ КАБИНЕТ</a></li>
                </ul>
                <button class="active_menu_burger" onclick="openBurgerMenu()"></button>
                <ul class="menu_vertical">
                    <li class="menu_vertical_item"><a href="rooms.php" class="menu_vertical_item_link">НОМЕРА</a></li>
                    <li class="menu_vertical_item"><a href="offers.php" class="menu_vertical_item_link">СПЕЦПРЕДЛОЖЕНИЯ</a></li>
                    <li class="menu_vertical_item"><a href="services.php" class="menu_vertical_item_link">УСЛУГИ</a></li>
                    <li class="menu_vertical_item"><a href="about.php" class="menu_vertical_item_link">О ГОСТИНИЦЕ</a></li>
                    <li class="menu_vertical_item"><a href="loyalty.php" class="menu_vertical_item_link">ПРОГРАММА ЛОЯЛЬНОСТИ</a></li>
                    <li class="menu_vertical_item"><a href="contacts.php" class="menu_vertical_item_link">КОНТАКТЫ</a></li>
                    <li class="menu_vertical_item"><a onclick="openLoginForm()" class="menu_vertical_item_link">ЛИЧНЫЙ КАБИНЕТ</a></li>
                </ul>
                <span class="menu_close" onclick="closeBurgerMenu()"></span>
            </nav>
        </div>
    </header>
    <script src="assets/js/scroll.js"></script>
    <script src="assets/js/burger.js"></script>