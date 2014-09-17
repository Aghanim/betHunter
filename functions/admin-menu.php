<?php
//регистрируем опции
add_option( 'vk_link', '#');
add_option( 'fb_link', '#');
add_option( 'tw_link', '#');
add_option( 'mail_link', 'serj_warrior@mail.ru');

add_option( 'legend_one', '4 года');
add_option( 'legend_two', '846 человек');

add_option( 'legend_one_link', '#');
add_option( 'legend_two_link', '#');

// Создать пользовательское меню
add_action('admin_menu', 'hunter_create_menu');

function hunter_create_menu() {

//создать новое меню верхнего уровня
add_menu_page('Страница настроек Bet hunter', 'Bet hunter', 'administrator',
__FILE__, 'hunter_settings_page', 'dashicons-welcome-widgets-menus');

//вызвать функцию register settings
add_action( 'admin_init', 'register_mysettings' );
}

function register_mysettings() {
//регистрируем наши настройки
register_setting( 'bh-settings-group', 'vk_link' );
register_setting( 'bh-settings-group', 'fb_link');
register_setting( 'bh-settings-group', 'tw_link' );
register_setting( 'bh-settings-group', 'mail_link' );

register_setting( 'bh-settings-group', 'legend_one');
register_setting( 'bh-settings-group', 'legend_two' );

register_setting( 'bh-settings-group', 'legend_one_link');
register_setting( 'bh-settings-group', 'legend_two_link' );
/*

*/
}

function hunter_settings_page() {
?>


<div class="wrap">
<h2>Страница настроек Bet hunter</h2>
<p>Вы можете вставить в поля нужные значения</p>

<form method="post" action="options.php">
    <?php settings_fields( 'bh-settings-group' ); ?>
    <table class="form-table">
        <tr valign="top">
        <th scope="row">Ссылка вконтакте</th>
        <td><input size="60" type="text" name="vk_link" value="<?php echo get_option('vk_link'); ?>" /></td>
        </tr>

        <tr valign="top">
        <th scope="row">Ссылка фейсбук</th>
        <td><input size="60" type="text" name="fb_link" value="<?php echo get_option('fb_link'); ?>" /></td>
        </tr>

        <tr valign="top">
        <th scope="row">Ссылка твиттер</th>
        <td><input size="60" type="text" name="tw_link" value="<?php echo get_option('tw_link'); ?>" /></td>
        </tr>

        <tr valign="top">
        <th scope="row">Почта</th>
        <td><input size="60" type="text" name="mail_link" value="<?php echo get_option('mail_link'); ?>" /></td>
        </tr>

        <tr valign="top">
        <th scope="row">Текст(... делаем успешные прогнозы..)</th>
        <td><input size="20" type="text" name="legend_one" value="<?php echo get_option('legend_one'); ?>" /></td>
        </tr>

        <tr valign="top">
        <th scope="row">Ссылка(... делаем успешные прогнозы..)</th>
        <td><input size="60" type="text" name="legend_one_link" value="<?php echo get_option('legend_one_link'); ?>" /></td>
        </tr>

        <tr valign="top">
        <th scope="row">Текст(... уже получили прогноз..)</th>
        <td><input size="20" type="text" name="legend_two" value="<?php echo get_option('legend_two'); ?>" /></td>
        </tr>

        <tr valign="top">
        <th scope="row">Ссылка(... уже получили прогноз..)</th>
        <td><input size="60" type="text" name="legend_two_link" value="<?php echo get_option('legend_two_link'); ?>" /></td>
        </tr>

    </table>

    <p class="submit">
    <input type="submit" class="button-primary" value="<?php _e('Сохранить') ?>" />
    </p>

</form>
</div>
<?php } ?>