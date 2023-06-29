<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <link rel="stylesheet" type="text/css" href="assets/css/main.css">
    <title>Liberta - Услуга</title>
</head>
<body>
    <?php
        session_start();
        include "php-connect/connect.php";
        include "php-handler/active_header.php"
    ?>
    <main>
        <section class="service">
            <div class="container service_block">
            <?php
                $id_service = $_GET['id_service'];
                $select_services = "SELECT * FROM services WHERE id_service = '$id_service';";
                $services_result = mysqli_query($connect, $select_services) or die(mysqli_error($connect));
                $services_row = mysqli_fetch_array($services_result);
                if($services_row['name'] === 'Ресторан') {
                    echo "<div class='service_block_left'>
                        <div class='service_block_left_textbox'>
                            <h1 class='service_block_left_textbox_title'>".$services_row['name']."</h1>
                            <div class='service_block_left_textbox_features'>
                                <div class='service_block_left_textbox_features_block'>
                                    <span class='service_block_left_textbox_features_block_title'>РАСПОЛОЖЕНИЕ</span>
                                    <span class='service_block_left_textbox_features_block_txt'>".$services_row['floor']." этаж</span>
                                </div>
                                <div class='service_block_left_textbox_features_block'>
                                    <span class='service_block_left_textbox_features_block_title'>ЧАСЫ РАБОТЫ</span>
                                    <span class='service_block_left_textbox_features_block_txt'>Ежедневно с ".$services_row['opening_time']." до ".$services_row['closing_time']."</span>
                                </div>
                            </div>
                            <p class='service_block_left_textbox_txt'>".$services_row['short_description']."</p>
                        </div>
                        <div class='service_block_left_pdfs'>
                            <a href='#' class='service_block_left_pdfs_link'>
                                <span class='service_block_left_pdfs_link_txt'>Барная карта</span>
                                <img src='assets/images/барная_карта.png' alt='' class='service_block_left_pdfs_link_img'>
                            </a>
                            <a href='#' class='service_block_left_pdfs_link'>
                                <span class='service_block_left_pdfs_link_txt'>Меню</span>
                                <img src='assets/images/меню.png' alt='' class='service_block_left_pdfs_link_img'>
                            </a>
                        </div>
                    </div>
                    <div class='service_block_right'>
                        <img src='assets/images/".$services_row['image']."' alt='' class='service_block_right_img'>
                        <div class='service_block_right_block'>
                            <img src='assets/images/".$services_row['image']."' alt='' class='service_block_right_block_img service_block_right_block_actual_img'>
                            <img src='assets/images/".$services_row['image']."' alt='' class='service_block_right_block_img'>
                            <img src='assets/images/".$services_row['image']."' alt='' class='service_block_right_block_img'>
                            <img src='assets/images/".$services_row['image']."' alt='' class='service_block_right_block_img'>
                            <img src='assets/images/".$services_row['image']."' alt='' class='service_block_right_block_img'>
                        </div>
                    </div>
                    <div class='service_block_bottom'>
                        <p class='service_block_bottom_txt'>".$services_row['description']."</p>
                    </div>";
                } else {
                    echo "<div class='service_block_left'>
                        <div class='service_block_left_textbox'>
                            <h1 class='service_block_left_textbox_title'>".$services_row['name']."</h1>
                            <div class='service_block_left_textbox_features'>
                                <div class='service_block_left_textbox_features_block'>
                                    <span class='service_block_left_textbox_features_block_title'>РАСПОЛОЖЕНИЕ</span>
                                    <span class='service_block_left_textbox_features_block_txt'>".$services_row['floor']." этаж</span>
                                </div>
                                <div class='service_block_left_textbox_features_block'>
                                    <span class='service_block_left_textbox_features_block_title'>ЧАСЫ РАБОТЫ</span>
                                    <span class='service_block_left_textbox_features_block_txt'>Ежедневно с ".$services_row['opening_time']." до ".$services_row['closing_time']."</span>
                                </div>
                            </div>
                            <p class='service_block_left_textbox_txt'>".$services_row['short_description']."</p>
                        </div>
                    </div>
                    <div class='service_block_right'>
                        <img src='assets/images/".$services_row['image']."' alt='' class='service_block_right_img'>
                        <div class='service_block_right_block'>
                            <img src='assets/images/".$services_row['image']."' alt='' class='service_block_right_block_img service_block_right_block_actual_img'>
                            <img src='assets/images/".$services_row['image']."' alt='' class='service_block_right_block_img'>
                            <img src='assets/images/".$services_row['image']."' alt='' class='service_block_right_block_img'>
                            <img src='assets/images/".$services_row['image']."' alt='' class='service_block_right_block_img'>
                            <img src='assets/images/".$services_row['image']."' alt='' class='service_block_right_block_img'>
                        </div>
                    </div>
                    <div class='service_block_bottom'>
                        <p class='service_block_bottom_txt'>".$services_row['description']."</p>
                    </div>";
                }
            ?>
        </section>
    </main>
    <?php
        include "php-handler/footer.php";
        include "php-handler/login_form.php";
        include "php-handler/register_form.php";
        include "php-handler/password_form.php";
    ?>
</body>
</html>