var prevScrollpos = window.pageYOffset; //Задание переменной с расположением экрана
window.onscroll = function() { //Функция для скрытия меню при скроллинге
var currentScrollPos = window.pageYOffset; //Задание переменной с расположением экрана
if (prevScrollpos > currentScrollPos) { //Если первая переменная больше второй то выполняется
document.getElementById("navbar").style.top = "0"; //Изменение стиля элемента
} else {
document.getElementById("navbar").style.top = "-160px";
document.querySelector('.menu_vertical').style.display = "none";
}
prevScrollpos = currentScrollPos; //Первая переменная равна второй
}