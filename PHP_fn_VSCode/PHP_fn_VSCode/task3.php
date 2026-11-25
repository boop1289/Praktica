<?php
declare(strict_types=1);
$products = [
    ['title' => 'Книга', 'price' => 500],
    ['title' => 'Рюкзак', 'price' => 2500],
    ['title' => 'Кружка', 'price' => 350],
    ['title' => 'Наушники', 'price' => 4200],
    ['title' => 'Блокнот', 'price' => 150],
];
$describe = fn(array $p): string => $p['title'] . ' — ' . $p['price'] . ' руб.';
$lines = array_map($describe, $products);
echo 'Товары:', PHP_EOL, implode(PHP_EOL, $lines), PHP_EOL;
$expensive = array_filter($products, fn($p) => $p['price'] > 1000);
echo 'Дороже 1000: ', implode(', ', array_map(fn($p) => $p['title'], $expensive)), PHP_EOL;
$total = array_reduce($products, fn($sum, $p) => $sum + $p['price'], 0);
echo 'Общая стоимость: ', $total, ' руб.', PHP_EOL;
$discounted = array_map(fn($p) => array_replace($p, ['price' => round($p['price'] * 0.85, 2)]), $products);
echo 'Скидка 15%:', PHP_EOL, implode(PHP_EOL, array_map($describe, $discounted)), PHP_EOL;
