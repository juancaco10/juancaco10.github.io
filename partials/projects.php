<?php
// ============================================
// DATOS DE PROYECTOS (estructurado para escalar)
// ============================================
$team = [
  ['photo' => 'assets/img/projects/juan.webp',     'name' => 'Juan Carlos de León Silva',  'alt' => 'Juan Carlos de León'],
  ['photo' => 'assets/img/projects/rafa.jpg',      'name' => 'Rafael Quintanilla Fontané', 'alt' => 'Rafael Quintanilla'],
  ['photo' => 'assets/img/projects/gualberto.png', 'name' => 'Gualberto Castro Casas',      'alt' => 'Gualberto Castro'],
];

// Galerías: el orden del array define el orden de slides y miniaturas.
// Los índices de navegación se generan solos (sin desajustes manuales).
$galleries = [
  'ifsul1' => [
    'label'  => 'Sistema de Llaves IFSUL',
    'images' => [
      ['src' => 'assets/img/projects/chaves/ifs.png',       'alt' => 'Interfaz principal del Sistema de Llaves IFSUL',          'thumb' => 'Interfaz principal del sistema'],
      ['src' => 'assets/img/projects/chaves/dashboard.png', 'alt' => 'Dashboard del Sistema de Llaves IFSUL',                  'thumb' => 'Dashboard del sistema'],
      ['src' => 'assets/img/projects/chaves/login.webp',    'alt' => 'Página de inicio de sesión del Sistema de Llaves IFSUL', 'thumb' => 'Página de login'],
      ['src' => 'assets/img/projects/chaves/salas.webp',    'alt' => 'Pantalla de gestión de salas',                           'thumb' => 'Gestión de salas'],
      ['src' => 'assets/img/projects/chaves/usuarios.png',  'alt' => 'Pantalla de gestión de usuarios',                        'thumb' => 'Gestión de usuarios'],
      ['src' => 'assets/img/projects/chaves/chaves.png',    'alt' => 'Pantalla de control de llaves',                          'thumb' => 'Control de llaves'],
      ['src' => 'assets/img/projects/chaves/7.webp',        'alt' => 'Vista adicional del Sistema de Llaves IFSUL',            'thumb' => 'Vista adicional del sistema'],
      ['src' => 'assets/img/projects/chaves/8.webp',        'alt' => 'Vista de reportes del Sistema de Llaves IFSUL',          'thumb' => 'Vista de reportes del sistema'],
    ],
  ],
  'idr' => [
    'label'  => 'Sistema Integrado IDR',
    'images' => [
      ['src' => 'assets/img/projects/idr/idr.webp',  'alt' => 'Vista general del Sistema Integrado IDR',  'thumb' => 'Vista general del sistema'],
      ['src' => 'assets/img/projects/idr/idr1.png',  'alt' => 'Plataforma web administrativa del IDR',    'thumb' => 'Plataforma web administrativa'],
      ['src' => 'assets/img/projects/idr/idr2.png',  'alt' => 'App móvil para ciudadanos del IDR',        'thumb' => 'App móvil para ciudadanos'],
      ['src' => 'assets/img/projects/idr/idr3.webp', 'alt' => 'App móvil para capataces del IDR',         'thumb' => 'App móvil para capataces'],
      ['src' => 'assets/img/projects/idr/idr4.png',  'alt' => 'Pantalla de gestión de tareas del IDR',    'thumb' => 'Gestión de tareas'],
      ['src' => 'assets/img/projects/idr/5.webp',    'alt' => 'Pantalla de reportes del IDR',             'thumb' => 'Pantalla de reportes'],
      ['src' => 'assets/img/projects/idr/6.webp',    'alt' => 'Vista adicional del Sistema Integrado IDR','thumb' => 'Vista adicional del sistema'],
    ],
  ],
];
?>
<section id="projects" class="projects o-section">
  <div class="o-container">
    <h2 class="projects__title">Proyectos</h2>
    <div class="o-grid o-grid--auto projects__grid">

      <!-- Project Card ifsul1 -->
      <div class="project__card o-glass">
        <h3 class="project__title">Sistema de Llaves IFSUL</h3>
        <p class="project__description">Plataforma para gestión de llaves, reservas y salas académicas.</p>

        <div class="project__image-container" data-click="openGallery('ifsul1')" role="button" tabindex="0" aria-label="Ver galería de imágenes del proyecto">
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

        <button class="btn btn--primary btn--block" data-click="openModal('ifsul1')">Ver más</button>
      </div>

      <!-- Modal de información del proyecto ifsul1 -->
      <div id="modal-ifsul1" class="modal" role="dialog" aria-modal="true" aria-labelledby="modal-ifsul1-title" hidden>
        <div class="modal__content">
          <button type="button" class="modal__close" data-click="closeModal('ifsul1')" aria-label="Cerrar ventana">&times;</button>
          <h2 class="modal__title" id="modal-ifsul1-title">Sistema de Llaves IFSUL</h2>
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
              <?php foreach ($team as $member): ?>
              <div class="team-member">
                <img src="<?php echo e($member['photo']); ?>" alt="<?php echo e($member['alt']); ?>" class="team-photo">
                <p class="team-name"><?php echo e($member['name']); ?></p>
              </div>
              <?php endforeach; ?>
            </div>
          </div>
        </div>
      </div>

      <!-- Project Card IDR -->
      <div class="project__card o-glass">
        <h3 class="project__title">Sistema Integrado IDR (Prototipo)</h3>
        <p class="project__description">Plataforma para la gestión de solicitudes, análisis y servicios de la Intendencia de Rivera.</p>

        <div class="project__image-container" data-click="openGallery('idr')">
          <img src="assets/img/projects/idr/idr.webp" alt="Sistema IDR" style="width:100%">
          <div class="project__image-overlay">
            <div class="project__zoom-icon">
              <span class="zoom-text">Ver imágenes</span>
            </div>
          </div>
        </div>

        <button class="btn btn--primary btn--block" data-click="openModal('idr')">Ver más</button>
      </div>

      <!-- Modal de información del proyecto IDR -->
      <div id="modal-idr" class="modal" role="dialog" aria-modal="true" aria-labelledby="modal-idr-title" hidden>
        <div class="modal__content">
          <button type="button" class="modal__close" data-click="closeModal('idr')" aria-label="Cerrar ventana">&times;</button>
          <h2 class="modal__title" id="modal-idr-title">Sistema Integrado de Solicitud, Análisis y Gestión de Servicios (Prototipo)</h2>
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
              <?php foreach ($team as $member): ?>
              <div class="team-member">
                <img src="<?php echo e($member['photo']); ?>" alt="<?php echo e($member['alt']); ?>" class="team-photo">
                <p class="team-name"><?php echo e($member['name']); ?></p>
              </div>
              <?php endforeach; ?>
            </div>
          </div>
        </div>
      </div>

      <!-- Galerías de imágenes (generadas desde $galleries) -->
      <?php foreach ($galleries as $gid => $g): ?>
      <div id="gallery-<?php echo e($gid); ?>" class="gallery-modal" role="dialog" aria-modal="true" aria-label="Galería de imágenes: <?php echo e($g['label']); ?>">
        <button type="button" class="gallery-modal__close" data-click="closeGallery('<?php echo e($gid); ?>')" aria-label="Cerrar galería">&times;</button>
        <div class="gallery-modal__content">
          <div class="slideshow-container">
            <?php foreach ($g['images'] as $i => $img): ?>
            <div class="mySlides<?php echo $i === 0 ? ' active' : ''; ?>">
              <img src="<?php echo e($img['src']); ?>" alt="<?php echo e($img['alt']); ?>" loading="lazy" decoding="async">
            </div>
            <?php endforeach; ?>

            <button type="button" class="prev" data-click="plusSlides(-1, '<?php echo e($gid); ?>')" aria-label="Imagen anterior">&#10094;</button>
            <button type="button" class="next" data-click="plusSlides(1, '<?php echo e($gid); ?>')" aria-label="Imagen siguiente">&#10095;</button>

            <div class="caption-container">
              <p id="caption-<?php echo e($gid); ?>"></p>
            </div>
          </div>

          <div class="thumbnail-row">
            <?php foreach ($g['images'] as $i => $img): ?>
            <img class="thumbnail<?php echo $i === 0 ? ' active' : ''; ?>" src="<?php echo e($img['src']); ?>" data-click="currentSlide(<?php echo $i + 1; ?>, '<?php echo e($gid); ?>')" alt="<?php echo e($img['thumb']); ?>">
            <?php endforeach; ?>
          </div>
        </div>
      </div>
      <?php endforeach; ?>

    </div>
  </div>
</section>