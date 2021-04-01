<?php
session_start();

if (!isset($_SESSION["login"])) {
    header("location: login.php");
    exit;
}

require "function.php";

$mahasiswa = tampil("SELECT * FROM mahasiswa");

?>

<!DOCTYPE html>
<html>

<head>
    <title>Halaman Admin</title>
</head>

<body>

    <a href="logout.php">Logout</a>

    <h1>Daftar Mahasiswa</h1>

    <a href="tambah.php">Tambah Data Mahasiswa</a>
    <br><br>

    <form action="" method="post">
        <input type="text" name="keyword" size="40" autofocus placeholder="masukan keyword pencarian" autocomplete="off">
        <button type="submit" name="cari">Cari!</button>
    </form>
    <br>

    <table border="1" cellpadding="10" cellspacing="0">

        <tr>
            <th>No.</th>
            <th>Aksi</th>
            <th>Gambar</th>
            <th>NIM</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Jurusan</th>
        </tr>

        <?php $i = 1; ?>
        <?php foreach ($mahasiswa as $row) : ?>
            <tr>
                <td><?= $i; ?></td>
                <td>
                    <a href="ubah.php?id=<?= $row['id']; ?>">ubah</a>
                    <a href="hapus.php?id=<?php echo $row["id"]; ?>" onclick="return confirm('yakin?')">hapus</a>
                </td>
                <td>
                    <img src="img/<?= $row["gambar"]; ?>" width="50">
                </td>
                <td><?= $row["NIM"]; ?></td>
                <td><?= $row["nama"]; ?></td>
                <td><?= $row["email"]; ?></td>
                <td><?= $row["jurusan"]; ?></td>
            </tr>
            <?php $i++; ?>
        <?php endforeach; ?>

    </table>

</body>

</html>