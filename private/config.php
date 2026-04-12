<?php
/**
 * CONFIGURACIÓN PRO - Portfolio Senior
 * Ubicación: /private/config.php (FUERA de public_html)
 * 
 * Esta ubicación previene acceso directo desde web
 * require_once: dirname(__DIR__) . '/private/config.php'
 */

declare(strict_types=1);

// ============================================
// ENTORNO Y DEBUG
// ============================================
define('DEBUG_MODE', false);
define('SITE_NAME', 'Juan Carlos de León Silva');
define('SITE_TITLE', 'Desarrollador y Analista de Sistemas');
define('SITE_DESCRIPTION', 'Portfolio profesional de Juan Carlos de León Silva. Desarrollador y Analista de Sistemas con 12 años de experiencia en tecnología.');
define('SITE_URL', 'https://juancaco10.github.io');
define('SITE_LOCALE', 'es_UY');

// ============================================
// CONTACTO Y NOTIFICACIONES
// ============================================
define('CONTACT_EMAIL', 'tu-email-real@ejemplo.com'); // ⚠️ CAMBIAR
define('CONTACT_PHONE', '+59898707486');
define('CONTACT_WHATSAPP_ENABLED', true);
define('CONTACT_FORM_ENABLED', true);

// ============================================
// RECAPTCHA v3 (Obtener en google.com/recaptcha)
// ============================================
define('RECAPTCHA_SITE_KEY', 'TU_SITE_KEY_AQUI');     // ⚠️ CAMBIAR
define('RECAPTCHA_SECRET_KEY', 'TU_SECRET_KEY_AQUI'); // ⚠️ CAMBIAR
define('RECAPTCHA_MIN_SCORE', 0.5);

// ============================================
// SMTP CONFIGURACIÓN (Para PHPMailer)
// ============================================
define('SMTP_HOST', 'smtp.tu-proveedor.com');      // ej: smtp.gmail.com, smtp.mailgun.org
define('SMTP_PORT', 587);                          // 587 para TLS, 465 para SSL
define('SMTP_USER', 'tu-email@dominio.com');       // ⚠️ CAMBIAR
define('SMTP_PASS', 'TU_PASSWORD_O_APP_PASSWORD'); // ⚠️ CAMBIAR - Usar App Password si es Gmail
define('SMTP_SECURE', 'tls');                      // 'tls' o 'ssl'
define('SMTP_FROM_NAME', SITE_NAME);
define('SMTP_FROM_EMAIL', SMTP_USER);

// ============================================
// REDES SOCIALES
// ============================================
define('SOCIAL_GITHUB', 'https://github.com/juancaco10');
define('SOCIAL_LINKEDIN', 'https://www.linkedin.com/in/juandeleonsilva/');
define('SOCIAL_WHATSAPP', 'https://wa.me/+59898707486');

// ============================================
// SEO Y METADATOS
// ============================================
define('OG_IMAGE', 'assets/img/juan.jpg');
define('TWITTER_HANDLE', '@juancaco10');

// ============================================
// SEGURIDAD
// ============================================
define('CSRF_TOKEN_NAME', 'csrf_token');
define('SESSION_SECURE', true);
define('SESSION_HTTP_ONLY', true);
define('SESSION_LIFETIME', 3600); // 1 hora

// Rate limiting
define('RATE_LIMIT_MAX_ATTEMPTS', 5);
define('RATE_LIMIT_DECAY_MINUTES', 1);

// ============================================
// FUNCIONES DE UTILIDAD CORE
// ============================================

/**
 * Escapar output para prevenir XSS
 * Alias corto de htmlspecialchars
 */
function e(string $text): string {
    return htmlspecialchars($text, ENT_QUOTES | ENT_HTML5, 'UTF-8');
}

/**
 * Sanitizar input general
 */
function sanitize_input(string $data): string {
    $data = trim($data);
    $data = stripslashes($data);
    return htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
}

/**
 * Sanitizar email
 */
function sanitize_email(string $email): string {
    return filter_var(trim($email), FILTER_SANITIZE_EMAIL);
}

/**
 * Validar email
 */
function is_valid_email(string $email): bool {
    return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
}

/**
 * Generar nonce para CSP
 * Debe llamarse una sola vez por request en index.php
 */
