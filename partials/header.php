<?php
// Asegurar que config esté cargado
if (!defined('SITE_NAME')) {
    $configPath = dirname(__DIR__) . '/../private/config.php';
    if (!file_exists($configPath)) {
        $configPath = dirname(__DIR__) . '/private/config.php';
    }
    require_once $configPath;
}
?>
<header class="header">
    <div class="container header__container">
        <!-- Logo corregido - enlace a inicio -->
        <a href="/" class="header__brand" aria-label="<?php echo e(SITE_NAME); ?> - Inicio">
            <img src="assets/img/logo.png" alt="<?php echo e(SITE_NAME); ?>" class="header__logo" loading="eager" width="150" height="50" />
        </a>

        <nav class="nav" aria-label="Navegación principal">
            <ul class="nav__list">
                <li class="nav__item"><a href="#about" class="nav__link">Sobre</a></li>
                <li class="nav__item"><a href="#education" class="nav__link">Formación</a></li>
                <li class="nav__item"><a href="#projects" class="nav__link">Proyectos</a></li>
                <li class="nav__item"><a href="#" class="nav__link" id="navEvents">Eventos</a></li>
                <li class="nav__item"><a href="#contact" class="nav__link">Contacto</a></li>
            </ul>
        </nav>

        <div class="header__socials">
            <a href="<?php echo e(SOCIAL_GITHUB); ?>" target="_blank" rel="noopener noreferrer" aria-label="GitHub">
                <img class="social__icon" src="assets/img/icono-contacto/ico-github.svg" alt="GitHub" loading="lazy" width="24" height="24" />
            </a>
            <a href="<?php echo e(SOCIAL_LINKEDIN); ?>" target="_blank" rel="noopener noreferrer" aria-label="LinkedIn">
                <img class="social__icon" src="assets/img/icono-contacto/ico-linkedin.svg" alt="LinkedIn" loading="lazy" width="24" height="24" />
            </a>
            <!-- WhatsApp oculto detrás de formulario - previene spam/scraping -->
            <a href="#contact" class="social__link" aria-label="Contactar por WhatsApp" data-contact="whatsapp">
                <img class="social__icon" src="assets/img/icono-contacto/ico-whatsapp.svg" alt="WhatsApp" loading="lazy" width="24" height="24" />
            </a>
        </div>
    </div>
</header>