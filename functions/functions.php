<?php


// Konek Ke database
$conn = mysqli_connect("localhost","root","","uasweb");

function query($query){
	global $conn;
	$result = mysqli_query($conn, $query);
	$rows =[];
	while ($row = mysqli_fetch_assoc($result)){
		$rows[] = $row;
	}
	return $rows;
}

function tambah ($data){
	global $conn;
	//ambil data dari tiap form
		$pemesan 	 	 = htmlspecialchars( $data["pemesan"]);
		$tujuan 		 = htmlspecialchars( $data["tujuan"]);
		$tarif 	 		 = htmlspecialchars( $data["tarif"]);
		$jumlahtiket 	 = htmlspecialchars( $data["jumlahtiket"]);
		$totalharga 	 = htmlspecialchars( $data["totalharga"]);
	
	//query insert data
	$query ="INSERT INTO tiket 
				VALUE 
				('','$pemesan','$tujuan','$tarif', '$jumlahtiket','$totalharga')
			";
	mysqli_query($conn, $query);
	
	return mysqli_affected_rows($conn);
	
	

}


function ubah ($data){
	global $conn;
	//ambil data dari tiap form
		$pemesan 	 	 = htmlspecialchars( $data["pemesan"]);
		$tujuan 		 = htmlspecialchars( $data["tujuan"]);
		$tarif 	 		 = htmlspecialchars( $data["tarif"]);
		$jumlahtiket 	 = htmlspecialchars( $data["jumlahtiket"]);
		$totalharga 	 = htmlspecialchars( $data["totalharga"]);

	//query insert data
	$query ="UPDATE tiket SET
			pemesan 	  = '$pemesan',
			tujuan		  = '$tujuan',
			tarif 	 	  = '$tarif', 
			jumlahtiket	  =	'$jumlahtiket', 
			totalhrga	  = '$totalharga',
			WHERE id 	= '$id
			";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}


function hapus($id){
	global $conn;
	mysqli_query($conn,"DELETE FROM tiket WHERE id= $id");

	return mysqli_affected_rows($conn);
}

function cari ($keyword){
	$query = "SELECT * FROM tiket 
				WHERE
				nama 	LIKE '%$keyword%' OR
				nim 	LIKE '%$keyword%' OR
				email 	LIKE '%$keyword%' OR
				jurusan LIKE '%$keyword%'
			";
	return query ($query);
}


function registrasi($data){
	global $conn;
	$username	 = strtolower(stripslashes($data["username"]));
	$password 	 = mysqli_real_escape_string($conn,$data["password"]);
	$password2 	 = mysqli_real_escape_string($conn,$data["password2"]);

	//cek username udah ada atau belum
	$result = mysqli_query($conn,"SELECT username FROM user WHERE
						username ='$username'");
	if (mysqli_fetch_assoc($result)){
		echo "<script>
				alert('username sudah terdaftar')
			  </script>
			";
		return false;
	}

	//cek konfirmasi password
	if($password !== $password2){
		echo "<script>
			alert('konfirmasi password tidak sesuai');
			</script>";
		return false;

	}

	//encripsi password
	$password = password_hash($password, PASSWORD_DEFAULT);



	//tambahkan user baru ke database
	mysqli_query($conn, "INSERT INTO user VALUE('','$username','$password')");

	return mysqli_affected_rows($conn);

}
?>