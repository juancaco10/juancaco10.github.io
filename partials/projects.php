  <section id="projects" class="projects">
    <div class="container">
      <h2 class="projects__title">Proyectos</h2>
      <div class="projects__grid">
        <!-- Project Card -->
        <div class="project__card">
          <h3 class="project__title">Sistema de Llaves IFSUL</h3>
          <p class="project__description">Plataforma para gestión de llaves, reservas y salas académicas.</p>

          <div class="project__image-container" onclick="openGallery('ifsul')">
            <img src="assets/img/projects/chaves/ifs.png" style="width:100%">
            <div class="project__image-overlay">
              <div class="project__zoom-icon">
                <i class="fas fa-images"></i>
              </div>
            </div>
          </div>

          <button class="project__button" onclick="openModal('ifsul')">Ver más</button>
        </div>

        <!-- Modal de información del proyecto -->
        <div id="modal-ifsul" class="modal">
          <div class="modal__content">
            <span class="modal__close" onclick="closeModal('ifsul')">&times;</span>
            <h2 class="modal__title">Sistema de Llaves IFSUL</h2>
            <p class="modal__text">
              É uma plataforma para gestão de chaves, reservas e salas acadêmicas.
              Com o uso de biometria, QR Code e futuramente inteligência artificial,
              simplificamos o controle e a segurança dos espaços institucionais.
            </p>

            <h3 class="modal__subtitle">🎯 Objetivo</h3>
            <p class="modal__text">
              A plataforma centraliza e automatiza o gerenciamento de chaves e reservas
              em instituições educacionais, otimizando tempo e recursos.
            </p>

            <ul class="modal__list">
              <li>🌐 Plataforma Web (administración y recepción)</li>
              <li>📱 Aplicativo Móvil (docentes y funcionarios)</li>
            </ul>

            <h3 class="modal__subtitle">🔑 Funcionalidades</h3>
            <ul class="modal__list">
              <li>🔐 <strong>Gestión de Llaves</strong>: registro de retirada, devolución y transferencia.</li>
              <li>📅 <strong>Reservas y Salas</strong>: disponibilidad en tiempo real y aprobación de reservas.</li>
              <li>👥 <strong>Gestión de Usuarios</strong>: perfiles personalizables, login seguro y control de accesos.</li>
              <li>📊 <strong>Reportes Inteligentes</strong>: estadísticas, filtros por usuario, sala y operación.</li>
            </ul>

            <h3 class="modal__subtitle">👥 Para quién?</h3>
            <p class="modal__text">
              Universidades y escuelas, instituciones técnicas, espacios corporativos y centros de entrenamiento.
            </p>

            <h3 class="modal__subtitle">🚀 Roadmap Futuro</h3>
            <ul class="modal__list">
              <li>Lanzamiento del MVP</li>
              <li>Validación con usuarios reales</li>
            </ul>

            <blockquote class="modal__quote">
              "Transformamos la forma como las instituciones gestionan sus espacios. Porque la educación merece tecnología inteligente."
            </blockquote>
          </div>
        </div>

        <!-- Modal de galería de imágenes -->
        <div id="gallery-ifsul" class="gallery-modal">
          <span class="gallery-modal__close" onclick="closeGallery('ifsul')">&times;</span>
          <div class="gallery-modal__content">
            <!-- Slideshow container -->
            <div class="slideshow-container">
              <!-- Imágenes completas -->
              <div class="mySlides active">
                <img src="assets/img/projects/chaves/ifs.png" style="width:100%">
              </div>
              <div class="mySlides active">
                <img src="assets/img/projects/chaves/dashboard.png" style="width:100%">
              </div>
              <div class="mySlides">
                <img src="assets/img/projects/chaves/login.png" style="width:100%">
              </div>

              <div class="mySlides">
                <img src="assets/img/projects/chaves/salas.png" style="width:100%">
              </div>

              <div class="mySlides">
                <img src="assets/img/projects/chaves/usuarios.png" style="width:100%">
              </div>
              <div class="mySlides">
                <img src="assets/img/projects/chaves/chaves.png" style="width:100%">
              </div>

              <!-- Botones de anterior/siguiente -->
              <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
              <a class="next" onclick="plusSlides(1)">&#10095;</a>

              <!-- Texto de la imagen -->
              <div class="caption-container">
                <p id="caption"></p>
              </div>
            </div>

            <!-- Miniaturas -->
            <div class="thumbnail-row">
              <img class="thumbnail active" src="assets/img/projects/chaves/ifs.png" onclick="currentSlide(1)" alt="Interfaz principal del sistema">
              <img class="thumbnail active" src="assets/img/projects/chaves/dashboard.png" onclick="currentSlide(1)" alt="Interfaz principal del sistema">
              <img class="thumbnail active" src="assets/img/projects/chaves/login.png" onclick="currentSlide(1)" alt="Interfaz principal del sistema">
              <img class="thumbnail active" src="assets/img/projects/chaves/salas.png" onclick="currentSlide(1)" alt="Interfaz principal del sistema">
              <img class="thumbnail active" src="assets/img/projects/chaves/usuarios.png" onclick="currentSlide(1)" alt="Interfaz principal del sistema">

              <img class="thumbnail active" src="assets/img/projects/chaves/chaves.png" onclick="currentSlide(1)" alt="Interfaz principal del sistema">
            </div>
          </div>
        </div>

        <!-- Proyectos de ejemplo -->
        <div class="project__card">
          <h3 class="project__title">E-commerce Platform</h3>
          <p class="project__description">Plataforma de comercio electrónico con carrito de compras y pasarela de pago.</p>

          <div class="project__image-container" onclick="openGallery('ecommerce')">
            <img src="https://images.unsplash.com/photo-1556742049-0cfed4f6a45d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80" alt="E-commerce Platform" class="project__image" />
            <div class="project__image-overlay">
              <div class="project__zoom-icon">
                <i class="fas fa-images"></i>
              </div>
            </div>
          </div>

          <button class="project__button" onclick="openModal('ecommerce')">Ver más</button>
        </div>

        <div class="project__card">
          <h3 class="project__title">App de Delivery</h3>
          <p class="project__description">Aplicación móvil para pedidos y seguimiento de entregas en tiempo real.</p>

          <div class="project__image-container" onclick="openGallery('delivery')">
            <img src="https://images.unsplash.com/photo-1607083206968-13611e3d76db?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1115&q=80" alt="App de Delivery" class="project__image" />
            <div class="project__image-overlay">
              <div class="project__zoom-icon">
                <i class="fas fa-images"></i>
              </div>
            </div>
          </div>

          <button class="project__button" onclick="openModal('delivery')">Ver más</button>
        </div>
      </div>
    </div>
  </section>