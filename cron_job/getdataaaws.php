<?php
// connect and login to FTP server
$ftp_server = "ftp.mni.my.id";
$ftp_username = "aaws@mni.my.id";
$ftp_userpass = "mnisuper";
$ftp_conn = ftp_connect($ftp_server) or die("Could not connect to $ftp_server");
ftp_pasv($ftp_conn, true);
$login = ftp_login($ftp_conn, $ftp_username, $ftp_userpass);
//ftp_pasv($ftp_conn, true);
// get file list of current directory
$fileList = ftp_nlist($ftp_conn, ".");

include_once "tbinp.php";
$link = new mysqli( 'localhost', $username, $password, $database );
if ( $link->connect_errno ) {
  die( "Failed to connect to mysql: (" . $link->connect_errno . ") " . $link->connect_error );
}

$jml = count($fileList);
//echo $fileList;
echo is_array(ftp_nlist($ftp_conn, ".")) ? 'Connected!' : 'not Connected! :(';
for ($x = 3; $x < $jml; $x++) {
    $namaFile = $fileList[$x];
    echo $namaFile."<br>";
    
    $h = fopen('php://temp', 'r+');
    if (ftp_fget($ftp_conn, $h, $namaFile, FTP_BINARY)) {
        $fstats = fstat($h);
        fseek($h, 0);



        while(! feof($h)) {
            $contents = fgets($h);
            //$contents = fread($h, $fstats['size']); 
            $hasil = explode(",",$contents);
        
            //echo $contents."<br>";
            
            //yang ini
            $id_aws = $hasil[0];
            $tgl = $hasil[1];
            $suhu= $hasil[2];
            $kelembaban = $hasil[3];
            $radiasi = $hasil[4];
            $curahhujan = $hasil[5];
            $kecepatanangin = $hasil[6];
            $arahangin = $hasil[7];
            $tekananudara = $hasil[8];
            $soilmosture = $hasil[9];
            $suhutanah = $hasil[10];
            $leafwetnes = $hasil[11];
            $aux1 = $hasil[12];
            $aux2 = $hasil[13];
            $aux3 = $hasil[14];

            $tsuhu=strtoupper($suhu);
            if ($tsuhu=="NAN") {
                $suhu="null";
            }
            $tkelembaban=strtoupper($kelembaban);
            if ($tkelembaban=="NAN") {
                $kelembaban="null";
            }
            $tradiasi=strtoupper($radiasi);
            if ($tradiasi=="NAN") {
                $radiasi="null";
            }
            $tcurahhujan=strtoupper($curahhujan);
            if ($tcurahhujan=="NAN") {
                $curahhujan="null";
            }
            $tkecepatanangin=strtoupper($kecepatanangin);
            if ($tkecepatanangin=="NAN") {
                $kecepatanangin="null";
            }
            $tarahangin=strtoupper($arahangin);
            if ($tarahangin=="NAN") {
                $arahangin="null";
            }
            $ttekananudara=strtoupper($tekananudara);
            if ($ttekananudara=="NAN") {
                $tekananudara="null";
            }
            $tsoilmosture=strtoupper($soilmosture);
            if ($tsoilmosture=="NAN") {
                $soilmosture="null";
            }
            $tsuhutanah=strtoupper($suhutanah);
            if ($tsuhutanah=="NAN") {
                $suhutanah="null";
            }
            $tleafwetnes=strtoupper($leafwetnes);
            if ($tleafwetnes=="NAN") {
                $leafwetnes="null";
            }
            $taux1=strtoupper($aux1);
            if ($taux1=="NAN") {
                $aux1="null";
            }
            $taux2=strtoupper($aux2);
            if ($taux2=="NAN") {
                $aux2="null";
            }
            $taux3=strtoupper($aux3);
            if ($taux3=="NAN") {
                $aux3="null";
            }
            //cek exist or not
            
        
            $query = "INSERT INTO data_aaws (id_aws, date, suhu, kelembaban, radiasi, curah_hujan, kecepatan_angin, arah_angin, tekanan_udara , soil_mosture, suhu_tanah, leafwetnes, aux1, aux2, aux3 ) VALUES ($id_aws, '".$tgl."', $suhu, $kelembaban, $radiasi, $curahhujan, $kecepatanangin, $arahangin, $tekananudara, $soilmosture, $suhutanah, $leafwetnes, $aux1, $aux2, $aux3)";
            //$query."<br>";
            $result = $link->query($query);
        
        
            if ($result) {
                ftp_delete($ftp_conn,$namaFile);
                echo "berhasil!";
            }
        }
        
        //$contents = fread($h, $fstats['size']);
        
        fclose($h);
        //fclose($h);
    } else {
        echo "gagal";
    }
}

// close connection
mysqli_close($link);
ftp_close($ftp_conn);
?>