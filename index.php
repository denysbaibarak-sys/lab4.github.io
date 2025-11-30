<?php
$filename = "counter.txt";


if (!file_exists($filename)) {
    $file = fopen($filename, "w");
    fwrite($file, "0");
    fclose($file);
}


$file = fopen($filename, "r");


$filesize = filesize($filename);


if ($filesize > 0) {
    $count = fread($file, $filesize);
} else {
    $count = 0;
}

fclose($file);


$count = (int)$count + 1;


$file = fopen($filename, "w");
fwrite($file, $count);
fclose($file);

// Виводимо кількість
echo "Кількість переглядів сторінки: " . $count;
?>
