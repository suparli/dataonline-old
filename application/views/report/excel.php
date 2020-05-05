<?php 

header("Content-type: application/octet-stream");

header("Content-Disposition: attachment; filename= TableAws.xls");

header("Pragma: no-cache");

header("Expires: 0");

?>

<table border="1" width="100%">

    <thead>
        <tr>
            <th>No</th>
            <th>Tanggal</th>
            <th>Jam</th>
            <th>Suhu Udara</th>
            <th>Tekanan Udara</th>
            <th>Kecepatan Angin</th>
            <th>Arah Angin</th>
            <th>Curah Hujan</th>
            <th>Kelembaban</th>
        </tr>
    </thead>

    <tbody>
        <?php $i = 1 ;?>
        <?php foreach ( $dataaws as $da ) : ?>
        <tr>
            <th scope="row"><?= $i ;?></th>
            <td><?= $da['tanggal']?></td>
            <td><?= $da['time']?></td>
            <td><?= $da['suhu']?></td>
            <td><?= $da['tekanan_udara']?></td>
            <td><?= $da['kecepatan_angin']?></td>
            <td><?= $da['arah_angin']?></td>
            <td><?= $da['curah_hujan']?></td>
            <td><?= $da['kelembaban']?></td>
            <?php $i++ ;?>
            <?php endforeach ;?>
        </tbody>

    </table>