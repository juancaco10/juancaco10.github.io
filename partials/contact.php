<?php
// Asegurar que config esté cargado
if (!defined('SITE_NAME')) {
    $configPath = dirname(__DIR__) . '/../private/config.php';
    if (!file_exists($configPath)) {
        $configPath = dirname(__DIR__) . '/private/config.php';
    }
    require_once $configPath;
}

// Generar token CSRF para el formulario
$csrf_token = generate_csrf_token();
?>
<section id="contact" class="contact">
  <div class="container">
    <h2 class="contact__title">Contacto</h2>
    <div class="contact__content">
      <div class="contact__info">
        <p class="contact__description">
          Ponte en contacto para discutir colaboraciones, proyectos,
          contratarme o simplemente para saludarme.
        </p>
        
        <!-- Formulario de Contacto Seguro -->
        <?php if (CONTACT_FORM_ENABLED): ?>
        <form id="contactForm" class="contact__form" action="api/contact.php" method="POST" novalidate>
          <!-- CSRF Protection -->
          <input type="hidden" name="csrf_token" value="<?php echo $csrf_token; ?>">
          
          <!-- Honeypot - Anti-spam oculto -->
          <div class="honeypot" style="position: absolute; left: -9999px;">
            <input type="text" name="website" tabindex="-1" autocomplete="off">
          </div>
          
          <div class="form__group">
            <label for="contactName" class="form__label">Nombre *</label>
            <input 
              type="text" 
              id="contactName" 
              name="name" 
              class="form__input" 
              required 
              minlength="2"
              maxlength="100"
              placeholder="Tu nombre"
              autocomplete="name">
          </div>
          
          <div class="form__group">
            <label for="contactEmail" class="form__label">Email *</label>
            <input 
              type="email" 
              id="contactEmail" 
              name="email" 
              class="form__input" 
              required
              maxlength="254"
              placeholder="tu@email.com"
              autocomplete="email">
          </div>
          
          <div class="form__group">
            <label for="contactSubject" class="form__label">Asunto</label>
            <select id="contactSubject" name="subject" class="form__select">
              <option value="">Selecciona un asunto...</option>
              <option value="proyecto">Propuesta de proyecto</option>
              <option value="colaboracion">Colaboración</option>
              <option value="empleo">Oportunidad laboral</option>
              <option value="consulta">Consulta general</option>
              <option value="otro">Otro</option>
            </select>
          </div>
          
          <div class="form__group">
            <label for="contactMessage" class="form__label">Mensaje *</label>
            <textarea 
              id="contactMessage" 
              name="message" 
              class="form__textarea" 
              required
              minlength="10"
              maxlength="2000"
              rows="5"
              placeholder="Escribe tu mensaje aquí..."></textarea>
            <small class="form__hint">Máximo 2000 caracteres</small>
          </div>
          
          <!-- reCAPTCHA placeholder - activar en config.php -->
          <?php if (defined('RECAPTCHA_SITE_KEY') && RECAPTCHA_SITE_KEY !== 'TU_SITE_KEY_AQUI'): ?>
          <div class="form__group">
            <div class="g-recaptcha" data-sitekey="<?php echo e(RECAPTCHA_SITE_KEY); ?>"></div>
          </div>
          <?php endif; ?>
          
          <div class="form__actions">
            <button type="submit" class="button button--primary">
              <span class="button__text">Enviar mensaje</span>
              <span class="button__loader" hidden>Cargando...</span>
            </button>
          </div>
          
          <!-- Mensajes de feedback -->
          <div id="formFeedback" class="form__feedback" role="alert" hidden></div>
        </form>
        <?php endif; ?>
        
        <div class="contact__socials">
          <p class="contact__socials-title">O contáctame por:</p>
          <div class="socials__container">
            <a class="social__link" href="<?php echo e(SOCIAL_GITHUB); ?>" target="_blank" rel="noopener noreferrer" aria-label="GitHub">
              <img class="social__icon" src="assets/img/icono-contacto/ico-github.svg" alt="GitHub" loading="lazy" width="32" height="32" />
            </a>
            <a class="social__link" href="<?php echo e(SOCIAL_LINKEDIN); ?>" target="_blank" rel="noopener noreferrer" aria-label="LinkedIn">
              <img class="social__icon" src="assets/img/icono-contacto/ico-linkedin.svg" alt="LinkedIn" loading="lazy" width="32" height="32" />
            </a>
            <!-- WhatsApp protegido - redirige a modal de privacidad -->
            <a class="social__link" href="#" data-open="whatsapp-modal" aria-label="Contactar por WhatsApp">
              <img class="social__icon" src="assets/img/icono-contacto/ico-whatsapp.svg" alt="WhatsApp" loading="lazy" width="32" height="32" />
            </a>
          </div>
        </div>
      </div>
      
      <img class="contact__image" src="assets/img/icons/contacto.jpg" alt="Contacto profesional" loading="lazy" width="400" height="300" decoding="async" />
    </div>
  </div>
</section>

<!-- Modal de confirmación para WhatsApp (privacidad) -->
<div id="whatsapp-modal" class="modal modal--small" hidden>
  <div class="modal__content">
    <h3>Contacto por WhatsApp</h3>
    <p>Al hacer clic, serás redirigido a WhatsApp. Tu número de teléfono será visible para el destinatario.</p>
    <div class="modal__actions">
      <a href="<?php echo e(SOCIAL_WHATSAPP); ?>" target="_blank" rel="noopener noreferrer" class="button button--primary">Continuar</a>
      <button type="button" class="button button--secondary" data-close="whatsapp-modal">Cancelar</button>
    </div>
  </div>
</div>