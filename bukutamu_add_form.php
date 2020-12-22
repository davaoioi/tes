<h1>Simpan Buku Tamu MySQL</h1>

<?php
$nama = $_POST["nama"];
$email = $_POST["email"];
$komentar = $_POST["komentar"];

$conn = mysqli_connect("localhost", "root", "", "latihan") or die("Koneksi Gagal");
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}
$stmt = $conn->prepare('INSERT INTO bukutamu (nama,email,komentar) VALUES (?,?,?)');
$stmt->bind_param('sss', $nama, $email, $komentar);
$stmt->execute() or die($conn->connect_error);
$hasil = $stmt->get_result();
echo '<table border="1">
	<thead>
		<tr>

			<th width="200">NAMA</th>
			<th width="200">EMAIL</th>
			<th width="200">KOMENTAR</th>

		</tr>
	</thead>
	<tbody>';

echo '<tr>
	</tbody>
		<td>' . $nama . '</td>
		<td>' . $email . '</td>
		<td>' . $komentar . '</td>
		</thead>
	<tbody>';
echo '
	</tbody>
	</table>';
echo "Simpan bukutamu berhasil dilakukan";
?>
