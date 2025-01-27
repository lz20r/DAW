<?php
date_default_timezone_set("Europe/Madrid"); // Configurar la zona horaria

$archivo = "correos_programados.json";
if (!file_exists($archivo)) {
    file_put_contents($archivo, json_encode([])); // Crear archivo si no existe
}
$correos = json_decode(file_get_contents($archivo), true) ?? [];
$fecha_hora_actual = time();

foreach ($correos as $index => $correo) {
    $fecha_hora_envio = strtotime($correo['fecha_hora_envio']);

    // Permitir envíos pasados pero advertir
    if ($fecha_hora_envio <= $fecha_hora_actual) {
        echo "Procesando correo programado para {$correo['destinatario']} en {$correo['fecha_hora_envio']}...<br>";

        $headers = "MIME-Version: 1.0\r\n";
        $headers .= "Content-type: text/html; charset=utf-8\r\n";
        $headers .= "From: {$correo['nombre_remitente']} <{$correo['remitente']}>\r\n";

        // Cuerpo del mensaje con el diseño proporcionado
        $cuerpo = '
        <html>
            <head>
                <title>' . htmlspecialchars($correo['asunto']) . '</title>
            </head>
            <body style="font-family: Arial, sans-serif; margin: 0; padding: 0; background-color: #f4f4f4;">
                <table width="100%" border="0" cellspacing="0" cellpadding="0" style="background-color: #f4f4f4; padding: 20px;">
                    <tr>
                        <td align="center">
                            <table width="600px" border="0" cellspacing="0" cellpadding="0" style="background-color: #ffffff; padding: 20px; border-radius: 10px; box-shadow: 0 2px 5px rgba(0,0,0,0.1);">
                                <tr>
                                    <td align="center" style="padding: 10px 0;">
                                        <h1 style="color: #333333; margin: 0; font-size: 24px;">' . htmlspecialchars($correo['asunto']) . '</h1>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding: 10px 0; color: #555555; font-size: 16px; line-height: 1.5;">
                                        <p>Hola,</p>
                                        <p>' . nl2br(htmlspecialchars($correo['mensaje'])) . '</p>
                                        <p style="margin-top: 20px;">Gracias,<br>' . htmlspecialchars($correo['nombre_remitente']) . '</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center" style="padding: 20px 0;">
                                        <a href="#" style="text-decoration: none; color: #ffffff; background-color: #007bff; padding: 10px 20px; border-radius: 5px; font-size: 16px;">Visita nuestra web</a>
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

        // Intentar enviar el correo
        if (mail($correo['destinatario'], $correo['asunto'], $cuerpo, $headers)) {
            echo "Correo enviado a: {$correo['destinatario']}<br>";
            unset($correos[$index]); // Eliminar correo enviado
        } else {
            echo "Error al enviar correo a: {$correo['destinatario']}<br>";
        }
    } else {
        echo "Correo pendiente para envío futuro: {$correo['destinatario']} en {$correo['fecha_hora_envio']}<br>";
    }
}

// Guardar los correos pendientes nuevamente
file_put_contents($archivo, json_encode(array_values($correos), JSON_PRETTY_PRINT));

echo "Ejecución completada a las " . date("Y-m-d H:i:s") . ".";