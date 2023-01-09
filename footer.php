    </main>
    <!-- /Main -->
    
    <!-- Footer -->
    <footer id="footer" class="footer">
        <!-- Menu -->
        <?php wp_nav_menu([
            'menu' => 'Menu footer',
            'container' => false,
            'items_wrap' => '<nav class="footer__menu container">%3$s</nav>',
            'walker' => new WalkerCopyrightMenu,
        ]) ?>
    </footer>
    <!-- /Footer -->

    <?php wp_footer() ?>
</body>
</html>
