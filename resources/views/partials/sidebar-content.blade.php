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

    <div class="sidebar__group" data-group="area">
        <button class="sidebar__group-header">
            <span>Área Temática</span>
            <svg class="sidebar__chevron" width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
            </svg>
        </button>
        <ul class="sidebar__options">
            @foreach(['Psicología Clínica y Salud Mental Infantil y Adolescente','Psicología Clínica y Salud Mental en la Adultez','Educación y Neurodesarrollo','Psicología Jurídica y Forense','Psicología Organizacional y del Trabajo','Neurociencias'] as $area)
            <li class="sidebar__option">
                <input type="checkbox" id="area-{{ Str::slug($area) }}" class="sidebar__checkbox filter-checkbox" data-category="{{ $area }}">
                <label for="area-{{ Str::slug($area) }}" class="sidebar__label">{{ $area }}</label>
            </li>
            @endforeach
        </ul>
    </div>

    <div class="sidebar__group" data-group="programa">
        <button class="sidebar__group-header">
            <span>Tipos de programa</span>
            <svg class="sidebar__chevron" width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
            </svg>
        </button>
        <ul class="sidebar__options">
            @foreach(['Curso','Acreditación','Especialización','Sesiones Magistrales','Diplomados','Postítulos'] as $tipo)
            <li class="sidebar__option">
                <input type="checkbox" id="tipo-{{ Str::slug($tipo) }}" class="sidebar__checkbox filter-tipo" data-type="{{ $tipo }}">
                <label for="tipo-{{ Str::slug($tipo) }}" class="sidebar__label">{{ $tipo }}</label>
            </li>
            @endforeach
        </ul>
    </div>

    <div class="sidebar__group" data-group="modalidad">
        <button class="sidebar__group-header">
            <span>Modalidad</span>
            <svg class="sidebar__chevron" width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
            </svg>
        </button>
        <ul class="sidebar__options">
            @foreach(['En Vivo','Online','Presencial','Mixta'] as $mod)
            <li class="sidebar__option">
                <input type="checkbox" id="mod-{{ Str::slug($mod) }}" class="sidebar__checkbox filter-modalidad" data-modalidad="{{ $mod }}">
                <label for="mod-{{ Str::slug($mod) }}" class="sidebar__label">{{ $mod }}</label>
            </li>
            @endforeach
        </ul>
    </div>

    <div class="sidebar__group" data-group="tags">
        <button class="sidebar__group-header">
            <span>Categoría</span>
            <svg class="sidebar__chevron" width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
            </svg>
        </button>
        <ul class="sidebar__options">
            @foreach(['Autismo','Wisc','Ados','Trauma','ADI-R','WAIS','Peers'] as $tag)
            <li class="sidebar__option">
                <input type="checkbox" id="tag-{{ Str::slug($tag) }}" class="sidebar__checkbox filter-tag" data-tag="{{ $tag }}">
                <label for="tag-{{ Str::slug($tag) }}" class="sidebar__label">{{ $tag }}</label>
            </li>
            @endforeach
        </ul>
    </div>

    <div class="sidebar__group" data-group="precio">
        <button class="sidebar__group-header">
            <span>Rango de Precio</span>
            <svg class="sidebar__chevron" width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
            </svg>
        </button>
        <div class="sidebar__options sidebar__slider-wrapper">
            <div class="sidebar__range-labels">
                <span id="price-min-label">$0</span><span>—</span><span id="price-max-label">$1.200.000</span>
            </div>
            <div id="slider-price" class="sidebar__nouislider"></div>
        </div>
    </div>

    <div class="sidebar__group" data-group="horas">
        <button class="sidebar__group-header">
            <span>Rango de Horas</span>
            <svg class="sidebar__chevron" width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
            </svg>
        </button>
        <div class="sidebar__options sidebar__slider-wrapper">
            <div class="sidebar__range-labels">
                <span id="hours-min-label">8 hrs</span><span>—</span><span id="hours-max-label">348 hrs</span>
            </div>
            <div id="slider-hours" class="sidebar__nouislider"></div>
        </div>
    </div>

    <div class="sidebar__group" data-group="descuento">
        <button class="sidebar__group-header">
            <span>Rango de Descuento</span>
            <svg class="sidebar__chevron" width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
            </svg>
        </button>
        <div class="sidebar__options sidebar__slider-wrapper">
            <div class="sidebar__range-labels">
                <span id="discount-min-label">0%</span><span>—</span><span id="discount-max-label">100%</span>
            </div>
            <div id="slider-discount" class="sidebar__nouislider"></div>
        </div>
    </div>
</div>