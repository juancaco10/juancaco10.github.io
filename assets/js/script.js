/*****************************************
 *  PORTFOLIO JAVASCRIPT - Versión Segura y Optimizada
 *  Seguridad: No usa innerHTML para contenido dinámico
 *  Rendimiento: Delegación de eventos implementada
 *****************************************/

'use strict';

// ============================================
// UTILIDADES GLOBALES
// ============================================
const Utils = {
  /**
   * Escapar HTML para prevenir XSS
   * @param {string} text - Texto a escapar
   * @returns {string} - Texto escapado
   */
  escapeHtml(text) {
    if (!text) return '';
    const div = document.createElement('div');
    div.textContent = text;
    return div.innerHTML;
  },

  /**
   * Debounce para eventos frecuentes
   * @param {Function} func - Función a ejecutar
   * @param {number} wait - Tiempo de espera
   * @returns {Function}
   */
  debounce(func, wait = 100) {
    let timeout;
    return function executedFunction(...args) {
      const later = () => {
        clearTimeout(timeout);
        func(...args);
      };
      clearTimeout(timeout);
      timeout = setTimeout(later, wait);
    };
  }
};

// ============================================
// GESTIÓN DE MODALES
// ============================================
const ModalManager = {
  openModal(id) {
    const modal = document.getElementById(`modal-${id}`);
    if (!modal) return;
    
    modal.style.display = 'block';
    requestAnimationFrame(() => modal.classList.add('show'));
    document.body.style.overflow = 'hidden';
    modal.setAttribute('aria-hidden', 'false');
    
    // Focus trap para accesibilidad
    const focusableElements = modal.querySelectorAll('button, [href], input, select, textarea, [tabindex]:not([tabindex="-1"])');
    if (focusableElements.length) {
      focusableElements[0].focus();
    }
  },

  closeModal(id) {
    const modal = document.getElementById(`modal-${id}`);
    if (!modal) return;
    
    modal.classList.remove('show');
    setTimeout(() => {
      modal.style.display = 'none';
      document.body.style.overflow = 'auto';
      modal.setAttribute('aria-hidden', 'true');
    }, 300);
  },

  openEducationModal(modalId, sectionName = null) {
    const modal = document.getElementById(modalId);
    if (!modal) return;

    modal.style.display = 'block';
    document.body.style.overflow = 'hidden';
    modal.setAttribute('aria-hidden', 'false');

    if (sectionName) {
      const sections = modal.querySelectorAll('.education-modal__section.full-modal');
      sections.forEach(section => {
        const h3 = section.querySelector('h3');
        if (h3 && h3.textContent.includes(sectionName)) {
          section.scrollIntoView({ behavior: 'smooth', block: 'start' });
        }
      });
    }
  },

  closeEducationModal(modalId) {
    const modal = document.getElementById(modalId);
    if (!modal) return;
    
    modal.style.display = 'none';
    document.body.style.overflow = 'auto';
    modal.setAttribute('aria-hidden', 'true');
  }
};

// ============================================
// GALERÍA DE IMÁGENES
// ============================================
const GalleryManager = {
  slideIndexes: {},

  openGallery(id) {
    const gallery = document.getElementById(`gallery-${id}`);
    if (!gallery) return;

    gallery.style.display = 'block';
    requestAnimationFrame(() => gallery.classList.add('show'));
    document.body.style.overflow = 'hidden';
    gallery.setAttribute('aria-hidden', 'false');

    if (this.slideIndexes[id] === undefined) this.slideIndexes[id] = 1;
    this.showSlides(this.slideIndexes[id], id);
  },

  closeGallery(id) {
    const gallery = document.getElementById(`gallery-${id}`);
    if (!gallery) return;

    gallery.classList.remove('show');
    setTimeout(() => {
      gallery.style.display = 'none';
      document.body.style.overflow = 'auto';
      gallery.setAttribute('aria-hidden', 'true');
    }, 300);
  },

  plusSlides(n, galleryId) {
    this.showSlides((this.slideIndexes[galleryId] || 1) + n, galleryId);
  },

  currentSlide(n, galleryId) {
    this.showSlides(n, galleryId);
  },

  showSlides(n, galleryId) {
    const gallery = document.getElementById(`gallery-${galleryId}`);
    if (!gallery) return;

    const slides = gallery.getElementsByClassName('mySlides');
    const dots = gallery.getElementsByClassName('thumbnail');
    const caption = gallery.querySelector('.caption-container p');

    if (slides.length === 0) return;

    // Validar índice
    if (n > slides.length) this.slideIndexes[galleryId] = 1;
    else if (n < 1) this.slideIndexes[galleryId] = slides.length;
    else this.slideIndexes[galleryId] = n;

    // Actualizar slides
    Array.from(slides).forEach((slide, i) => {
      slide.classList.toggle('active', i === this.slideIndexes[galleryId] - 1);
    });

    // Actualizar thumbnails
    Array.from(dots).forEach((dot, i) => {
      dot.classList.toggle('active', i === this.slideIndexes[galleryId] - 1);
    });

    // Actualizar caption usando textContent (seguro contra XSS)
    if (caption && dots.length > 0) {
      const activeDot = dots[this.slideIndexes[galleryId] - 1];
      if (activeDot) {
        caption.textContent = activeDot.getAttribute('alt') || '';
      }
    }
  }
};

