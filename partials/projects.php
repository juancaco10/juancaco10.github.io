<section id="projects" class="projects">
  <div class="container">
    <h2 class="projects__title">Proyectos</h2>
    <div class="projects__grid">

      <!-- Project Card ifsul1 -->
      <div class="project__card">
        <h3 class="project__title">Sistema de Llaves IFSUL</h3>
        <p class="project__description">Plataforma para gestión de llaves, reservas y salas académicas.</p>

        <div class="project__image-container" onclick="openGallery('ifsul1')">
          <img src="assets/img/projects/chaves/ifs.png" style="width:100%">
          <div class="project__image-overlay">
            <div class="project__zoom-icon">
              <i class="fas fa-images"></i>
            </div>
          </div>
        </div>

        <button class="project__button" onclick="openModal('ifsul1')">Ver más</button>
      </div>

      <!-- Modal de información del proyecto ifsul1 -->
      <div id="modal-ifsul1" class="modal">
        <div class="modal__content">
          <span class="modal__close" onclick="closeModal('ifsul1')">&times;</span>
          <h2 class="modal__title">Sistema de Llaves IFSUL</h2>
          <p class="modal__text">
            É uma plataforma para gestão de chaves, reservas e salas acadêmicas.
            Com o uso de biometria, QR Code e futuramente inteligência artificial,
            simplificamos o controle e a seguridad de los espacios institucionales.
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

      <!-- Modal de galería de imágenes ifsul1 -->
      <div id="gallery-ifsul1" class="gallery-modal">
        <span class="gallery-modal__close" onclick="closeGallery('ifsul1')">&times;</span>
        <div class="gallery-modal__content">
          <!-- Slideshow container -->
          <div class="slideshow-container">
            <!-- Imágenes completas - SOLO UNA active -->
            <div class="mySlides active">
              <img src="assets/img/projects/chaves/ifs.png" style="width:100%">
            </div>
            <div class="mySlides">
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
            <a class="prev" onclick="plusSlides(-1, 'ifsul1')">&#10094;</a>
            <a class="next" onclick="plusSlides(1, 'ifsul1')">&#10095;</a>

            <!-- Texto de la imagen -->
            <div class="caption-container">
              <p id="caption-ifsul1"></p>
            </div>
          </div>

          <!-- Miniaturas - SOLO UNA active -->
          <div class="thumbnail-row">
            <img class="thumbnail active" src="assets/img/projects/chaves/ifs.png" onclick="currentSlide(1, 'ifsul1')" alt="Interfaz principal del sistema">
            <img class="thumbnail" src="assets/img/projects/chaves/dashboard.png" onclick="currentSlide(2, 'ifsul1')" alt="Dashboard del sistema">
            <img class="thumbnail" src="assets/img/projects/chaves/login.png" onclick="currentSlide(3, 'ifsul1')" alt="Página de login">
            <img class="thumbnail" src="assets/img/projects/chaves/salas.png" onclick="currentSlide(4, 'ifsul1')" alt="Gestión de salas">
            <img class="thumbnail" src="assets/img/projects/chaves/usuarios.png" onclick="currentSlide(5, 'ifsul1')" alt="Gestión de usuarios">
            <img class="thumbnail" src="assets/img/projects/chaves/chaves.png" onclick="currentSlide(6, 'ifsul1')" alt="Control de llaves">
          </div>
        </div>
      </div>

      <!-- Project Card ifsul2 -->
      <div class="project__card">
        <h3 class="project__title">Sistema de Llaves IFSUL</h3>
        <p class="project__description">Plataforma para gestión de llaves, reservas y salas académicas.</p>

        <div class="project__image-container" onclick="openGallery('ifsul2')">
          <img src="assets/img/projects/chaves/ifs.png" style="width:100%">
          <div class="project__image-overlay">
            <div class="project__zoom-icon">
              <i class="fas fa-images"></i>
            </div>
          </div>
        </div>

        <button class="project__button" onclick="openModal('ifsul2')">Ver más</button>
      </div>

      <!-- Modal de información del proyecto ifsul2 -->
      <div id="modal-ifsul2" class="modal">
        <div class="modal__content">
          <span class="modal__close" onclick="closeModal('ifsul2')">&times;</span>
          <h2 class="modal__title">Sistema de Llaves IFSUL</h2>
          <p class="modal__text">
            É uma plataforma para gestão de chaves, reservas e salas acadêmicas.
            Com o uso de biometria, QR Code e futuramente inteligência artificial,
            simplificamos o controle e a seguridad de los espacios institucionales.
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

      <!-- Modal de galería de imágenes ifsul2 -->
      <div id="gallery-ifsul2" class="gallery-modal">
        <span class="gallery-modal__close" onclick="closeGallery('ifsul2')">&times;</span>
        <div class="gallery-modal__content">
          <!-- Slideshow container -->
          <div class="slideshow-container">
            <!-- Imágenes completas - SOLO UNA active -->
            <div class="mySlides active">
              <img src="assets/img/projects/chaves/ifs.png" style="width:100%">
            </div>
            <div class="mySlides">
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
            <a class="prev" onclick="plusSlides(-1, 'ifsul2')">&#10094;</a>
            <a class="next" onclick="plusSlides(1, 'ifsul2')">&#10095;</a>

            <!-- Texto de la imagen -->
            <div class="caption-container">
              <p id="caption-ifsul2"></p>
            </div>
          </div>

          <!-- Miniaturas - SOLO UNA active -->
          <div class="thumbnail-row">
            <img class="thumbnail active" src="assets/img/projects/chaves/ifs.png" onclick="currentSlide(1, 'ifsul2')" alt="Interfaz principal del sistema">
            <img class="thumbnail" src="assets/img/projects/chaves/dashboard.png" onclick="currentSlide(2, 'ifsul2')" alt="Dashboard del sistema">
            <img class="thumbnail" src="assets/img/projects/chaves/login.png" onclick="currentSlide(3, 'ifsul2')" alt="Página de login">
            <img class="thumbnail" src="assets/img/projects/chaves/salas.png" onclick="currentSlide(4, 'ifsul2')" alt="Gestión de salas">
            <img class="thumbnail" src="assets/img/projects/chaves/usuarios.png" onclick="currentSlide(5, 'ifsul2')" alt="Gestión de usuarios">
            <img class="thumbnail" src="assets/img/projects/chaves/chaves.png" onclick="currentSlide(6, 'ifsul2')" alt="Control de llaves">
          </div>
        </div>
      </div>

      <!-- Project Card ifsul3 -->
      <div class="project__card">
        <h3 class="project__title">Sistema de Llaves IFSUL</h3>
        <p class="project__description">Plataforma para gestión de llaves, reservas y salas académicas.</p>

        <div class="project__image-container" onclick="openGallery('ifsul3')">
          <img src="assets/img/projects/chaves/ifs.png" style="width:100%">
          <div class="project__image-overlay">
            <div class="project__zoom-icon">
              <i class="fas fa-images"></i>
            </div>
          </div>
        </div>

        <button class="project__button" onclick="openModal('ifsul3')">Ver más</button>
      </div>

      <!-- Modal de información del proyecto ifsul3 -->
      <div id="modal-ifsul3" class="modal">
        <div class="modal__content">
          <span class="modal__close" onclick="closeModal('ifsul3')">&times;</span>
          <h2 class="modal__title">Sistema de Llaves IFSUL</h2>
          <p class="modal__text">
            É uma plataforma para gestão de chaves, reservas e salas acadêmicas.
            Com o uso de biometria, QR Code e futuramente inteligência artificial,
            simplificamos o controle e a seguridad de los espacios institucionales.
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

      <!-- Modal de galería de imágenes ifsul3 -->
      <div id="gallery-ifsul3" class="gallery-modal">
        <span class="gallery-modal__close" onclick="closeGallery('ifsul3')">&times;</span>
        <div class="gallery-modal__content">
          <!-- Slideshow container -->
          <div class="slideshow-container">
            <!-- Imágenes completas - SOLO UNA active -->
            <div class="mySlides active">
              <img src="assets/img/projects/chaves/ifs.png" style="width:100%">
            </div>
            <div class="mySlides">
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
            <a class="prev" onclick="plusSlides(-1, 'ifsul3')">&#10094;</a>
            <a class="next" onclick="plusSlides(1, 'ifsul3')">&#10095;</a>

            <!-- Texto de la imagen -->
            <div class="caption-container">
              <p id="caption-ifsul3"></p>
            </div>
          </div>

          <!-- Miniaturas - SOLO UNA active -->
          <div class="thumbnail-row">
            <img class="thumbnail active" src="assets/img/projects/chaves/ifs.png" onclick="currentSlide(1, 'ifsul3')" alt="Interfaz principal del sistema">
            <img class="thumbnail" src="assets/img/projects/chaves/dashboard.png" onclick="currentSlide(2, 'ifsul3')" alt="Dashboard del sistema">
            <img class="thumbnail" src="assets/img/projects/chaves/login.png" onclick="currentSlide(3, 'ifsul3')" alt="Página de login">
            <img class="thumbnail" src="assets/img/projects/chaves/salas.png" onclick="currentSlide(4, 'ifsul3')" alt="Gestión de salas">
            <img class="thumbnail" src="assets/img/projects/chaves/usuarios.png" onclick="currentSlide(5, 'ifsul3')" alt="Gestión de usuarios">
            <img class="thumbnail" src="assets/img/projects/chaves/chaves.png" onclick="currentSlide(6, 'ifsul3')" alt="Control de llaves">
          </div>
        </div>
      </div>

      <!-- Project Card ifsul4 -->
      <div class="project__card">
        <h3 class="project__title">Sistema de Llaves IFSUL</h3>
        <p class="project__description">Plataforma para gestión de llaves, reservas y salas académicas.</p>

        <div class="project__image-container" onclick="openGallery('ifsul4')">
          <img src="assets/img/projects/chaves/ifs.png" style="width:100%">
          <div class="project__image-overlay">
            <div class="project__zoom-icon">
              <i class="fas fa-images"></i>
            </div>
          </div>
        </div>

        <button class="project__button" onclick="openModal('ifsul4')">Ver más</button>
      </div>

      <!-- Modal de información del proyecto ifsul4 -->
      <div id="modal-ifsul4" class="modal">
        <div class="modal__content">
          <span class="modal__close" onclick="closeModal('ifsul4')">&times;</span>
          <h2 class="modal__title">Sistema de Llaves IFSUL</h2>
          <p class="modal__text">
            É uma plataforma para gestão de chaves, reservas e salas acadêmicas.
            Com o uso de biometria, QR Code e futuramente inteligência artificial,
            simplificamos o controle e a seguridad de los espacios institucionales.
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

      <!-- Modal de galería de imágenes ifsul4 -->
      <div id="gallery-ifsul4" class="gallery-modal">
        <span class="gallery-modal__close" onclick="closeGallery('ifsul4')">&times;</span>
        <div class="gallery-modal__content">
          <!-- Slideshow container -->
          <div class="slideshow-container">
            <!-- Imágenes completas - SOLO UNA active -->
            <div class="mySlides active">
              <img src="assets/img/projects/chaves/ifs.png" style="width:100%">
            </div>
            <div class="mySlides">
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
            <a class="prev" onclick="plusSlides(-1, 'ifsul4')">&#10094;</a>
            <a class="next" onclick="plusSlides(1, 'ifsul4')">&#10095;</a>

            <!-- Texto de la imagen -->
            <div class="caption-container">
              <p id="caption-ifsul4"></p>
            </div>
          </div>

          <!-- Miniaturas - SOLO UNA active -->
          <div class="thumbnail-row">
            <img class="thumbnail active" src="assets/img/projects/chaves/ifs.png" onclick="currentSlide(1, 'ifsul4')" alt="Interfaz principal del sistema">
            <img class="thumbnail" src="assets/img/projects/chaves/dashboard.png" onclick="currentSlide(2, 'ifsul4')" alt="Dashboard del sistema">
            <img class="thumbnail" src="assets/img/projects/chaves/login.png" onclick="currentSlide(3, 'ifsul4')" alt="Página de login">
            <img class="thumbnail" src="assets/img/projects/chaves/salas.png" onclick="currentSlide(4, 'ifsul4')" alt="Gestión de salas">
            <img class="thumbnail" src="assets/img/projects/chaves/usuarios.png" onclick="currentSlide(5, 'ifsul4')" alt="Gestión de usuarios">
            <img class="thumbnail" src="assets/img/projects/chaves/chaves.png" onclick="currentSlide(6, 'ifsul4')" alt="Control de llaves">
          </div>
        </div>
      </div>

    </div>
  </div>
</section>