function openBookings() { //Открытие моих бронирований
    document.querySelector(".personal_area_block_bottom_bookings").style.display = "flex"; //Изменение стиля элемента
    document.querySelector(".personal_area_block_bottom_form").style.display = "none";
    document.querySelector(".personal_area_block_bottom_loyalty").style.display = "none";
    document.getElementById("personal_area_form").classList.remove('personal_area_block_top_list_actual_item'); //Удаление класса
    document.getElementById("personal_area_bookings").classList.add('personal_area_block_top_list_actual_item'); //Добавления класса
    document.getElementById("personal_area_loyalty").classList.remove('personal_area_block_top_list_actual_item');
}
function openForm() { //Открытие личной информации
    document.querySelector(".personal_area_block_bottom_form").style.display = "flex";
    document.querySelector(".personal_area_block_bottom_bookings").style.display = "none";
    document.querySelector(".personal_area_block_bottom_loyalty").style.display = "none";
    document.getElementById("personal_area_form").classList.add('personal_area_block_top_list_actual_item');
    document.getElementById("personal_area_bookings").classList.remove('personal_area_block_top_list_actual_item');
    document.getElementById("personal_area_loyalty").classList.remove('personal_area_block_top_list_actual_item');
}
function openLoyalty() { //Открытие моей программы лояльности
    document.querySelector(".personal_area_block_bottom_loyalty").style.display = "flex";
    document.querySelector(".personal_area_block_bottom_form").style.display = "none";
    document.querySelector(".personal_area_block_bottom_bookings").style.display = "none";
    document.getElementById("personal_area_form").classList.remove('personal_area_block_top_list_actual_item');
    document.getElementById("personal_area_bookings").classList.remove('personal_area_block_top_list_actual_item');
    document.getElementById("personal_area_loyalty").classList.add('personal_area_block_top_list_actual_item');
}