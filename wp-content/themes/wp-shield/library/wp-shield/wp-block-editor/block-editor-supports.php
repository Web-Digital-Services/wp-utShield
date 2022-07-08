<?php /**
 * 
 * Check page type (used mostly on newsroom for Guttenberg)
 * 
 */

function utshield_is_block_editor(){
    $current_screen = get_current_screen();
    return method_exists( $current_screen, 'is_block_editor' ) && $current_screen->is_block_editor();
}
add_action( 'after_setup_theme', 'wpShield_branded_colors', 11 );
function wpShield_branded_colors() {
    add_theme_support( 'editor-color-palette', 
        array(
            array(
                'name'  => esc_attr__( 'Blue', 'wpShield' ),
                'slug'  => 'blue',
                'color' => '#27829E',
            ),
            array(
                'name'  => esc_attr__( 'Tangerine', 'wpShield' ),
                'slug'  => 'tangerine',
                'color' => '#D45D00',
            ),
            array(
                'name'  => esc_attr__( 'Gold', 'wpShield' ),
                'slug'  => 'gold',
                'color' => '#FFBC5B',
            ),
            array(
                'name'  => esc_attr__( 'Light Beige', 'wpShield' ),
                'slug'  => 'light-beige',
                'color' => '#F7F5F0',
            ),
            array(
                'name'  => esc_attr__( 'Beige', 'wpShield' ),
                'slug'  => 'beige',
                'color' => '#F0ECE2',
            ),
            array(
                'name'  => esc_attr__( 'Dark Beige', 'wpShield' ),
                'slug'  => 'dark-beige',
                'color' => '#EFE1CC',
            ),
            array(
                'name'  => esc_attr__( 'Light Grey', 'wpShield' ),
                'slug'  => 'light-gray',
                'color' => '#E0E5E6',
            ),
            array(
                'name'  => esc_attr__( 'Grey', 'wpShield' ),
                'slug'  => 'grey',
                'color' => '#667075',
            ),
            array(
                'name'  => esc_attr__( 'Dark Grey', 'wpShield' ),
                'slug'  => 'dark-gray',
                'color' => '#333D42',
            ),
        ) 
    );
}
add_theme_support( 'disable-custom-colors' );
add_theme_support( 'disable-custom-gradients' );