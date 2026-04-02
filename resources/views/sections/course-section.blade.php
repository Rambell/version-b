<section class="course-section">

    {{-- Overlay mobile --}}
    <div class="sidebar-overlay" id="sidebar-overlay"></div>

    {{-- Drawer mobile --}}
    <div class="sidebar-drawer" id="sidebar-drawer">
        <div class="sidebar-drawer__header">
            <span class="sidebar-drawer__title">Filtros</span>
            <button class="sidebar-drawer__close" id="sidebar-close">
                <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>
        @include('partials.sidebar-content')
        <div class="sidebar-drawer__footer">
            <button class="sidebar-drawer__apply-btn" id="sidebar-apply">Ver resultados</button>
        </div>
    </div>

    <div class="course-section__container">

        {{-- Sidebar desktop --}}
        <aside class="sidebar">
            @include('partials.sidebar-content')
        </aside>

        {{-- Contenido principal --}}
        <div class="course-section__main">

            {{-- Banner promo --}}
            <a href="#" class="promo-banner">
                <img src="https://adipa.cl/content/uploads/2026/04/banner1-1.webp"
                     alt="Black Sale 35% OFF" class="promo-banner__img">
            </a>

            {{-- Active filter chips --}}
            <div class="filter-chips" id="filter-chips"></div>

            {{-- Header grilla --}}
            <div class="course-grid__header">
                <p class="course-grid__title">Cursos que te permitirán potenciar tu carrera.</p>
                <div class="course-grid__sort">
                    <button class="filters-mobile-btn" id="filters-mobile-btn">
                        <svg width="15" height="15" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4h18M7 12h10M11 20h2"/>
                        </svg>
                        FILTROS
                        <span class="filters-mobile-btn__count" id="filters-count" style="display:none">0</span>
                    </button>
                    <span class="course-grid__sort-label">Ordenar por</span>
                    <select class="course-grid__sort-select" id="sort-select">
                        <option value="default">Todos</option>
                        <option value="popular">Más Populares</option>
                        <option value="rating">Mejor Valorados</option>
                        <option value="nuevo">Nuevos Lanzamientos</option>
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