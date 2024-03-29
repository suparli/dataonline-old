<?php
$ftp_server   = "ftp.dataonline.co.id";
$ftp_username = "aaws_davis@dataonline.co.id";
$ftp_userpass = "mnisuper";
$ftp_conn     = ftp_connect($ftp_server) or die("Could not connect to $ftp_server");
ftp_pasv($ftp_conn, true);
$login        = ftp_login($ftp_conn, $ftp_username, $ftp_userpass);
$folderList     = ftp_nlist($ftp_conn, ".");

include_once "tbinp.php";
$link = new mysqli('localhost', $username, $password, $database);
if ($link->connect_errno) {
    die("Failed to connect to mysql: (" . $link->connect_errno . ") " . $link->connect_error);
} else {
    echo "Koneksi Database OK <br>";
}

$jml = count($folderList);



for ($x = 0; $x < $jml; $x++) {

    $opendir = ftp_chdir($ftp_conn,$folderList[$x]);
    

    $namaFile = 'wflexp.json';
    $h   = fopen('php://temp', 'r+');
    ftp_fget($ftp_conn, $h, $namaFile, FTP_BINARY, 0);
    $fstats = fstat($h);
    fseek($h, 0);
    $contents = fread($h, $fstats['size']);
    $array = json_decode($contents, true);

    $idaws          = $array['stnname'];
    $date           = gmdate('Y-m-d H:i', $array['loctime']);
    $suhu           = ($array['tempout'] - 32) * (5/9);
    $kelembaban     = $array['humout'];
    $radiasi        = $array['solar'];
    $curahhujan     = $array['rainr'];
    $kecepatanangin = $array['windspd'];
    $arahangin      = $array['winddir'];
    $tekananudara   = $array['bar'] * 33.8639 ;
    $ultraviolet    = $array['uv'];
    $et             = $array['etday'];
    $suhutanah1     = ($array['xst'][0] - 32) * (5/9);
    $suhutanah2     = ($array['xst'][1] - 32) * (5/9);
    $suhutanah3     = ($array['xst'][2] - 32) * (5/9);
    $suhutanah4     = ($array['xst'][3] - 32) * (5/9);
    $soilmosture1   = $array['xsm'][0];
    $soilmosture2   = $array['xsm'][1];
    $soilmosture3   = $array['xsm'][2];
    $soilmosture4   = $array['xsm'][3];
    $leafwetnes1   = $array['xlw'][0];
    $leafwetnes2   = $array['xlw'][1];



    $tsuhu = strtoupper($suhu);
    if ($tsuhu == "---" OR $tsuhu < 0) {
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
    $tultraviolet = strtoupper($ultraviolet);
    if ($tultraviolet == "---") {
        $ultraviolet = "null";
    }
    $tet = strtoupper($et);
    if ($tet == "---") {
        $et = "null";
    }
    $tsuhutanah1 = strtoupper($suhutanah1);
    if ($tsuhutanah1 == "---" OR $tsuhutanah1 < 0) {
        $suhutanah1 = "null";
    }
    $tsuhutanah2 = strtoupper($suhutanah2);
    if ($tsuhutanah2 == "---" OR $tsuhutanah2 < 0) {
        $suhutanah2 = "null";
    }
    $tsuhutanah3 = strtoupper($suhutanah3);
    if ($tsuhutanah3 == "---" OR $tsuhutanah3 < 0) {
        $suhutanah3 = "null";
    }
    $tsuhutanah4 = strtoupper($suhutanah4);
    if ($tsuhutanah4 == "---" OR $tsuhutanah4 < 0) {
        $suhutanah4 = "null";
    }

    $tsoilmosture1 = strtoupper($soilmosture1);
    if ($tsoilmosture1 == "---") {
        $soilmosture1 = "null";
    }
    $tsoilmosture2 = strtoupper($soilmosture2);
    if ($tsoilmosture2 == "---") {
        $soilmosture2 = "null";
    }
    $tsoilmosture3 = strtoupper($soilmosture3);
    if ($tsoilmosture3 == "---") {
        $soilmosture3 = "null";
    }
    $tsoilmosture4 = strtoupper($soilmosture4);
    if ($tsoilmosture4 == "---") {
        $soilmosture4 = "null";
    }
    $tleafwetnes1 = strtoupper($leafwetnes1);
    if ($tleafwetnes1 == "---") {
        $leafwetnes1 = "null";
    }
    $tleafwetnes2 = strtoupper($leafwetnes2);
    if ($tleafwetnes2 == "---") {
        $leafwetnes2 = "null";
    }

    
   

    $query = "INSERT INTO data_aaws_davis (id_aws, date, suhu, kelembaban, radiasi, curah_hujan, kecepatan_angin, arah_angin, tekanan_udara, ultraviolet, et, suhu_tanah1, suhu_tanah2, suhu_tanah3, suhu_tanah4, soil_mosture1, soil_mosture2, soil_mosture3, soil_mosture4, leafwetnes1, leafwetnes2 ) VALUES ($idaws, '$date', $suhu, $kelembaban, $radiasi, $curahhujan, $kecepatanangin, $arahangin, $tekananudara, $ultraviolet, $et, $suhutanah1, $suhutanah2, $suhutanah3, $suhutanah4, $soilmosture1, $soilmosture2, $soilmosture3, $soilmosture4, $leafwetnes1, $leafwetnes2)";
    $result = $link->query($query);

    if ($result) {
        ftp_delete($ftp_conn, $namaFile);
        echo "<br>Data $namaFile Berhasil Di Simpan ";
    } else {
        echo "<br>Data $namaFile Gagal Disimpan";
    }

    ftp_cdup($ftp_conn);
}

// close connection
mysqli_close($link);
ftp_close($ftp_conn);