/*****************************************
 *  BACK TO TOP BUTTON
 *****************************************/
document.addEventListener("DOMContentLoaded", function () {
  const backToTopBtn = document.getElementById("backToTop");

  function toggleBackToTop() {
    if (backToTopBtn) {
      if (window.scrollY > 300) {
        backToTopBtn.classList.add("visible");
      } else {
        backToTopBtn.classList.remove("visible");
      }
    }
  }

  if (backToTopBtn) {
    backToTopBtn.addEventListener("click", () => {
      window.scrollTo({ top: 0, behavior: "smooth" });
    });
  }

  window.addEventListener("scroll", toggleBackToTop);
  toggleBackToTop();
});


/*****************************************
 *  EDUCATION MODALS — VIEW MORE BUTTONS
 *****************************************/
document.addEventListener("DOMContentLoaded", function () {
  const viewMoreButtons = document.querySelectorAll('.education__view-more');

  const modalIds = [
    'modal-degree',
    'modal-bootcamp',
    'modal-bootcamp',
    'modal-bootcamp',
    'modal-bootcamp',
    'modal-bootcamp'
  ];

  viewMoreButtons.forEach((button, index) => {
    button.addEventListener('click', function (event) {
      event.stopPropagation();
      openEducationModal(modalIds[index]);
    });
  });
});


/*****************************************
 *  PROJECT MODALS
 *****************************************/
function openModal(id) {
  const modal = document.getElementById("modal-" + id);
  if (modal) {
    modal.style.display = "block";
    setTimeout(() => modal.classList.add("show"), 10);
    document.body.style.overflow = 'hidden';
  }
}

function closeModal(id) {
  const modal = document.getElementById("modal-" + id);
  if (modal) {
    modal.classList.remove("show");
    setTimeout(() => modal.style.display = "none", 300);
    document.body.style.overflow = 'auto';
  }
}


/*****************************************
 *  IMAGE GALLERY (one version only)
 *****************************************/
let slideIndexes = {};

function openGallery(id) {
  const gallery = document.getElementById("gallery-" + id);
  if (gallery) {
    gallery.style.display = "block";
    setTimeout(() => gallery.classList.add("show"), 10);
    document.body.style.overflow = 'hidden';

    if (slideIndexes[id] === undefined) slideIndexes[id] = 1;
    showSlides(slideIndexes[id], id);
  }
}

function closeGallery(id) {
  const gallery = document.getElementById("gallery-" + id);
  if (gallery) {
    gallery.classList.remove("show");
    setTimeout(() => gallery.style.display = "none", 300);
    document.body.style.overflow = 'auto';
  }
}

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

  if (n > slides.length) slideIndexes[galleryId] = 1;
  else if (n < 1) slideIndexes[galleryId] = slides.length;
  else slideIndexes[galleryId] = n;

  for (let i = 0; i < slides.length; i++) {
    slides[i].classList.remove("active");
  }

  for (let i = 0; i < dots.length; i++) {
    dots[i].classList.remove("active");
  }

  slides[slideIndexes[galleryId] - 1].classList.add("active");

  if (dots.length > 0) {
    dots[slideIndexes[galleryId] - 1].classList.add("active");
    if (caption) caption.innerHTML = dots[slideIndexes[galleryId] - 1].alt;
  }
}


/*****************************************
 *  EDUCATION MODALS
 *****************************************/
function openEducationModal(modalId, seccionNombre = null) {
  const modal = document.getElementById(modalId);
  if (!modal) return;

  modal.style.display = 'block';
  document.body.style.overflow = 'hidden';
  console.log('Modal abierto:', modalId);

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

function closeEducationModal(modalId) {
  const modal = document.getElementById(modalId);
  if (modal) {
    modal.style.display = 'none';
    document.body.style.overflow = 'auto';
  }
}


/*****************************************
 *  CLICK OUTSIDE TO CLOSE
 *****************************************/
document.addEventListener('click', function (event) {
  if (event.target.classList.contains('modal')) {
    const id = event.target.id.replace('modal-', '');
    closeModal(id);
  }

  if (event.target.classList.contains('gallery-modal')) {
    const id = event.target.id.replace('gallery-', '');
    closeGallery(id);
  }

  if (event.target.classList.contains('education-modal')) {
    closeEducationModal(event.target.id);
  }
});


/*****************************************
 *  EDUCATION NAVIGATION BUTTON (Reconocimientos)
 *****************************************/
document.addEventListener("DOMContentLoaded", function () {
  const navEvents = document.getElementById("navEvents");
  if (navEvents) {
    navEvents.addEventListener("click", function (e) {
      e.preventDefault();
      openEducationModal("modal-degree", "Reconocimientos y Eventos");
    });
  }
});


/*****************************************
 *  ESCAPE KEY & KEYBOARD NAVIGATION
 *****************************************/
document.addEventListener('keydown', function (event) {
  if (event.key === "Escape") {
    document.querySelectorAll('.modal.show').forEach(modal => {
      const id = modal.id.replace('modal-', '');
      closeModal(id);
    });

    document.querySelectorAll('.gallery-modal.show').forEach(modal => {
      const id = modal.id.replace('gallery-', '');
      closeGallery(id);
    });

    document.querySelectorAll('.education-modal').forEach(modal => {
      if (modal.style.display === 'block') {
        closeEducationModal(modal.id);
      }
    });
  }

  const galleryOpen = document.querySelector('.gallery-modal.show');
  if (galleryOpen) {
    const galleryId = galleryOpen.id.replace('gallery-', '');
    if (event.key === "ArrowLeft") plusSlides(-1, galleryId);
    else if (event.key === "ArrowRight") plusSlides(1, galleryId);
  }
});
