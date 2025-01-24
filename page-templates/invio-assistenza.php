<?php 

include_once($_SERVER['DOCUMENT_ROOT'].'/wp-load.php');

$to = "f.nori@we-com.it";
$nome = $_POST['nome'];
$mail = $_POST['mail'];
$serviceCategory = $_POST['serviceCategory'];
$servizio = $_POST['servizio'];
$oggetto = $_POST['oggetto'];
$messaggioTesto = $_POST['messaggio'];

$messaggio = "
Richiesta assistenza
Nome: $nome
Mail: $mail
Categoria di servizio: $serviceCategory
Servizio: $servizio
Oggetto: $oggetto
Messaggio: $messaggioTesto
";
// Intestazioni del messaggio
$headers = "From: $to\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: multipart/mixed; boundary=\"boundary\"\r\n";

// Separatore tra il messaggio e gli allegati
$boundary = "b1" . md5(uniqid(time()));

// Costruzione del messaggio con allegati
$msg = "--boundary\r\n";
$msg .= "Content-Type: text/plain; charset=\"iso-8859-1\"\r\n";
$msg .= "Content-Transfer-Encoding: 7bit\r\n\r\n";
$msg .= $messaggio . "\r\n\r\n";

// Gestione degli allegati
foreach ($_FILES as $key => $file) {
    $tmp_name = $file['tmp_name'];
    $type = $file['type'];
    $name = $file['name'];

    if (is_uploaded_file($tmp_name)) {
        $file_contents = file_get_contents($tmp_name);
        $encoded_file = chunk_split(base64_encode($file_contents));

        // Parte dell'allegato
        $msg .= "--boundary\r\n";
        $msg .= "Content-Type: $type; name=\"$name\"\r\n";
        $msg .= "Content-Disposition: attachment; filename=\"$name\"\r\n";
        $msg .= "Content-Transfer-Encoding: base64\r\n\r\n";
        $msg .= $encoded_file . "\r\n\r\n";
    }
}

$msg .= "--boundary--";

// Invia email all'indirizzo ufficiale
if (wp_mail($to, $oggetto, $msg, $headers)) {
    echo '<script>alert("Il messaggio è stato inviato correttamente. Sarete ricontattati il prima possibile.")</script>';
} else {
    echo '<script>alert("Qualcosa è andato storto. Riprova.")</script>';
}

// Invia email all'utente che ha compilato il form senza le intestazioni MIME
$user_message = "
Gentile $nome,

Abbiamo ricevuto la tua richiesta di assistenza con i seguenti dettagli:

Categoria di servizio: $serviceCategory
Servizio: $servizio
Oggetto: $oggetto
Messaggio: $messaggioTesto

Sarete ricontattati il prima possibile.

Cordiali saluti,
Il Comune di Fratta Todina
";

$user_headers = "From: $to";
if (wp_mail($mail, "Conferma: $oggetto", $user_message, $user_headers)) {
    echo '<script>alert("Una copia del messaggio è stata inviata al tuo indirizzo email.")</script>';
} else {
    echo '<script>alert("Qualcosa è andato storto nell\'invio della copia del messaggio al tuo indirizzo email.")</script>';
}

?>
<meta http-equiv='refresh' content='0; https://comune.frattatodina.pg.it/richiesta-assistenza/'>
