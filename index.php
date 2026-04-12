<?php
/**
 * Portfolio PRO - Entry Point
 * Juan Carlos de León Silva
 * 
 * Inicialización segura con CSP nonce
 */

declare(strict_types=1);

// Cargar configuración desde directorio privado (fuera del web root)
$configPath = __DIR__ . '/../private/config.php';
if (!file_exists($configPath)) {
    // Fallback para desarrollo local
    $configPath = __DIR__ . '/private/config.php';
}
require_once $configPath;

// Generar CSP nonce único por request
$CSP_NONCE = generate_csp_nonce();

// Enviar headers de seguridad
header('X-Frame-Options: SAMEORIGIN');
header('X-Content-Type-Options: nosniff');
header('X-XSS-Protection: 1; mode=block');
header('Referrer-Policy: strict-origin-when-cross-origin');

// CSP con nonce dinámico
header("Content-Security-Policy: default-src 'self'; script-src 'self' 'nonce-{$CSP_NONCE}'; style-src 'self' 'unsafe-inline'; img-src 'self' data: https:; font-src 'self'; connect-src 'self'; frame-ancestors 'self'; base-uri 'self'; form-action 'self';");

// Iniciar sesión segura
if (session_status() === PHP_SESSION_NONE) {
    session_start([
        'cookie_secure' => true,
        'cookie_httponly' => true,
        'cookie_samesite' => 'Strict',
        'use_strict_mode' => true,
        'gc_maxlifetime' => 3600
    ]);
}

?>
<!DOCTYPE html>
<html lang="es">

<?php include 'partials/head.php'; ?>

<body>

  <?php include 'partials/header.php'; ?>

  <main>

    <?php include 'partials/intro.php'; ?>

    <hr class="hr" />

    <?php include 'partials/about.php'; ?>

    <hr class="hr" />

    <?php include 'partials/education.php'; ?>

    <hr class="hr" />

    <?php include 'partials/projects.php'; ?>

    <hr class="hr" />

    <?php include 'partials/contact.php'; ?>

  </main>

  <?php include 'partials/footer.php'; ?>

  <button id="backToTop" class="back-to-top" aria-label="Volver arriba">
    <img src="assets/img/icons/up.png" alt="Volver arriba" loading="lazy" width="40" height="40" />
  </button>

  <script nonce="<?php echo e($CSP_NONCE); ?>" src="<?php echo asset('assets/js/script.js'); ?>" defer></script>
</body>

</html>
