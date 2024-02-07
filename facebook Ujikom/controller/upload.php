<?php
include ('c_koneksi.php');

// Nama file yang diunggah
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);

// Mendapatkan ekstensi file
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// Cek apakah file adalah gambar
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File adalah gambar - " . $check["mime"] . ".";
        // Lakukan pengecekan tambahan jika diperlukan, seperti ukuran file
        // Pindahkan file ke lokasi yang diinginkan
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            echo "Foto " . basename($_FILES["fileToUpload"]["name"]) . " berhasil diunggah.";
        } else {
            echo "Maaf, terjadi kesalahan saat mengunggah file.";
        }
    } else {
        echo "File bukan gambar.";
    }
}
?>
