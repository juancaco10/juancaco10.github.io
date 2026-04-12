<section id="projects" class="projects">
  <div class="container">
    <h2 class="projects__title">Proyectos</h2>
    <div class="projects__grid">

      <!-- Project Card ifsul1 -->
      <div class="project__card">
        <h3 class="project__title">Sistema de Llaves IFSUL</h3>
        <p class="project__description">Plataforma para gestión de llaves, reservas y salas académicas.</p>

        <div class="project__image-container" onclick="openGallery('ifsul1')" role="button" tabindex="0" aria-label="Ver galería de imágenes del proyecto">
          <img 
            src="assets/img/projects/chaves/ifs.png" 
            alt="Interfaz principal del Sistema de Llaves IFSUL mostrando el dashboard de gestión"
            loading="lazy"
            decoding="async"
            width="600"
            height="400"
            class="project__image">
          <div class="project__image-overlay">
            <div class="project__zoom-icon">
              <span class="zoom-text">Ver imágenes</span>
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
            Este sistema fue desarrollado inicialmente para el IFSUL con el objetivo de
            modernizar y simplificar la gestión de llaves, reservas y salas académicas.
            A futuro, su alcance podría ampliarse para instituciones municipales y otras
            organizaciones que requieran un control seguro de sus espacios físicos.
          </p>

          <h3 class="modal__subtitle">🎯 Objetivo</h3>
          <p class="modal__text">
            Centralizar y automatizar la gestión de llaves, reservas y usuarios en un único
            sistema, aumentando la seguridad y optimizando los recursos de las instituciones.
          </p>

          <ul class="modal__list">
            <li>🌐 Plataforma Web (administración y recepción)</li>
            <li>📱 Aplicación Móvil (docentes y funcionarios)</li>
          </ul>

          <h3 class="modal__subtitle">🔑 Funcionalidades</h3>
          <ul class="modal__list">
            <li>🔐 <strong>Gestión de Llaves</strong>: registro de retiro, devolución y <strong>transferencia entre docentes</strong>.</li>
            <li>📅 <strong>Reservas y Salas</strong>: consulta de disponibilidad en tiempo real, solicitud y aprobación de reservas.</li>
            <li>👥 <strong>Gestión de Usuarios</strong>: perfiles personalizables, inicio de sesión seguro y control de accesos.</li>
            <li>📊 <strong>Reportes Inteligentes</strong>: estadísticas de uso, generación de reportes por periodo, filtros por usuario, sala y tipo de operación.</li>
          </ul>

          <h3 class="modal__subtitle">👥 ¿Para quién?</h3>
          <p class="modal__text">
            Actualmente diseñado para el IFSUL, pero adaptable a universidades, escuelas,
            municipalidades, instituciones técnicas, espacios corporativos y centros de
            entrenamiento.
          </p>

          <h3 class="modal__subtitle">🚀 Roadmap Futuro</h3>
          <ul class="modal__list">
            <li>Lanzamiento del MVP en el IFSUL</li>
            <li>Validación con usuarios reales</li>
            <li>Escalabilidad hacia municipalidades u otras instituciones</li>
          </ul>

          <blockquote class="modal__quote">
            "Transformamos la forma en que las instituciones gestionan sus espacios.
            Porque la educación merece tecnología inteligente."
          </blockquote>

          <!-- 🧑‍🤝‍🧑 Equipo de Desarrollo -->
          <div class="team-section">
            <h3 class="modal__subtitle">👨‍💻 Equipo de Desarrollo</h3>
            <div class="team-grid">
              <div class="team-member">
                <img src="assets/img/projects/juan.jpg" alt="Juan Carlos de León" class="team-photo">
                <p class="team-name">Juan Carlos de León Silva</p>
              </div>

              <div class="team-member">
                <img src="assets/img/projects/rafa.jpg" alt="Rafael Quintanilla" class="team-photo">
                <p class="team-name">Rafael Quintanilla Fontané</p>
              </div>

              <div class="team-member">
                <img src="assets/img/projects/gualberto.png" alt="Gualberto Castro" class="team-photo">
                <p class="team-name">Gualberto Castro Casas</p>
              </div>
            </div>
          </div>
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
              <img src="assets/img/projects/chaves/ifs.png" ">
            </div>
            <div class="mySlides">
              <img src="assets/img/projects/chaves/dashboard.png" >
            </div>
            <div class="mySlides">
              <img src="assets/img/projects/chaves/login.png" >
            </div>
            <div class="mySlides">
              <img src="assets/img/projects/chaves/salas.png">
            </div>
            <div class="mySlides">
              <img src="assets/img/projects/chaves/usuarios.png" >
            </div>
            <div class="mySlides">
              <img src="assets/img/projects/chaves/chaves.png" >
            </div>
            <div class="mySlides">
              <img src="assets/img/projects/chaves/7.png" >
            </div>
            <div class="mySlides">
              <img src="assets/img/projects/chaves/8.png" >
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
            <img class="thumbnail" src="assets/img/projects/chaves/7.png" onclick="currentSlide(5, 'ifsul1')" alt="Gestión de usuarios">
            <img class="thumbnail" src="assets/img/projects/chaves/8.png" onclick="currentSlide(6, 'ifsul1')" alt="Control de llaves">

          </div>
        </div>
      </div>

      <!-- Project Card IDR -->
      <div class="project__card">
        <h3 class="project__title">Sistema Integrado IDR (Prototipo)</h3>
        <p class="project__description">Plataforma para la gestión de solicitudes, análisis y servicios de la Intendencia de Rivera.</p>

        <div class="project__image-container" onclick="openGallery('idr')">
          <img src="assets/img/projects/idr/idr.png" alt="Sistema IDR" style="width:100%">
          <div class="project__image-overlay">
            <div class="project__zoom-icon">
              <span class="zoom-text">Ver imágenes</span>
            </div>
          </div>
        </div>

        <button class="project__button" onclick="openModal('idr')">Ver más</button>
      </div>

      <!-- Modal de información del proyecto IDR -->
      <div id="modal-idr" class="modal">
        <div class="modal__content">
          <span class="modal__close" onclick="closeModal('idr')">&times;</span>
          <h2 class="modal__title">Sistema Integrado de Solicitud, Análisis y Gestión de Servicios (Prototipo)</h2>
          <p class="modal__text">
            Este prototipo fue desarrollado para la <strong>Intendencia de Rivera – Uruguay</strong> y está compuesto por tres módulos:
            una aplicación móvil para ciudadanos, una plataforma web administrativa y una aplicación móvil para capataces.
            El objetivo es <strong>optimizar la gestión de servicios públicos</strong>, aumentar la transparencia y mejorar la
            participación ciudadana en un contexto de transformación digital.
          </p>

          <h3 class="modal__subtitle">🎯 Objetivo</h3>
          <p class="modal__text">
            Mejorar la eficiencia administrativa y reducir los tiempos de respuesta en los servicios municipales mediante
            la digitalización y centralización de las solicitudes.
          </p>

          <ul class="modal__list">
            <li>🌐 Plataforma Web (centralización y análisis de datos)</li>
            <li>📱 App Móvil Ciudadanos (reportes de problemas e incidencias)</li>
            <li>📱 App Móvil Capataces (gestión de tareas en campo)</li>
          </ul>

          <h3 class="modal__subtitle">🔑 Funcionalidades</h3>
          <ul class="modal__list">
            <li>📌 Reporte de incidencias en infraestructura con geolocalización</li>
            <li>📊 Análisis de datos para la toma de decisiones</li>
            <li>🗂 Gestión de tareas para capataces con seguimiento en tiempo real</li>
            <li>🔒 Transparencia y trazabilidad en las solicitudes</li>
          </ul>

          <h3 class="modal__subtitle">👥 Beneficiarios</h3>
          <p class="modal__text">
            Ciudadanos de Rivera, funcionarios administrativos, capataces y autoridades de la Intendencia.
          </p>

          <h3 class="modal__subtitle">🚀 Roadmap</h3>
          <ul class="modal__list">
            <li>Lanzamiento del prototipo</li>
            <li>Validación con usuarios reales</li>
            <li>Escalabilidad para otras municipalidades</li>
          </ul>

          <blockquote class="modal__quote">
            "Un sistema diseñado para acercar la gestión pública a la ciudadanía, optimizando los servicios y fomentando la transparencia."
          </blockquote>

          <!-- 🧑‍🤝‍🧑 Equipo de Desarrollo -->
          <div class="team-section">
            <h3 class="modal__subtitle">👨‍💻 Equipo de Desarrollo</h3>
            <div class="team-grid">
              <div class="team-member">
                <img src="assets/img/projects/juan.jpg" alt="Juan Carlos de León" class="team-photo">
                <p class="team-name">Juan Carlos de León Silva</p>
              </div>

              <div class="team-member">
                <img src="assets/img/projects/rafa.jpg" alt="Rafael Quintanilla" class="team-photo">
                <p class="team-name">Rafael Quintanilla Fontané</p>
              </div>

              <div class="team-member">
                <img src="assets/img/projects/gualberto.png" alt="Gualberto Castro" class="team-photo">
                <p class="team-name">Gualberto Castro Casas</p>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Modal de galería de imágenes IDR -->
      <div id="gallery-idr" class="gallery-modal">
        <span class="gallery-modal__close" onclick="closeGallery('idr')">&times;</span>
        <div class="gallery-modal__content">
          <!-- Slideshow container -->
          <div class="slideshow-container">
            <div class="mySlides active">
              <img src="assets/img/projects/idr/idr.png" >
            </div>
            <div class="mySlides">
              <img src="assets/img/projects/idr/idr1.png">
            </div>
            <div class="mySlides">
              <img src="assets/img/projects/idr/idr2.png">
            </div>
            <div class="mySlides">
              <img src="assets/img/projects/idr/idr3.jpeg">
            </div>
            <div class="mySlides">
              <img src="assets/img/projects/idr/idr4.png">
            </div>
            <div class="mySlides">
              <img src="assets/img/projects/idr/5.png" >
            </div>
            <div class="mySlides">
              <img src="assets/img/projects/idr/6.png">
            </div>

            <!-- Botones de navegación -->
            <a class="prev" onclick="plusSlides(-1, 'idr')">&#10094;</a>
            <a class="next" onclick="plusSlides(1, 'idr')">&#10095;</a>

            <!-- Texto dinámico -->
            <div class="caption-container">
              <p id="caption-idr"></p>
            </div>
          </div>

          <!-- Miniaturas -->
          <div class="thumbnail-row">
            <img class="thumbnail active" src="assets/img/projects/idr/idr.png" onclick="currentSlide(1, 'idr')" alt="Vista general del sistema">
            <img class="thumbnail" src="assets/img/projects/idr/idr1.png" onclick="currentSlide(2, 'idr')" alt="Plataforma web administrativa">
            <img class="thumbnail" src="assets/img/projects/idr/idr2.png" onclick="currentSlide(3, 'idr')" alt="App móvil para ciudadanos">
            <img class="thumbnail" src="assets/img/projects/idr/idr3.jpeg" onclick="currentSlide(4, 'idr')" alt="App móvil para capataces">
            <img class="thumbnail" src="assets/img/projects/idr/idr4.png" onclick="currentSlide(4, 'idr')" alt="App móvil para capataces">
            <img class="thumbnail" src="assets/img/projects/idr/5.png" onclick="currentSlide(4, 'idr')" alt="App móvil para capataces">
            <img class="thumbnail" src="assets/img/projects/idr/6.png" onclick="currentSlide(4, 'idr')" alt="App móvil para capataces">

          </div>
        </div>
      </div>

     

    </div>
  </div>
</section>