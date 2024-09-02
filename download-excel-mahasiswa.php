<?php
session_start();
//membatasi halaman login
 if (!isset($_SESSION["login"])) {
      echo "<script>
      alert('login lah boy');
          document.location.href ='login.php';
      </script>";
      exit;
 }

   if ($_SESSION["level"] != 1 and $_SESSION['level'] != 3 ) {
      echo "<script>
      alert('lapo ng kene');
          document.location.href ='crud-modal.php';
      </script>";
      exit;
 }

require 'config/app.php';

require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();
$sheet->setCellValue('A2', 'No');
$sheet->setCellValue('B2', 'nama');
$sheet->setCellValue('C2', 'program studi');
$sheet->setCellValue('D2', 'jenis kelamin');
$sheet->setCellValue('E2', 'telepon');
$sheet->setCellValue('F2', 'email');
$sheet->setCellValue('G2', 'foto');

$data_mahasiswa =select("SELECT * FROM mahasiswa");

$no = 1;
$start = 3;

foreach ($data_mahasiswa as $mahasiswa) {
    $sheet->setCellValue('A' . $start, $no++)->getColumnDimension('A')->setAutoSize(true);
    $sheet->setCellValue('B' . $start, $mahasiswa['nama'])->getColumnDimension('B')->setAutoSize(true);
    $sheet->setCellValue('C' . $start, $mahasiswa['prodi'])->getColumnDimension('C')->setAutoSize(true);
    $sheet->setCellValue('D' . $start, $mahasiswa['jk'])->getColumnDimension('D')->setAutoSize(true);
    $sheet->setCellValue('E' . $start, $mahasiswa['telepon'])->getColumnDimension('E')->setAutoSize(true);
    $sheet->setCellValue('F' . $start, $mahasiswa['email'])->getColumnDimension('F')->setAutoSize(true);
    $sheet->setCellValue('G' . $start, 'http://localhost/crud-php/assets/img/'.$mahasiswa['foto'])->getColumnDimension('G')->setAutoSize(true);

    $start++;
}

$styleArray = [
    'borders' => [
        'allBorders' => [
            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
        ],
    ],
];

$border = $start -1;

$sheet->getStyle('A2:G'.$border)->applyFromArray($styleArray);

$writer = new Xlsx($spreadsheet);
$writer->save('Laporan Data Mahasiswa.xlsx');
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheet.sheet');
header('Content-Disposition: attachment;filename="Laporan Data Mahasiswa.xlsx"');
readfile('Laporan Data Mahasiswa.xlsx');
unlink('Laporan Data Mahasiswa.xlsx');
exit;