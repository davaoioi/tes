<form action="hasilsearch.php" method="post">
	<select name="kolom">
		<option value="nama">nama</option>
		<option value="email">email</option>
	</select>
	Masukkan kata yang anda cari
	<input type ="text" type ="text" name="cari">
	<input type ="submit" value="cari" >
</form>
<a href="bukutamu.html"><input type="button" name="show" id="button" value="INPUT DAFTAR TAMU"></a>
<?php
	$conn = mysql_connect("localhost","root","");
	mysql_select_db("latihan",$conn);
	$sql = 'SELECT nama, email, komentar FROM bukutamu';
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
?>
 

