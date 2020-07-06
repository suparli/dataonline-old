<?php
$ftp_server   = "127.0.0.1";
$ftp_username = "suparli";
$ftp_userpass = "mnisuper";
$ftp_conn     = ftp_connect($ftp_server) or die("Could not connect to $ftp_server");
ftp_pasv($ftp_conn, true);
$login        = ftp_login($ftp_conn, $ftp_username, $ftp_userpass);
$fileList     = ftp_nlist($ftp_conn, ".");

include_once "tbinp.php";
$link = new mysqli('localhost', $username, $password, $database);
if ($link->connect_errno) {
    die("Failed to connect to mysql: (" . $link->connect_errno . ") " . $link->connect_error);
} else {
    echo "Koneksi Database OK <br>";
}

$jml = count($fileList);


for ($x = 4; $x < $jml; $x++) {

    $namaFile = $fileList[$x];

    $h   = fopen('php://temp', 'r+');
    ftp_fget($ftp_conn, $h, $namaFile, FTP_BINARY, 0);
    $fstats = fstat($h);
    fseek($h, 0);
    $contents = fread($h, $fstats['size']);
    $array = json_decode($contents, true);

    $idaws          = $array['stnname'];
    $date           = date('Y-m-d H:i', $array['utctime']);
    $suhu           = $array['tempout'];
    $kelembaban     = $array['humout'];
    $radiasi        = $array['solar'];
    $curahhujan     = $array['rainr'];
    $kecepatanangin = $array['windspd'];
    $arahangin      = $array['winddir'];
    $tekananudara   = $array['bar'];
    
    echo $date;

    $tsuhu = strtoupper($suhu);
    if ($tsuhu == "---") {
        $suhu = "null";
    }
    $tkelembaban = strtoupper($kelembaban);
    if ($tkelembaban == "---") {
        $kelembaban = "null";
    }
    $tradiasi = strtoupper($radiasi);
    if ($tradiasi == "---") {
        $radiasi = "null";
    }
    $tcurahhujan = strtoupper($curahhujan);
    if ($tcurahhujan == "---") {
        $curahhujan = "null";
    }
    $tkecepatanangin = strtoupper($kecepatanangin);
    if ($tkecepatanangin == "---") {
        $kecepatanangin = "null";
    }
    $tarahangin = strtoupper($arahangin);
    if ($tarahangin == "---") {
        $arahangin = "null";
    }
    $ttekananudara = strtoupper($tekananudara);
    if ($ttekananudara == "---") {
        $tekananudara = "null";
    }
    

    $query = "INSERT INTO data_aws (id_aws, date, suhu, kelembaban, radiasi, curah_hujan, kecepatan_angin, arah_angin, tekanan_udara) VALUES ($idaws, '$date', $suhu, $kelembaban, $radiasi, $curahhujan, $kecepatanangin, $arahangin, $tekananudara)";
    $result = $link->query($query);

    if ($result) {
        ftp_delete($ftp_conn, $namaFile);
        echo "<br>Data $namaFile Berhasil Di Simpan ";
    } else {
        echo "<br>Data $namaFile Gagal Disimpan";
    }
}
// close connection
mysqli_close($link);
ftp_close($ftp_conn);
