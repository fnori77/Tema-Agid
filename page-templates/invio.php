<?php 

include_once($_SERVER['DOCUMENT_ROOT'].'/wp-load.php');

$to = "f.nori@we-com.it";
$nome = $_POST['nome'];
$mail = $_POST['mail'];
$categoria = $_POST['categoria'];
$luogo = $_POST['luogo'];
$oggetto = $_POST['oggetto'];
$messaggioTesto = $_POST['messaggio'];

$messaggio = "
Segnalazione disservizio
Nome: $nome
Mail: $mail
Categoria: $categoria
Luogo: $luogo
Oggetto: $oggetto
Messaggio: $messaggioTesto
";

$headers = "From: $to";
$semi_rand = md5(time());
$mime_boundary = "==Multipart_Boundary_x{$semi_rand}x";

$headers .= "\nMIME-Version: 1.0\n";
$headers .= "Content-Type: multipart/mixed;\n";
$headers .= " boundary=\"{$mime_boundary}\"";

$msg = "This is a multi-part message in MIME format.\n\n";
$msg .= "--{$mime_boundary}\n";
$msg .= "Content-Type: text/plain; charset=\"iso-8859-1\"\n";
$msg .= "Content-Transfer-Encoding: 7bit\n\n";
$msg .= $messaggio . "\n\n";

// Gestisci dinamicamente gli allegati
foreach ($_FILES as $key => $file) {
    $tmp_name = $file['tmp_name'];
    $type = $file['type'];
    $name = $file['name'];

    if (is_uploaded_file($tmp_name)) {
        $file = fopen($tmp_name, 'rb');
        $data = fread($file, filesize($tmp_name));
        fclose($file);
        $data = chunk_split(base64_encode($data));

        $msg .= "--{$mime_boundary}\n";
        $msg .= "Content-Type: {$type};\n";
        $msg .= " name=\"{$name}\"\n";
        $msg .= "Content-Transfer-Encoding: base64\n\n";
        $msg .= $data . "\n\n";
    }
}

$msg .= "--{$mime_boundary}--\n";

if (wp_mail($to, $oggetto, $msg, $headers)) {
    echo '<script>alert("Il messaggio è stato inviato correttamente. Sarete ricontattati il prima possibile.")</script>';
} else {
    echo '<script>alert("Qualcosa è andato storto. Riprova.")</script>';
}

?>
<meta http-equiv='refresh' content='0; https://comune.nerola.rm.it/segnala-disservizio/'>
