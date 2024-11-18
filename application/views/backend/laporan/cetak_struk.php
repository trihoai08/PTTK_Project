<?php
require_once(APPPATH.'vendor/mike42/escpos-php/autoload.php');
use Mike42\Escpos\Printer;
use Mike42\Escpos\EscposImage;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;

$date = date('d-M-Y H:i:s');  
$connector = new WindowsPrintConnector("POS58");
// $logo = EscposImage::load("./assets/img/logo.png", false);
$printer = new Printer($connector);
$printer -> initialize();

// Tạo mã QR cho mã đơn hàng
$testStr = ($cetak[0]['kd_order']);
$sizes = array(
    15 => "(tối đa)"
);
foreach ($sizes as $size => $label) {
    $printer -> setJustification(Printer::JUSTIFY_CENTER);
    $printer -> qrCode($testStr, Printer::QR_ECLEVEL_L, $size);
    $printer -> text($cetak[0]['kd_order']);
    $printer -> setJustification();
}
$printer -> feed(1);      

// Tên cửa hàng
$printer -> setJustification(Printer::JUSTIFY_CENTER);
// $printer -> bitImage($logo);
$printer -> selectPrintMode(Printer::MODE_DOUBLE_WIDTH);
$printer -> text("BTBS\n");
$printer -> selectPrintMode();
$printer -> text("Địa chỉ: Jl. Meruya Ilir Raya\n");
$printer -> text("Khu vực: Srengseng - Kembangan\n");
$printer -> text("Thành phố: Jakarta Barat\n");
$printer -> text("================================\n");

$printer -> setJustification(Printer::JUSTIFY_LEFT);
$printer -> text("Mã Đơn Hàng  : ");
$printer -> text($cetak[0]['kd_order']);
$printer -> feed();
$printer -> text("Tên Khách Hàng : ");
$printer -> text($cetak[0]['nama_temp']);
$printer -> feed();
$printer -> text("--------------------------------\n"); 

// Tiêu đề hóa đơn
$printer -> setEmphasis(true);
$printer -> text("Thông Tin                Tổng");
$printer -> setEmphasis(false);

foreach ($cetak as $i) {
    $printer -> feed();
    $printer -> setJustification(Printer::JUSTIFY_LEFT);
    $printer -> text($i['kd_tiket']);
    $printer -> feed();
    $printer -> text($i['kd_jadwal']);
    $printer -> text("      ");
    $printer -> text($i['harga_tiket']);
    $printer -> text("      ");
    $printer -> text($i['harga_tiket']);
}

$printer -> feed();
$printer -> text("--------------------------------\n");
$printer -> setEmphasis(true);
$printer -> text("Tổng Cộng :              ");
if (count($cetak) == '2') { 
    $total = $cetak[0]['harga_tiket'] + $cetak[0]['harga_tiket'];
} else { 
    $total = $cetak[0]['harga_tiket'];
}
$printer -> text($total);
$printer -> setEmphasis(false);
$printer -> feed();
$printer -> text("--------------------------------\n");

// Chân trang
$printer -> feed();
$printer -> setJustification(Printer::JUSTIFY_CENTER);
$printer -> text("Cảm ơn quý khách \n");
$printer -> text($date . "\n");
$printer -> feed();

/* Cắt hóa đơn và mở ngăn kéo */
$printer -> cut();
$printer -> pulse();
$printer -> close();
$printer -> close();

redirect('tiket/tiketsaya/'.$cetak[0]['kd_pelanggan']);
