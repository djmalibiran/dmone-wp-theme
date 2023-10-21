<footer class="container">
    <div class="grid">
        <aside>
            <?php wp_nav_menu( array(
                'container' => 'nav',
                'theme_location' => 'footer-menu-one'

                ));
            ?>
        </aside>
        <aside>
            <?php wp_nav_menu( array(
                'container' => 'nav',
                'theme_location' => 'footer-menu-two'

                ));
            ?>
        </aside>
        <aside>
        <?php wp_nav_menu( array(
            'container' => 'nav',
            'theme_location' => 'footer-menu-three'

            ));
        ?>
        </aside>
        <aside>
            <?php wp_nav_menu( array(
                'container' => 'nav',
                'theme_location' => 'footer-menu-four'
                
            ));
            ?>
        </aside>
    </div>
</footer>
</body>