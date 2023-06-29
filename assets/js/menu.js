const header = document.querySelector('header'); //Константа с выбором элемента
const left_links = document.querySelectorAll(".menu_left_item_link"); //Константа с массивом
const right_links = document.querySelectorAll(".menu_right_item_link"); 
const logo = document.querySelector(".menu_logo");
const burger = document.querySelector(".menu_burger");

window.addEventListener('scroll', () => { //Добавление ивента
    if (pageYOffset > 600) { //Если проскролено по высоте 600 пикселей то выполняются
        header.style.background = "#FAF6EF"; //Изменение стиля элемента
        for (let left_link of left_links) { //Для каждого элемента массива
            left_link.classList.add("active_menu_left_item_link"); //Добавления класса
            left_link.classList.remove("menu_left_item_link"); //Удаление класса
        }
        for (let right_link of right_links) {
            right_link.classList.add("active_menu_right_item_link");
            right_link.classList.remove("menu_right_item_link");
        }
        logo.classList.add("active_menu_logo");
        logo.classList.remove("menu_logo");
        burger.classList.add("active_menu_burger");
        burger.classList.remove("menu_burger");
    } else { //Если не проскролено по высоте 600 пикселей то выполняются
        header.style.background = "none";
        for (let left_link of left_links) {
            left_link.classList.remove("active_menu_left_item_link");
            left_link.classList.add("menu_left_item_link");
        }
        for (let right_link of right_links) {
            right_link.classList.remove("active_menu_right_item_link");
            right_link.classList.add("menu_right_item_link");
        }
        logo.classList.remove("active_menu_logo");
        logo.classList.add("menu_logo");
        burger.classList.remove("active_menu_burger");
        burger.classList.add("menu_burger");
    }
});