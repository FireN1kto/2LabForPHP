<?php
$arrayX = array(0,20,1,19,5,8,3);
$arrayY = array(0,7,1,15,5,9,3);
echo "Массив целых чисел X:";
print_r ($arrayX);
echo "<br><br>";
echo "Массив целых чисел Y:";
print_r ($arrayY);
function hasNoEvenDigits($num) {
    while ($num > 0) {
        $digit = $num % 10;
        if ($digit % 2 === 0) {
            return false;
        }
        $num = (int)($num / 10);
    }
    return true;
}

rsort($arrayX);
$ThreeMax = array_slice($arrayX, 0, 3);
$filteredY = array_filter($arrayY, 'hasNoEvenDigits');

$arrayZ = array_merge($ThreeMax, $filteredY);
$arrayZ = array_unique($arrayZ);
?>
<div>
    <h2>Результат вывода</h2>
    <table>
        <tr>
            <th>Десятичный</th>
            <th>Восьмеричный</th>
        </tr>
        <?php foreach ($arrayZ as $num): ?>
            <tr>
                <td><?= $num ?></td>
                <td><?= decoct($num) ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>

<style>
    table {
        border-collapse: collapse;
        width: 40%;
        margin-top: 20px;
    }

    th, td {
        border: 1px solid #ccc;
        padding: 8px;
        text-align: center;
    }

    th {
        background-color: #eee;
    }
</style>
