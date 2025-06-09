<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $judul = $_POST['judul'];
    $konten = $_POST['konten'];

    $sql = "UPDATE notes SET judul=?, konten=? WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssi", $judul, $konten, $id);
    $stmt->execute();

    header("Location: index.php");
    exit;
}

$id = $_GET['id'];
$sql = "SELECT * FROM notes WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$note = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Tugas</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <h1>Edit Tugas</h1>
    <form action="update.php" method="POST">
        <input type="hidden" name="id" value="<?= $note['id'] ?>">
        <input type="text" name="judul" value="<?= htmlspecialchars($note['judul']) ?>" required>
        <textarea name="konten" required><?= htmlspecialchars($note['konten']) ?></textarea>
        <button type="submit">Update</button>
    </form>
</div>
</body>
</html>
