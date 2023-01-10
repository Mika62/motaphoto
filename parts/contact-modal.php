<article id="modal" class="modal" tabindex="-1" aria-hidden="true">
    <div class="modal__content">
        <h2>
            <img src="<?= get_stylesheet_directory_uri() . '/assets/img/contact-repeat.png' ?>" alt="Contact" class="modal__title">
        </h2>

        <!-- Form -->
        <?= do_shortcode('[contact-form-7 id="15" html_id="form-contact" html_class="modal__form form"]') ?>

        <!--
        <form method="post" id="form-contact" class="modal__form form">
            <div>
                <label for="contact-name" class="form__label">Nom</label>
                <input type="text" id="contact-name" class="form__input" name="name" required>
            </div>
            <div>
                <label for="contact-email" class="form__label">E-mail</label>
                <input type="email" id="contact-email" class="form__input" name="email" required>
            </div>
            <div>
                <label for="contact-ref" class="form__label">Réf.photo</label>
                <input type="text" id="contact-ref" class="form__input" name="ref">
            </div>
            <div>
                <label for="contact-message" class="form__label">Message</label>
                <textarea name="message" id="contact-message" class="form__textarea" cols="30" rows="8" required></textarea>
            </div>
            <button type="button" class="modal__btn btn btn-flag">Envoyer</button>
        </form>
    </div>
    -->
</article>
