function openLoginForm() { //Функция открытия формы авторизации
    document.getElementById("login_form").style.display = "block"; //Изменение стиля элемента
    document.getElementById("register_form").style.display = "none";
    document.getElementById("password_form").style.display = "none";
}
function closeForm() { //Функция закрытия формы
    document.getElementById("login_form").style.display = "none";
    document.getElementById("register_form").style.display = "none";
    document.getElementById("password_form").style.display = "none";
}
function openRegisterForm() { //Функция открытия формы регистрации
    document.getElementById("register_form").style.display = "block";
    document.getElementById("login_form").style.display = "none";
    document.getElementById("password_form").style.display = "none";
}
function openPasswordForm() { //Функция открытия формы восстановления пароля
    document.getElementById("password_form").style.display = "block";
    document.getElementById("login_form").style.display = "none";
    document.getElementById("register_form").style.display = "none";
}
