<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notes Tugas</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <script src="script.js"></script>
    <div class="container">
        <h1>Notes</h1>

        <form action="add.php" method="POST">
            <input type="text" name="judul" placeholder="Judul tugas" required>
            <textarea name="konten" placeholder="Deskripsi tugas" required></textarea>
            <button type="submit">Tambah</button>
        </form>

        <h2>Daftar Tugas</h2>
        <div class="notes">
            <?php
            $sql = "SELECT * FROM notes ORDER BY dibuat_pada DESC";
            $result = $conn->query($sql);
            while($row = $result->fetch_assoc()):
            ?>
            <div class="note">
                <h3><?= htmlspecialchars($row['judul']) ?></h3>
                <p><?= nl2br(htmlspecialchars($row['konten'])) ?></p>
                <small><?= $row['dibuat_pada'] ?></small>
                <div class="actions">
                    <a href="update.php?id=<?= $row['id'] ?>">Edit</a>
                    <a href="delete.php?id=<?= $row['id'] ?>" onclick="return confirm('Yakin hapus tugas ini?')">Hapus</a>
                </div>
            </div>
            <?php endwhile; ?>
        </div>
    </div>
</body>
</html>
