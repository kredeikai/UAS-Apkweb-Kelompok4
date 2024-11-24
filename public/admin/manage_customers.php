<?php
include '../../utils/auth.php';
include '../../config/db.php';
redirectIfNotLoggedIn();

$stmt = $pdo->query("SELECT * FROM customer");
$customers = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Kelola Pelanggan</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h1 class="text-center mb-4">Kelola Pelanggan</h1>
    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Email</th>
                <th>No Telepon</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($customers as $customer): ?>
                <tr>
                    <td><?php echo htmlspecialchars($customer['id_customer']); ?></td>
                    <td><?php echo htmlspecialchars($customer['nama']); ?></td>
                    <td><?php echo htmlspecialchars($customer['email']); ?></td>
                    <td><?php echo htmlspecialchars($customer['no_telepon']); ?></td>
                    <td>
                        <a href="edit_customer.php?id=<?php echo $customer['id_customer']; ?>" class="btn btn-warning btn-sm">Edit</a>
                        <a href="#" onclick="confirmDelete(<?php echo $customer['id_customer']; ?>)" class="btn btn-danger btn-sm">Hapus</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<script>
    function confirmDelete(id) {
        if (confirm("Apakah Anda yakin ingin menghapus pelanggan ini?")) {
            window.location.href = "delete_customer.php?id=" + id;
        }
    }
</script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
