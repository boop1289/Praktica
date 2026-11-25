<?php
declare(strict_types=1);
$square = fn(float $x): float => $x ** 2;
$isEven = fn(int $x): bool => $x % 2 === 0;
$greet = fn(string $name): string => "Привет, $name!";
$max = fn(float $a, float $b): float => $a > $b ? $a : $b;
// Классический вариант: $square = function(float $x): float { return $x ** 2; };
// fn короче: не нужны фигурные скобки и return.
echo 'Квадрат 4: ', $square(4), PHP_EOL;
echo 'Квадрат 7: ', $square(7), PHP_EOL;
echo '6 чётное: ', $isEven(6) ? 'true' : 'false', PHP_EOL;
echo '9 чётное: ', $isEven(9) ? 'true' : 'false', PHP_EOL;
echo $greet('Иван'), PHP_EOL, $greet('Анна'), PHP_EOL;
echo 'Максимум (5, 8): ', $max(5, 8), PHP_EOL;
echo 'Максимум (12, 3): ', $max(12, 3), PHP_EOL;
