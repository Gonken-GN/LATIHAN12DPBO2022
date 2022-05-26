<?php

include("KontrakPresenter.php");


class ProsesPasien implements KontrakPresenter
{
	private $tabelpasien;
	private $data = [];

	function ProsesPasien()
	{
		//konstruktor
		try {
			$db_host = "localhost"; // host 
			$db_user = "root"; // user
			$db_password = ""; // password
			$db_name = "mvp_01"; // nama basis data
			$this->tabelpasien = new TabelPasien($db_host, $db_user, $db_password, $db_name); //instansi TabelPasien
			$this->data = array(); //instansi list untuk data Pasien
			//data = new ArrayList<Pasien>;//instansi list untuk data Pasien
		} catch (Exception $e) {
			echo "wiw error" . $e->getMessage();
		}
	}
	public function getWherePasien($id)
	{
		$this->tabelpasien->open();
		try{
			$this->tabelpasien->getWhere($id);
			// $this->tabelpasien->getWherePasien($_GET['id_edit']);
			$row = $this->tabelpasien->getResult();
			$pasien = new Pasien(); //instansiasi objek pasien untuk setiap data pasien
				$pasien->setId($row['id']); //mengisi id
				$pasien->setNik($row['nik']); //mengisi nik
				$pasien->setNama($row['nama']); //mengisi nama
				$pasien->setTempat($row['tempat']); //mengisi tempat
				$pasien->setTl($row['tl']); //mengisi tl
				$pasien->setGender($row['gender']); //mengisi gender
				$pasien->setEmail($row['email']);
				$pasien->setTelp($row['telp']);

				$this->data[] = $row; //tambahkan data pasien ke dalam list
		}catch(Exception $e){
			echo " error " . $e->getMessage();
		}
		$this->tabelpasien->close();
	}
	public function addDataPasien($data){
		$this->tabelpasien->open();
		try{
			$this->tabelpasien->addPasien($data);
		}catch(Exception $e){
			echo "INSERT error " . $e->getMessage();
		}
		$this->tabelpasien->close();
	}
	public function updateDataPasien($id, $data){
		$this->tabelpasien->open();
		try{
			$this->tabelpasien->updatePasien($id, $data);
		}catch(Exception $e){
			echo "Update error" . $e->getMessage();
		}
		$this->tabelpasien->close();
	}
	function prosesDataPasien()
	{
		try {
			//mengambil data di tabel pasien
			$this->tabelpasien->open();
			$this->tabelpasien->getPasien();
			while ($row = $this->tabelpasien->getResult()) {
				//ambil hasil query
				$pasien = new Pasien(); //instansiasi objek pasien untuk setiap data pasien
				$pasien->setId($row['id']); //mengisi id
				$pasien->setNik($row['nik']); //mengisi nik
				$pasien->setNama($row['nama']); //mengisi nama
				$pasien->setTempat($row['tempat']); //mengisi tempat
				$pasien->setTl($row['tl']); //mengisi tl
				$pasien->setGender($row['gender']); //mengisi gender
				$pasien->setEmail($row['email']);
				$pasien->setTelp($row['telp']);

				$this->data[] = $row; //tambahkan data pasien ke dalam list
			}
			//tutup koneksi
			$this->tabelpasien->close();
		} catch (Exception $e) {
			//memproses error
			echo "wiw error part  2" . $e->getMessage();
		}
	}
	function deleteDataPasien($id){
		$this->tabelpasien->open();
		try{
			
			$this->tabelpasien->deletePasien($id);
		}catch(Exception $e){
			echo "DELETE error part 2" .$e->getMessage();
		}
		$this->tabelpasien->close();
	}
	function getId($i)
	{
		//mengembalikan id Pasien dengan indeks ke i
		return $this->data[$i]['id'];
	}
	function getNik($i)
	{
		//mengembalikan nik Pasien dengan indeks ke i
		return $this->data[$i]['nik'];
	}
	function getNama($i)
	{
		//mengembalikan nama Pasien dengan indeks ke i
		return $this->data[$i]['nama'];
	}
	function getTempat($i)
	{
		//mengembalikan tempat Pasien dengan indeks ke i
		return $this->data[$i]['tempat'];
	}
	function getTl($i)
	{
		//mengembalikan tanggal lahir(TL) Pasien dengan indeks ke i
		return $this->data[$i]['tl'];
	}
	function getGender($i)
	{
		//mengembalikan gender Pasien dengan indeks ke i
		return $this->data[$i]['gender'];
	}
	function getTelp($i)
	{
		//mengembalikan gender Pasien dengan indeks ke i
		return $this->data[$i]['telp'];
	}
	function getEmail($i)
	{
		//mengembalikan gender Pasien dengan indeks ke i
		return $this->data[$i]['email'];
	}
	function getSize()
	{
		return sizeof($this->data);
	}
}
