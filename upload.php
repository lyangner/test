<?php
/*Done by Helen Lianhner */

    include_once "function.php";
    pre($_POST);
    pre($_FILES);
    $user_name = $_POST["user_name"];
    $file = $_POST["file"];

    $allowtypes = ["image/png", "image/jpg", "image/jpeg"];
    $logs = [];

    if (in_array($_FILES['file']['type'], $allowtypes)) {
        $logs[] = 'test1 +';
    } else {
        $logs[] = 'test1 -';
        $error=true;
    }

    if ($_FILES['file']['error'] != UPLOAD_ERR_OK) {
        $logs[] = 'test2 -';
        $error=true;

    } else {
        $logs[] = 'test2 +';
    }
if ((isset($_POST['size']))&&($_POST['size'])) {
    $size = $_POST['size'];
}
else
{$size = 100000;
    echo 'Внимание! Вы не ввели размер файла. Автоматически максимальный размер файла будет равен '.$size;
}
    if (($_FILES['file']['size']) > $size) {
        $logs[] = 'test3 -';
        $error=true;
    } else {
        $logs[] = 'test3 +';
    }

    pre($logs);

$filePath1 = $_FILES['file']['tmp_name'];
    if (($error==true)|| (!is_uploaded_file($filePath1))) {

        for ($i = 0; $i <= 2; $i++) {
            switch ($logs[$i]) {
                case 'test1 -':
                    if ($_FILES['file']['name'] != '') {
                        echo 'Ошибка! Выберите другой тип файла!<br>';
                    }
                    break;
                case 'test2 -':
                    if ($_FILES['file']['name'] == '') {
                        echo 'Ошибка! Вы не выбрали файл!<br>  ';
                    }
                    else {
                        if (!is_uploaded_file($filePath1)) {
                            echo 'Ошибка! Повторите еще раз!<br>   ';
                        } else {
                            echo 'Ошибка! Повторите еще раз! <br>';
                        }
                    }
                    break;
                case 'test3 -':
                    echo 'Ошибка! Размер файла больше, чем ' . $size.'. Введите другой размер. <br>';
                    break;
            }
        }
    }
    else
    {
    $date = new \DateTime();
    $path = $_SERVER['CONTEXT_DOCUMENT_ROOT'] . '/uploads/' . $date->format('y/m/d/i/');

    if (!file_exists($path)) {
        mkdir($path, 777, true);
    }
  $name = $date->format('mdis');
    $name .= substr($_FILES['file']['name'], strrpos($_FILES['file']['name'], '.'));
    $from = $_FILES['file']['tmp_name'];
    $to = $path . $name;
    if (!file_exists($path . $name)) {
        // echo 'done!';
        copy($from, $to);
        echo "<b>Файл " . $name . " скопирован в папку " . $path."</b>";
    } else {
        echo '<b>Копирование не состоялось :(</b>';
    }
    }
?>