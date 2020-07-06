<?php
// connect and login to FTP server
$ftp_server = "ftp.dataonline.co.id";
$ftp_username = "ftp5@dataonline.co.id";
$ftp_userpass = "9RVn&cEnQhD6";
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
            //cek exist or not
            
        
            $query = "INSERT INTO data_aws (id_aws, date, suhu, kelembaban, radiasi, curah_hujan, kecepatan_angin, arah_angin, tekanan_udara) VALUES ($id_aws, '".$tgl."', $suhu, $kelembaban, $radiasi, $curahhujan, $kecepatanangin, $arahangin, $tekananudara)";
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