<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <link rel="stylesheet" type="text/css" href="assets/css/main.css">
    <title>Liberta - Спецпредложение</title>
</head>
<body>
    <?php
        session_start();
        include "php-connect/connect.php";
        include "php-handler/active_header.php"
    ?>
    <main>
        <section class="offer">
            <div class="container offer_block">
            <?php
                $id_special_offer = $_GET['id_special_offer'];
                $select_offers = "SELECT * FROM special_offers WHERE id_special_offer = '$id_special_offer';";
                $offers_result = mysqli_query($connect, $select_offers) or die(mysqli_error($connect));
                $offers_row = mysqli_fetch_array($offers_result);

                echo "<img src='assets/images/".$offers_row['image']."' alt='' class='offer_block_img'>
                <h1 class='offer_block_title'>".$offers_row['name']."</h1>
                <span class='offer_block_txt'>".$offers_row['short_description']."</span>
                <p class='offer_block_rules'>".$offers_row['description']."</p>
                <a href='booking.php' class='offer_block_btn'>Забронировать</a>";
            ?>
            </div>
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