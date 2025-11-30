<?php
$filename = "counter.txt";

// Якщо файл не існує — створюємо і записуємо 0
if (!file_exists($filename)) {
    $file = fopen($filename, "w");
    fwrite($file, "0");
    fclose($file);
}

// Відкриваємо файл для читання
$file = fopen($filename, "r");

// Перевіряємо розмір файлу
$filesize = filesize($filename);

// Якщо файл порожній, кількість = 0, інакше читаємо
if ($filesize > 0) {
    $count = fread($file, $filesize);
} else {
    $count = 0;
}

fclose($file);

// Збільшуємо на 1
$count = (int)$count + 1;

// Відкриваємо файл для запису і оновлюємо значення
$file = fopen($filename, "w");
fwrite($file, $count);
fclose($file);

// Виводимо кількість
echo "Кількість переглядів сторінки: " . $count;
?>
