<nav class="hide-on-med-and-down component">
    <div class="nav-wrapper">
            <?php
            wp_nav_menu(
                array(
                    'theme_location' => 'primary_desktop_menu',
                    'container'      => false,
                    'menu_class'     => 'left',
                    'menu_id' => 'nav-desktop'
                )
            );
            ?>
    </div>
    <?php include '_menu_categories.php'; ?>
</nav>
