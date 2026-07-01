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
// NAVEGACIÓN MÓVIL
// ============================================
const NavigationManager = {
  init() {
    this.toggleBtn = document.getElementById('navToggle');
    this.navMenu = document.getElementById('navMenu');
    this.navLinks = document.querySelectorAll('.nav__link');

    if (!this.toggleBtn || !this.navMenu) return;

    // Toggle menu
    this.toggleBtn.addEventListener('click', () => this.toggleMenu());

    // Cerrar al hacer click en enlace
    this.navLinks.forEach(link => {
      link.addEventListener('click', () => {
        if (this.navMenu.classList.contains('is-open')) {
          this.closeMenu();
        }
      });
    });

    // Cerrar al hacer resize a desktop
    window.addEventListener('resize', Utils.debounce(() => {
      if (window.innerWidth >= 768 && this.navMenu.classList.contains('is-open')) {
        this.closeMenu();
      }
    }, 150));
  },

  toggleMenu() {
    const isExpanded = this.toggleBtn.getAttribute('aria-expanded') === 'true';
    if (isExpanded) {
      this.closeMenu();
    } else {
      this.openMenu();
    }
  },

  openMenu() {
    this.navMenu.classList.add('is-open');
    this.toggleBtn.setAttribute('aria-expanded', 'true');
    document.body.style.overflow = 'hidden'; // Prevenir scroll
  },

  closeMenu() {
    this.navMenu.classList.remove('is-open');
    this.toggleBtn.setAttribute('aria-expanded', 'false');
    document.body.style.overflow = ''; // Restaurar scroll
  }
};

