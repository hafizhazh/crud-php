<?php

require __DIR__.'/vendor/autoload.php';
require 'config/app.php';

use Spipu\Html2Pdf\Html2Pdf;

$data_barang = select("SELECT * FROM mahasiswa");

$content .='<style type="text/css">
.gambar{
width: 50px;
}
</style>'; 

$content .='
<page>
    <table border="1" align="center">
    <tr>
        <th>no</th>
        <th>nama</th>
        <th>program studi</th>
        <th>jenis kelamin</th>
        <th>telepon</th>
        <th>email</th>
        <th>foto</th>
    </tr>';

    $no = 1;
    foreach ($data_barang as $barang) {
        $content .='
            <tr>
                <td>'.$no++.'</td>
                <td>'.$barang['nama'].'</td>
                <td>'.$barang['prodi'].'</td>
                <td>'.$barang['jk'].'</td>
                <td>'.$barang['telepon'].'</td>
                <td>'.$barang['email'].'</td>
                <td><img src="assets/img/'.$barang['foto'].'" class="gambar" ></td>
            </tr>
        ';
    }

$content .='
</table>
</page>';

$html2pdf = new Html2Pdf();
$html2pdf->writeHTML($content);
ob_start();
$html2pdf->output('laporan-mahasiswa.pdf');
