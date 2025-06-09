    <?php
include 'db.php';

$id = $_GET['id'];

$sql = "DELETE FROM notes WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();

echo "<p>Yakin hapus tugas ini? <a href='hapus.php?id=$id'>Ya</a> | <a href='index.php'>Tidak</a></p>";
header("Location: index.php");
?>
