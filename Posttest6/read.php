<link rel="stylesheet" href="styles.css">

<?php
    require 'connection.php';

    $result = mysqli_query($conn, "SELECT * FROM mango");

    $mango = [];

    while($row = mysqli_fetch_assoc($result)){
        $mango[] = $row;
    }
?>

<div class="header">
    <?php echo "Waktu sekarang " . date("h:i:sa"); ?>
    <h3>Menu lihat data</h3>
    <a href="index.php">Kembali</a>
</div>

<div class="headerKecil" style="text-align: center;">
    <h3>Data form</h3>
</div>

<div class="readForm">
    <table class="table">
        <thead class="thead">
            <tr>
                <th>No</th>
                <th>Nama depan</th>
                <th>Nama belakang</th>
                <th>Telepon</th>
                <th>Email</th>
                <th>Tanggal reservasi</th>
                <th>Jam reservasi</th>
                <th>Layanan</th>
                <th>Bukti pembayaran</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; foreach($mango as $mng) : ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $mng["nama_depan"]; ?></td>
                <td><?php echo $mng["nama_belakang"]; ?></td>
                <td><?php echo $mng["telp"]; ?></td>
                <td><?php echo $mng["email"]; ?></td>
                <td><?php echo $mng["tgl"]; ?></td>
                <td><?php echo $mng["jam"]; ?></td>
                <td><?php echo $mng["layanan"]; ?></td>
                <!-- <td><?php echo "<img src='img/$mng[gambar]' width='70' height='90' />";?></td> -->
                <td><img src = "../../img/<?php echo $mng["gambar"]; ?>"style = "width:30px;height:30px;"></td>
                <td>
                    <a href="update.php?id=<?php echo $mng["id"]; ?>" onclick="return confirm('Yakin ingin mengubah?');" role="button" name="update">Ubah</a>
                    <a href="delete.php?id=<?php echo $mng["id"]; ?>" onclick="return confirm('Yakin ingin menghapus?');" role="button">Hapus</a>
                </td>
            </tr>
            <?php $i++; endforeach; ?>
        </tbody>
    </table>
</div>
