<?php
/**
 * API PRO - Formulario de Contacto con PHPMailer SMTP
 * Nivel: Production-Ready Senior
 * 
 * Features:
 * - CSRF Protection
 * - Rate Limiting
 * - Honeypot Anti-Spam
 * - PHPMailer SMTP
 * - reCAPTCHA v3
 * - Input Sanitization
 * - JSON Response
 */

declare(strict_types=1);

// Configuración fuera del web root
$configPath = dirname(__DIR__) . '/../private/config.php';
if (!file_exists($configPath)) {
    $configPath = dirname(__DIR__) . '/private/config.php';
}
require_once $configPath;

// PHPMailer
$phpmailerPath = dirname(__DIR__) . '/vendor/phpmailer/src/';
require_once $phpmailerPath . 'PHPMailer.php';
require_once $phpmailerPath . 'SMTP.php';
require_once $phpmailerPath . 'Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

// Headers de seguridad para API
header('Content-Type: application/json; charset=utf-8');
header('X-Content-Type-Options: nosniff');
header('X-Frame-Options: DENY');
header('Referrer-Policy: strict-origin-when-cross-origin');
header("Content-Security-Policy: default-src 'none'; frame-ancestors 'none';");

// Solo permitir POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    json_response(false, 'Método no permitido', [], 405);
}

// Iniciar sesión
if (session_status() === PHP_SESSION_NONE) {
    session_start([
        'cookie_secure' => true,
        'cookie_httponly' => true,
        'cookie_samesite' => 'Strict'
    ]);
}

