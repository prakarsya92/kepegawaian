<?php
include "inc/inc.koneksi.php";
include "inc/fungsi_hdt.php";
$username= $_POST['username'];
$pass	 = $_POST['password'];

$query = "SELECT * FROM user WHERE user = '$username' and pass='$password'";
$hasil = mysqli_query($konek, $query);
$data_user = mysqli_fetch_assoc($hasil);

if ($data_user != null) {

    // ... jika hasil tidak null berarti user ketemu,
    // ... lanjut periksa password

    if ($password == $data_user['pass']) {
        $_SESSION['user'] = $data_user;
        header('Location: admin/indek.php');
    } else {
        header('Location: index.php');
    }
} else {
    header('Location: index.php');
}
?>
