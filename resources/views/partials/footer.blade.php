<footer class="footer">
    <div class="footer__main">
        <div class="footer__container">

            {{-- Columna 1: Logo + países --}}
            <div class="footer__col footer__col--logo">
                <img src="https://storage.googleapis.com/statics-files-adipa-cl/dist_compress/dist/img/icons/logo-adipa.svg"
                     alt="ADIPA" class="footer__logo">

                <div class="footer__countries">
                    <span class="footer__countries-label">Estamos presentes en:</span>
                    <ul class="footer__countries-list">
                        <li class="footer__country">🇨🇱 <span>CHILE</span></li>
                        <li class="footer__country">🇲🇽 <span>MÉXICO</span></li>
                        <li class="footer__country">🇨🇴 <span>COLOMBIA</span></li>
                        <li class="footer__country">🌐 <span>GLOBAL</span></li>
                    </ul>
                </div>
            </div>

            {{-- Columna 2: Programas + Escuelas --}}
            <div class="footer__col footer__col--stacked">
                <div class="footer__group">
                    <h4 class="footer__group-title">Programas</h4>
                    <ul class="footer__links">
                        @foreach(['Cursos', 'Seminarios', 'Diplomados'] as $link)
                            <li><a href="#" class="footer__link">{{ $link }}</a></li>
                        @endforeach
                    </ul>
                </div>
                <div class="footer__group">
                    <h4 class="footer__group-title">Escuelas</h4>
                    <ul class="footer__links">
                        @foreach([
                            'Escuela Salud Mental Adultos',
                            'Escuela de Salud Mental Infanto-Juvenil',
                            'Escuela de Psicología Organizacional',
                            'Escuela Psicosocial Jurídica',
                            'Escuela de Educación y Neurodesarrollo'
                        ] as $link)
                            <li><a href="#" class="footer__link">{{ $link }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>

            {{-- Columna 3: Recursos + Beneficios + Conoce ADIPA --}}
            <div class="footer__col footer__col--stacked">
                <div class="footer__group">
                    <h4 class="footer__group-title">Recursos</h4>
                    <ul class="footer__links">
                        @foreach(['Noticias', 'Glosario', 'Podcast Adipados', 'Investigaciones'] as $link)
                            <li><a href="#" class="footer__link">{{ $link }}</a></li>
                        @endforeach
                    </ul>
                </div>
                <div class="footer__group">
                    <h4 class="footer__group-title">Beneficios</h4>
                    <ul class="footer__links">
                        @foreach(['Convenios', 'Programa Adipartners', 'Giftcards'] as $link)
                            <li><a href="#" class="footer__link">{{ $link }}</a></li>
                        @endforeach
                    </ul>
                </div>
                <div class="footer__group">
                    <h4 class="footer__group-title">Conoce ADIPA</h4>
                    <ul class="footer__links">
                        @foreach(['Sobre ADIPA', 'Escuelas', 'Docentes', 'Prensa'] as $link)
                            <li><a href="#" class="footer__link">{{ $link }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>

            {{-- Columna 4: Contacto --}}
            <div class="footer__col">
                <h4 class="footer__group-title">Contacto</h4>
                <ul class="footer__contact-list">
                    <li class="footer__contact-item">
                        <svg width="18" height="18" fill="none" stroke="#93c5fd" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                        </svg>
                        <span>CL +56957253424</span>
                    </li>
                    <li class="footer__contact-item">
                        <svg width="18" height="18" fill="none" stroke="#93c5fd" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                        <span>info@adipa.cl</span>
                    </li>
                    <li class="footer__contact-item footer__contact-item--address">
                        <svg width="18" height="18" fill="none" stroke="#93c5fd" viewBox="0 0 24 24" style="flex-shrink:0">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                        <span>Estoril 120, oficina 414, Las Condes. Santiago de Chile.</span>
                    </li>
                </ul>

                <div class="footer__contact-links">
                    <a href="#" class="footer__contact-link footer__contact-link--highlight">¡REGALA UNA GIFTCARD!</a>
                    <a href="#" class="footer__contact-link">¿Necesitas ayuda psicológica?</a>
                    <a href="#" class="footer__contact-link">Términos y condiciones</a>
                    <a href="#" class="footer__contact-link">Centro de ayuda</a>
                </div>
            </div>

            {{-- Columna 5: Newsletter --}}
            <div class="footer__col">
                <div class="footer__newsletter" id="newsletter-box">

                    {{-- Formulario --}}
                    <form class="footer__newsletter-form" id="newsletter-form">
                        <h4 class="footer__newsletter-title">Newsletter</h4>

                        <div class="footer__newsletter-field">
                            <label class="footer__newsletter-label" id="label-nombre">Nombre *</label>
                            <input type="text" id="newsletter-nombre" class="footer__newsletter-input" />
                            <span class="footer__newsletter-error" id="newsletter-error-nombre"></span>
                        </div>

                        <div class="footer__newsletter-field">
                            <label class="footer__newsletter-label" id="label-email">Email *</label>
                            <input type="email" id="newsletter-email" class="footer__newsletter-input" />
                            <span class="footer__newsletter-error" id="newsletter-error-email"></span>
                        </div>

                        <div class="footer__newsletter-field">
                            <label class="footer__newsletter-label">Frecuencia *</label>
                            <select class="footer__newsletter-input">
                                <option>Selecciona</option>
                                <option>2 al mes</option>
                                <option>1 al mes</option>
                            </select>
                        </div>

                        <button type="submit" class="footer__newsletter-btn" id="newsletter-btn">
                            <span id="newsletter-btn-text">ENVIAR</span>
                            <span id="newsletter-btn-loading" style="display:none">ENVIANDO...</span>
                        </button>
                    </form>

                    {{-- Éxito --}}
                    <div class="footer__newsletter-success" id="newsletter-success" style="display:none">
                        <svg width="32" height="32" fill="none" stroke="#2cb7ff" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <h4>¡Éxito!</h4>
                        <p>Gracias por suscribirte.</p>
                        <button class="footer__newsletter-reset" id="newsletter-reset">Otro correo</button>
                    </div>
                </div>
            </div>

        </div>
    </div>

    {{-- Bottom bar --}}
    <div class="footer__bottom">
        <div class="footer__bottom-container">
            <div class="footer__socials">
                <a href="https://www.facebook.com/adipa.cl" target="_blank" class="footer__social-link" aria-label="Facebook">
                    <svg width="18" height="18" fill="currentColor" viewBox="0 0 24 24"><path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"/></svg>
                </a>
                <a href="https://www.instagram.com/adipa.cl/" target="_blank" class="footer__social-link" aria-label="Instagram">
                    <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37z"/><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"/></svg>
                </a>
                <a href="https://www.youtube.com/channel/UCSx-fxlxiMHExaWwyHT8P8A" target="_blank" class="footer__social-link" aria-label="YouTube">
                    <svg width="18" height="18" fill="currentColor" viewBox="0 0 24 24"><path d="M22.54 6.42a2.78 2.78 0 00-1.95-1.96C18.88 4 12 4 12 4s-6.88 0-8.59.46a2.78 2.78 0 00-1.95 1.96A29 29 0 001 12a29 29 0 00.46 5.58A2.78 2.78 0 003.41 19.6C5.12 20 12 20 12 20s6.88 0 8.59-.46a2.78 2.78 0 001.95-1.95A29 29 0 0023 12a29 29 0 00-.46-5.58z"/><polygon fill="#fff" points="9.75 15.02 15.5 12 9.75 8.98 9.75 15.02"/></svg>
                </a>
                <a href="https://open.spotify.com/show/4mwZlXLYaGdr9WIqiuSHup" target="_blank" class="footer__social-link" aria-label="Spotify">
                    <svg width="18" height="18" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0C5.4 0 0 5.4 0 12s5.4 12 12 12 12-5.4 12-12S18.66 0 12 0zm5.521 17.34c-.24.359-.66.48-1.021.24-2.82-1.74-6.36-2.101-10.561-1.141-.418.122-.779-.179-.899-.539-.12-.421.18-.78.54-.9 4.56-1.021 8.52-.6 11.64 1.32.42.18.479.659.301 1.02zm1.44-3.3c-.301.42-.841.6-1.262.3-3.239-1.98-8.159-2.58-11.939-1.38-.479.12-1.02-.12-1.14-.6-.12-.48.12-1.021.6-1.141C9.6 9.9 15 10.561 18.72 12.84c.361.181.54.78.241 1.2zm.12-3.36C15.24 8.4 8.82 8.16 5.16 9.301c-.6.179-1.2-.181-1.38-.721-.18-.601.18-1.2.72-1.381 4.26-1.26 11.28-1.02 15.721 1.621.539.3.719 1.02.419 1.56-.299.421-1.02.599-1.559.3z"/></svg>
                </a>
                <a href="https://www.tiktok.com/@somosadipa" target="_blank" class="footer__social-link" aria-label="TikTok">
                    <svg width="18" height="18" fill="currentColor" viewBox="0 0 24 24"><path d="M19.59 6.69a4.83 4.83 0 01-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 01-2.88 2.5 2.89 2.89 0 01-2.89-2.89 2.89 2.89 0 012.89-2.89c.28 0 .54.04.79.1V9.01a6.33 6.33 0 00-.79-.05 6.34 6.34 0 00-6.34 6.34 6.34 6.34 0 006.34 6.34 6.34 6.34 0 006.33-6.34V8.69a8.18 8.18 0 004.78 1.52V6.76a4.85 4.85 0 01-1.01-.07z"/></svg>
                </a>
            </div>
            <p class="footer__copyright">© {{ date('Y') }} ADIPA — Todos los derechos reservados</p>
        </div>
    </div>
</footer>