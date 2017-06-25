<?
$uploaddir = 'F:\OpenServer\OpenServer\domains\studway\img\watson\\';
$uploadfile = $uploaddir.basename($_FILES['file']['name']);
$a = resize($_FILES['file']);
if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile))
{
    echo "gc";
}

function resize($file, $type = 1, $rotate = null, $quality = null)
{
    global $tmp_path;

    // Ограничение по высоте в пикселях
    $max_thumb_size = 210;
    $max_size = 600;

    // Качество изображения по умолчанию
    if ($quality == null)
        $quality = 75;

    // Cоздаём исходное изображение на основе исходного файла
    if ($file['type'] == 'image/jpeg')
        $source = imagecreatefromjpeg($file['tmp_name']);
    elseif ($file['type'] == 'image/png')
        $source = imagecreatefrompng($file['tmp_name']);
    elseif ($file['type'] == 'image/gif')
        $source = imagecreatefromgif($file['tmp_name']);
    else
        return false;

    // Поворачиваем изображение
    if ($rotate != null)
        $src = imagerotate($source, $rotate, 0);
    else
        $src = $source;

    // Определяем ширину и высоту изображения
    $w_src = imagesx($src);
    $h_src = imagesy($src);

    // В зависимости от типа (эскиз или большое изображение) устанавливаем ограничение по высоте.
    if ($type == 1)
        $h = $max_thumb_size;
    elseif ($type == 2)
        $h = $max_size;

    // Если высота больше заданной
    if ($h_src > $h)
    {
        // Вычисление пропорций
        $ratio = $h_src/$h;
        $w_dest = round($w_src/$ratio);
        $h_dest = round($h_src/$ratio);

        // Создаём пустую картинку
        $dest = imagecreatetruecolor($w_dest, $h_dest);

        // Копируем старое изображение в новое с изменением параметров
        imagecopyresampled($dest, $src, 0, 0, 0, 0, $w_dest, $h_dest, $w_src, $h_src);

        // Вывод картинки и очистка памяти
        imagejpeg($dest, "F:\OpenServer\OpenServer\domains\studway\img\load\\".$tmp_path ."small". $file['name'], $quality);
        imagedestroy($dest);
        imagedestroy($src);

        return $file['name'];
    }
    else
    {
        // Вывод картинки и очистка памяти
        imagejpeg($src, "F:\OpenServer\OpenServer\domains\studway\img\load\\".$tmp_path . $file['name'], $quality);
        imagedestroy($src);

        return $file['name'];
    }
}

?>
<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/photobox.css">
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src='js/jquery.photobox.js'></script>
    <link rel="stylesheet" href="css/style.css">

</head>
<body>
<form action="test.php" method="post" enctype="multipart/form-data">
    <div class="file_div"><input type="file" class="file" name="file"></div>
    <input type="submit" name="btn">
</form>
<pre>
    <?
    var_dump($_POST);
    var_dump($_FILES);




    ?>
</body>