// ============================================
// FORMULARIO DE CONTACTO
// ============================================
const ContactForm = {
  init() {
    const form = document.getElementById('contactForm');
    if (!form) return;

    form.addEventListener('submit', this.handleSubmit.bind(this));
    this.initValidation(form);
  },

  initValidation(form) {
    const inputs = form.querySelectorAll('input, textarea, select');
    inputs.forEach(input => {
      input.addEventListener('blur', () => this.validateField(input));
      input.addEventListener('input', () => this.clearError(input));
    });
  },

  validateField(field) {
    const value = field.value.trim();
    let isValid = true;
    let errorMessage = '';

    if (field.hasAttribute('required') && !value) {
      isValid = false;
      errorMessage = 'Este campo es obligatorio';
    } else if (field.type === 'email' && value) {
      const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
      if (!emailRegex.test(value)) {
        isValid = false;
        errorMessage = 'Por favor ingresa un email válido';
      }
    } else if (field.hasAttribute('minlength') && value.length < field.minLength) {
      isValid = false;
      errorMessage = `Mínimo ${field.minLength} caracteres`;
    }

    if (!isValid) {
      this.showError(field, errorMessage);
    }

    return isValid;
  },

  showError(field, message) {
    this.clearError(field);
    const error = document.createElement('span');
    error.className = 'form__error';
    error.textContent = message;
    error.setAttribute('role', 'alert');
    field.parentNode.appendChild(error);
    field.setAttribute('aria-invalid', 'true');
  },

  clearError(field) {
    const parent = field.parentNode;
    const error = parent.querySelector('.form__error');
    if (error) error.remove();
    field.removeAttribute('aria-invalid');
  },

  async handleSubmit(event) {
    event.preventDefault();
    const form = event.target;
    const submitBtn = form.querySelector('[type="submit"]');
    const feedback = document.getElementById('formFeedback');

    // Validar todos los campos
    const inputs = form.querySelectorAll('input[required], textarea[required]');
    let isValid = true;
    inputs.forEach(input => {
      if (!this.validateField(input)) isValid = false;
    });

    if (!isValid) return;

    // Mostrar estado de carga
    submitBtn.disabled = true;
    const btnText = submitBtn.querySelector('.button__text');
    const btnLoader = submitBtn.querySelector('.button__loader');
    if (btnText) btnText.hidden = true;
    if (btnLoader) btnLoader.hidden = false;

    try {
      const formData = new FormData(form);
      const response = await fetch(form.action, {
        method: 'POST',
        body: formData,
        headers: {
          'X-Requested-With': 'XMLHttpRequest'
        }
      });

      const result = await response.json();

      if (result.success) {
        this.showFeedback(feedback, 'Mensaje enviado correctamente. Te contactaré pronto.', 'success');
        form.reset();
      } else {
        throw new Error(result.message || 'Error al enviar el mensaje');
      }
    } catch (error) {
      this.showFeedback(feedback, error.message || 'Error al enviar. Intenta nuevamente.', 'error');
    } finally {
      submitBtn.disabled = false;
      if (btnText) btnText.hidden = false;
      if (btnLoader) btnLoader.hidden = true;
    }
  },

  showFeedback(element, message, type) {
    if (!element) return;
    element.textContent = message;
    element.className = `form__feedback form__feedback--${type}`;
    element.hidden = false;
    
    setTimeout(() => {
      element.hidden = true;
    }, 5000);
  }
};

// ============================================
// BANNER DE COOKIES (GDPR/LGPD)
// ============================================
const CookieBanner = {
  COOKIE_NAME: 'cookie_consent',
  COOKIE_EXPIRY_DAYS: 365,

  init() {
    if (this.hasConsent()) return;
    
    const banner = document.getElementById('cookie-banner');
    if (!banner) return;

    // Mostrar banner después de 1 segundo
    setTimeout(() => {
      banner.hidden = false;
    }, 1000);

    // Event listeners
    const acceptBtn = banner.querySelector('[data-cookie="accept"]');
    if (acceptBtn) {
      acceptBtn.addEventListener('click', () => this.acceptConsent());
    }
  },

  hasConsent() {
    return document.cookie.includes(`${this.COOKIE_NAME}=accepted`);
  },

  acceptConsent() {
    const expiryDate = new Date();
    expiryDate.setDate(expiryDate.getDate() + this.COOKIE_EXPIRY_DAYS);
    
    document.cookie = `${this.COOKIE_NAME}=accepted; expires=${expiryDate.toUTCString()}; path=/; SameSite=Strict`;
    
    const banner = document.getElementById('cookie-banner');
    if (banner) {
      banner.classList.add('cookie-banner--hidden');
      setTimeout(() => {
        banner.hidden = true;
      }, 300);
    }
  }
};

