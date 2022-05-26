<?php


interface KontrakPresenter
{
	public function prosesDataPasien();
	public function getWherePasien($id);
	public function deleteDataPasien($id);
	public function addDataPasien($data);
	public function updateDataPasien($id, $data);
	public function getId($i);
	public function getNik($i);
	public function getNama($i);
	public function getTempat($i);
	public function getTl($i);
	public function getGender($i);
	public function getEmail($i);
	public function getTelp($i);
	public function getSize();
	
}
