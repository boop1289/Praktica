<?php
declare(strict_types=1);
$orders = [
    ['id' => 1, 'customer' => 'Иван', 'total' => 1200, 'status' => 'done'],
    ['id' => 2, 'customer' => 'Мария', 'total' => 800, 'status' => 'new'],
    ['id' => 3, 'customer' => 'Пётр', 'total' => 3500, 'status' => 'done'],
    ['id' => 4, 'customer' => 'Анна', 'total' => 600, 'status' => 'cancelled'],
    ['id' => 5, 'customer' => 'Олег', 'total' => 2100, 'status' => 'done'],
];
$done = array_filter($orders, fn($o) => $o['status'] === 'done');
$revenue = array_reduce($done, fn($sum, $o) => $sum + $o['total'], 0);
$describe = fn($o) => "Заказ №{$o['id']} — {$o['total']} руб. ({$o['customer']})";
$large = array_filter($orders, fn($o) => $o['total'] > 1000);
$sorted = $done;
usort($sorted, fn($a, $b) => $b['total'] <=> $a['total']);
$customers = array_values(array_unique(array_map(fn($o) => $o['customer'], $orders)));
$cancelled = array_filter($orders, fn($o) => $o['status'] === 'cancelled');
echo 'Выручка: ', $revenue, ' руб.', PHP_EOL;
echo 'Заказы свыше 1000:', PHP_EOL, implode(PHP_EOL, array_map($describe, $large)), PHP_EOL;
echo 'Самый дорогой выполненный: ', isset($sorted[0]) ? $describe($sorted[0]) : 'Нет заказов', PHP_EOL;
echo 'Клиенты: ', implode(', ', $customers), PHP_EOL;
echo 'Статистика:', PHP_EOL;
echo 'Всего: ', count($orders), PHP_EOL;
echo 'Выполнено: ', count($done), PHP_EOL;
echo 'Отменено: ', count($cancelled), PHP_EOL;
echo 'Сумма выручки: ', $revenue, ' руб.', PHP_EOL;
