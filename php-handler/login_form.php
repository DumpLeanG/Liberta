<div class="form_box" id="login_form">
        <form action="php-handler/auth.php" class="form_box_login" method="post"><!--Форма авторизации-->
            <div class="form_box_login_header">
                <h2 class="form_box_login_header_title form_box_login_header_current_title">Вход</h2>
                <h2 class="form_box_login_header_title" onclick="openRegisterForm()">Регистрация</h2>
                <button class="form_box_login_header_close" type="button" onclick="closeForm()"><img src="assets/images/cross.svg" alt="" class="form_box_login_header_close_img"></button>
            </div>
            <div class="message">
                <?php
                    if (isset($_SESSION['message'])) {
                        echo '<p class="message_txt">' . $_SESSION['message'] . '</p>'; 
                    } else {
                        echo ' ';
                    }
                    unset($_SESSION['message']);
                ?>
            </div>
            <div class="form_box_login_block">
                <div class="form_box_login_block_item">
                    <label  class="form_box_login_block_item_label">Электронный адрес</label>
                    <input type="email" name="email_address" class="form_box_login_block_item_input" required><!--Поле для ввода почты-->
                </div>
                <div class="form_box_login_block_item">
                    <label  class="form_box_login_block_item_label">Пароль</label>
                    <input type="password" name="password" class="form_box_login_block_item_input" required><!--Поле для ввода пароля-->
                </div>
                <!--<button class="form_box_login_block_btn" type="submit" id="login_btn">Войти</button>-->
                <div class="g-recaptcha" data-sitekey="6LdRA9YmAAAAANy9OTOmqD8bECVbnauwCTceoZl8" style="margin-bottom: 30px;"></div>
                <input type="submit" class="form_box_login_block_btn" id="login_btn">
                <a class="form_box_login_block_password_link" onclick="openPasswordForm()">Забыли пароль</a>
            </div>
        </form>
</div>
    <script src="assets/js/modal_script.js"></script><!--Скрипт с ссылкой на файл js-->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.2.1/dist/jquery.min.js" type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery.maskedinput@1.4.1/src/jquery.maskedinput.min.js" type="text/javascript"></script>
    <script src="assets/js/mask.js"></script>