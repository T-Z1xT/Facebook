<?php
session_start();

include('c_koneksi.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $sql = "SELECT * FROM user WHERE email = '$email' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        // Login berhasil, atur sesi dan redirect ke halaman lain
        $_SESSION['login_user'] = $email;
        header("location: facebook.html");
    } else {
        $error = "Email atau password salah";
    }
}
?>
