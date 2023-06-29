<?php
    if (isset($_GET['delete_id_line']))
    {
        $delete_id = $_GET['delete_id_line'];
        $id_name = $col_array['1'];
        $delete_line = "DELETE FROM $table_name WHERE $id_name = $delete_id";
        addslashes($delete_line);
        $delete_result = mysqli_query($connect, $delete_line) or die(mysqli_error($connect));
    }
?>