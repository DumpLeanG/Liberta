<?php
    $select_employee = "SELECT * FROM `employees` WHERE id_employee = '$IDemployee'";
    addslashes($select_employee);
    $employee_result = mysqli_query($connect, $select_employee) or die(mysqli_error($connect));
    $info_employee = mysqli_fetch_object($employee_result);
?>
    
    <header id="navbar" class="admin_header">
        <div class="container">
            <nav class="admin_menu">
                <ul class="admin_menu_left">
                    <li class="admin_menu_left_item"><a href="admin_area.php" class="admin_menu_left_item_link">Панель администратора</a></li>
                </ul> 
                <span class="admin_menu_name"><?php echo $info_employee->second_name." ".$info_employee->first_name." ".$info_employee->patronymic; ?></span>
                <ul class="admin_menu_right">
                    <li class="admin_menu_right_item"><a href="php-handler/session_exit.php" class="admin_menu_right_item_link">Выйти</a></li>
                </ul>
            </nav>
        </div>
    </header>