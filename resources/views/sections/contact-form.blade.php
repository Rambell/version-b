<section class="contact" id="contacto">
    <div class="contact__container">

        <div class="contact__header">
            <h2 class="contact__title">Encuentra el curso ideal para tí</h2>
            <p class="contact__subtitle">Déjanos tu mensaje y te ayudaremos a elegir la mejor opción</p>
        </div>

        <div class="contact__card" id="contact-card">

            {{-- Formulario --}}
            <form class="contact__form" id="contact-form" novalidate>

                <div class="contact__field">
                    <label class="contact__label">Nombre <span class="contact__required">*</span></label>
                    <input type="text" name="nombre" id="field-nombre"
                           placeholder="Tu nombre completo"
                           class="contact__input" autocomplete="off">
                    <span class="contact__error" id="error-nombre"></span>
                </div>

                <div class="contact__field">
                    <label class="contact__label">Email <span class="contact__required">*</span></label>
                    <input type="email" name="email" id="field-email"
                           placeholder="tu@email.com"
                           class="contact__input" autocomplete="off">
                    <span class="contact__error" id="error-email"></span>
                </div>

                <div class="contact__field">
                    <label class="contact__label">Mensaje <span class="contact__required">*</span></label>
                    <textarea name="mensaje" id="field-mensaje"
                              placeholder="Escribe tu consulta aquí..."
                              rows="5" maxlength="300"
                              class="contact__input contact__input--textarea"></textarea>
                    <div class="contact__field-footer">
                        <span class="contact__error" id="error-mensaje"></span>
                        <span class="contact__counter" id="mensaje-counter">0/300</span>
                    </div>
                </div>

                <button type="submit" class="contact__btn" id="contact-submit">
                    <span id="btn-text">Enviar mensaje</span>
                    <span id="btn-loading" style="display:none">Enviando...</span>
                </button>

            </form>

            {{-- Estado de éxito --}}
            <div class="contact__success" id="contact-success" style="display:none">
                <div class="contact__success-icon">✓</div>
                <h3 class="contact__success-title">¡Mensaje enviado!</h3>
                <p class="contact__success-msg">
                    Gracias por contactarnos. Nuestro equipo se pondrá en contacto contigo a la brevedad.
                </p>
                <button class="contact__reset" id="contact-reset">Enviar otro mensaje</button>
            </div>

        </div>
    </div>
</section>