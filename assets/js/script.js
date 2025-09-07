document.addEventListener("DOMContentLoaded", function () {
  const backToTopBtn = document.getElementById("backToTop");

  // Función para mostrar/ocultar el botón "Back to Top"
  function toggleBackToTop() {
    if (backToTopBtn) {
      if (window.scrollY > 300) {
        backToTopBtn.classList.add("visible");
      } else {
        backToTopBtn.classList.remove("visible");
      }
    }
  }

  // Event listener para el botón "Back to Top"
  if (backToTopBtn) {
    backToTopBtn.addEventListener("click", () => {
      window.scrollTo({ top: 0, behavior: "smooth" });
    });
  }

  // Mostrar/ocultar botón al hacer scroll
  window.addEventListener("scroll", toggleBackToTop);

  // Verificar estado inicial del botón
  toggleBackToTop();

  // Event listeners para las tarjetas de educación
  const educationCards = document.querySelectorAll('.education__card');

  educationCards.forEach((card, index) => {
    card.addEventListener('click', function () {
      // Asigna diferentes modales según la tarjeta clickeada
      const modalIds = ['modal-degree', 'modal-bootcamp', 'modal-bootcamp', 'modal-bootcamp', 'modal-bootcamp', 'modal-bootcamp'];

      if (index < modalIds.length) {
        openEducationModal(modalIds[index]);
      }
    });
  });
});

// Variables para controlar slides de cada galería por separado
let slideIndexes = {};

// Funciones globales para modales
function openModal(id) {
  const modal = document.getElementById("modal-" + id);
  if (modal) {
    modal.style.display = "block";
    setTimeout(() => {
      modal.classList.add("show");
    }, 10);
    document.body.style.overflow = 'hidden';
  }
}

function closeModal(id) {
  const modal = document.getElementById("modal-" + id);
  if (modal) {
    modal.classList.remove("show");
    setTimeout(() => {
      modal.style.display = "none";
    }, 300);
    document.body.style.overflow = 'auto';
  }
}

// Funciones para galería de imágenes
function openGallery(id) {
  const gallery = document.getElementById("gallery-" + id);
  if (gallery) {
    gallery.style.display = "block";
    setTimeout(() => {
      gallery.classList.add("show");
    }, 10);
    document.body.style.overflow = 'hidden';

    // Inicializar el índice para esta galería si no existe
    if (slideIndexes[id] === undefined) {
      slideIndexes[id] = 1;
    }
    showSlides(slideIndexes[id], id);
  }
}

function closeGallery(id) {
  const gallery = document.getElementById("gallery-" + id);
  if (gallery) {
    gallery.classList.remove("show");
    setTimeout(() => {
      gallery.style.display = "none";
    }, 300);
    document.body.style.overflow = 'auto';
  }
}

// Funciones para controlar los slides
function plusSlides(n, galleryId) {
  showSlides((slideIndexes[galleryId] || 1) + n, galleryId);
}

function currentSlide(n, galleryId) {
  showSlides(n, galleryId);
}

function showSlides(n, galleryId) {
  const gallery = document.getElementById("gallery-" + galleryId);
  if (!gallery) return;

  const slides = gallery.getElementsByClassName("mySlides");
  const dots = gallery.getElementsByClassName("thumbnail");
  const caption = gallery.querySelector(".caption-container p");

  if (slides.length === 0) return;

  if (n > slides.length) { slideIndexes[galleryId] = 1; }
  else if (n < 1) { slideIndexes[galleryId] = slides.length; }
  else { slideIndexes[galleryId] = n; }

  // Ocultar todos los slides
  for (let i = 0; i < slides.length; i++) {
    slides[i].classList.remove("active");
  }

  // Desactivar todos los dots
  for (let i = 0; i < dots.length; i++) {
    dots[i].classList.remove("active");
  }

  // Mostrar el slide actual
  slides[slideIndexes[galleryId] - 1].classList.add("active");

  // Resaltar el dot actual
  if (dots.length > 0) {
    dots[slideIndexes[galleryId] - 1].classList.add("active");
    if (caption) caption.innerHTML = dots[slideIndexes[galleryId] - 1].alt;
  }
}

// Función para abrir modal de educación
function openEducationModal(modalId, seccionNombre = null) {
  const modal = document.getElementById(modalId);
  if (!modal) return;

  // Abrir modal
  modal.style.display = 'block';
  document.body.style.overflow = 'hidden';
  console.log('Modal abierto:', modalId);

  // Si se pasa un nombre de sección, hacer scroll hasta esa sección
  if (seccionNombre) {
    const secciones = modal.querySelectorAll('.education-modal__section.full-modal');
    secciones.forEach(section => {
      const h3 = section.querySelector('h3');
      if (h3 && h3.textContent.includes(seccionNombre)) {
        section.scrollIntoView({ behavior: 'smooth', block: 'start' });
      }
    });
  }
}


// Función para cerrar modal de educación
function closeEducationModal(modalId) {
  const modal = document.getElementById(modalId);
  if (modal) {
    modal.style.display = 'none';
    document.body.style.overflow = 'auto';
  }
}

