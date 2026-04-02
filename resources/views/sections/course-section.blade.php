<section class="course-section">
    <div class="course-section__container">

        {{-- Sidebar --}}
        <aside class="sidebar">
            <ul class="sidebar__quick-links">
                <li><a href="#" class="sidebar__quick-link">Top 10 semanal</a></li>
                <li><a href="#" class="sidebar__quick-link">Más Populares</a></li>
                <li><a href="#" class="sidebar__quick-link">Mejores Valorados</a></li>
                <li><a href="#" class="sidebar__quick-link">Nuevos Lanzamientos</a></li>
                <li><a href="#" class="sidebar__quick-link">Ofertas Flash ⚡</a></li>
                <li><a href="#" class="sidebar__quick-link">Pre Lanzamiento ⏰</a></li>
            </ul>

            <div class="sidebar__divider"></div>

            <div class="sidebar__filters">
                <div class="sidebar__filters-header">
                    <span class="sidebar__filters-title">Filtros</span>
                    <button class="sidebar__clear" id="clear-filters">Borrar filtros</button>
                </div>

                {{-- Área Temática --}}
                <div class="sidebar__group" data-group="area">
                    <button class="sidebar__group-header">
                        <span>Área Temática</span>
                        <svg class="sidebar__chevron" width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>
                    <ul class="sidebar__options">
                        @foreach([
                            'Psicología Clínica y Salud Mental Infantil y Adolescente',
                            'Psicología Clínica y Salud Mental en la Adultez',
                            'Educación y Neurodesarrollo',
                            'Psicología Jurídica y Forense',
                            'Psicología Organizacional y del Trabajo',
                            'Neurociencias'
                        ] as $area)
                        <li class="sidebar__option">
                            <input type="checkbox" id="area-{{ Str::slug($area) }}"
                                   class="sidebar__checkbox filter-checkbox"
                                   data-category="{{ $area }}">
                            <label for="area-{{ Str::slug($area) }}" class="sidebar__label">{{ $area }}</label>
                        </li>
                        @endforeach
                    </ul>
                </div>

                {{-- Tipo de programa --}}
                <div class="sidebar__group" data-group="programa">
                    <button class="sidebar__group-header">
                        <span>Tipos de programa</span>
                        <svg class="sidebar__chevron" width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>
                    <ul class="sidebar__options">
                        @foreach(['Curso', 'Acreditación', 'Especialización', 'Sesiones Magistrales', 'Diplomados', 'Postítulos'] as $tipo)
                        <li class="sidebar__option">
                            <input type="checkbox" id="tipo-{{ Str::slug($tipo) }}"
                                   class="sidebar__checkbox"
                                   data-type="{{ $tipo }}">
                            <label for="tipo-{{ Str::slug($tipo) }}" class="sidebar__label">{{ $tipo }}</label>
                        </li>
                        @endforeach
                    </ul>
                </div>

                {{-- Modalidad --}}
                <div class="sidebar__group" data-group="modalidad">
                    <button class="sidebar__group-header">
                        <span>Modalidad</span>
                        <svg class="sidebar__chevron" width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>
                    <ul class="sidebar__options">
                        @foreach(['En Vivo', 'Online', 'Presencial', 'Mixta'] as $mod)
                        <li class="sidebar__option">
                            <input type="checkbox" id="mod-{{ Str::slug($mod) }}"
                                   class="sidebar__checkbox filter-modalidad"
                                   data-modalidad="{{ $mod }}">
                            <label for="mod-{{ Str::slug($mod) }}" class="sidebar__label">{{ $mod }}</label>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </aside>

        {{-- Contenido principal --}}
        <div class="course-section__main">

            {{-- Banner promo --}}
            <a href="#" class="promo-banner">
                <img src="https://adipa.cl/content/uploads/2026/03/black-sale-banner-cursos.webp"
                     alt="Black Sale 35% OFF" class="promo-banner__img">
            </a>

            {{-- Active filter chips --}}
            <div class="filter-chips" id="filter-chips"></div>

            {{-- Header grilla --}}
            <div class="course-grid__header">
                <p class="course-grid__title">Cursos que te permitirán potenciar tu carrera.</p>
                <div class="course-grid__sort">
                    <span class="course-grid__sort-label">Ordenar por</span>
                    <select class="course-grid__sort-select" id="sort-select">
                        <option value="default">Todos</option>
                        <option value="price-asc">Precio: menor a mayor</option>
                        <option value="price-desc">Precio: mayor a menor</option>
                    </select>
                </div>
            </div>

            {{-- Grilla de cursos --}}
            <div class="course-grid" id="course-grid">
                @foreach($courses as $course)
                    @include('partials.course-card', ['course' => $course])
                @endforeach
            </div>

            {{-- Empty state --}}
            <div class="course-grid__empty" id="empty-state" style="display:none">
                <span class="course-grid__empty-icon">🔍</span>
                <p>No hay cursos para los filtros seleccionados.</p>
                <small>Prueba quitando algunos filtros.</small>
            </div>

        </div>
    </div>
</section>