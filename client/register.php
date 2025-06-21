<?php
require_once '../config/database.php';
require_once '../incudes/auth.php';

if (!isClientLoggedIn()) {
    header('Location: login.php');
    exit();
}

$errors = [];
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $serial_number = mysqli_real_escape_string($mysqli, $_POST['serial_number']);
    $problem = mysqli_real_escape_string($mysqli, $_POST['problem']);

    $query = "SELECT id FROM purchases WHERE serial_number = '$serial_number'";
    $result = mysqli_query($mysqli, $query);

    if(mysqli_num_rows($result) > 0) {
        $purchase_id = mysqli_fetch_assoc($result)['id'];

        $query = "INSERT INTO appeals (purchase_id, date_appeal, problem)
                  VALUES ('$purchase_id', NOW(), '$problem')";

        if(mysqli_query($mysqli, $query)) {
            $errors[] = "Ошибка: " . mysqli_error($mysqli);
        } else {
            $success = "Обращение №" . mysqli_error($mysqli) . "зарегестрировано!";
        }
    } else {
        $errors[] = "Товар с таким серийным номером не найден!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Гарантийный ремонт</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<?php include '../includes/header.php'; ?>

<h2>Форма обращения</h2>

<?php if (!empty($errors)): ?>
    <div class="error">
        <?php foreach ($errors as $error): ?>
            <p><?= htmlspecialchars($error) ?></p>
        <?php endforeach; ?>
    </div>
<?php elseif (isset($success)): ?>
    <div class="success"><?= htmlspecialchars($success) ?></div>
<?php endif; ?>

<form method="POST">
    <label>
        Серийный номер:
        <input type="text" name="serial_number" required>
    </label>

    <label>
        Описание проблемы:
        <textarea name="problem" required></textarea>
    </label>

    <button type="submit">Отправить</button>
</form>

<?php include '../includes/footer.php'; ?>
</body>
</html>
