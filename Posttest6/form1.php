<link rel="stylesheet" href="styles.css">

<?php
    require 'connection.php';

    if(isset($_POST['submitForm1'])){
        $nama_depan = $_POST['nama_depan'];
        $nama_belakang = $_POST['nama_belakang'];
        $telp = $_POST['telp'];
        $email = $_POST['email'];
        $tgl = $_POST['tgl'];
        $jam = $_POST['jam'];
        $layanan = $_POST['layanan'];
        $nama = $_POST['nama'];
        $gambar = $_FILES['gambar']['name'];
        $x = explode('.',$gambar);
        $ekstensi = strtolower(end($x));
        $gambar_baru = "$nama.$ekstensi";
        $tmp = $_FILES['gambar']['tmp_name'];

    if(move_uploaded_file($tmp, 'img/'.$gambar_baru)){
        $result = mysqli_query($conn, "INSERT INTO mango (nama) VALUES (' ', '$gambar')");
    }
    
    $sql = "INSERT INTO mango (id, nama_depan, nama_belakang, telp, email, tgl, jam, layanan) VALUES (' ', '$nama_depan', '$nama_belakang', '$telp', '$email', '$tgl', '$jam', '$layanan')";

    $result = mysqli_query($conn, $sql);

    if($result){
        echo "
        <script>
            alert('Data telah berhasil ditambahkan');
            document.location.href = 'read.php';
        </script>";
    } else{
        echo "
        <script>
            alert('Data gagal ditambahkan');
            document.locatin.href = 'form1.php';
        </script>";
        }
    }
?>

<div class="header" id="headerForm1">
    <?php echo "Waktu sekarang " . date("h:i:sa"); ?>
    <h3>Menu menambahkan data</h3>
    <a href="index.php">Kembali</a>
</div>

<div class="form1">
	<form action="" method="POST">
		<table class="table1">
			<tr>
				<th>Nama depan</th>
				<td><input type="text" name="nama_depan" required></td>
			</tr>
            <tr>
                <th>Nama belakang</th>
                <td><input type="text" name="nama_belakang"></td>
            </tr>
			<tr>
				<th>Telepon</th>
				<td><input type="tel" name="telp" placeholder="62" maxlength="15" required></td>
			</tr>
			<tr>
				<th>Email</th>
				<td><input type="email" name="email" required></td>
			</tr>
            <tr>
                <th>Tanggal reservasi</th>
                <td><input type="date" name="tgl" required></td>
            </tr>
            <tr>
                <th>Jam reservasi</th>
                <td><input type="time" name="jam" required></td>
            </tr>
            <tr>
                <th>Layanan</th>
            </tr>
            <tr>
                <td><input type="radio" id="haircut" name="layanan" value="Hair cut" required></td>
                <td><label for="haircut">Haircut (Rp 150.000)</label></td>
            </tr>
            <tr>
                <td><input type="radio" id="colorhairnatural" name="layanan" value="Color hair natural"></td>
                <td><label for="colorhairnatural">Color hair natural (Rp 500.000)</label></td>
            </tr>
            <tr>
                <td><input type="radio" id="colorhairunnatural" name="layanan" value="Color hair unnatural"></td>
                <td><label for="colorhairunnatural">Color hair unnatural (Rp 800.000)</label></td>
            </tr>
            <tr>
                <td><input type="radio" id="creambath" name="layanan" value="Creambath"></td>
                <td><label for="creambath">Creambath (Rp 300.000)</label></td>
            </tr>
            <tr>
                <td><input type="radio" id="smoothing" name="layanan" value="Smoothing"></td>
                <td><label for="smoothing">Smoothing (Rp 900.000)</label></td>
            </tr>
            <tr>
                <td><input type="radio" id="curly" name="layanan" value="Curly"></td>
                <td><label for="curly">Curly (Rp 900.000)</label></td>
            </tr>
            <tr>
                <td><input type="radio" id="blow" name="layanan" value="Blow"></td>
                <td><label for="blow">Blow (Rp 700.000)</label></td>
            </tr>
            <tr>
                <td><input type="radio" id="treatmenthair" name="layanan" value="Treatment hair"></td>
                <td><label for="treatmenthair">Treatment hair (Rp 500.000)</label></td>
            </tr>
            <tr>
            <td><input type="radio" id="hairspa" name="layanan" value="Hair spa"></td>
                <td><label for="hairspa">Hair spa (Rp 600.000)</label></td>
            </tr>
            <tr>
                <td><input type="radio" id="keratin" name="layanan" value="Keratin"></td>
                <td><label for="keratin">Keratin (Rp 600.000)</label></td>
            </tr>

                
            <tr>
                <th>Nama gambar</th>
                <td><input type="text" name="nama" required></td>
            </tr>
            <tr>
                <th>Upload gambar</th>
                <td><input type="file" name="gambar" required></td>
            </tr>
		</table>
		<input type="submit" name="submitForm1">
	</form>
</div>