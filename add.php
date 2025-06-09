<?php
include 'db.php';

$judul = $_POST['judul'];
$konten = $_POST['konten'];

$sql = "INSERT INTO notes (judul, konten) VALUES (?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $judul, $konten);
$stmt->execute();

header("Location: index.php");
?>
