<form action="hasilsearch.php" method="post">
	<select name="kolom">
		<option value="nama">nama</option>
		<option value="email">email</option>
	</select>
Masukkan kata yang anda cari
<input type ="text" type ="text" name="cari">
<input type ="submit" value="cari" >
</form>
<?php
	$kolom= $_POST['kolom'];
	$cari=$_POST['cari'];
	$conn = mysql_connect("localhost","root","");
	mysql_select_db("latihan",$conn);
	$hasil = mysql_query("SELECT * FROM bukutamu WHERE $kolom LIKE '%s%%'",$conn);
	$jumlah = mysql_num_rows($hasil) or die(mysql_error());
	echo "<br>";
	echo "Ditemukan: $jumlah"; echo "<br>";

	 
	echo '<table border="1">
		<thead>
			<tr>
				<th width="200">NAMA</th>
				<th width="200">EMAIL</th>
				<th width="200">KOMENTAR</th>
			</tr>
		</thead>
	<tbody>';
	while ($row = mysql_fetch_array($hasil));
	{
	echo '<tr>
		<td>'.$row[0].'</td>
		<td>'.$row[1].'</td>
		 
		<td>'.$row[2].'</td>
	</tr>';
	}
	echo '
	</tbody>
	</table>';
	?><br>
	<a	href="show.php"><input	type="button"	name="show"	id="button" value="tampilkan buku tamu"></a>
