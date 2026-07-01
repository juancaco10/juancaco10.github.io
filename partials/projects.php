<?php
// ============================================
// DATOS DE PROYECTOS (estructurado para escalar)
// ============================================
$team = [
  ['photo' => 'assets/img/projects/juan.webp',     'name' => 'Juan Carlos de León Silva',  'alt' => 'Juan Carlos de León'],
  ['photo' => 'assets/img/projects/rafa.jpg',      'name' => 'Rafael Quintanilla Fontané', 'alt' => 'Rafael Quintanilla'],
  ['photo' => 'assets/img/projects/gualberto.png', 'name' => 'Gualberto Castro Casas',      'alt' => 'Gualberto Castro'],
];

// Un único array por proyecto: card + detalle + galería se generan desde aquí.
// Campos marcados "EDITAR" son inferidos: ajústalos con los datos reales.
$projects = [
  'ifsul1' => [
    'title'     => 'Sistema de Llaves IFSUL',
    'tagline'   => 'Gestión de llaves, reservas y salas académicas.',
    'cover'     => 'assets/img/projects/chaves/ifs.png',
    'year'      => '2024',                       // EDITAR
    'role'      => 'Desarrollador Full Stack',   // EDITAR
    'status'    => 'MVP',                         // EDITAR
    'platforms' => ['Web', 'Móvil'],
    'stack'     => ['Java', 'Android', 'MySQL', 'Git'],   // EDITAR (inferido)
    'overview'  => 'Este sistema fue desarrollado inicialmente para el IFSUL con el objetivo de modernizar y simplificar la gestión de llaves, reservas y salas académicas. A futuro, su alcance podría ampliarse para instituciones municipales y otras organizaciones que requieran un control seguro de sus espacios físicos.',
    'objective' => 'Centralizar y automatizar la gestión de llaves, reservas y usuarios en un único sistema, aumentando la seguridad y optimizando los recursos de las instituciones.',
    'features'  => [
      '🔐 <strong>Gestión de Llaves</strong>: registro de retiro, devolución y <strong>transferencia entre docentes</strong>.',
      '📅 <strong>Reservas y Salas</strong>: consulta de disponibilidad en tiempo real, solicitud y aprobación de reservas.',
      '👥 <strong>Gestión de Usuarios</strong>: perfiles personalizables, inicio de sesión seguro y control de accesos.',
      '📊 <strong>Reportes Inteligentes</strong>: estadísticas de uso, generación de reportes por periodo, filtros por usuario, sala y tipo de operación.',
    ],
    'audience'  => 'Actualmente diseñado para el IFSUL, pero adaptable a universidades, escuelas, municipalidades, instituciones técnicas, espacios corporativos y centros de entrenamiento.',
    'roadmap'   => ['Lanzamiento del MVP en el IFSUL', 'Validación con usuarios reales', 'Escalabilidad hacia municipalidades u otras instituciones'],
    'quote'     => 'Transformamos la forma en que las instituciones gestionan sus espacios. Porque la educación merece tecnología inteligente.',
    'team'      => true,
    'images'    => [
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
    'title'     => 'Sistema Integrado IDR',
    'tagline'   => 'Solicitudes, análisis y servicios de la Intendencia de Rivera.',
    'cover'     => 'assets/img/projects/idr/idr.webp',
    'year'      => '2024',                          // EDITAR
    'role'      => 'Desarrollador (trabajo en equipo)', // EDITAR
    'status'    => 'Prototipo',
    'platforms' => ['Web', 'App Ciudadanos', 'App Capataces'],
    'stack'     => ['Java', 'Android', 'REST API', 'MySQL'],  // EDITAR (inferido)
    'overview'  => 'Este prototipo fue desarrollado para la <strong>Intendencia de Rivera – Uruguay</strong> y está compuesto por tres módulos: una aplicación móvil para ciudadanos, una plataforma web administrativa y una aplicación móvil para capataces. El objetivo es <strong>optimizar la gestión de servicios públicos</strong>, aumentar la transparencia y mejorar la participación ciudadana en un contexto de transformación digital.',
    'objective' => 'Mejorar la eficiencia administrativa y reducir los tiempos de respuesta en los servicios municipales mediante la digitalización y centralización de las solicitudes.',
    'features'  => [
      '📌 Reporte de incidencias en infraestructura con geolocalización.',
      '📊 Análisis de datos para la toma de decisiones.',
      '🗂 Gestión de tareas para capataces con seguimiento en tiempo real.',
      '🔒 Transparencia y trazabilidad en las solicitudes.',
    ],
    'audience'  => 'Ciudadanos de Rivera, funcionarios administrativos, capataces y autoridades de la Intendencia.',
    'roadmap'   => ['Lanzamiento del prototipo', 'Validación con usuarios reales', 'Escalabilidad para otras municipalidades'],
    'quote'     => 'Un sistema diseñado para acercar la gestión pública a la ciudadanía, optimizando los servicios y fomentando la transparencia.',
    'team'      => true,
    'images'    => [
      ['src' => 'assets/img/projects/idr/idr.webp',  'alt' => 'Vista general del Sistema Integrado IDR',  'thumb' => 'Vista general del sistema'],
      ['src' => 'assets/img/projects/idr/idr1.png',  'alt' => 'Plataforma web administrativa del IDR',    'thumb' => 'Plataforma web administrativa'],
      ['src' => 'assets/img/projects/idr/idr2.png',  'alt' => 'App móvil para ciudadanos del IDR',        'thumb' => 'App móvil para ciudadanos'],
      ['src' => 'assets/img/projects/idr/idr3.webp', 'alt' => 'App móvil para capataces del IDR',         'thumb' => 'App móvil para capataces'],
      ['src' => 'assets/img/projects/idr/idr4.png',  'alt' => 'Pantalla de gestión de tareas del IDR',    'thumb' => 'Gestión de tareas'],
      ['src' => 'assets/img/projects/idr/5.webp',    'alt' => 'Pantalla de reportes del IDR',             'thumb' => 'Pantalla de reportes'],
      ['src' => 'assets/img/projects/idr/6.webp',    'alt' => 'Vista adicional del Sistema Integrado IDR','thumb' => 'Vista adicional del sistema'],
    ],
  ],
  'falta-menos' => [
    'title'     => 'Falta Menos — Álbum Tracker',
    'tagline'   => 'Gestiona tu álbum del Mundial y sigue tu progreso en tiempo real.',
    'cover'     => 'assets/img/projects/placeholder.jpg',
    'year'      => '2026',
    'role'      => 'Desarrollador / Creador',
    'status'    => 'Publicado (Google Play)',
    'platforms' => ['Android'],
    'stack'     => ['Android', 'Kotlin', 'Firebase'],
    'overview'  => 'Falta Menos — Álbum Tracker es la forma más fácil de gestionar tu álbum de figuritas del Mundial y seguir tu progreso en tiempo real. Olvídate del cuaderno con listas: lleva tu colección siempre contigo. Sabe al instante cuáles tienes, cuáles te faltan y visualiza tu avance de forma clara y organizada.<br><br>👉 <a href="https://play.google.com/store/apps/details?id=com.jcpapeleria.completeandswap&hl=es_UY" target="_blank" rel="noopener noreferrer" style="color: var(--color-primary); text-decoration: underline;">Ver en Google Play</a>',
    'objective' => 'Ofrecer a los coleccionistas una herramienta clara, rápida y gratuita para llevar el registro de sus figuritas del Mundial, proveyendo además el fixture del torneo.',
    'features'  => [
      '✅ <strong>Gestión de figuritas</strong>: Marca como "obtenida" o "repetida" con un solo toque.',
      '📊 <strong>Estadísticas</strong>: Consulta el progreso de tu álbum en tiempo real.',
      '🔍 <strong>Búsqueda instantánea</strong>: Filtra por país o número para encontrar figuritas rápido.',
      '📅 <strong>Fixture completo</strong>: Sigue los partidos del Mundial y resultados de los grupos sin salir de la app.',
      '🔐 <strong>Sincronización</strong>: Inicia sesión con Google para respaldar tu colección o úsala de forma anónima.',
      '🛡 <strong>Privacidad</strong>: Control total de tus datos, pudiendo eliminar tu cuenta en cualquier momento.',
    ],
    'audience'  => 'Para quienes coleccionan figuritas del Mundial y quieren completar su álbum de forma organizada. Ideal para fanáticos del fútbol, familias y amigos.',
    'roadmap'   => ['Lanzamiento oficial v1.0.0', 'Soporte para múltiples idiomas', 'Nuevas funciones basadas en el feedback'],
    'quote'     => 'Lleva tu colección siempre contigo. Dedica tu tiempo a coleccionar, no a buscar.',
    'team'      => false,
    'images'    => [
      ['src' => 'assets/img/projects/placeholder.jpg', 'alt' => 'Falta Menos - Pantalla principal', 'thumb' => 'Pantalla principal'],
      ['src' => 'assets/img/projects/placeholder.jpg', 'alt' => 'Falta Menos - Progreso del álbum', 'thumb' => 'Progreso del álbum'],
      ['src' => 'assets/img/projects/placeholder.jpg', 'alt' => 'Falta Menos - Fixture y partidos', 'thumb' => 'Fixture y partidos'],
    ],
  ],
  'web-project' => [
    'title'     => 'Nuevo Proyecto Web',
    'tagline'   => '(Ingresa aquí la descripción corta o eslogan)',
    'cover'     => 'assets/img/projects/placeholder.jpg',
    'year'      => '2026',
    'role'      => 'Desarrollador Web',
    'status'    => 'En desarrollo',
    'platforms' => ['Web', 'Mobile'],
    'stack'     => ['HTML', 'CSS', 'JavaScript'],
    'overview'  => '(Agrega aquí la descripción detallada de tu página web. ¿Qué problema resuelve y cómo funciona? Aquí puedes escribir todo el texto que desees sobre el proyecto.)',
    'objective' => '(Define aquí el objetivo principal del proyecto web)',
    'features'  => [
      '✨ <strong>Característica 1</strong>: (Descripción de la característica)',
      '⚡ <strong>Característica 2</strong>: (Descripción de la característica)',
      '🌐 <strong>Característica 3</strong>: (Descripción de la característica)',
    ],
    'audience'  => '(Describe a quién está orientada esta página web)',
    'roadmap'   => ['Fase de diseño', 'Desarrollo Frontend', 'Lanzamiento oficial'],
    'quote'     => 'El diseño web no se trata solo de crear algo bonito, sino de construir experiencias memorables.',
    'team'      => false,
    'images'    => [
      ['src' => 'assets/img/projects/placeholder.jpg', 'alt' => 'Captura web 1', 'thumb' => 'Vista principal'],
      ['src' => 'assets/img/projects/placeholder.jpg', 'alt' => 'Captura web 2', 'thumb' => 'Vista secundaria'],
    ],
  ],
];
?>
<section id="projects" class="projects o-section">
  <div class="o-container">
    <h2 class="projects__title">Proyectos</h2>

    <!-- Cards de preview (2 columnas) -->
    <div class="o-grid o-grid--2col projects__grid">
      <?php foreach ($projects as $id => $p): ?>
      <article class="project-card o-glass">
        <button type="button" class="project-card__media" data-click="openModal('<?php echo e($id); ?>')" aria-label="Ver detalles de <?php echo e($p['title']); ?>">
          <img class="project-card__cover" src="<?php echo e($p['cover']); ?>" alt="Portada de <?php echo e($p['title']); ?>" loading="lazy" decoding="async" width="600" height="375">
          <span class="project-card__year"><?php echo e($p['year']); ?></span>
        </button>
        <div class="project-card__body">
          <h3 class="project-card__title"><?php echo e($p['title']); ?></h3>
          <p class="project-card__tagline"><?php echo e($p['tagline']); ?></p>
          <ul class="project-card__chips">
            <?php foreach (array_slice($p['stack'], 0, 4) as $tech): ?>
            <li class="chip"><?php echo e($tech); ?></li>
            <?php endforeach; ?>
          </ul>
          <button class="btn btn--primary btn--block" data-click="openModal('<?php echo e($id); ?>')">Ver detalles</button>
        </div>
      </article>
      <?php endforeach; ?>
    </div>

    <!-- Modales de detalle (uno por proyecto) -->
    <?php foreach ($projects as $id => $p): ?>
    <div id="modal-<?php echo e($id); ?>" class="modal modal--large" role="dialog" aria-modal="true" aria-labelledby="modal-<?php echo e($id); ?>-title" hidden>
      <div class="modal__content project-detail">
        <div class="modal__header">
          <h2 class="modal__title" id="modal-<?php echo e($id); ?>-title"><?php echo e($p['title']); ?></h2>
          <button type="button" class="modal__close" data-click="closeModal('<?php echo e($id); ?>')" aria-label="Cerrar ventana">&times;</button>
        </div>

        <div class="modal__body">
          <header class="project-detail__header">
          <p class="project-detail__tagline"><?php echo e($p['tagline']); ?></p>
          <ul class="project-detail__meta">
            <li>📅 <?php echo e($p['year']); ?></li>
            <li>👤 <?php echo e($p['role']); ?></li>
            <li>🏷 <?php echo e($p['status']); ?></li>
            <li>🖥 <?php echo e(implode(' · ', $p['platforms'])); ?></li>
          </ul>
        </header>

        <!-- Capturas (miniaturas -> galería fullscreen) -->
        <section class="project-detail__photos">
          <h3 class="modal__subtitle">📸 Capturas</h3>
          <div class="project-detail__thumbs">
            <?php foreach ($p['images'] as $i => $img): ?>
            <button type="button" class="project-detail__thumb" data-click="openGallery('<?php echo e($id); ?>');currentSlide(<?php echo $i + 1; ?>, '<?php echo e($id); ?>')" aria-label="Ampliar: <?php echo e($img['thumb']); ?>">
              <img src="<?php echo e($img['src']); ?>" alt="<?php echo e($img['thumb']); ?>" loading="lazy" decoding="async">
            </button>
            <?php endforeach; ?>
          </div>
        </section>

        <!-- Descripción + funcionalidades -->
        <section class="project-detail__section">
          <p class="modal__text"><?php echo $p['overview']; ?></p>
          <h3 class="modal__subtitle">🎯 Objetivo</h3>
          <p class="modal__text"><?php echo e($p['objective']); ?></p>
          <h3 class="modal__subtitle">🔑 Funcionalidades</h3>
          <ul class="modal__list">
            <?php foreach ($p['features'] as $feature): ?>
            <li><?php echo $feature; ?></li>
            <?php endforeach; ?>
          </ul>
        </section>

        <!-- Detalles técnicos -->
        <section class="project-detail__tech">
          <h3 class="modal__subtitle">🧩 Detalles técnicos</h3>
          <dl class="spec">
            <div class="spec__row"><dt>Rol</dt><dd><?php echo e($p['role']); ?></dd></div>
            <div class="spec__row"><dt>Plataformas</dt><dd><?php echo e(implode(', ', $p['platforms'])); ?></dd></div>
            <div class="spec__row"><dt>Estado</dt><dd><?php echo e($p['status']); ?></dd></div>
            <div class="spec__row"><dt>Año</dt><dd><?php echo e($p['year']); ?></dd></div>
          </dl>
          <ul class="project-detail__chips">
            <?php foreach ($p['stack'] as $tech): ?>
            <li class="chip"><?php echo e($tech); ?></li>
            <?php endforeach; ?>
          </ul>
        </section>

        <!-- ¿Para quién? -->
        <section class="project-detail__section">
          <h3 class="modal__subtitle">👥 ¿Para quién?</h3>
          <p class="modal__text"><?php echo e($p['audience']); ?></p>
        </section>

        <!-- Roadmap -->
        <section class="project-detail__section">
          <h3 class="modal__subtitle">🚀 Roadmap</h3>
          <ul class="modal__list">
            <?php foreach ($p['roadmap'] as $step): ?>
            <li><?php echo e($step); ?></li>
            <?php endforeach; ?>
          </ul>
        </section>

        <blockquote class="modal__quote"><?php echo e($p['quote']); ?></blockquote>

        <?php if (!empty($p['team'])): ?>
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
        <?php endif; ?>
        </div>
      </div>
    </div>
    <?php endforeach; ?>

    <!-- Galerías fullscreen (generadas desde $projects) -->
    <?php foreach ($projects as $id => $p): ?>
    <div id="gallery-<?php echo e($id); ?>" class="gallery-modal" role="dialog" aria-modal="true" aria-label="Galería de imágenes: <?php echo e($p['title']); ?>">
      <button type="button" class="gallery-modal__close" data-click="closeGallery('<?php echo e($id); ?>')" aria-label="Cerrar galería">&times;</button>
      <div class="gallery-modal__content">
        <div class="slideshow-container">
          <?php foreach ($p['images'] as $i => $img): ?>
          <div class="mySlides<?php echo $i === 0 ? ' active' : ''; ?>">
            <img src="<?php echo e($img['src']); ?>" alt="<?php echo e($img['alt']); ?>" loading="lazy" decoding="async">
          </div>
          <?php endforeach; ?>

          <button type="button" class="prev" data-click="plusSlides(-1, '<?php echo e($id); ?>')" aria-label="Imagen anterior">&#10094;</button>
          <button type="button" class="next" data-click="plusSlides(1, '<?php echo e($id); ?>')" aria-label="Imagen siguiente">&#10095;</button>

          <div class="caption-container">
            <p id="caption-<?php echo e($id); ?>"></p>
          </div>
        </div>

        <div class="thumbnail-row">
          <?php foreach ($p['images'] as $i => $img): ?>
          <img class="thumbnail<?php echo $i === 0 ? ' active' : ''; ?>" src="<?php echo e($img['src']); ?>" data-click="currentSlide(<?php echo $i + 1; ?>, '<?php echo e($id); ?>')" alt="<?php echo e($img['thumb']); ?>">
          <?php endforeach; ?>
        </div>
      </div>
    </div>
    <?php endforeach; ?>

  </div>
</section>
