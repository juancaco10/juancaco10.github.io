document.addEventListener("DOMContentLoaded", function () {
  const backToTopBtn = document.getElementById("backToTop");

  // Función para mostrar/ocultar el botón
  function toggleBackToTop() {
    if (window.scrollY > 300) { // Aparece después de bajar 300px
      backToTopBtn.classList.add("visible");
    } else {
      backToTopBtn.classList.remove("visible");
    }
  }

  // Evento de clic
  backToTopBtn.addEventListener("click", function () {
    window.scrollTo({
      top: 0,
      behavior: "smooth"
    });
  });

  // Mostrar/ocultar al hacer scroll
  window.addEventListener("scroll", toggleBackToTop);

  // Ejecutar una vez al cargar para verificar posición inicial
  toggleBackToTop();
});