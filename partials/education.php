<?php
// ============================================
// Helper: iconos SVG (Lucide)
// ============================================
if (!function_exists('proj_icon')) {
  function proj_icon(string $name): string {
    $paths = [
      'target'   => '<circle cx="12" cy="12" r="10"/><circle cx="12" cy="12" r="6"/><circle cx="12" cy="12" r="2"/>',
      'key'      => '<path d="m15.5 7.5 2.3 2.3a1 1 0 0 0 1.4 0l2.1-2.1a1 1 0 0 0 0-1.4L19 4"/><path d="m21 2-9.6 9.6"/><circle cx="7.5" cy="15.5" r="5.5"/>',
      'users'    => '<path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/>',
      'rocket'   => '<path d="M4.5 16.5c-1.5 1.26-2 5-2 5s3.74-.5 5-2c.71-.84.7-2.13-.09-2.91a2.18 2.18 0 0 0-2.91-.09z"/><path d="m12 15-3-3a22 22 0 0 1 2-3.95A12.88 12.88 0 0 1 22 2c0 2.72-.78 7.5-6 11a22.35 22.35 0 0 1-4 2z"/><path d="M9 12H4s.55-3.03 2-4c1.62-1.08 5 0 5 0"/><path d="M12 15v5s3.03-.55 4-2c1.08-1.62 0-5 0-5"/>',
      'cpu'      => '<rect width="16" height="16" x="4" y="4" rx="2"/><rect width="6" height="6" x="9" y="9" rx="1"/><path d="M15 2v2"/><path d="M15 20v2"/><path d="M2 15h2"/><path d="M2 9h2"/><path d="M20 15h2"/><path d="M20 9h2"/><path d="M9 2v2"/><path d="M9 20v2"/>',
      'image'    => '<rect width="18" height="18" x="3" y="3" rx="2" ry="2"/><circle cx="9" cy="9" r="2"/><path d="m21 15-3.086-3.086a2 2 0 0 0-2.828 0L6 21"/>',
      'check'    => '<path d="M20 6 9 17l-5-5"/>',
      'calendar' => '<rect width="18" height="18" x="3" y="4" rx="2"/><path d="M3 10h18"/><path d="M8 2v4"/><path d="M16 2v4"/>',
      'user'     => '<circle cx="12" cy="8" r="5"/><path d="M20 21a8 8 0 0 0-16 0"/>',
      'tag'      => '<path d="M12.586 2.586A2 2 0 0 0 11.172 2H4a2 2 0 0 0-2 2v7.172a2 2 0 0 0 .586 1.414l8.704 8.704a2.426 2.426 0 0 0 3.42 0l6.58-6.58a2.426 2.426 0 0 0 0-3.42z"/><circle cx="7.5" cy="7.5" r=".5" fill="currentColor"/>',
      'monitor'  => '<rect width="20" height="14" x="2" y="3" rx="2"/><path d="M8 21h8"/><path d="M12 17v4"/>',
      'laptop'   => '<rect width="20" height="14" x="2" y="3" rx="2"/><path d="M8 21h8"/><path d="M12 17v4"/>',
      'award'    => '<circle cx="12" cy="8" r="6"/><path d="M15.477 12.89 17 22l-5-3-5 3 1.523-9.11"/>',
      'map-pin'  => '<path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/><circle cx="12" cy="10" r="3"/>',
      'building' => '<rect width="16" height="20" x="4" y="2" rx="2" ry="2"/><path d="M9 22v-4h6v4"/><path d="M8 6h.01"/><path d="M16 6h.01"/><path d="M12 6h.01"/><path d="M12 10h.01"/><path d="M12 14h.01"/><path d="M16 10h.01"/><path d="M16 14h.01"/><path d="M8 10h.01"/><path d="M8 14h.01"/>',
      'graduation' => '<path d="M22 10v6M2 10l10-5 10 5-10 5z"/><path d="M6 12v5c3 3 9 3 12 0v-5"/>',
      'tools'    => '<path d="m15 13-4-4M18.9 14.2l-2.4-2.4a2 2 0 0 1 0-2.8l1.4-1.4a2 2 0 0 0 0-2.8L16.2 3.1a2 2 0 0 0-2.8 0l-1.4 1.4a2 2 0 0 1-2.8 0L6.8 2.1a2 2 0 0 0-2.8 0l-1.7 1.7a2 2 0 0 0 0 2.8l1.4 1.4a2 2 0 0 1 0 2.8L1.3 13.2a2 2 0 0 0 0 2.8l1.7 1.7a2 2 0 0 0 2.8 0l2.4-2.4"/><path d="m5 17 4-4"/>',
      'info'     => '<circle cx="12" cy="12" r="10"/><path d="M12 16v-4"/><path d="M12 8h.01"/>',
      'clock'    => '<circle cx="12" cy="12" r="10"/><path d="M12 6v6l4 2"/>',
      'chalkboard' => '<rect width="18" height="14" x="3" y="3" rx="2"/><path d="M3 21h18"/><path d="M12 21v-4"/><path d="m8 21 4-4 4 4"/>'
    ];
    $p = $paths[$name] ?? '';
    return '<svg class="icon" viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">' . $p . '</svg>';
  }
}

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

