<nav class="navbar">
    <div class="navbar__container">
        <div class="navbar__left">
            <div class="navbar__whatsapp">
                <img src="https://storage.googleapis.com/statics-files-adipa-cl/dist_compress/dist/img/icons/icons-whatsapp.svg"
                     alt="WhatsApp" class="navbar__whatsapp-icon">
                <span class="navbar__separator">|</span>
            </div>

            <ul class="navbar__links">
                <li class="navbar__item navbar__item--dropdown">
                    <a href="#" class="navbar__link">Descubre ADIPA
                        <svg width="12" height="12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </a>
                </li>
                <li class="navbar__item navbar__item--dropdown">
                    <a href="#" class="navbar__link">Recursos
                        <svg width="12" height="12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </a>
                </li>
                <li class="navbar__item">
                    <a href="#" class="navbar__link navbar__link--badge">
                        <span class="navbar__badge navbar__badge--gratis">GRATIS</span>
                        Seminarios
                    </a>
                </li>
                <li class="navbar__item">
                    <a href="#" class="navbar__link navbar__link--badge">
                        <span class="navbar__badge navbar__badge--nuevo">NUEVO</span>
                        Congreso
                    </a>
                </li>
                <li class="navbar__item"><a href="#" class="navbar__link">Especializaciones</a></li>
                <li class="navbar__item"><a href="#" class="navbar__link">Acreditaciones</a></li>
                <li class="navbar__item"><a href="#" class="navbar__link">Sesiones Magistrales</a></li>
                <li class="navbar__item"><a href="#" class="navbar__link">Diplomados</a></li>
                <li class="navbar__item"><a href="#" class="navbar__link navbar__link--bold">Cursos</a></li>
            </ul>
        </div>

        <a href="#" class="navbar__blacksale">
            <img src="https://adipa.cl/content/uploads/2026/03/black-sale-icono-mini-banner-1.webp"
                 alt="Black Sale" class="navbar__blacksale-icon">
            <span class="navbar__blacksale-divider"></span>
            <span class="navbar__blacksale-text">Black Sale Oficial</span>
        </a>
    </div>

    {{-- Menú mobile --}}
    <div class="navbar__mobile" id="mobile-menu" style="display:none">
        <a href="#" class="navbar__mobile-link">Descubre ADIPA</a>
        <a href="#" class="navbar__mobile-link">Recursos</a>
        <a href="#" class="navbar__mobile-link">
            <span class="navbar__badge navbar__badge--gratis">GRATIS</span> Seminarios
        </a>
        <a href="#" class="navbar__mobile-link">
            <span class="navbar__badge navbar__badge--nuevo">NUEVO</span> Congreso
        </a>
        <a href="#" class="navbar__mobile-link">Especializaciones</a>
        <a href="#" class="navbar__mobile-link">Acreditaciones</a>
        <a href="#" class="navbar__mobile-link">Sesiones Magistrales</a>
        <a href="#" class="navbar__mobile-link">Diplomados</a>
        <a href="#" class="navbar__mobile-link navbar__mobile-link--bold">Cursos</a>

     <div class="navbar__mobile-divider"></div>

        {{-- Black Sale --}}
        <a href="#" class="navbar__mobile-link navbar__mobile-link--blacksale">Black Sale Oficial</a>

        <div class="navbar__mobile-divider"></div>

        {{-- Botones de sesión --}}
        <div class="navbar__mobile-actions">
            <a href="#" class="navbar__mobile-btn navbar__mobile-btn--primary">Iniciar Sesión</a>
            <a href="#" class="navbar__mobile-btn navbar__mobile-btn--secondary">Regístrate</a>
        </div>

    </div>
</nav>