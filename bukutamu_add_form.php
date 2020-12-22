<h1>Simpan Buku Tamu MySQL</h1>

<?php 
	$nama = $_POST["nama"];
	$email = $_POST["email"];
	$komentar = $_POST["komentar"];

	$conn = mysql_connect("localhost","root","") or die("Koneksi Gagal");
	mysql_select_db("latihan",$conn);
	$sql = 'INSERT INTO bukutamu (nama,email,komentar) VALUES ("$nama","$email","$komentar")';
	$query = mysql_query($sql,$conn);
	echo '<table border="1">
	<thead>
		<tr>

			<th width="200">NAMA</th>
			<th width="200">EMAIL</th>
			<th width="200">KOMENTAR</th>

		</tr>
	</thead>
	<tbody>';
	while ($row = mysql_fetch_array($query))
	{
	echo '<tr>
	</tbody>
		<td>'.$row['nama'].'</td>
		<td>'.$row['email'].'</td>
		<td>'.$row['komentar'].'</td>
		</thead>
	<tbody>';
	}
	echo '
	</tbody>
	</table>';
	echo "Simpan bukutamu berhasil dilakukan";
 ?>