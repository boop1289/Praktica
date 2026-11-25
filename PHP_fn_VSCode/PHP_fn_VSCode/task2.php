<?php
declare(strict_types=1);
$discount = 0.9;
$applyDiscount = fn(float $price): float => $price * $discount;
echo '1000 со скидкой: ', $applyDiscount(1000), PHP_EOL;
echo '500 со скидкой: ', $applyDiscount(500), PHP_EOL;
echo '200 со скидкой: ', $applyDiscount(200), PHP_EOL;
$discount = 0.5;
// fn захватывает значение при создании: внутри осталось 0.9.
echo '1000 после изменения discount: ', $applyDiscount(1000), PHP_EOL;
$rate = 90;
// Новый обработчик захватывает текущие значения: 0.5 и 90.
$toRubles = fn(float $price): float => $price * $discount * $rate;
echo '20 у.е. со скидкой в рублях: ', $toRubles(20), PHP_EOL;
