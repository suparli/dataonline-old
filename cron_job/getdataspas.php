<?php
// connect and login to FTP server
$ftp_server = "ftp.mni.my.id";
$ftp_username = "spas@mni.my.id";
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
            $curahhhujan= $hasil[2];
            $tinggimukaair = $hasil[3];
            $kecepatanair = $hasil[4];
          

            $tcurahhujan=strtoupper($curahhujan);
            if ($tcurahhujan=="NAN") {
                $curahhujan="null";
            }
            $ttinggimukaair=strtoupper($tinggimukaair);
            if ($ttinggimukaair=="NAN") {
                $tinggimukaair="null";
            }
            $tkecepatanair=strtoupper($kecepatanair);
            if ($tkecepatanair=="NAN") {
                $kecepatanair="null";
            }
            //cek exist or not
            
        
            $query = "INSERT INTO data_spas (id_aws, date, curah_hujan, tinggi_muka_air, kecepatan_air) VALUES ($id_aws, '".$tgl."', $curahhujan, $tinggimukaair, $kecepatanair)";
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