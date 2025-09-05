document.addEventListener("DOMContentLoaded", function () {
  // Cerrar modales al hacer clic fuera del contenido
  window.addEventListener('click', function (event) {
    // Para modales de proyecto
    document.querySelectorAll('.modal').forEach(modal => {
      if (event.target === modal) {
        const id = modal.id.replace('modal-', '');
        closeModal(id);
      }
    });

    // Para modales de galería
    document.querySelectorAll('.gallery-modal').forEach(modal => {
      if (event.target === modal) {
        const id = modal.id.replace('gallery-', '');
        closeGallery(id);
      }
    });
  });
});

// Variables globales para el control de slides
let slideIndex = 1;

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

    // Reiniciar el slide al abrir la galería
    showSlides(slideIndex = 1);
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
function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  let i;
  const slides = document.getElementsByClassName("mySlides");
  const dots = document.getElementsByClassName("thumbnail");
  const captionText = document.getElementById("caption");

  if (slides.length === 0) return;

  if (n > slides.length) { slideIndex = 1 }
  if (n < 1) { slideIndex = slides.length }

  for (i = 0; i < slides.length; i++) {
    slides[i].classList.remove("active");
  }

  for (i = 0; i < dots.length; i++) {
    dots[i].classList.remove("active");
  }

  slides[slideIndex - 1].classList.add("active");
  if (dots.length > 0) {
    dots[slideIndex - 1].classList.add("active");
    captionText.innerHTML = dots[slideIndex - 1].alt;
  }
}

// Cerrar con tecla Escape
document.addEventListener('keydown', function (event) {
  if (event.key === "Escape") {
    // Cerrar modales de información
    document.querySelectorAll('.modal.show').forEach(modal => {
      const id = modal.id.replace('modal-', '');
      closeModal(id);
    });

    // Cerrar modales de galería
    document.querySelectorAll('.gallery-modal.show').forEach(modal => {
      const id = modal.id.replace('gallery-', '');
      closeGallery(id);
    });
  }

  // Navegación con teclado en la galería
  const galleryOpen = document.querySelector('.gallery-modal.show');
  if (galleryOpen) {
    if (event.key === "ArrowLeft") {
      plusSlides(-1);
    } else if (event.key === "ArrowRight") {
      plusSlides(1);
    }
  }
});