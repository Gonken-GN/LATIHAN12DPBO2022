<?php
include("model/Template.class.php");
include("model/DB.class.php");
include("model/Pasien.class.php");
include("model/TabelPasien.class.php");
include("view/TampilPasien.php");
$pasien = new ProsesPasien();
$nik = null;
$nama = null;
$tempat = null;
$tl = null;
$gender = null;
$genderM = null;
$genderF = null;
$email = null;
$notelp = null;


if(isset($_GET['id_hapus'])){
    $pasien->deleteDataPasien($_GET['id_hapus']);
    header('location:index.php');
}if(isset($_GET['id_edit'])){
    $pasien->getWherePasien($_GET['id_edit']);
    $nik = $pasien->getNik(0);
    $nama = $pasien->getNama(0);
    $notelp = $pasien->getTelp(0);
    $tempat = $pasien->getTempat(0);
    $tl = $pasien->getTl(0);
    echo $tl;
    $email = $pasien->getEmail(0);
    $gender = $pasien->getGender(0);
    echo $gender;
    if($gender == "Laki-laki"){
        $genderM = "checked";
    }else if($gender == "Perempuan"){
        $genderF = "checked";
    }
    if(isset($_POST['submit'])){
        $pasien->updateDataPasien($_GET['id_edit'], $_POST);
        header('location:index.php');
    }

    
}if(isset($_GET['id_add'])){
    
    if(isset($_POST['submit'])){
        $pasien->addDataPasien($_POST);
        header('location:index.php');
    }
    
}
// Membaca template skin.html
$tpl = new Template("templates/form.html");

// Mengganti kode Data_Tabel dengan data yang sudah diproses
$tpl->replace("DATA_NIK", $nik);
$tpl->replace("DATA_NAMA", $nama);
$tpl->replace("DATA_TEMPAT", $tempat);
$tpl->replace("DATA_TL", $tl);
$tpl->replace("DATA_GENDERM", $genderM);
$tpl->replace("DATA_GENDERF", $genderF);
$tpl->replace("DATA_EMAIL", $email);
$tpl->replace("DATA_NOTELP", $notelp);


// Menampilkan ke layar
$tpl->write();
?>