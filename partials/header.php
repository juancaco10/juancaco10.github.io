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
<header class="header" id="siteHeader">
    <div class="o-container header__container">
        <!-- Logo - enlace a inicio -->
        <a href="/" class="header__brand" aria-label="<?php echo e(SITE_NAME); ?> - Inicio">
            <img src="assets/img/logo.png" alt="<?php echo e(SITE_NAME); ?>" class="header__logo" loading="eager" width="150" height="50" />
        </a>

        <!-- Botón hamburguesa (solo mobile) -->
        <button class="header__toggle" id="navToggle" 
                aria-expanded="false" aria-controls="navMenu"
                aria-label="Abrir menú de navegación">
            <span class="header__toggle-bar"></span>
            <span class="header__toggle-bar"></span>
            <span class="header__toggle-bar"></span>
        </button>

        <nav class="nav" id="navMenu" aria-label="Navegación principal">
            <ul class="nav__list">
                <li class="nav__item"><a href="#about" class="nav__link">Sobre</a></li>
                <li class="nav__item"><a href="#education" class="nav__link">Formación</a></li>
                <li class="nav__item"><a href="#projects" class="nav__link">Proyectos</a></li>
                <li class="nav__item"><a href="#events" class="nav__link" id="navEvents">Eventos</a></li>
                <li class="nav__item"><a href="#contact" class="nav__link">Contacto</a></li>
            </ul>
            
            <div class="header__socials">
                <a href="<?php echo e(SOCIAL_GITHUB); ?>" target="_blank" rel="noopener noreferrer" class="social__link" aria-label="GitHub">
                    <img class="social__icon" src="assets/img/icono-contacto/ico-github.svg" alt="" aria-hidden="true" loading="lazy" width="24" height="24" />
                </a>
                <a href="<?php echo e(SOCIAL_LINKEDIN); ?>" target="_blank" rel="noopener noreferrer" class="social__link" aria-label="LinkedIn">
                    <img class="social__icon" src="assets/img/icono-contacto/ico-linkedin.svg" alt="" aria-hidden="true" loading="lazy" width="24" height="24" />
                </a>
                <a href="#contact" class="social__link" aria-label="Contactar por WhatsApp" data-open="whatsapp-modal">
                    <img class="social__icon" src="assets/img/icono-contacto/ico-whatsapp.svg" alt="" aria-hidden="true" loading="lazy" width="24" height="24" />
                </a>
            </div>
        </nav>
    </div>
</header>