// ============================================
// BACK TO TOP BUTTON
// ============================================
const BackToTop = {
  init() {
    const btn = document.getElementById('backToTop');
    if (!btn) return;

    const toggleVisibility = Utils.debounce(() => {
      btn.classList.toggle('visible', window.scrollY > 300);
    }, 100);

    window.addEventListener('scroll', toggleVisibility);
    
    btn.addEventListener('click', () => {
      window.scrollTo({ top: 0, behavior: 'smooth' });
    });

    toggleVisibility();
  }
};

// ============================================
// DELEGACIÓN DE EVENTOS GLOBAL
// ============================================
const EventDelegation = {
  init() {
    // Delegación para modales
    document.addEventListener('click', (e) => {
      // Abrir modal
      if (e.target.closest('[data-open]')) {
        const modalId = e.target.closest('[data-open]').dataset.open;
        const modal = document.getElementById(modalId);
        if (modal) {
          modal.hidden = false;
          modal.style.display = 'flex';
        }
      }

      // Cerrar modal
      if (e.target.closest('[data-close]')) {
        const modalId = e.target.closest('[data-close]').dataset.close;
        const modal = document.getElementById(modalId);
        if (modal) {
          modal.hidden = true;
          modal.style.display = 'none';
        }
      }

      // Click fuera para cerrar
      if (e.target.classList.contains('modal') || e.target.classList.contains('modal__overlay')) {
        const modal = e.target.closest('.modal');
        if (modal) {
          modal.hidden = true;
        }
      }
    });

    // Keyboard navigation
    document.addEventListener('keydown', (e) => {
      if (e.key === 'Escape') {
        document.querySelectorAll('.modal:not([hidden])').forEach(modal => {
          modal.hidden = true;
        });
      }
    });
  }
};

// ============================================
// INICIALIZACIÓN
// ============================================
document.addEventListener('DOMContentLoaded', () => {
  // Inicializar módulos
  BackToTop.init();
  ContactForm.init();
  CookieBanner.init();
  EventDelegation.init();

  // Education modals - usando data attributes en lugar de array hardcodeado
  const viewMoreButtons = document.querySelectorAll('.education__view-more');
  viewMoreButtons.forEach((button) => {
    button.addEventListener('click', (e) => {
      e.stopPropagation();
      // Buscar el modal asociado en el mismo contenedor
      const card = button.closest('.education__card');
      if (card) {
        const modalId = card.dataset.modal || 'modal-degree';
        ModalManager.openEducationModal(modalId);
      }
    });
  });

  // Eventos nav
  const navEvents = document.getElementById('navEvents');
  if (navEvents) {
    navEvents.addEventListener('click', (e) => {
      e.preventDefault();
      ModalManager.openEducationModal('modal-degree', 'Reconocimientos y Eventos');
    });
  }
});

// ============================================
// FUNCIONES GLOBALES (para compatibilidad con HTML inline)
// ============================================
window.openModal = (id) => ModalManager.openModal(id);
window.closeModal = (id) => ModalManager.closeModal(id);
window.openEducationModal = (modalId, sectionName) => ModalManager.openEducationModal(modalId, sectionName);
window.closeEducationModal = (modalId) => ModalManager.closeEducationModal(modalId);
window.openGallery = (id) => GalleryManager.openGallery(id);
window.closeGallery = (id) => GalleryManager.closeGallery(id);
window.plusSlides = (n, galleryId) => GalleryManager.plusSlides(n, galleryId);
window.currentSlide = (n, galleryId) => GalleryManager.currentSlide(n, galleryId);

// Función segura para mostrar imágenes en modal
window.showImgModal = (image) => {
  const modal = document.getElementById('imageModal');
  const modalImg = document.getElementById('imgModalContent');
  const caption = document.getElementById('imgModalCaption');

  if (!modal || !modalImg || !caption) return;

  modal.style.display = 'block';
  modalImg.src = image.src;
  // Usar textContent en lugar de innerHTML (seguridad XSS)
  caption.textContent = image.getAttribute('alt') || '';
};

window.closeImgModal = () => {
  const modal = document.getElementById('imageModal');
  if (modal) modal.style.display = 'none';
};