// Event listener unificado para cerrar modales al hacer clic fuera
document.addEventListener('click', function (event) {
  // Modales de proyecto
  if (event.target.classList.contains('modal')) {
    const id = event.target.id.replace('modal-', '');
    closeModal(id);
  }

  // Modales de galería
  if (event.target.classList.contains('gallery-modal')) {
    const id = event.target.id.replace('gallery-', '');
    closeGallery(id);
  }

  // Modales de educación
  if (event.target.classList.contains('education-modal')) {
    const id = event.target.id;
    closeEducationModal(id);
  }
});
document.addEventListener("DOMContentLoaded", function () {
  const navEvents = document.getElementById("navEvents");
  if (navEvents) {
    navEvents.addEventListener("click", function (e) {
      e.preventDefault(); // evita que el link navegue
      openEducationModal("modal-degree", "Reconocimientos y Eventos");
    });
  }
});

// Cerrar con tecla Escape
document.addEventListener('keydown', function (event) {
  if (event.key === "Escape") {
    // Cerrar modales de proyecto
    document.querySelectorAll('.modal.show').forEach(modal => {
      const id = modal.id.replace('modal-', '');
      closeModal(id);
    });

    // Cerrar modales de galería
    document.querySelectorAll('.gallery-modal.show').forEach(modal => {
      const id = modal.id.replace('gallery-', '');
      closeGallery(id);
    });

    // Cerrar modales de educación
    document.querySelectorAll('.education-modal').forEach(modal => {
      if (modal.style.display === 'block') {
        closeEducationModal(modal.id);
      }
    });
  }

  // Navegación con teclado en la galería
  const galleryOpen = document.querySelector('.gallery-modal.show');
  if (galleryOpen) {
    const galleryId = galleryOpen.id.replace('gallery-', '');
    if (event.key === "ArrowLeft") {
      plusSlides(-1, galleryId);
    } else if (event.key === "ArrowRight") {
      plusSlides(1, galleryId);
    }
  }

  let gallerySlideIndexes = {};

  // Función para abrir la galería
  function openGallery(galleryId) {
    const gallery = document.getElementById(`gallery-${galleryId}`);
    if (gallery) {
      gallery.style.display = 'block';
      setTimeout(() => {
        gallery.classList.add('show');
      }, 10);
      document.body.style.overflow = 'hidden';

      // Inicializar el índice para esta galería si no existe
      if (gallerySlideIndexes[galleryId] === undefined) {
        gallerySlideIndexes[galleryId] = 1;
      }
      showGallerySlides(gallerySlideIndexes[galleryId], galleryId);
    }
  }

  // Función para cerrar la galería
  function closeGallery(galleryId) {
    const gallery = document.getElementById(`gallery-${galleryId}`);
    if (gallery) {
      gallery.classList.remove('show');
      setTimeout(() => {
        gallery.style.display = 'none';
      }, 300);
      document.body.style.overflow = 'auto';
    }
  }

  // Función para navegar entre slides
  function plusSlides(n, galleryId) {
    showGallerySlides((gallerySlideIndexes[galleryId] || 1) + n, galleryId);
  }

  // Función para ir a un slide específico
  function currentSlide(n, galleryId) {
    showGallerySlides(n, galleryId);
  }

  // Función para mostrar el slide actual
  function showGallerySlides(n, galleryId) {
    const gallery = document.getElementById(`gallery-${galleryId}`);
    if (!gallery) return;

    const slides = gallery.querySelectorAll('.gallery-slide');
    const thumbs = gallery.querySelectorAll('.gallery-thumb');

    if (slides.length === 0) return;

    if (n > slides.length) { gallerySlideIndexes[galleryId] = 1; }
    else if (n < 1) { gallerySlideIndexes[galleryId] = slides.length; }
    else { gallerySlideIndexes[galleryId] = n; }

    // Ocultar todos los slides
    slides.forEach(slide => slide.classList.remove('active'));

    // Desactivar todos los thumbs
    thumbs.forEach(thumb => thumb.classList.remove('active'));

    // Mostrar el slide actual
    slides[gallerySlideIndexes[galleryId] - 1].classList.add('active');

    // Resaltar el thumb actual
    if (thumbs.length > 0) {
      thumbs[gallerySlideIndexes[galleryId] - 1].classList.add('active');
    }
  }

  // Cerrar galería al hacer clic fuera de la imagen
  document.addEventListener('click', function (event) {
    if (event.target.classList.contains('gallery-modal')) {
      const galleryId = event.target.id.replace('gallery-', '');
      closeGallery(galleryId);
    }
  });

  // Navegación con teclado
  document.addEventListener('keydown', function (event) {
    const galleryOpen = document.querySelector('.gallery-modal.show');
    if (galleryOpen) {
      const galleryId = galleryOpen.id.replace('gallery-', '');
      if (event.key === "Escape") {
        closeGallery(galleryId);
      } else if (event.key === "ArrowLeft") {
        plusSlides(-1, galleryId);
      } else if (event.key === "ArrowRight") {
        plusSlides(1, galleryId);
      }
    }
  });
});