function generate_csp_nonce(): string {
    if (!isset($GLOBALS['CSP_NONCE'])) {
        $GLOBALS['CSP_NONCE'] = base64_encode(random_bytes(16));
    }
    return $GLOBALS['CSP_NONCE'];
}

/**
 * Obtener nonce CSP actual
 */
function get_csp_nonce(): string {
    return $GLOBALS['CSP_NONCE'] ?? generate_csp_nonce();
}

/**
 * Cache busting para assets
 * Genera URL con versión basada en timestamp del archivo
 */
function asset(string $path): string {
    // Detectar si estamos en subdirectorio
    $basePath = $_SERVER['DOCUMENT_ROOT'];
    $fullPath = $basePath . '/' . ltrim($path, '/');
    
    // Timestamp como versión
    $version = file_exists($fullPath) ? filemtime($fullPath) : time();
    
    return $path . '?v=' . $version;
}

/**
 * Generar token CSRF
 */
function generate_csrf_token(): string {
    if (session_status() === PHP_SESSION_NONE) {
        session_start([
            'cookie_secure' => SESSION_SECURE,
            'cookie_httponly' => SESSION_HTTP_ONLY,
            'gc_maxlifetime' => SESSION_LIFETIME
        ]);
    }
    
    if (!isset($_SESSION[CSRF_TOKEN_NAME])) {
        $_SESSION[CSRF_TOKEN_NAME] = bin2hex(random_bytes(32));
    }
    
    return $_SESSION[CSRF_TOKEN_NAME];
}

/**
 * Verificar token CSRF
 */
function verify_csrf_token(string $token): bool {
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    
    return isset($_SESSION[CSRF_TOKEN_NAME]) && 
           hash_equals($_SESSION[CSRF_TOKEN_NAME], $token);
}

/**
 * Rate limiting simple basado en sesión
 */
function check_rate_limit(string $action = 'default'): bool {
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    
    $key = 'rate_limit_' . $action;
    $now = time();
    
    if (!isset($_SESSION[$key])) {
        $_SESSION[$key] = ['count' => 1, 'time' => $now];
        return true;
    }
    
    $data = $_SESSION[$key];
    
    // Resetear si pasó el tiempo de decay
    if ($now - $data['time'] > (RATE_LIMIT_DECAY_MINUTES * 60)) {
        $_SESSION[$key] = ['count' => 1, 'time' => $now];
        return true;
    }
    
    // Incrementar contador
    $_SESSION[$key]['count']++;
    
    return $data['count'] < RATE_LIMIT_MAX_ATTEMPTS;
}

/**
 * Respuesta JSON estandarizada para API
 */
function json_response(bool $success, string $message = '', array $data = [], int $code = 200): void {
    http_response_code($code);
    header('Content-Type: application/json; charset=utf-8');
    header('X-Content-Type-Options: nosniff');
    
    echo json_encode([
        'success' => $success,
        'message' => $message,
        'data' => $data
    ], JSON_THROW_ON_ERROR);
    
    exit;
}

/**
 * Log de errores seguro
 */
function log_error(string $message, string $type = 'error'): void {
    $logDir = dirname(__DIR__) . '/logs';
    
    if (!is_dir($logDir)) {
        @mkdir($logDir, 0750, true);
    }
    
    $logFile = $logDir . '/' . $type . '_' . date('Y-m-d') . '.log';
    $entry = sprintf(
        "[%s] %s | IP: %s | UA: %s\n",
        date('Y-m-d H:i:s'),
        $message,
        $_SERVER['REMOTE_ADDR'] ?? 'unknown',
        $_SERVER['HTTP_USER_AGENT'] ?? 'unknown'
    );
    
    error_log($entry, 3, $logFile);
}

// ============================================
// INICIALIZACIÓN DE SESIÓN SEGURA
// ============================================
if (session_status() === PHP_SESSION_NONE && !defined('NO_SESSION')) {
    ini_set('session.cookie_httponly', '1');
    ini_set('session.cookie_secure', '1');
    ini_set('session.cookie_samesite', 'Strict');
    ini_set('session.use_strict_mode', '1');
    ini_set('session.gc_maxlifetime', SESSION_LIFETIME);
}
