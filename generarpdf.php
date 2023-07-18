<?php
session_start();

use PHPMailer\PHPMailer\PHPMailer;
include "conexion.php";
include "../proyecto/fpdf185/fpdf.php";
require "vendor/autoload.php";


use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

$user = $_GET["user"];

require 'vendor/autoload.php';

$mail = new PHPMailer(true);
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 16);
while ($row = $sql->fetch_assoc()) {
    $pdf->MultiCell(160, 10, strval('Nombre Producto: ' . $row['nombre_producto'] . '   ' . 'Precio: $ ' . $row['precio']), 1, 'L');
}
$pdfdoc = $pdf->Output("Doc", "S");
$pdflisto = chunk_split(base64_encode($pdfdoc));

try {
    //$mail->SMTPDebug = SMTP::DEBUG_SERVER;
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'a21310355@ceti.mx';
    $mail->Password = '00Camila';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    $mail->setFrom('a21310355@ceti.mx', 'Alejandro Marquez');
    $mail->addAddress('marquez1alejandro@gmail.com', 'Receptor');
    $mail->addCC('a21310355@ceti.mx');

    $mail->addStringAttachment($pdfdoc, 'Doc.pdf');

    $mail->isHTML(true);
    $mail->Subject = 'Prueba desde GMAIL';
    $mail->Body = 'Hola, <br/>Esta es una prueba desde <b>Gmail</b>.';
    $mail->send();

    echo 'Correo enviado';
} catch (Exception $e) {
    echo 'Mensaje ' . $mail->ErrorInfo;
}
$sql = mysqli_query($conexion, "INSERT INTO detalles SELECT 0, nombre_producto, precio, id_usuario FROM carrito");
$vaciar = mysqli_query($conexion, "TRUNCATE TABLE carrito");
header("Location: ../html_usuarios/Productos_usuarios.php");
?>