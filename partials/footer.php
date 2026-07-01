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
<footer class="footer">
    <div class="o-container">
        <div class="footer__content">
            <div class="footer__info">
                <p class="footer__copyright">
                    &copy; <?php echo date('Y'); ?>
                    <span class="footer__name"><?php echo e(SITE_NAME); ?></span>.
                </p>
                <p class="footer__tagline"><?php echo e(SITE_TITLE); ?></p>
            </div>

            <nav class="footer__nav" aria-label="Footer navigation">
                <a href="#about" class="footer__link">Sobre</a>
                <span class="footer__separator" aria-hidden="true">|</span>
                <a href="#education" class="footer__link">Formación</a>
                <span class="footer__separator" aria-hidden="true">|</span>
                <a href="#projects" class="footer__link">Proyectos</a>
                <span class="footer__separator" aria-hidden="true">|</span>
                <a href="#contact" class="footer__link">Contacto</a>
                <span class="footer__separator" aria-hidden="true">|</span>
                <a href="#privacy" class="footer__link" data-open="privacy-modal">Privacidad</a>
            </nav>

            <div class="footer__social">
                <a href="<?php echo e(SOCIAL_GITHUB); ?>" target="_blank" rel="noopener noreferrer" class="footer__social-link" aria-label="GitHub">
                    <img src="assets/img/icono-contacto/ico-github.svg" alt="GitHub" class="footer__social-icon" loading="lazy" width="20" height="20" />
                </a>
                <a href="<?php echo e(SOCIAL_LINKEDIN); ?>" target="_blank" rel="noopener noreferrer" class="footer__social-link" aria-label="LinkedIn">
                    <img src="assets/img/icono-contacto/ico-linkedin.svg" alt="LinkedIn" class="footer__social-icon" loading="lazy" width="20" height="20" />
                </a>
                <a href="#" data-open="whatsapp-modal" class="footer__social-link" aria-label="WhatsApp">
                    <img src="assets/img/icono-contacto/ico-whatsapp.svg" alt="WhatsApp" class="footer__social-icon" loading="lazy" width="20" height="20" />
                </a>
            </div>
        </div>
        
        <!-- Enlace a política de privacidad -->
        <div class="footer__legal">
            <p class="footer__privacy">
                <small>Este sitio utiliza cookies esenciales. <a href="#privacy" data-open="privacy-modal">Ver política de privacidad</a>.</small>
            </p>
        </div>
    </div>
</footer>

<!-- Banner de Cookies / Consentimiento GDPR-LGPD -->
<div id="cookie-banner" class="cookie-banner" role="dialog" aria-label="Consentimiento de cookies" hidden>
    <div class="cookie-banner__content">
        <div class="cookie-banner__text">
            <h3 class="cookie-banner__title">Respetamos tu privacidad</h3>
            <p class="cookie-banner__description">
                Este sitio utiliza cookies esenciales para su funcionamiento. 
                No utilizamos cookies de terceros ni tracking. 
                Al continuar navegando, aceptas nuestra política de privacidad.
            </p>
        </div>
        <div class="cookie-banner__actions">
            <button type="button" class="btn btn--primary cookie-banner__accept" data-cookie="accept">
                Aceptar
            </button>
            <a href="#privacy" class="btn btn--secondary cookie-banner__more" data-open="privacy-modal">
                Ver más
            </a>
        </div>
    </div>
</div>

<!-- Modal de Política de Privacidad -->
<div id="privacy-modal" class="modal modal--large" role="dialog" aria-modal="true" aria-labelledby="privacy-modal-title" hidden>
    <div class="modal__overlay" data-close="privacy-modal"></div>
    <div class="modal__content">
        <header class="modal__header">
            <h2 class="modal__title" id="privacy-modal-title">Política de Privacidad</h2>
            <button type="button" class="modal__close" data-close="privacy-modal" aria-label="Cerrar">
                <svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
            </button>
        </header>
        <div class="modal__body">
            <h3>1. Información que recopilamos</h3>
            <p>Únicamente recopilamos información que tú nos proporcionas voluntariamente a través del formulario de contacto: nombre, email y mensaje.</p>
            
            <h3>2. Uso de la información</h3>
            <p>Utilizamos tu información únicamente para responder a tus consultas. No compartimos tus datos con terceros.</p>
            
            <h3>3. Cookies</h3>
            <p>Este sitio utiliza cookies esenciales para su funcionamiento. No utilizamos cookies de terceros ni para tracking.</p>
            
            <h3>4. Tus derechos</h3>
            <p>De acuerdo con el GDPR y la LGPD, tienes derecho a acceder, rectificar o eliminar tus datos personales. Contactanos para ejercer estos derechos.</p>
            
            <h3>5. Seguridad</h3>
            <p>Implementamos medidas de seguridad técnicas y organizativas para proteger tus datos personales.</p>
            
            <p class="modal__updated"><small>Última actualización: <?php echo date('F Y'); ?></small></p>
        </div>
        <footer class="modal__footer">
            <button type="button" class="btn btn--primary" data-close="privacy-modal">Entendido</button>
        </footer>
    </div>
</div>

<!-- Modal de WhatsApp -->
<div id="whatsapp-modal" class="modal modal--small" hidden>
    <div class="modal__overlay" data-close="whatsapp-modal"></div>
    <div class="modal__content">
        <header class="modal__header">
            <h3 class="modal__title">Contacto por WhatsApp</h3>
            <button type="button" class="modal__close" data-close="whatsapp-modal" aria-label="Cerrar">
                <svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
            </button>
        </header>
        <div class="modal__body">
            <p>Al hacer clic en "Continuar", serás redirigido a WhatsApp.</p>
            <p><strong>Nota:</strong> Tu número de teléfono será visible para el destinatario.</p>
        </div>
        <footer class="modal__footer">
            <a href="<?php echo e(SOCIAL_WHATSAPP); ?>" target="_blank" rel="noopener noreferrer" class="btn btn--primary">Continuar</a>
            <button type="button" class="btn btn--secondary" data-close="whatsapp-modal">Cancelar</button>
        </footer>
    </div>
</div>