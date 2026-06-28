<?php
// ============================================
// DATOS DE FORMACIÓN (estructurado para escalar)
// ============================================
$curriculum = [
  'Semestre 1' => ['Lógica de programación', 'Matemática discreta', 'Inglés técnico I', 'Introducción a la informática', 'Comunicación y expresión', 'Relaciones humanas, ética y ciudadanía'],
  'Semestre 2' => ['Programación I', 'Bases de Datos I', 'Inglés Técnico II', 'Métodos Cuantitativos', 'Interface Hombre Computadora', 'Sistemas Operacionales', 'Probabilidad y Estadística'],
  'Semestre 3' => ['Programación Orientada a Objetos', 'Sociedad y Tecnología', 'Bases de Datos II', 'Análisis de Sistemas I', 'Inglés Técnico III', 'Redes de Computadores', 'Estructura de Datos'],
  'Semestre 4' => ['Programación Web I', 'Programación Mobile I', 'Bases de Datos III', 'Análisis de Sistema II', 'Metodología de Investigación', 'Testing de Aplicaciones', 'Sistemas Distribuidos'],
  'Semestre 5' => ['Programación Web II', 'Programación Mobile II', 'Prácticas en Análisis y Desenvolvimiento de Sistemas I', 'Ingeniería de Software', 'Calidad de Software', 'Producción de Texto'],
  'Semestre 6' => ['Tópicos Avanzados en Computadoras', 'Prácticas en Análisis y Desenvolvimiento de Sistemas II', 'Gerencia de Proyectos de Software', 'Seguridad y Auditoría de Sistemas', 'Ética y Legislación Aplicada a la Informática', 'Emprendedurismo'],
];
$degree_techs = ['Java', 'JavaScript', 'HTML/CSS', 'MySQL', 'React', 'MongoDB', 'Git'];
?>
<section id="education" class="education o-section">
  <div class="o-container">
    <h2 class="education__title">Educación y Formación</h2>

    <div class="o-grid o-grid--auto education__grid">
      <div class="education__card o-glass" data-modal="modal-degree">
        <h3 class="education__card-title">Análisis y Desarrollo de Sistemas</h3>
        <hr class="education__divider" />
        <p class="education__info"><strong>Duración:</strong> 2165h</p>
        <p class="education__info"><strong>Período:</strong> 2022 - 2024</p>
        <p class="education__info"><strong>Institución:</strong> IFSUL - UTEC </p>
        <div class="education__view-more" role="button" tabindex="0" aria-label="Ver detalles de la carrera">Ver detalles →</div>
      </div>
    </div>
  </div>
</section>

