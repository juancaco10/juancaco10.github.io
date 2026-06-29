<?php 
// Incluir config si no está incluido
if (!defined('SITE_NAME')) {
    $configPath = dirname(__DIR__) . '/../private/config.php';
    if (!file_exists($configPath)) {
        $configPath = dirname(__DIR__) . '/private/config.php';
    }
    require_once $configPath;
}

// Obtener nonce CSP global
$CSP_NONCE = $GLOBALS['CSP_NONCE'] ?? get_csp_nonce();
?>
<head>
  <!-- Metadatos Básicos -->
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  
  <!-- SEO Básico -->
  <title><?php echo e(SITE_NAME); ?> | <?php echo e(SITE_TITLE); ?></title>
  <meta name="description" content="<?php echo e(SITE_DESCRIPTION); ?>">
  <meta name="author" content="<?php echo e(SITE_NAME); ?>">
  <meta name="robots" content="index, follow, max-image-preview:large">
  <meta name="googlebot" content="index, follow">
  
  <!-- Canonical URL -->
  <link rel="canonical" href="<?php echo e(SITE_URL); ?>">
  
  <!-- Open Graph / Facebook -->
  <meta property="og:type" content="website">
  <meta property="og:url" content="<?php echo e(SITE_URL); ?>">
  <meta property="og:title" content="<?php echo e(SITE_NAME); ?> | <?php echo e(SITE_TITLE); ?>">
  <meta property="og:description" content="<?php echo e(SITE_DESCRIPTION); ?>">
  <meta property="og:image" content="<?php echo e(SITE_URL); ?>/<?php echo e(OG_IMAGE); ?>">
  <meta property="og:image:width" content="1200">
  <meta property="og:image:height" content="630">
  <meta property="og:locale" content="<?php echo e(SITE_LOCALE); ?>">
  <meta property="og:site_name" content="<?php echo e(SITE_NAME); ?>">
  
  <!-- Twitter Cards -->
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:creator" content="<?php echo e(TWITTER_HANDLE); ?>">
  <meta name="twitter:title" content="<?php echo e(SITE_NAME); ?> | <?php echo e(SITE_TITLE); ?>">
  <meta name="twitter:description" content="<?php echo e(SITE_DESCRIPTION); ?>">
  <meta name="twitter:image" content="<?php echo e(SITE_URL); ?>/<?php echo e(OG_IMAGE); ?>">
  
  <!-- Preconnect a dominios externos -->
  <link rel="preconnect" href="https://fonts.googleapis.com" crossorigin>
  <link rel="preconnect" href="https://cdnjs.cloudflare.com" crossorigin>
  
  <!-- DNS Prefetch para optimización -->
  <link rel="dns-prefetch" href="//github.com">
  <link rel="dns-prefetch" href="//linkedin.com">
  <link rel="preload" href="<?php echo asset('assets/css/style.css'); ?>" as="style">
  <link rel="preload" href="assets/fonts/Saira/static/Saira-Regular.woff2" as="font" type="font/woff2" crossorigin>
  <link rel="preload" href="assets/fonts/Saira/static/Saira-Medium.woff2" as="font" type="font/woff2" crossorigin>
  <link rel="preload" href="assets/fonts/Saira_Stencil_One/SairaStencilOne-Regular.woff2" as="font" type="font/woff2" crossorigin>

  <!-- Favicon -->
  <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico">
  <link rel="apple-touch-icon" sizes="180x180" href="assets/img/apple-touch-icon.png">

  <!-- CSS crítico inline (above-the-fold): tokens + reset + objects + buttons + header + hero.
       Se inlina el contenido real de los archivos (sin url(), seguro) para el primer pintado sin bloqueo. -->
  <style>
<?php
  $__root = dirname(__DIR__);
  foreach ([
    '/assets/css/settings/_tokens.css',
    '/assets/css/reset.css',
    '/assets/css/objects/_objects.css',
    '/assets/css/components/_buttons.css',
    '/assets/css/header/header.css',
    '/assets/css/intro/intro.css',
  ] as $__critical) {
    $__p = $__root . $__critical;
    if (is_readable($__p)) { readfile($__p); }
  }
?>
  </style>

  <!-- Fuentes (font-display:swap → no bloquea el texto) -->
  <link rel="stylesheet" href="<?php echo asset('assets/css/fonts/fonts.css'); ?>">

  <!-- Resto del CSS: carga asíncrona vía JS nonced (CSP-safe) para no bloquear el primer pintado -->
<?php
  $__deferred_css = [
    'assets/css/style.css',
    'assets/css/about/about.css',
    'assets/css/education/events.css',
    'assets/css/education/education.css',
    'assets/css/projects/projects.css',
    'assets/css/contact/contact.css',
    'assets/css/contact/contact-extras.css',
    'assets/css/footer/footer.css',
  ];
  $__deferred_urls = array_map('asset', $__deferred_css);
?>
  <script nonce="<?php echo e(get_csp_nonce()); ?>">
    (function () {
      var hrefs = <?php echo json_encode($__deferred_urls); ?>;
      for (var i = 0; i < hrefs.length; i++) {
        var l = document.createElement('link');
        l.rel = 'stylesheet';
        l.href = hrefs[i];
        document.head.appendChild(l);
      }
    })();
  </script>
  <noscript>
<?php foreach ($__deferred_urls as $__u) { echo '    <link rel="stylesheet" href="' . e($__u) . "\">\n"; } ?>
  </noscript>
  
  <!-- Tema de color para móviles -->
  <meta name="theme-color" content="#1a1a2e">
  <meta name="msapplication-TileColor" content="#1a1a2e">
  
  <!-- Schema.org JSON-LD para SEO estructurado -->
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "Person",
    "name": "<?php echo e(SITE_NAME); ?>",
    "jobTitle": "Desarrollador y Analista de Sistemas",
    "description": "<?php echo e(SITE_DESCRIPTION); ?>",
    "url": "<?php echo e(SITE_URL); ?>",
    "sameAs": [
      "<?php echo e(SOCIAL_GITHUB); ?>",
      "<?php echo e(SOCIAL_LINKEDIN); ?>"
    ],
    "image": "<?php echo e(SITE_URL); ?>/<?php echo e(OG_IMAGE); ?>"
  }
  </script>
</head>