// ============================================
// GESTIÓN DE MODALES
// ============================================
const ModalManager = {
  openModal(id) {
    const modal = document.getElementById(`modal-${id}`);
    if (!modal) return;
    
    modal.hidden = false;
    modal.style.display = 'flex';
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
      modal.hidden = true;
      document.body.style.overflow = 'auto';
      modal.setAttribute('aria-hidden', 'true');
    }, 300);
  },

  openEducationModal(modalId, sectionName = null) {
    const modal = document.getElementById(modalId);
    if (!modal) return;

    modal.hidden = false;
    modal.style.display = 'flex';
    document.body.style.overflow = 'hidden';
    modal.setAttribute('aria-hidden', 'false');
    A11yModals.focusFirst(modal);

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
    modal.hidden = true;
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

    gallery.hidden = false;
    gallery.style.display = 'block';
    requestAnimationFrame(() => gallery.classList.add('show'));
    document.body.style.overflow = 'hidden';
    gallery.setAttribute('aria-hidden', 'false');

    if (this.slideIndexes[id] === undefined) this.slideIndexes[id] = 1;
    this.showSlides(this.slideIndexes[id], id);
    A11yModals.focusFirst(gallery);
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
      // Delegación para data-click (Reemplazo de onclick para cumplir CSP)
      const elWithClick = e.target.closest('[data-click]');
      if (elWithClick) {
        const actionStr = elWithClick.getAttribute('data-click');
        if (actionStr) {
          const actions = actionStr.split(';').map(s => s.trim()).filter(Boolean);
          actions.forEach(action => {
             const match = action.match(/^([a-zA-Z0-9_]+)\((.*)\)$/);
             if (match) {
                const funcName = match[1];
                const argStr = match[2];
                const args = argStr.split(',').map(arg => {
                   arg = arg.trim();
                   if (arg === 'this') return elWithClick;
                   if (arg.startsWith("'") && arg.endsWith("'")) return arg.slice(1, -1);
                   if (arg.startsWith('"') && arg.endsWith('"')) return arg.slice(1, -1);
                   if (!isNaN(arg) && arg !== '') return Number(arg);
                   return arg;
                });
                
                // Si el primer arg es vacío por un split(""), lo quitamos
                if (args.length === 1 && args[0] === '') args.pop();
                
                if (typeof window[funcName] === 'function') {
                   window[funcName](...args);
                }
             }
          });
          // Devolver el foco al disparador cuando se cierra un modal/galería
          if (actionStr.includes('close')) {
            A11yModals.restoreFocus();
          }
        }
      }

      // Abrir modal (Lógica original conservada)
      if (e.target.closest('[data-open]')) {
        const modalId = e.target.closest('[data-open]').dataset.open;
        const modal = document.getElementById(modalId);
        if (modal) {
          modal.hidden = false;
          modal.style.display = 'flex';
          document.body.style.overflow = 'hidden';
          modal.setAttribute('aria-hidden', 'false');
          A11yModals.focusFirst(modal);
        }
      }

      // Cerrar modal
      if (e.target.closest('[data-close]')) {
        const modalId = e.target.closest('[data-close]').dataset.close;
        const modal = document.getElementById(modalId);
        if (modal) {
          modal.hidden = true;
          modal.style.display = 'none';
          modal.setAttribute('aria-hidden', 'true');
          document.body.style.overflow = 'auto';
          A11yModals.restoreFocus();
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

    // La navegación por teclado (ESC, focus-trap, Enter/Espacio) la gestiona A11yModals.init()
  }
};

// ============================================
// ACCESIBILIDAD DE MODALES (teclado y foco)
// ============================================
const A11yModals = {
  selector: '.modal, .education-modal, .gallery-modal, .img-modal',
  lastFocused: null,

  isOpen(el) {
    if (!el || el.hasAttribute('hidden')) return false;
    return getComputedStyle(el).display !== 'none';
  },

  getOpenModals() {
    return Array.from(document.querySelectorAll(this.selector)).filter(el => this.isOpen(el));
  },

  topOpenModal() {
    const open = this.getOpenModals();
    return open.length ? open[open.length - 1] : null;
  },

  focusables(el) {
    return Array.from(el.querySelectorAll(
      'button:not([disabled]), [href], input:not([disabled]), select:not([disabled]), textarea:not([disabled]), [tabindex]:not([tabindex="-1"])'
    )).filter(n => n.offsetWidth || n.offsetHeight || n.getClientRects().length);
  },

  focusFirst(el) {
    const f = this.focusables(el);
    (f[0] || el).focus();
  },

  closeEl(el) {
    el.classList.remove('show');
    el.hidden = true;
    el.style.display = 'none';
    el.setAttribute('aria-hidden', 'true');
    document.body.style.overflow = 'auto';
  },

  restoreFocus() {
    if (this.lastFocused && document.contains(this.lastFocused)) {
      this.lastFocused.focus();
    }
    this.lastFocused = null;
  },

  init() {
    // Recordar el último elemento enfocado fuera de un modal (para devolverle el foco al cerrar)
    document.addEventListener('focusin', (e) => {
      if (!e.target.closest(this.selector)) {
        this.lastFocused = e.target;
      }
    });

    document.addEventListener('keydown', (e) => {
      const top = this.topOpenModal();

      // ESC cierra el modal/galería superior y devuelve el foco
      if (e.key === 'Escape' && top) {
        this.closeEl(top);
        this.restoreFocus();
        return;
      }

      // Focus-trap: mantener el tabulado dentro del modal abierto
      if (e.key === 'Tab' && top) {
        const f = this.focusables(top);
        if (!f.length) { e.preventDefault(); return; }
        const first = f[0], last = f[f.length - 1];
        if (e.shiftKey && document.activeElement === first) {
          e.preventDefault(); last.focus();
        } else if (!e.shiftKey && document.activeElement === last) {
          e.preventDefault(); first.focus();
        }
        return;
      }

      // Enter/Espacio activan disparadores no nativos (div con role="button" o data-click)
      if (e.key === 'Enter' || e.key === ' ' || e.key === 'Spacebar') {
        const el = e.target;
        const isNative = ['BUTTON', 'A', 'INPUT', 'SELECT', 'TEXTAREA'].includes(el.tagName);
        if (!isNative && (el.hasAttribute('data-click') || el.getAttribute('role') === 'button')) {
          e.preventDefault();
          el.click();
        }
      }
    });
  }
};

// ============================================
// SCROLL REVEAL (entrada suave de secciones)
// ============================================
const Reveal = {
  init() {
    const els = document.querySelectorAll('[data-reveal]');
    if (!els.length) return;
    // Sin IntersectionObserver → mostrar todo de inmediato
    if (!('IntersectionObserver' in window)) {
      els.forEach(el => el.classList.add('is-revealed'));
      return;
    }
    const io = new IntersectionObserver((entries, obs) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.classList.add('is-revealed');
          obs.unobserve(entry.target);
        }
      });
    }, { rootMargin: '0px 0px -10% 0px', threshold: 0.1 });
    els.forEach(el => io.observe(el));
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
  A11yModals.init();
  Reveal.init();
  NavigationManager.init();

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

  modal.hidden = false;
  modal.style.display = 'block';
  modalImg.src = image.src;
  // Usar textContent en lugar de innerHTML (seguridad XSS)
  caption.textContent = image.getAttribute('alt') || '';
};

window.closeImgModal = () => {
  const modal = document.getElementById('imageModal');
  if (modal) modal.style.display = 'none';
};
