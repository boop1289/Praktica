<?php
declare(strict_types=1);
$students = [
    ['name' => 'Анна', 'grade' => 4.5],
    ['name' => 'Борис', 'grade' => 3.2],
    ['name' => 'Вера', 'grade' => 4.8],
    ['name' => 'Глеб', 'grade' => 2.9],
];
$alphabetical = $students;
usort($students, fn($a, $b) => $b['grade'] <=> $a['grade']);
$describe = fn($s) => $s['name'] . ': ' . $s['grade'];
echo 'Рейтинг:', PHP_EOL, implode(PHP_EOL, array_map($describe, $students)), PHP_EOL;
usort($alphabetical, fn($a, $b) => strcmp($a['name'], $b['name']));
echo 'По алфавиту:', PHP_EOL, implode(PHP_EOL, array_map($describe, $alphabetical)), PHP_EOL;
$greaterThan = fn($limit) => fn($student) => $student['grade'] > $limit;
$selected = array_filter($students, $greaterThan(4.0));
echo 'Оценка выше 4.0: ', implode(', ', array_map(fn($s) => $s['name'], $selected)), PHP_EOL;
echo 'Количество: ', count($selected), PHP_EOL;