$events = [
  'codeday2023' => [
    'title' => 'CodeDay 2023',
    'date' => 'Septiembre 2023',
    'icon' => 'laptop',
    'content' => '
          <p>
            Los días 12 o 13 de septiembre se celebra el Día del Programador,
            una fecha que honra a quienes, con código y creatividad, crean soluciones tecnológicas.
            Se elige el 256º día del año (13 de septiembre o 12 en años bisiestos)
            porque 256 es el mayor número que puede representarse con 8 bits.
          </p>
          <p>
            En 2023, el Instituto organizó una competición de programación con desafíos entre todos los estudiantes
            del primer al sexto semestre. Cada equipo debía elegir un problema presentado mediante diagramas UML
            y desarrollar una solución que sería evaluada por los jurados.
          </p>
          <p>
            Mi equipo y yo logramos el primer lugar con nuestro sistema de gestión de llaves.
            Desarrollamos la solución en Java utilizando Eclipse, gestionamos el código con Git y GitHub,
            y todo el proyecto se completó en un intenso plazo de solo 24 horas,
            demostrando nuestra capacidad de trabajo en equipo, organización y creatividad.
          </p>',
    'gallery' => [
      ['src' => 'assets/img/events/codeday2023-1.webp', 'alt' => 'Competencia CodeDay 2023'],
      ['src' => 'assets/img/events/codeday2023-2.webp', 'alt' => 'Equipo en CodeDay 2023'],
      ['src' => 'assets/img/events/codeday2023-3.webp', 'alt' => 'Premiación CodeDay 2023']
    ]
  ],
  'codeday2024' => [
    'title' => 'CodeDay 2024',
    'date' => 'Septiembre 2024',
    'icon' => 'laptop',
    'content' => '
          <p>
            <strong>Code Day 2024:</strong> Un nuevo desafío
          </p>
          <p>
            En 2024, celebramos nuevamente el Día del Programador con una nueva edición de <strong>Code Day</strong>.
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
            El resultado: ¡una aplicación funcional y el primer lugar del certamen nuevamente!
          </p>',
    'gallery' => [
      ['src' => 'assets/img/events/codeday2024-1.webp', 'alt' => 'Competencia CodeDay 2024'],
      ['src' => 'assets/img/events/codeday2024-2.jpg', 'alt' => 'Equipo en CodeDay 2024'],
      ['src' => 'assets/img/events/codeday2024-3.webp', 'alt' => 'Premiación CodeDay 2024']
    ]
  ],
  'febitec' => [
    'title' => 'FEBITEC 2024 - Mención Honrosa',
    'date' => 'Octubre 2024',
    'icon' => 'award',
    'content' => '
          <p>Participación en la Feria de Ciencia y Tecnología FEBITEC 2024 con el proyecto "Sistema Integrado de Solicitud, Análisis y Gestión de Servicios para la Intendencia de Rivera", obteniendo una Mención Honrosa entre más de 100 proyectos presentados.</p>
          <div class="event-details">
            <div class="event-detail">
              ' . proj_icon('users') . '
              <span>Equipo: Juan Carlos de León Silva, Rafael Quintanilla, Gualberto Castro</span>
            </div>
            <div class="event-detail">
              ' . proj_icon('map-pin') . '
              <span>Santana do Livramento - Rivera</span>
            </div>
            <div class="event-detail">
              ' . proj_icon('building') . '
              <span>Organizado por: UTEC, UTU e IFSUL</span>
            </div>
          </div>',
    'gallery' => [
      ['src' => 'assets/img/events/febi.webp', 'alt' => 'Presentación en FEBITEC'],
      ['src' => 'assets/img/events/febi1.webp', 'alt' => 'Presentación en FEBITEC'],
      ['src' => 'assets/img/events/febi2.webp', 'alt' => 'Equipo en FEBITEC']
    ]
  ]
];

