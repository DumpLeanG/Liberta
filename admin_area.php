<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="assets/css/main.css">
    <title>Liberta - Панель администратора</title>
</head>
<body>
    <?php
        session_start();
        include "php-connect/connect.php";

        if (isset($_SESSION['id_employee'])) {
            $IDemployee = $_SESSION['id_employee'];
            if ($IDemployee === '') {
                unset($IDemployee);
            }

        include "php-handler/admin_header.php";
    ?>
    <main>
        <section class="admin_section">
            <div class="container admin_section_block">
                <ul class="admin_section_block_list">
                    <?php
                        $show_tables = "SHOW FULL TABLES FROM hotel WHERE Table_Type != 'VIEW'"; 
                        $tables_result = mysqli_query($connect, $show_tables) or die(mysqli_error($connect));
                        while ($tables_row = mysqli_fetch_assoc($tables_result)) {
                            $tables_array[] = $tables_row;
                        } 
                        foreach ($tables_array as $array){
                            echo "<li class='admin_section_block_list_item'><a class='admin_section_block_list_item_link' href='?table_name=".$array['Tables_in_hotel']."'>".$array['Tables_in_hotel']."</a></li>";
                        }
                        echo "<br>";
                        $show_views = "SHOW FULL TABLES FROM hotel WHERE Table_Type = 'VIEW'"; 
                        $views_result = mysqli_query($connect, $show_views) or die(mysqli_error($connect));
                        while ($views_row = mysqli_fetch_assoc($views_result)) {
                            $views_array[] = $views_row;
                        } 
                        foreach ($views_array as $array){
                            echo "<li class='admin_section_block_list_item'><a class='admin_section_block_list_item_link' href='?view_name=".$array['Tables_in_hotel']."'>".$array['Tables_in_hotel']."</a></li>";
                        }
                    ?>
                </ul>
                        <?php
                            if (isset($_GET['table_name'])) {
                                echo "<div class='admin_section_block_table'>
                                    <div class='admin_section_block_table_row_title'>";
                                $table_name = $_GET['table_name'];
                                $show_columns = "SHOW COLUMNS FROM $table_name;"; 
                                $columns_result = mysqli_query($connect, $show_columns) or die(mysqli_error($connect));
                                while ($columns_row = mysqli_fetch_assoc($columns_result)) {
                                    $columns_array[] = $columns_row;
                                } 
                                $index_col = 0;
                                $col_array = array();
                                foreach ($columns_array as $array){
                                    echo "<div class='admin_section_block_table_row_title_cell'>
                                        <span class='admin_section_block_table_row_title_cell_txt'>".$array['Field']."</span>
                                    </div>";
                                    $index_col++;
                                    $col_array[$index_col] = $array['Field'];
                                }
                                echo "<div class='admin_section_block_table_row_title_cell'>
                                    <span class='admin_section_block_table_row_title_cell_txt'>Действие</span>
                                </div>
                            </div>";

                            include "php-handler/delete_line.php";

                                $select_info = "SELECT * FROM $table_name;"; 
                                $info_result = mysqli_query($connect, $select_info) or die(mysqli_error($connect));
                                while ($info_row = mysqli_fetch_assoc($info_result)) {
                                    $info_array[] = $info_row;
                                } 
                                foreach ($info_array as $arr){
                                    $index = 0;
                                    echo "<div class='admin_section_block_table_row'>";
                                    foreach ($columns_array as $array) {
                                        $index++;
                                        if($array['Field'] === 'image') {
                                        echo "<div class='admin_section_block_table_row_cell'>
                                            <span class='admin_section_block_table_row_cell_txt'><img src='assets/images/".$arr[$col_array[$index]]."' alt='' class='admin_section_block_table_row_cell_txt_img'></span>
                                        </div>";
                                        } else {
                                        echo "<div class='admin_section_block_table_row_cell'>
                                            <span class='admin_section_block_table_row_cell_txt'>".$arr[$col_array[$index]]."</span>
                                        </div>";
                                        }
                                    }
                                    $id_line = $arr[$col_array[1]];
                                    echo "<div class='admin_section_block_table_row_cell'>
                                            <div class='admin_section_block_table_row_cell_buttons'>
                                                <a href='admin_area_edit.php?table_name=$table_name&edit_id_line=$id_line' class='admin_section_block_table_row_cell_buttons_btn'><img src='assets/images/edit.svg' alt='' class='admin_section_block_table_row_cell_buttons_btn_img'></a>
                                                <a href='?table_name=$table_name&delete_id_line=$id_line' class='admin_section_block_table_row_cell_buttons_btn'><img src='assets/images/delete.svg' alt='' class='admin_section_block_table_row_cell_buttons_btn_img'></a>
                                            </div>
                                        </div>
                                    </div>";
                                }
                            echo "</div>
                            <a href='admin_area_create.php?table_name=$table_name' class='admin_section_block_create'>Добавить запись</a>";
                            } elseif (isset($_GET['view_name'])) {
                                echo "<div class='admin_section_block_table'>
                                    <div class='admin_section_block_table_row_title'>";
                                $view_name = $_GET['view_name'];
                                $show_columns = "SHOW COLUMNS FROM $view_name;"; 
                                $columns_result = mysqli_query($connect, $show_columns) or die(mysqli_error($connect));
                                while ($columns_row = mysqli_fetch_assoc($columns_result)) {
                                    $columns_array[] = $columns_row;
                                } 
                                $index_col = 0;
                                $col_array = array();
                                foreach ($columns_array as $array){
                                    echo "<div class='admin_section_block_table_row_title_cell'>
                                        <span class='admin_section_block_table_row_title_cell_txt'>".$array['Field']."</span>
                                    </div>";
                                    $index_col++;
                                    $col_array[$index_col] = $array['Field'];
                                }
                                echo "</div>";
                                $select_info = "SELECT * FROM $view_name;"; 
                                $info_result = mysqli_query($connect, $select_info) or die(mysqli_error($connect));
                                while ($info_row = mysqli_fetch_assoc($info_result)) {
                                    $info_array[] = $info_row;
                                } 
                                foreach ($info_array as $arr){
                                    $index = 0;
                                    echo "<div class='admin_section_block_table_row'>";
                                    foreach ($columns_array as $array) {
                                        $index++;
                                        if($array['Field'] === 'image') {
                                        echo "<div class='admin_section_block_table_row_cell'>
                                            <span class='admin_section_block_table_row_cell_txt'><img src='assets/images/".$arr[$col_array[$index]]."' alt='' class='admin_section_block_table_row_cell_txt_img'></span>
                                        </div>";
                                        } else {
                                        echo "<div class='admin_section_block_table_row_cell'>
                                            <span class='admin_section_block_table_row_cell_txt'>".$arr[$col_array[$index]]."</span>
                                        </div>";
                                        }
                                    }
                                echo "</div>";
                                }
                            echo "</div>";
                            }
                        ?>
                </div>
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
        </section>
    </main>
    <?php
        include "php-handler/admin_footer.php";
                }
    ?>
</body>
</html>