<!-- Modal para la carrera principal -->
<div id="modal-degree" class="education-modal" role="dialog" aria-modal="true" aria-labelledby="modal-degree-title">
  <div class="education-modal__content">
    <button type="button" class="education-modal__close" data-click="closeEducationModal('modal-degree')" aria-label="Cerrar ventana">&times;</button>

    <div class="education-modal__header">
      <h2 class="education-modal__title" id="modal-degree-title">Tecnólogo en Análisis y Desarrollo de Sistemas</h2>
      <p class="education-modal__institution">IFSUL - UTEC | 2022 - 2024 | 2165 horas</p>
      <p class="education-modal__description">Formación como ciudadano crítico y solidario, con formación técnica y tecnológica para actuar tanto en Brasil como en Uruguay en situaciones que impliquen planificación, análisis, desarrollo, testeo, implementación, manutención, evaluación y utilización de tecnologías emergentes.</p>
    </div>

    <div class="education-modal__grid">
      <div class="education-modal__info">
        <div class="education-modal__section">
          <h3><i class="fas fa-graduation-cap"></i> Plan de Estudios</h3>
          <div class="semester-container">
            <?php foreach ($curriculum as $semestre => $materias): ?>
            <div class="semester">
              <h4><?php echo e($semestre); ?></h4>
              <ul>
                <?php foreach ($materias as $materia): ?>
                <li><?php echo e($materia); ?></li>
                <?php endforeach; ?>
              </ul>
            </div>
            <?php endforeach; ?>
          </div>
        </div>

        <div class="education-modal__section">
          <h3><i class="fas fa-tools"></i> Tecnologías</h3>
          <div class="education-modal__tech">
            <?php foreach ($degree_techs as $tech): ?>
            <span class="tech-badge"><?php echo e($tech); ?></span>
            <?php endforeach; ?>
          </div>
        </div>

      </div>

      <div class="education-modal__media">
        <div class="modal-card">
          <h4><i class="fas fa-info-circle"></i> Detalles de la Carrera</h4>
          <div class="card-detail">
            <i class="far fa-clock"></i>
            <div>
              <strong>Duración:</strong>
              <p>6 semestres (3 años)</p>
            </div>
          </div>
          <div class="card-detail">
            <i class="fas fa-chalkboard-teacher"></i>
            <div>
              <strong>Modalidad:</strong>
              <p>Presencial</p>
            </div>
          </div>
          <div class="card-detail">
            <i class="far fa-calendar-alt"></i>
            <div>
              <strong>Horario:</strong>
              <p>Lunes a viernes, 19:00 - 23:00</p>
            </div>
          </div>
          <div class="card-detail">
            <i class="fas fa-map-marker-alt"></i>
            <div>
              <strong>Ubicación:</strong>
              <p>Av. Paul Harris, 410, Santana do Livramento</p>
            </div>
          </div>
        </div>

        <img
          src="assets/img/certificados/analista.png"
          alt="Certificado de Analista de Sistemas"
          class="education-modal__image"
          data-click="showImgModal(this)">
        <p class="education-modal__caption">Diploma de conclusión</p>

        <div class="modal-card">
          <h4><i class="fas fa-lightbulb"></i> Enfoque Educativo</h4>
          <p>Formación integral que combina conocimientos técnicos con:</p>
          <ul>
            <li>Pensamiento crítico y analítico</li>
            <li>Capacidad emprendedora</li>
            <li>Actualización continua</li>
            <li>Visión internacional (Brasil-Uruguay)</li>
            <li>Compromiso social y ético</li>
          </ul>
        </div>

      </div>
    </div>

    <div class="education-modal__section full-modal">
      <h3><i class="fas fa-trophy"></i> Reconocimientos y Eventos</h3>

      <!-- Galería modal para CodeDay 2023 -->
      <div id="gallery-codeday2023" class="gallery-modal" role="dialog" aria-modal="true" aria-label="Galería de fotos: CodeDay 2023">
        <div class="modal-content">
          <button type="button" class="close" data-click="closeGallery('codeday2023')" aria-label="Cerrar galería">&times;</button>

          <div class="mySlides">
            <img src="assets/img/events/codeday2023-1.webp" alt="Competencia CodeDay 2023">
          </div>

          <div class="mySlides">
            <img src="assets/img/events/codeday2023-2.webp" alt="Equipo en CodeDay 2023">
          </div>

          <div class="mySlides">
            <img src="assets/img/events/codeday2023-3.webp" alt="Premiación CodeDay 2023">
          </div>

          <div class="mySlides">
            <img src="assets/img/events/codeday2023-4.webp" alt="Premiación CodeDay 2023">
          </div>

          <button type="button" class="prev" data-click="plusSlides(-1, 'codeday2023')" aria-label="Imagen anterior">&#10094;</button>
          <button type="button" class="next" data-click="plusSlides(1, 'codeday2023')" aria-label="Imagen siguiente">&#10095;</button>

          <div class="thumbnail-container">
            <div class="thumbnail" data-click="currentSlide(1, 'codeday2023')">
              <img src="assets/img/events/codeday2023-1.webp" alt="Competencia CodeDay 2023">
            </div>
            <div class="thumbnail" data-click="currentSlide(2, 'codeday2023')">
              <img src="assets/img/events/codeday2023-2.webp" alt="Equipo en CodeDay 2023">
            </div>
            <div class="thumbnail" data-click="currentSlide(3, 'codeday2023')">
              <img src="assets/img/events/codeday2023-3.webp" alt="Premiación CodeDay 2023">
            </div>
            <div class="thumbnail" data-click="currentSlide(4, 'codeday2023')">
              <img src="assets/img/events/codeday2023-4.webp" alt="Premiación CodeDay 2023">
            </div>
          </div>
        </div>
      </div>

      <!-- Galería modal para CodeDay 2024 -->
      <div id="gallery-codeday2024" class="gallery-modal" role="dialog" aria-modal="true" aria-label="Galería de fotos: CodeDay 2024">
        <div class="modal-content">
          <button type="button" class="close" data-click="closeGallery('codeday2024')" aria-label="Cerrar galería">&times;</button>

          <div class="mySlides">
            <img src="assets/img/events/codeday2024-1.webp" alt="CodeDay 2024">
          </div>

          <div class="mySlides">
            <img src="assets/img/events/codeday2024-2.jpg" alt="CodeDay 2024">
          </div>

          <div class="mySlides">
            <img src="assets/img/events/codeday2024-3.webp" alt="CodeDay 2024">
          </div>

          <button type="button" class="prev" data-click="plusSlides(-1, 'codeday2024')" aria-label="Imagen anterior">&#10094;</button>
          <button type="button" class="next" data-click="plusSlides(1, 'codeday2024')" aria-label="Imagen siguiente">&#10095;</button>

          <div class="thumbnail-container">
            <div class="thumbnail" data-click="currentSlide(1, 'codeday2024')">
              <img src="assets/img/events/codeday2024-1.webp" alt="CodeDay 2024">
            </div>
            <div class="thumbnail" data-click="currentSlide(2, 'codeday2024')">
              <img src="assets/img/events/codeday2024-2.jpg" alt="CodeDay 2024">
            </div>
            <div class="thumbnail" data-click="currentSlide(3, 'codeday2024')">
              <img src="assets/img/events/codeday2024-3.webp" alt="CodeDay 2024">
            </div>
          </div>
        </div>
      </div>

      <!-- Galería modal para FEBITEC  -->
      <div id="gallery-febitec" class="gallery-modal" role="dialog" aria-modal="true" aria-label="Galería de fotos: FEBITEC">
        <div class="modal-content">
          <button type="button" class="close" data-click="closeGallery('febitec')" aria-label="Cerrar galería">&times;</button>

          <div class="mySlides">
            <img src="assets/img/events/febi.webp" alt="Presentación en FEBITEC">
          </div>
          <div class="mySlides">
            <img src="assets/img/events/febi1.webp" alt="Presentación en FEBITEC">
          </div>

          <div class="mySlides">
            <img src="assets/img/events/febi2.webp" alt="Equipo en FEBITEC">
          </div>

          <div class="mySlides">
            <img src="assets/img/events/febi3.webp" alt="Mención Honrosa">
          </div>
          <div class="mySlides">
            <img src="assets/img/events/febi4.png" alt="Mención Honrosa">
          </div>

          <button type="button" class="prev" data-click="plusSlides(-1, 'febitec')" aria-label="Imagen anterior">&#10094;</button>
          <button type="button" class="next" data-click="plusSlides(1, 'febitec')" aria-label="Imagen siguiente">&#10095;</button>

          <div class="thumbnail-container">
            <div class="thumbnail" data-click="currentSlide(1, 'febitec')">
              <img src="assets/img/events/febi.webp" alt="Presentación en FEBITEC">
            </div>
            <div class="thumbnail" data-click="currentSlide(2, 'febitec')">
              <img src="assets/img/events/febi1.webp" alt="Presentación en FEBITEC">
            </div>
            <div class="thumbnail" data-click="currentSlide(3, 'febitec')">
              <img src="assets/img/events/febi2.webp" alt="Equipo en FEBITEC">
            </div>
            <div class="thumbnail" data-click="currentSlide(4, 'febitec')">
              <img src="assets/img/events/febi3.webp" alt="Mención Honrosa">
            </div>
            <div class="thumbnail" data-click="currentSlide(5, 'febitec')">
              <img src="assets/img/events/febi4.png" alt="Mención Honrosa">
            </div>
          </div>
        </div>
      </div>

      <!-- Card del evento CodeDay 2023 -->
      <div class="event-card">
        <div class="event-header">
          <h4><i class="fas fa-laptop-code"></i> 🚀 CodeDay 2023 💻👨‍💻🥇</h4>
          <div class="event-date">Septiembre 2023</div>
        </div>

        <div class="event-content">
          <p>
            Los días 12 o 13 de septiembre se celebra el Día del Programador,
            una fecha que honra a quienes, con código y creatividad, crean soluciones tecnológicas.
            Se elige el 256º día del año (13 de septiembre o 12 en años bisiestos)
            porque 256 es el mayor número que puede representarse con 8 bits.
          </p>
          <p>
            En 2023 📅, el Instituto organizó una competición de programación con desafíos entre todos los estudiantes
            del primer al sexto semestre. Cada equipo debía elegir un problema presentado mediante diagramas UML
            y desarrollar una solución que sería evaluada por los jurados.
          </p>
          <p>
            Mi equipo y yo logramos el primer lugar 🏆 con nuestro sistema de gestión de llaves.
            Desarrollamos la solución en Java utilizando Eclipse, gestionamos el código con Git y GitHub,
            y todo el proyecto se completó en un intenso plazo de solo 24 horas,
            demostrando nuestra capacidad de trabajo en equipo, organización y creatividad.
          </p>

          <div class="gallery-preview">
            <h5>Galería de Fotos</h5>
            <div class="gallery-grid">
              <div class="gallery-item" role="button" tabindex="0" data-click="openGallery('codeday2023');currentSlide(1, 'codeday2023')">
                <img src="assets/img/events/codeday2023-1.webp" alt="Competencia CodeDay 2023">
                <div class="gallery-overlay">Ver más</div>
              </div>
              <div class="gallery-item" role="button" tabindex="0" data-click="openGallery('codeday2023');currentSlide(2, 'codeday2023')">
                <img src="assets/img/events/codeday2023-2.webp" alt="Equipo en CodeDay 2023">
                <div class="gallery-overlay">Ver más</div>
              </div>
              <div class="gallery-item" role="button" tabindex="0" data-click="openGallery('codeday2023');currentSlide(3, 'codeday2023')">
                <img src="assets/img/events/codeday2023-3.webp" alt="Premiación CodeDay 2023">
                <div class="gallery-overlay">Ver más</div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Card del evento CodeDay 2024 -->
      <div class="event-card">
        <div class="event-header">
          <h4><i class="fas fa-laptop-code"></i> 🚀 CodeDay 2024 💻👩‍💻🥈</h4>
          <div class="event-date">Septiembre 2024</div>
        </div>

        <div class="event-content">
          <p>
            🚀 <strong>Code Day 2024:</strong> Un nuevo desafío
          </p>
          <p>
            En 2024 📅, celebramos nuevamente el Día del Programador con una nueva edición de <strong>Code Day</strong>.
            Esta vez los desafíos incluyeron no solo resolución de problemas mediante diagramas UML, sino también pruebas de algoritmos, optimización de código y trabajo con APIs reales.
          </p>
          <p>
            La competencia fue más exigente que el año anterior y reunió a más equipos de distintos niveles.
            Mi equipo y yo tuvimos que organizarnos cuidadosamente, planificar la estrategia y distribuir tareas para cumplir con los tiempos establecidos.
          </p>
          <p>
            Decidimos enfrentar el reto de desarrollar una aplicación móvil de alerta en tiempo real para desastres naturales.
            Durante los tres días de la competencia, trabajamos intensamente utilizando:
          </p>
          <ul>
            <li><strong>Java para Android</strong> para el desarrollo de la aplicación.</li>
            <li><strong>Google Maps API</strong> para visualizar áreas de riesgo y rutas seguras.</li>
            <li><strong>Firebase</strong> para notificaciones en tiempo real y manejo de datos.</li>
            <li><strong>Git y GitHub</strong> para coordinar nuestro trabajo colaborativo y controlar versiones.</li>
          </ul>
          <p>
            Aplicamos metodologías ágiles, trabajando en ciclos iterativos de desarrollo, pruebas y mejoras,
            lo que nos permitió resolver problemas rápidamente y avanzar de manera eficiente hacia la solución final.
          </p>
          <p>
            El resultado: ¡una aplicación funcional y el primer lugar del certamen nuevamente! 🎉
            ¡Vamos por más!
          </p>

          <div class="gallery-preview">
            <h5>Galería de Fotos</h5>
            <div class="gallery-grid">
              <div class="gallery-item" role="button" tabindex="0" data-click="openGallery('codeday2024');currentSlide(1, 'codeday2024')">
                <img src="assets/img/events/codeday2024-1.webp" alt="Competencia CodeDay 2024">
                <div class="gallery-overlay">Ver más</div>
              </div>
              <div class="gallery-item" role="button" tabindex="0" data-click="openGallery('codeday2024');currentSlide(2, 'codeday2024')">
                <img src="assets/img/events/codeday2024-2.jpg" alt="Equipo en CodeDay 2024">
                <div class="gallery-overlay">Ver más</div>
              </div>
              <div class="gallery-item" role="button" tabindex="0" data-click="openGallery('codeday2024');currentSlide(3, 'codeday2024')">
                <img src="assets/img/events/codeday2024-3.webp" alt="Premiación CodeDay 2024">
                <div class="gallery-overlay">Ver más</div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Card del evento FEBITEC 2024 -->
      <div class="event-card">
        <div class="event-header">
          <h4><i class="fas fa-trophy"></i> FEBITEC 2024 - Mención Honrosa</h4>
          <div class="event-date">Octubre 2024</div>
        </div>

        <div class="event-content">
          <p>Participación en la Feria de Ciencia y Tecnología FEBITEC 2024 con el proyecto "Sistema Integrado de Solicitud, Análisis y Gestión de Servicios para la Intedencia de Rivera", obteniendo una Mención Honrosa entre más de 100 proyectos presentados.</p>

          <div class="event-details">
            <div class="event-detail">
              <i class="fas fa-users"></i>
              <span>Equipo: Juan Carlos de León Silva, Rafael Quintanilla, Gualberto Castro</span>
            </div>
            <div class="event-detail">
              <i class="fas fa-map-marker-alt"></i>
              <span>Santana do Livramento - Rivera</span>
            </div>
            <div class="event-detail">
              <i class="fas fa-university"></i>
              <span>Organizado por: UTEC, UTU e IFSUL</span>
            </div>
          </div>

          <div class="gallery-preview">
            <h5>Galería de Fotos</h5>
            <div class="gallery-grid">
              <div class="gallery-item" role="button" tabindex="0" data-click="openGallery('febitec');currentSlide(1, 'febitec')">
                <img src="assets/img/events/febi.webp" alt="Presentación en FEBITEC">
                <div class="gallery-overlay">Ver más</div>
              </div>
              <div class="gallery-item" role="button" tabindex="0" data-click="openGallery('febitec');currentSlide(2, 'febitec')">
                <img src="assets/img/events/febi1.webp" alt="Presentación en FEBITEC">
                <div class="gallery-overlay">Ver más</div>
              </div>
              <div class="gallery-item" role="button" tabindex="0" data-click="openGallery('febitec');currentSlide(3, 'febitec')">
                <img src="assets/img/events/febi2.webp" alt="Equipo en FEBITEC">
                <div class="gallery-overlay">Ver más</div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>