?>
<section id="education" class="education o-section">
  <div class="o-container">
    <h2 class="education__title">Educación y Formación</h2>

    <div class="o-grid o-grid--auto education__grid">
      <div class="education__card o-glass" data-reveal data-modal="modal-degree">
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
<div id="modal-degree" class="modal modal--large" role="dialog" aria-modal="true" aria-labelledby="modal-degree-title">
  <div class="modal__content">
    <button type="button" class="modal__close" data-click="closeEducationModal('modal-degree')" aria-label="Cerrar ventana">&times;</button>

    <div class="modal__header">
      <h2 class="modal__title" id="modal-degree-title">Tecnólogo en Análisis y Desarrollo de Sistemas</h2>
      <p class="education-modal__institution">IFSUL - UTEC | 2022 - 2024 | 2165 horas</p>
      <p class="education-modal__description">Formación como ciudadano crítico y solidario, con formación técnica y tecnológica para actuar tanto en Brasil como en Uruguay en situaciones que impliquen planificación, análisis, desarrollo, testeo, implementación, manutención, evaluación y utilización de tecnologías emergentes.</p>
    </div>

    <div class="education-modal__grid">
      <div class="education-modal__info">
        <div class="education-modal__section">
          <h3><?php echo proj_icon("graduation"); ?><span>Plan de Estudios</span></h3>
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
          <h3><?php echo proj_icon("tools"); ?><span>Tecnologías</span></h3>
          <div class="education-modal__tech">
            <?php foreach ($degree_techs as $tech): ?>
            <span class="tech-badge"><?php echo e($tech); ?></span>
            <?php endforeach; ?>
          </div>
        </div>

      </div>

      <div class="education-modal__media">
        <div class="modal-card">
          <h4><?php echo proj_icon('info'); ?> Detalles de la Carrera</h4>
          <div class="card-detail">
            <?php echo proj_icon('clock'); ?>
            <div>
              <strong>Duración:</strong>
              <p>6 semestres (3 años)</p>
            </div>
          </div>
          <div class="card-detail">
            <?php echo proj_icon('chalkboard'); ?>
            <div>
              <strong>Modalidad:</strong>
              <p>Presencial</p>
            </div>
          </div>
          <div class="card-detail">
            <?php echo proj_icon('calendar'); ?>
            <div>
              <strong>Horario:</strong>
              <p>Lunes a viernes, 19:00 - 23:00</p>
            </div>
          </div>
          <div class="card-detail">
            <?php echo proj_icon('map-pin'); ?>
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
          <h4><?php echo proj_icon('info'); ?> Enfoque Educativo</h4>
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
      <h3 class="modal__subtitle"><?php echo proj_icon("award"); ?><span>Reconocimientos y Eventos</span></h3>

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

      
      <?php foreach ($events as $id => $event): ?>
      <div class="event-card" data-reveal>
        <div class="event-header">
          <h4><?php echo proj_icon($event['icon']); ?> <span><?php echo e($event['title']); ?></span></h4>
          <div class="event-date"><?php echo e($event['date']); ?></div>
        </div>

        <div class="event-content">
          <?php echo $event['content']; ?>

          <div class="gallery-preview">
            <h5>Galería de Fotos</h5>
            <div class="gallery-grid">
              <?php foreach ($event['gallery'] as $i => $img): ?>
              <div class="gallery-item" role="button" tabindex="0" data-click="openGallery('<?php echo e($id); ?>');currentSlide(<?php echo $i + 1; ?>, '<?php echo e($id); ?>')">
                <img src="<?php echo e($img['src']); ?>" alt="<?php echo e($img['alt']); ?>">
                <div class="gallery-overlay">Ver más</div>
              </div>
              <?php endforeach; ?>
            </div>
          </div>
        </div>
      </div>
      <?php endforeach; ?>

    </div>
  </div>
</div>

<!-- Modal para bootcamp -->
<div id="modal-bootcamp" class="modal modal--large" role="dialog" aria-modal="true" aria-labelledby="modal-bootcamp-title">
  <div class="modal__content">
    <button type="button" class="modal__close" data-click="closeEducationModal('modal-bootcamp')" aria-label="Cerrar ventana">&times;</button>

    <h2 class="modal__title" id="modal-bootcamp-title">Bootcamp de Desarrollo Web Full Stack</h2>
    <p class="education-modal__institution">Platzi | 2023 | 400 horas</p>

    <div class="education-modal__grid">
      <div class="education-modal__info">
        <h3><?php echo proj_icon('check'); ?> Cursos completados</h3>
        <ul class="education-modal__list">
          <li>Fundamentos de programación</li>
          <li>JavaScript moderno ES6+</li>
          <li>React.js y Next.js</li>
          <li>Node.js y Express</li>
          <li>Bases de datos con PostgreSQL</li>
        </ul>

        <h3><?php echo proj_icon('rocket'); ?> Habilidades adquiridas</h3>
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