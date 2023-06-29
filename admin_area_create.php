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
        <section class="admin_create_section">
            <div class="container admin_create_section_block">
                <?php
                if (isset($_GET['table_name'])) {
                    $table_name = $_GET['table_name'];
                    echo "<form action='php-handler/create_line.php?table_name=$table_name' class='admin_create_section_block_form' method='post' enctype='multipart/form-data'>";
                        $show_columns = "SHOW COLUMNS FROM $table_name;"; 
                        $columns_result = mysqli_query($connect, $show_columns) or die(mysqli_error($connect));
                        while ($columns_row = mysqli_fetch_assoc($columns_result)) {
                            $columns_array[] = $columns_row;
                        } 
                        $index_col = 0;
                        $col_array = array();
                        foreach ($columns_array as $array){
                            $index_col++;
                            $col_array[$index_col] = $array['Field'];
                            if ($index_col > 1){
                                if($array['Field'] === 'image') {
                                    echo "<div class='admin_create_section_block_form_row'>
                                    <label class='admin_create_section_block_form_row_txt'>".$array['Field']."</label>
                                    <input type='file' class='admin_create_section_block_form_row_input' name='".$array['Field']."'>
                                </div>";
                                } else {
                                    echo "<div class='admin_create_section_block_form_row'>
                                    <label class='admin_create_section_block_form_row_txt'>".$array['Field']."</label>
                                    <input type='text' class='admin_create_section_block_form_row_input' name='".$array['Field']."'>
                                </div>";
                                }
                            }
                        }
                    }
                ?>
                    <button type="submit" class="admin_create_section_block_form_create">Добавить запись</button>
                </form>
            </div>
        </section>
    </main>
    <?php
        include "php-handler/admin_footer.php";
                }
    ?>
</body>
</html>