<?php
date_default_timezone_set("Europe/Madrid"); // Configurar la zona horaria

// Recibir datos del formulario y validar
$nombre_remitente = htmlspecialchars($_POST["nombre_remitente"] ?? '');
$remitente = filter_var($_POST["remitente"] ?? '', FILTER_VALIDATE_EMAIL);
$destinatario = filter_var($_POST["destinatario"] ?? '', FILTER_VALIDATE_EMAIL);
$asunto = htmlspecialchars($_POST["asunto"] ?? '');
$mensaje = htmlspecialchars($_POST["mensaje"] ?? '');
$pagina_web = filter_var($_POST["pagina_web"] ?? '', FILTER_VALIDATE_URL);

// Validar campos obligatorios
if (!$nombre_remitente || !$remitente || !$destinatario || !$asunto || !$mensaje || !$pagina_web) {
    die("Error: Todos los campos son obligatorios.");
}

// Configurar encabezados del correo
$headers = "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/html; charset=utf-8\r\n";
$headers .= "From: {$nombre_remitente} <{$remitente}>\r\n";

// Cuerpo del mensaje con el diseño proporcionado
$cuerpo = '
<html>
    <head>
        <title>' . htmlspecialchars($asunto) . '</title>
    </head>
    <body style="font-family: Arial, sans-serif; margin: 0; padding: 0; background-color: #f4f4f4;">
        <table width="100%" border="0" cellspacing="0" cellpadding="0" style="background-color: #f4f4f4; padding: 20px;">
            <tr>
                <td align="center">
                    <table width="600px" border="0" cellspacing="0" cellpadding="0" style="background-color: #ffffff; padding: 20px; border-radius: 10px; box-shadow: 0 2px 5px rgba(0,0,0,0.1);">
                        <tr>
                            <td align="center" style="padding: 10px 0;">
                                <h1 style="color: #333333; margin: 0; font-size: 24px;">' . htmlspecialchars($asunto) . '</h1>
                            </td>
                        </tr>
                        <tr>
                            <td style="padding: 10px 0; color: #555555; font-size: 16px; line-height: 1.5;">
                                <p>Hola,</p>
                                <p>' . nl2br(htmlspecialchars($mensaje)) . '</p>
                                <p style="margin-top: 20px;">Gracias,<br>' . htmlspecialchars($nombre_remitente) . '</p>
                            </td>
                        </tr>
                        <tr>
                            <td align="center" style="padding: 20px 0;">
                                <a href="' . htmlspecialchars($pagina_web) . '" style="text-decoration: none; color: #ffffff; background-color: #007bff; padding: 10px 20px; border-radius: 5px; font-size: 16px;">Visita nuestra web</a>
                            </td>
                        </tr>
                        <tr>
                            <td align="center" style="padding: 10px 0; color: #999999; font-size: 12px;">
                                <p>Este correo es generado automáticamente. Por favor, no respondas a este mensaje.</p>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </body>
</html>';

// Enviar el correo
if (mail($destinatario, $asunto, $cuerpo, $headers)) {
    echo "Correo enviado exitosamente a: {$destinatario}";
} else {
    echo "Error al enviar el correo.";
}
