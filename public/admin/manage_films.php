<?php
include '../../utils/auth.php';
include '../../config/db.php';
redirectIfNotLoggedIn();

$stmt = $pdo->query("SELECT * FROM film");
$films = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Kelola Film</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h1 class="text-center mb-4">Kelola Film</h1>
    <a href="add_film.php" class="btn btn-success mb-3">Tambah Film</a>
    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>ID Film</th>
                <th>Judul</th>
                <th>Genre</th>
                <th>Durasi</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($films as $film): ?>
                <tr>
                    <td><?php echo htmlspecialchars($film['id_film']); ?></td>
                    <td><?php echo htmlspecialchars($film['judul_film']); ?></td>
                    <td><?php echo htmlspecialchars($film['genre']); ?></td>
                    <td><?php echo htmlspecialchars($film['durasi']); ?> menit</td>
                    <td><?php echo htmlspecialchars($film['status']); ?></td>
                    <td>
                        <a href="edit_film.php?id=<?php echo $film['id_film']; ?>" class="btn btn-warning btn-sm">Edit</a>
                        <a href="#" onclick="confirmDelete(<?php echo $film['id_film']; ?>)" class="btn btn-danger btn-sm">Hapus</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<script>
    function confirmDelete(id) {
        if (confirm("Apakah Anda yakin ingin menghapus film ini?")) {
            window.location.href = "delete_film.php?id=" + id;
        }
    }
</script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
