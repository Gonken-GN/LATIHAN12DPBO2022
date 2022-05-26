<?php

/******************************************
Asisten Pemrogaman 11
 ******************************************/

class TabelPasien extends DB
{
	function getPasien()
	{
		// Query mysql select data pasien
		$query = "SELECT * FROM pasien";
		// Mengeksekusi query
		return $this->execute($query);
	}
	function deletePasien($id){
		$query = "DELETE FROM pasien where id=$id";
		// Mengeksekusi query
		return $this->execute($query);
	}
	function updatePasien($id, $data){
		$nik = $data['nik'];
		$nama = $data['nama'];
		$tempat = $data['tempat'];
		$tl = $data['tl'];
		$gender = $data['gender'];
		$email = $data['email'];
		$telp = $data['telp'];
		$query = "UPDATE pasien set nik='$nik', nama='$nama', tempat='$tempat', tl='$tl', gender='$gender', email='$email', telp='$telp' where id=$id";
		// Mengeksekusi query
		return $this->execute($query);
	}
	function addPasien($data){
		$nik = $data['nik'];
		$nama = $data['nama'];
		$tempat = $data['tempat'];
		$tl = $data['tl'];
		$gender = $data['gender'];
		$email = $data['email'];
		$telp = $data['telp'];
		$query = "INSERT INTO PASIEN Values(NULL, '$nik', '$nama', '$tempat', '$tl', '$gender', '$email', '$telp')";
		// Mengeksekusi query
		return $this->execute($query);
	}
	function getWhere($id){
		$query = "SELECT * from pasien where id=$id";
		return $this->execute($query);
	}
}