</div>

<!-- Modal para bootcamp -->
<div id="modal-bootcamp" class="education-modal" role="dialog" aria-modal="true" aria-labelledby="modal-bootcamp-title">
  <div class="education-modal__content">
    <button type="button" class="education-modal__close" data-click="closeEducationModal('modal-bootcamp')" aria-label="Cerrar ventana">&times;</button>

    <h2 class="education-modal__title" id="modal-bootcamp-title">Bootcamp de Desarrollo Web Full Stack</h2>
    <p class="education-modal__institution">Platzi | 2023 | 400 horas</p>

    <div class="education-modal__grid">
      <div class="education-modal__info">
        <h3>🎓 Cursos completados</h3>
        <ul class="education-modal__list">
          <li>Fundamentos de programación</li>
          <li>JavaScript moderno ES6+</li>
          <li>React.js y Next.js</li>
          <li>Node.js y Express</li>
          <li>Bases de datos con PostgreSQL</li>
        </ul>

        <h3>🚀 Habilidades adquiridas</h3>
        <ul class="education-modal__list">
          <li>Desarrollo de aplicaciones web completas</li>
          <li>Deploy en servicios cloud</li>
          <li>Versionado con Git/GitHub</li>
          <li>Metodologías ágiles (Scrum)</li>
        </ul>
      </div>

      <div class="education-modal__media">
        <img src="assets/img/certificados/diploma.webp" alt="Certificado de Bootcamp" class="education-modal__image">
        <p class="education-modal__caption">Certificación de finalización</p>
      </div>
    </div>
  </div>
</div>

<!-- Modal de Imagen -->
<div id="imageModal" class="img-modal" role="dialog" aria-modal="true" aria-label="Imagen ampliada">
  <button type="button" class="img-modal-close" data-click="closeImgModal()" aria-label="Cerrar imagen">&times;</button>
  <img class="img-modal-content" id="imgModalContent" alt="">
  <div id="imgModalCaption"></div>
</div>