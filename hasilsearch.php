<form action="hasilsearch.php" method="post">
	<select name="kolom">
		<option value="nama">nama</option>
		<option value="email">email</option>
	</select>
	Masukkan kata yang anda cari
	<input type="text" type="text" name="cari">
	<input type="submit" value="cari">
</form>
<?php
$kolom = $_POST['kolom'];
$cari = $_POST['cari'];
$conn = mysqli_connect("localhost", "root", "", "latihan");
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}
$stmt = $conn->prepare("SELECT * FROM bukutamu WHERE $kolom LIKE ?");
$cari = "%$cari%";
$stmt->bind_param("s", $cari);
$stmt->execute();
$hasil = $stmt->get_result();
$jumlah = $hasil->num_rows or die($conn->connect_error);
echo "<br>";
echo "Ditemukan: $jumlah";
echo "<br>";


echo '<table border="1">
		<thead>
			<tr>
				<th width="200">NAMA</th>
				<th width="200">EMAIL</th>
				<th width="200">KOMENTAR</th>
			</tr>
		</thead>
	<tbody>';
while ($row = $hasil->fetch_array()) {
	echo '<tr>
		<td>' . $row[0] . '</td>
		<td>' . $row[1] . '</td>
		 
		<td>' . $row[2] . '</td>
	</tr>';
}
echo '
	</tbody>
	</table>';
?><br>
<a href="show.php"><input type="button" name="show" id="button" value="tampilkan buku tamu"></a>