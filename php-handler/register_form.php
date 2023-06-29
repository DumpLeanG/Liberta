<div class="form_box" id="register_form">
        <form action="php-handler/reg.php" class="form_box_register" method="post"><!--Форма регистрации-->
            <div class="form_box_register_header">
                <h2 class="form_box_register_header_title" onclick="openLoginForm()">Вход</h2>
                <h2 class="form_box_register_header_title form_box_register_header_current_title" onclick="openRegisterForm()">Регистрация</h2>
                <button class="form_box_register_header_close" type="button" onclick="closeForm()"><img src="assets/images/cross.svg" alt="" class="form_box_register_header_close_img"></button>
            </div>
            <div class="form_box_register_block">
                <div class="form_box_register_block_item">
                    <label  class="form_box_register_block_item_label">Электронный адрес</label>
                    <input type="email" name="email_address" class="form_box_register_block_item_input" required>
                </div>
                <div class="form_box_register_block_item">
                    <label  class="form_box_register_block_item_label">Номер телефона</label>
                    <input type="tel" name="phone_number" class="form_box_register_block_item_input" id="phone_number" required><!--Поле для ввода номера телефона-->
                </div>
                <div class="form_box_register_block_items">
                    <div class="form_box_register_block_items_block">
                        <label   class="form_box_register_block_items_block_label">Фамилия</label>
                        <input type="text" name="second_name" class="form_box_register_block_items_block_input" required><!--Поле для ввода текста-->
                    </div>
                    <div class="form_box_register_block_items_block">
                        <label   class="form_box_register_block_items_block_label">Имя</label>
                        <input type="text" name="first_name" class="form_box_register_block_items_block_input" required>
                    </div>
                </div>
                <div class="form_box_register_block_items">
                    <div class="form_box_register_block_items_block">
                        <label   class="form_box_register_block_items_block_label">Пароль</label>
                        <input type="password" name="password" class="form_box_register_block_items_block_input" required><!--Поле для ввода текста-->
                    </div>
                    <div class="form_box_register_block_items_block">
                        <label   class="form_box_register_block_items_block_label">Подтв. пароля</label>
                        <input type="password" name="confirm_password" class="form_box_register_block_items_block_input" required>
                    </div>
                </div>
                <button class="form_box_register_block_btn" type="submit" id="register_btn">Регистрация</button>
            </div>
        </form>
    </div>