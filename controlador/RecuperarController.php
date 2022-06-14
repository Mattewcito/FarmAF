<?php
include_once '../modelo/Usuario.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php';

$usuario = new Usuario();
if ($_POST['funcion'] == 'verificar') {
    $email = $_POST['email'];
    $dni = $_POST['dni'];
    $usuario->verificar($email, $dni);
}
if ($_POST['funcion'] == 'recuperar') {
    $email = $_POST['email'];
    $dni = $_POST['dni'];
    $codigo = generar(10);
    $usuario->remplazar($codigo, $email, $dni);
    date_default_timezone_set('America/Bogota');
    $fecha=date('Y-m-d H:i:s');
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'faf465727@gmail.com';                     //SMTP username
        $mail->Password   = 'utpzvykabdaoivvf';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('faf465727@gmail.com', 'FarmAF');
        $mail->addAddress($email);     //Add a recipient
        //$mail->addAddress('ellen@example.com');               //Name is optional
        //$mail->addReplyTo('info@example.com', 'Information');
        //$mail->addCC('cc@example.com');
        //$mail->addBCC('bcc@example.com');

        //Attachments
        //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
        //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

        //Content
        $mensaje='
        <!DOCTYPE>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title></title>

    <style type="text/css">
        @media only screen and (min-width: 620px) {
            .u-row {
                width: 600px !important;
            }

            .u-row .u-col {
                vertical-align: top;
            }

            .u-row .u-col-50 {
                width: 300px !important;
            }

            .u-row .u-col-100 {
                width: 600px !important;
            }

        }

        @media (max-width: 620px) {
            .u-row-container {
                max-width: 100% !important;
                padding-left: 0px !important;
                padding-right: 0px !important;
            }

            .u-row .u-col {
                min-width: 320px !important;
                max-width: 100% !important;
                display: block !important;
            }

            .u-row {
                width: calc(100% - 40px) !important;
            }

            .u-col {
                width: 100% !important;
            }

            .u-col>div {
                margin: 0 auto;
            }
        }

        body {
            margin: 0;
            padding: 0;
        }

        table,
        tr,
        td {
            vertical-align: top;
            border-collapse: collapse;
        }

        p {
            margin: 0;
        }

        .ie-container table,
        .mso-container table {
            table-layout: fixed;
        }

        * {
            line-height: inherit;
        }

        a[x-apple-data-detectors=true] {
            color: inherit !important;
            text-decoration: none !important;
        }

        table,
        td {
            color: #000000;
        }

        a {
            color: #161a39;
            text-decoration: underline;
        }
    </style>
</head>
<body class="clean-body u_body"
    style="margin: 0;padding: 0;-webkit-text-size-adjust: 100%;background-color: #f9f9f9;color: #000000">

    <table
        style="border-collapse: collapse;table-layout: fixed;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;vertical-align: top;min-width: 320px;Margin: 0 auto;background-color: #f9f9f9;width:100%"
        cellpadding="0" cellspacing="0">
        <tbody>
            <tr style="vertical-align: top">
                <td style="word-break: break-word;border-collapse: collapse !important;vertical-align: top">


                    <div class="u-row-container" style="padding: 0px;background-color: #f9f9f9">
                        <div class="u-row"
                            style="Margin: 0 auto;min-width: 320px;max-width: 600px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: #f9f9f9;">
                            <div
                                style="border-collapse: collapse;display: table;width: 100%;background-color: transparent;">

                                <div class="u-col u-col-100"
                                    style="max-width: 320px;min-width: 600px;display: table-cell;vertical-align: top;">
                                    <div style="width: 100% !important;">

                                        <table style="font-family:Lato,sans-serif;" role="presentation" cellpadding="0"
                                            cellspacing="0" width="100%" border="0">
                                            <tbody>
                                                <tr>
                                                    <td style="overflow-wrap:break-word;word-break:break-word;padding:15px;font-family:Lato,sans-serif;"
                                                        align="left">

                                                        <table height="0px" align="center" border="0" cellpadding="0"
                                                            cellspacing="0" width="100%"
                                                            style="border-collapse: collapse;table-layout: fixed;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;vertical-align: top;border-top: 1px solid #f9f9f9;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%">
                                                            <tbody>
                                                                <tr style="vertical-align: top">
                                                                    <td
                                                                        style="word-break: break-word;border-collapse: collapse !important;vertical-align: top;font-size: 0px;line-height: 0px;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%">
                                                                        <span>&#160;</span>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>

                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="u-row-container" style="padding: 0px;background-color: transparent">
                        <div class="u-row"
                            style="Margin: 0 auto;min-width: 320px;max-width: 600px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: #ffffff;">
                            <div
                                style="border-collapse: collapse;display: table;width: 100%;background-color: transparent;">

                                <div class="u-col u-col-100"
                                    style="max-width: 320px;min-width: 600px;display: table-cell;vertical-align: top;">
                                    <div style="width: 100% !important;">

                                        <table style="font-family:Lato,sans-serif;" role="presentation" cellpadding="0"
                                            cellspacing="0" width="100%" border="0">
                                            <tbody>
                                                <tr>
                                                    <td style="overflow-wrap:break-word;word-break:break-word;padding:25px 10px;font-family:Lato,sans-serif;"
                                                        align="left">

                                                        <table width="100%" cellpadding="0" cellspacing="0" border="0">
                                                            <tr>
                                                                <td style="padding-right: 0px;padding-left: 0px;"
                                                                    align="center">

                                                                    <img align="center" border="0"
                                                                        src="https://i.pinimg.com/564x/5b/9c/94/5b9c942c11a35e4366b8ab5f257ddcba.jpg"
                                                                        alt="Image" title="Image"
                                                                        style="outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;clear: both;display: inline-block !important;border: none;height: auto;float: none;  width: 70px;max-width: 70px;"/>

                                                                </td>
                                                            </tr>
                                                        </table>

                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="u-row-container" style="padding: 0px;background-color: transparent">
                        <div class="u-row"
                            style="Margin: 0 auto;min-width: 320px;max-width: 600px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: #161a39;">
                            <div
                                style="border-collapse: collapse;display: table;width: 100%;background-color: transparent;">

                                <div class="u-col u-col-100"
                                    style="max-width: 320px;min-width: 600px;display: table-cell;vertical-align: top;">
                                    <div style="width: 100% !important;">

                                        <table style="font-family:Lato,sans-serif;" role="presentation" cellpadding="0"
                                            cellspacing="0" width="100%" border="0">
                                            <tbody>
                                                <tr>
                                                    <td style="overflow-wrap:break-word;word-break:break-word;padding:35px 10px 10px;font-family:Lato,sans-serif;"
                                                        align="left">

                                                        <table width="100%" cellpadding="0" cellspacing="0" border="0">
                                                            <tr>
                                                                <td style="padding-right: 0px;padding-left: 0px;"
                                                                    align="center">
                                                                    <img align="center" border="0"
                                                                        src="https://tlr.stripocdn.email/content/guids/CABINET_3df254a10a99df5e44cb27b842c2c69e/images/7331519201751184.png"
                                                                        alt="Image" title="Image"
                                                                        style="outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;clear: both;display: inline-block !important;border: none;height: auto;float: none; width: 70px;max-width: 70px;"/>
                                                                </td>
                                                            </tr>
                                                        </table>

                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <table style="font-family:Lato,sans-serif;" role="presentation" cellpadding="0"
                                            cellspacing="0" width="100%" border="0">
                                            <tbody>
                                                <tr>
                                                    <td style="overflow-wrap:break-word;word-break:break-word;padding:0px 10px 30px;font-family:Lato,sans-serif;"
                                                        align="left">
                                                        <div
                                                            style="line-height: 140%; text-align: left; word-wrap: break-word;">
                                                            <p
                                                                style="font-size: 14px; line-height: 140%; text-align: center;">
                                                                <span
                                                                    style="font-size: 28px; line-height: 39.2px; color: #ffffff; font-family: Lato, sans-serif;">Recuperacion
                                                                    de contraseña </span></p>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="u-row-container" style="padding: 0px;background-color: transparent">
                        <div class="u-row"
                            style="Margin: 0 auto;min-width: 320px;max-width: 600px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: #ffffff;">
                            <div
                                style="border-collapse: collapse;display: table;width: 100%;background-color: transparent;">
                                <div class="u-col u-col-100"
                                    style="max-width: 320px;min-width: 600px;display: table-cell;vertical-align: top;">
                                    <div style="width: 100% !important;">
                                        <table style="font-family:Lato,sans-serif;" role="presentation" cellpadding="0"
                                            cellspacing="0" width="100%" border="0">
                                            <tbody>
                                                <tr>
                                                    <td style="overflow-wrap:break-word;word-break:break-word;padding:40px 40px 30px;font-family:Lato,sans-serif;"
                                                        align="left">
                                                        <div
                                                            style="line-height: 140%; text-align: left; word-wrap: break-word;">
                                                            <p style="font-size: 14px; line-height: 140%;"><span
                                                                    style="font-size: 18px; line-height: 25.2px; color: #666666;">Hola,
                                                                    <strong>'.$dni.'</strong></span></p>
                                                            <p style="font-size: 14px; line-height: 140%;">&nbsp;</p>
                                                            <p style="font-size: 14px; line-height: 140%;"><span
                                                                    style="font-size: 18px; line-height: 25.2px; color: #666666;">
                                                                    Recibimos una solicitud de nueva contraseña para su
                                                                    cuenta en el sistema de farmacia, Hemos generado una
                                                                    contraseña nueva automática, la cual usted debe de
                                                                    ingresar al sistema.</span></p>
                                                            <p style="font-size: 14px; line-height: 140%;">&nbsp;</p>
                                                            <p style="font-size: 14px; line-height: 140%;"><span
                                                                    style="font-size: 18px; line-height: 25.2px; color: #666666;">
                                                                    La contraseña es: <strong>'.$codigo.'</strong>
                                                                </span></p>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <table style="font-family:Lato,sans-serif;" role="presentation" cellpadding="0"
                                            cellspacing="0" width="100%" border="0">
                                            <tbody>
                                                <tr>
                                                    <td style="overflow-wrap:break-word;word-break:break-word;padding:0px 40px;font-family:Lato,sans-serif;"
                                                        align="left">
                                                        <div align="left">
                                                            <a href="http://localhost/FarmAF/vista/login.php"
                                                                target="_blank"
                                                                style="box-sizing: border-box;display: inline-block;font-family:Lato,sans-serif;text-decoration: none;-webkit-text-size-adjust: none;text-align: center;color: #FFFFFF; background-color: #18163a; border-radius: 1px;-webkit-border-radius: 1px; -moz-border-radius: 1px; width:auto; max-width:100%; overflow-wrap: break-word; word-break: break-word; word-wrap:break-word; mso-border-alt: none;">
                                                                <span
                                                                    style="display:block;padding:15px 40px;line-height:120%;"><span
                                                                        style="font-size: 18px; line-height: 21.6px;">Ingresar
                                                                        al sistema!</span></span>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <table style="font-family:Lato,sans-serif;" role="presentation" cellpadding="0"
                                            cellspacing="0" width="100%" border="0">
                                            <tbody>
                                                <tr>
                                                    <td style="overflow-wrap:break-word;word-break:break-word;padding:40px 40px 30px;font-family:Lato,sans-serif;"
                                                        align="left">
                                                        <div
                                                            style="line-height: 140%; text-align: left; word-wrap: break-word;">
                                                            <p style="font-size: 14px; line-height: 140%;"><span
                                                                    style="color: #888888; font-size: 14px; line-height: 19.6px;"><em><span
                                                                            style="font-size: 16px; line-height: 22.4px;">Por
                                                                            favor ignore este correo electrónico si no
                                                                            solicitó un cambio de
                                                                            contraseña..</span></em></span><br /><span
                                                                    style="color: #888888; font-size: 14px; line-height: 19.6px;"><em><span
                                                                            style="font-size: 16px; line-height: 22.4px;">&nbsp;</span></em></span>
                                                            </p>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="u-row-container" style="padding: 0px;background-color: transparent">
                        <div class="u-row"
                            style="Margin: 0 auto;min-width: 320px;max-width: 600px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: #18163a;">
                            <div
                                style="border-collapse: collapse;display: table;width: 100%;background-color: transparent;">
                                <div class="u-col u-col-50"
                                    style="max-width: 320px;min-width: 300px;display: table-cell;vertical-align: top;">
                                    <div style="width: 100% !important;">
                                        <table style="font-family:Lato,sans-serif;" role="presentation" cellpadding="0"
                                            cellspacing="0" width="100%" border="0">
                                            <tbody>
                                                <tr>
                                                    <td style="overflow-wrap:break-word;word-break:break-word;padding:10px;font-family:Lato,sans-serif;"
                                                        align="left">
                                                        <div
                                                            style="line-height: 140%; text-align: left; word-wrap: break-word;">
                                                            <p style="font-size: 14px; line-height: 140%;"><span
                                                                    style="font-size: 16px; line-height: 22.4px; color: #ecf0f1;">*
                                                                    Si usted tiene problemas para recuperar su
                                                                    contrasena puede volver a generar la solicitud de
                                                                    cambio de contraseña.</span></p>
                                                            <br>
                                                            <p style="font-size: 14px; line-height: 140%;"><span
                                                                    style="font-size: 16px; line-height: 22.4px; color: #ecf0f1;">*
                                                                    Si el problema persiste pongase en contacto con el
                                                                    administrador del sistema.</span></p>
                                                            <br>
                                                            <p style="font-size: 14px; line-height: 140%;"><span
                                                                    style="font-size: 16px; line-height: 22.4px; color: #ecf0f1;">'.$fecha.'</span>
                                                            </p>
                                                        </div>
</body>
</html>
        ';
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Restauracion de password | FarmAF';
        $mail->Body    = $mensaje;
        //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->SMTPDebug = false;
        $mail->do_debug = false;
        $mail->send();
        echo 'Enviado';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
function generar($longitud)
{
    $key = '';
    $patron = '1234567890abcdefghijklmnopqrstuvwxyz';
    $max = strlen($patron) - 1;
    for ($i = 0; $i < $longitud; $i++) {
        $key .= $patron[mt_rand(0, $max)];
    }
    return $key;
}
