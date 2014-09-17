<?php
//подключаем дополнительную страницу настроек в меню администраторра
require_once (TEMPLATEPATH.'/functions/admin-menu.php');

register_nav_menus( array( // Регистрируем 2 меню
	'top' => 'Верхнее меню'//,'left' => 'Нижнее'
) );
add_theme_support('post-thumbnails'); // Включаем поддержку миниатюр
set_post_thumbnail_size(100, 100); // Задаем размеры миниатюре

if ( function_exists('register_sidebar') )
register_sidebar(); // Регистрируем сайдбар

remove_filter('the_excerpt', 'wpautop');

function new_excerpt_more($more) {
	return '..';
}
add_filter('excerpt_more', 'new_excerpt_more');

function new_excerpt_length($length) {
	return 20;
}

add_filter('excerpt_length', 'new_excerpt_length');


//======Кастомизация=================================
/*Подменяем лого Вордпреса*/
function my_login_logo(){
   echo '
   <style type="text/css">
        #login h1 a {
            background: url('. get_bloginfo('template_directory') .'/img/wp_logo.png) no-repeat 0 0 !important;
            width: 86px !important;
        }
    </style>';
}
add_action('login_head', 'my_login_logo');

/* Ставим ссылку с логотипа на сайт, а не на wordpress.org */
add_filter( 'login_headerurl', create_function('', 'return get_home_url();') );

/* убираем title в логотипе "сайт работает на wordpress" */
add_filter( 'login_headertitle', create_function('', 'return false;') );


//====================Безопастность================================

// Полностью убираем версию WordPress
add_filter('the_generator', '__return_empty_string');
// Удаление параметра ver из добавляемых скриптов и стилей
function rem_wp_ver_css_js( $src ) {
    if ( strpos( $src, 'ver=' ) )
        $src = remove_query_arg( 'ver', $src );
    return $src;
}
add_filter( 'style_loader_src', 'rem_wp_ver_css_js', 9999 );
add_filter( 'script_loader_src', 'rem_wp_ver_css_js', 9999 );
?>