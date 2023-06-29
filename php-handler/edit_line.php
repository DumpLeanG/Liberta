<?php
    session_start();
    include "../php-connect/connect.php";
    if ((isset($_GET['table_name'])) and (isset($_GET['edit_id_line']))) {
        $table_name = $_GET['table_name'];
        $id_line = $_GET['edit_id_line'];
        $show_columns = "SHOW COLUMNS FROM $table_name;"; 
        $columns_result = mysqli_query($connect, $show_columns) or die(mysqli_error($connect));
        while ($columns_row = mysqli_fetch_assoc($columns_result)) {
            $columns_array[] = $columns_row;
        } 
        $index_col = 0;
        $col_array = array();
        $line = array();
        $update = "UPDATE $table_name SET";
        $attributes = "";
        $values = "";
        $data = "";
        $uploaddir = '../assets/images/';
        $apend=date('YmdHis').rand(100,1000).'.png';
        $uploadfile = "$uploaddir$apend";
        $uploadfile2 = "$apend";
        foreach ($columns_array as $array){
            $index_col++;
            $col_array[$index_col] = $array['Field'];
            if ($index_col > 1){
                if (isset($_POST[$array['Field']])) {
                    $line[$index_col] = $_POST[$array['Field']];
                    if($line[$index_col] === '') {
                        unset($line[$index_col]);
                    }
                }
                $line[$index_col] = trim($_POST[$array['Field']]);
            }
            if (($index_col > 1) and $col_array[$index_col] != 'image'){
                if (isset($_POST[$array['Field']])) {
                    $line[$index_col] = $_POST[$array['Field']];
                    if($line[$index_col] === '') {
                        unset($line[$index_col]);
                    }
                }
                $line[$index_col] = trim($_POST[$array['Field']]);
            } else if ($col_array[$index_col] === 'image') {
                $line[$index_col] = $uploadfile2;
            }
            if (($index_col > 1) and ($line[$index_col] != '')) {
                $attributes = "`".$col_array[$index_col]."`";
                $values = "'".$line[$index_col]."', ";
                $data = $data.$attributes." = ".$values;
            }
        }
        
        $data = rtrim($data, ", ");
        if (!isset($_FILES['image']['type'])) {
            $edit_line = $update." ".$data." WHERE $col_array[1] = '$id_line';";
            addslashes($edit_line);
            $edit_result = mysqli_query($connect, $edit_line) or die(mysqli_error($connect));

            header("location: ../admin_area.php?table_name=$table_name");
        }
        elseif(($_FILES['image']['type'] == 'image/gif' || $_FILES['image']['type'] == 'image/jpeg' || $_FILES['image']['type'] == 'image/png') && ($_FILES['image']['size'] !=0 and $_FILES['image']['size']<=5120000))
        {
            if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile)) {
                $size = getimagesize($uploadfile);

                $edit_line = $update." ".$data." WHERE $col_array[1] = '$id_line';";
                addslashes($edit_line);
                $edit_result = mysqli_query($connect, $edit_line) or die(mysqli_error($connect));

                header("location: ../admin_area.php?table_name=$table_name");
            } else {
                $_SESSION['message'] = 'ОШИБКА: Файл не загружен, попробуйте еще раз';
                header("location: ../admin_area.php?table_name=$table_name");
            }
        } else {
            $_SESSION['message'] = 'ОШИБКА: Размер файла не должен превышать 5120Кб';
            header("location: ../admin_area.php?table_name=$table_name");
        } 
    }
?>