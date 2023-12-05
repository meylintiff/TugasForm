<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Silahkan Isi Form dibawah ini</title>
    <style>
        .error { color: red; }
    </style>
</head>
<body>

<?php

$nim = "";
$nama = "";
$email = "";
$alamat = "";
$nimErr = $namaErr = $emailErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validasi NIM
    if (empty($_POST["nim"])) {
        $nimErr = "NIM wajib diisi";
    } else {
        $nim = $_POST["nim"];
    }

    // Validasi Nama
    if (empty($_POST["nama"])) {
        $namaErr = "Nama wajib diisi";
    } else {
        $nama = $_POST["nama"];
    }

    // Validasi Email
    if (empty($_POST["email"])) {
        $emailErr = "Email wajib diisi";
    } else {
        $email = $_POST["email"];
        // Validasi format email
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Format email tidak valid";
        }
    }

    // Alamat tidak wajib diisi
    $alamat = $_POST["alamat"];
}
?>

<h2>Silahkan Isi Form dibawah ini</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    NIM: <input type="text" name="nim" value="<?php echo $nim; ?>">
    <br><br>

    Nama: <input type="text" name="nama" value="<?php echo $nama; ?>">
    <span class="error">* <?php echo $namaErr; ?></span>
    <br><br>

    Email: <input type="text" name="email" value="<?php echo $email; ?>">
    <span class="error">* <?php echo $emailErr; ?></span>
    <br><br>

    Alamat: <textarea name="alamat" rows="5" cols="40"><?php echo $alamat; ?></textarea>
    <br><br>

    <input type="submit" name="submit" value="Submit">
</form>

<?php
// Hasil submit
if ($_SERVER["REQUEST_METHOD"] == "POST" && empty($namaErr) && empty($emailErr)) {
    echo "<h2>Hasil Submit:</h2>";
    echo "NIM: " . $nim . "<br>";
    echo "Nama: " . $nama . "<br>";
    echo "Email: " . $email . "<br>";
    echo "Alamat: " . $alamat . "<br>";
}
?>

</body>
</html>
