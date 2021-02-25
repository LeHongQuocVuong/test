<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Trang chủ</title>
</head>
<style>
    .box{
        width : 500px;
        height : 300px;
        background-color: #00bcd4;
    }
</style>
<body>

    <?php
        $HoTen = 'Vương';
        $Pass = '2134';
        echo '<h1 style="color: blue"> 1: Hello</h1>';
        echo '<h1 style="color: blue">2: Hello' . $HoTen . '</h1>';
        echo "<h1 style=\"color: blue\">3: $HoTen </h1>";


        
    ?>
    <div class="box">
        <h1> Xin chao <?php echo '4: '.$HoTen; ?></h1>
        <h1> Xin chao <?= '5: '.$HoTen ?> 
            <br>
            PassWord <?= '6: '.$Pass?>
        </h1>
    </div>
    <br>
    <a href="pages/about.php">Giới thiệu</a>
    <a href="pages/contact.php">Liên hệ</a>
</body>
</html>