try {
    // ===== 1. CSRF PROTECTION =====
    $csrfToken = $_POST['csrf_token'] ?? '';
    if (!verify_csrf_token($csrfToken)) {
        log_error('CSRF token inválido', 'security');
        json_response(false, 'Token de seguridad inválido', [], 403);
    }

    // ===== 2. HONEYPOT ANTI-SPAM =====
    if (!empty($_POST['website'])) {
        // Bot detectado - fingir éxito
        log_error('Honeypot activado - posible bot', 'security');
        json_response(true, 'Mensaje recibido');
    }

    // ===== 3. RATE LIMITING =====
    if (!check_rate_limit('contact_form')) {
        log_error('Rate limit excedido', 'security');
        json_response(false, 'Demasiados intentos. Por favor espera unos minutos.', [], 429);
    }

    // ===== 4. VALIDACIÓN DE DATOS =====
    $name = sanitize_input($_POST['name'] ?? '');
    $email = sanitize_email($_POST['email'] ?? '');
    $subject = sanitize_input($_POST['subject'] ?? '');
    $message = sanitize_input($_POST['message'] ?? '');

    $errors = [];

    if (strlen($name) < 2 || strlen($name) > 100) {
        $errors[] = 'El nombre debe tener entre 2 y 100 caracteres';
    }

    if (!is_valid_email($email)) {
        $errors[] = 'Por favor ingresa un email válido';
    }

    if (strlen($message) < 10 || strlen($message) > 2000) {
        $errors[] = 'El mensaje debe tener entre 10 y 2000 caracteres';
    }

    // Validar asunto
    $validSubjects = ['proyecto', 'colaboracion', 'empleo', 'consulta', 'otro', ''];
    if (!in_array($subject, $validSubjects, true)) {
        $subject = 'otro';
    }

    if (!empty($errors)) {
        json_response(false, 'Errores de validación: ' . implode(', ', $errors), [], 422);
    }

    // ===== 5. RECAPTCHA v3 (si está configurado) =====
    if (defined('RECAPTCHA_SECRET_KEY') && RECAPTCHA_SECRET_KEY !== 'TU_SECRET_KEY_AQUI') {
        $recaptchaResponse = $_POST['g-recaptcha-response'] ?? '';
        
        if (empty($recaptchaResponse)) {
            json_response(false, 'Por favor completa la verificación de seguridad', [], 400);
        }

        $verifyData = [
            'secret' => RECAPTCHA_SECRET_KEY,
            'response' => $recaptchaResponse,
            'remoteip' => $_SERVER['REMOTE_ADDR'] ?? ''
        ];

        $ch = curl_init('https://www.google.com/recaptcha/api/siteverify');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($verifyData));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
        $result = curl_exec($ch);
        curl_close($ch);

        if ($result === false) {
            log_error('Error al verificar reCAPTCHA', 'error');
            json_response(false, 'Error al verificar seguridad', [], 500);
        }

        $resultData = json_decode($result, true);
        
        if (!$resultData['success'] || ($resultData['score'] ?? 0) < RECAPTCHA_MIN_SCORE) {
            log_error('reCAPTCHA fallido - Score: ' . ($resultData['score'] ?? 'N/A'), 'security');
            json_response(false, 'Verificación de seguridad fallida. Intenta nuevamente.', [], 400);
        }
    }

    // ===== 6. ENVIAR EMAIL VIA SMTP (PHPMailer) =====
    $mail = new PHPMailer(true);

    // Configuración SMTP
    $mail->isSMTP();
    $mail->Host = SMTP_HOST;
    $mail->SMTPAuth = true;
    $mail->Username = SMTP_USER;
    $mail->Password = SMTP_PASS;
    $mail->SMTPSecure = SMTP_SECURE;
    $mail->Port = SMTP_PORT;
    
    // Opciones adicionales de seguridad
    $mail->SMTPOptions = [
        'ssl' => [
            'verify_peer' => true,
            'verify_peer_name' => true,
            'allow_self_signed' => false
        ]
    ];

    // Remitente y destinatario
    $mail->setFrom(SMTP_FROM_EMAIL, SMTP_FROM_NAME);
    $mail->addAddress(CONTACT_EMAIL);
    $mail->addReplyTo($email, $name);

    // Contenido
    $mail->isHTML(true);
    $mail->CharSet = 'UTF-8';
    
    $subjectLabels = [
        'proyecto' => 'Propuesta de proyecto',
        'colaboracion' => 'Colaboración',
        'empleo' => 'Oportunidad laboral',
        'consulta' => 'Consulta general',
        'otro' => 'Otro',
        '' => 'Consulta general'
    ];
    
    $subjectLine = $subjectLabels[$subject] ?? 'Consulta general';
    $mail->Subject = "[Portfolio] $subjectLine - " . e($name);

    // Cuerpo HTML del email
    $mail->Body = sprintf('
        <html>
        <head>
            <style>
                body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
                .container { max-width: 600px; margin: 0 auto; padding: 20px; }
                .header { background: #1a1a2e; color: white; padding: 20px; text-align: center; }
                .content { background: #f9f9f9; padding: 20px; margin: 20px 0; }
                .field { margin-bottom: 15px; }
                .label { font-weight: bold; color: #666; }
                .message { background: white; padding: 15px; border-left: 4px solid #1a1a2e; }
                .footer { text-align: center; color: #999; font-size: 12px; margin-top: 20px; }
            </style>
        </head>
        <body>
            <div class="container">
                <div class="header">
                    <h2>Nuevo mensaje desde tu Portfolio</h2>
                </div>
                <div class="content">
                    <div class="field">
                        <span class="label">Nombre:</span> %s
                    </div>
                    <div class="field">
                        <span class="label">Email:</span> <a href="mailto:%s">%s</a>
                    </div>
                    <div class="field">
                        <span class="label">Asunto:</span> %s
                    </div>
                    <div class="field">
                        <span class="label">Fecha:</span> %s
                    </div>
                    <div class="field">
                        <span class="label">IP:</span> %s
                    </div>
                    <div class="message">
                        <span class="label">Mensaje:</span><br>
                        %s
                    </div>
                </div>
                <div class="footer">
                    <p>Este mensaje fue enviado desde el formulario de contacto de tu portfolio.</p>
                </div>
            </div>
        </body>
        </html>
    ',
        e($name),
        e($email),
        e($email),
        e($subjectLine),
        date('Y-m-d H:i:s'),
        $_SERVER['REMOTE_ADDR'] ?? 'Desconocida',
        nl2br(e($message))
    );

    // Versión texto plano (fallback)
    $mail->AltBody = sprintf(
        "Nuevo mensaje desde tu Portfolio\n\n" .
        "Nombre: %s\n" .
        "Email: %s\n" .
        "Asunto: %s\n" .
        "Fecha: %s\n" .
        "IP: %s\n\n" .
        "Mensaje:\n%s",
        $name,
        $email,
        $subjectLine,
        date('Y-m-d H:i:s'),
        $_SERVER['REMOTE_ADDR'] ?? 'Desconocida',
        $message
    );

    // Enviar
    if (!$mail->send()) {
        throw new Exception($mail->ErrorInfo);
    }

    // Log de éxito
    log_error("Email enviado correctamente a $email", 'success');

    // Responder éxito
    json_response(true, 'Mensaje enviado correctamente. Te contactaré pronto.');

} catch (Exception $e) {
    log_error('Error enviando email: ' . $e->getMessage(), 'error');
    
    if (DEBUG_MODE) {
        json_response(false, 'Error: ' . $e->getMessage(), [], 500);
    } else {
        json_response(false, 'Error al enviar el mensaje. Intenta nuevamente más tarde.', [], 500);
    }
}
