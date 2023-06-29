const menu_header = document.querySelector('header'); //Константа с выбором элемента
const menu_left_links = document.querySelectorAll(".menu_left_item_link");
const menu_right_links = document.querySelectorAll(".menu_right_item_link"); //Константа с массивом
const menu_logo = document.querySelector(".menu_logo");
const menu_burger = document.querySelector(".menu_burger");

function openBurgerMenu() { //Функция открытия выпадающего меню
    document.querySelector(".menu_vertical").style.display = "block"; //Изменения стиля элемента
    document.querySelector(".menu_close").style.display = "block";
    if (document.getElementById('menu_logo').classList.contains('menu_logo')) //Условие если у элемента есть класс то выполняются следующие команды
    {
        menu_header.style.background = "#FAF6EF"; 
        for (let menu_left_link of menu_left_links) { //Для каждого элемента массива
            menu_left_link.classList.add("active_menu_left_item_link"); //Добавления класса
        }
        for (let menu_right_link of menu_right_links) {
            menu_right_link.classList.add("active_menu_right_item_link");
        }
        menu_logo.classList.add("active_menu_logo");
        menu_burger.classList.add("active_menu_burger");
    }   
}
function closeBurgerMenu() {
    document.querySelector(".menu_vertical").style.display = "none";
    document.querySelector(".menu_close").style.display = "none";
    if (document.getElementById('menu_logo').classList.contains('menu_logo'))
    {
        menu_header.style.background = "none";
        for (let menu_left_link of menu_left_links) {
            menu_left_link.classList.remove("active_menu_left_item_link"); //Удаление класса
        }
        for (let menu_right_link of menu_right_links) {
            menu_right_link.classList.remove("active_menu_right_item_link");
        }
        menu_logo.classList.remove("active_menu_logo");
        menu_burger.classList.remove("active_menu_burger");
    }   
}
