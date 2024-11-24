<?php
include '../../utils/auth.php';
include '../../config/db.php';
redirectIfNotLoggedIn();

$id_customer = $_SESSION['user_id'];
$stmt = $pdo->prepare("SELECT * FROM transaksi WHERE id_customer = ?");
$stmt->execute([$id_customer]);
$transactions = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Riwayat Transaksi</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h1 class="text-center mb-4">Riwayat Transaksi</h1>
    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>ID Transaksi</th>
                <th>Tanggal</th>
                <th>Total Harga</th>
                <th>Status Pembayaran</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($transactions as $transaction): ?>
                <tr>
                    <td><?php echo htmlspecialchars($transaction['id_transaksi']); ?></td>
                    <td><?php echo htmlspecialchars($transaction['tanggal_transaksi']); ?></td>
                    <td><?php echo htmlspecialchars($transaction['total_harga']); ?></td>
                    <td><?php echo htmlspecialchars($transaction['status_pembayaran']); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
