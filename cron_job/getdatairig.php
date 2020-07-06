
<?php
// connect and login to FTP server
$ftp_server = "ftp.dataonline.co.id";
$ftp_username = "irigasi@dataonline.co.id";
$ftp_userpass = "mnisuper";
$ftp_conn = ftp_connect($ftp_server) or die("Could not connect to $ftp_server");
ftp_pasv($ftp_conn, true);
$login = ftp_login($ftp_conn, $ftp_username, $ftp_userpass);

// get file list of current directory
$fileList = ftp_nlist($ftp_conn, ".");

echo is_array(ftp_nlist($ftp_conn, ".")) ? 'Connected!' : 'not Connected! :(';

include_once "tbinp.php";
$link = new mysqli( 'localhost', $unms, $pdrw, $dtsb );
if ( $link->connect_errno ) {
  die( "Failed to connect to MySQL: (" . $link->connect_errno . ") " . $link->connect_error );
}

$jml = count($fileList);

for ($x = 3; $x < $jml; $x++) {
    $namaFile = $fileList[$x];
    //echo $namaFile."<br>";
    
    $h = fopen('php://temp', 'r+');
    if (ftp_fget($ftp_conn, $h, $namaFile, FTP_BINARY)) {
        $fstats = fstat($h);
        fseek($h, 0);

        while(! feof($h)) {
            $contents = fgets($h);
            //$contents = fread($h, $fstats['size']); 
            $hasil = explode(",",$contents);
        
            //echo $contents."<br>";
        
            $idSt = $hasil[0];
            $tgl = $hasil[1];
            $bMin = $hasil[2];
            $bMak = $hasil[3];
            $irig1 = $hasil[4];
            $kat1 = $hasil[5];
            $irig2 = $hasil[6];
            $kat2 = $hasil[7];
        
            $query = "INSERT INTO data_irigasi (idData, idStas, tgl, kat1, kat2, irig1,irig2,mak, min) VALUES (NULL, ".$idSt.", '".$tgl."', ".$kat1.", ".$kat2.", ".$irig1.", ".$irig2.", ".$bMak.", ".$bMin.");";
            //echo $query;
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