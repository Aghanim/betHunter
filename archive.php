<?php


get_header(); // Подключаем хедер ?>
<div id="conteiner">
	<div class="layout">
        <div id="content">
			<div class="post_title">
				<img src="<?php echo get_template_directory_uri(); ?>/img/content/list.png">
				<h1><?php // Генерация заголовка в зависимости от архива
					if ( is_day() ) :
						printf( __( 'Архив постов: %s', 'twentytwelve' ),   get_the_date()  );
					elseif ( is_month() ) :
						printf( __( 'Архив постов: %s', 'twentytwelve' ),   get_the_date( _x( 'F Y', 'monthly archives date format', 'twentytwelve' ) )  );
					elseif ( is_year() ) :
						printf( __( 'Архив постов: %s', 'twentytwelve' ),   get_the_date( _x( 'Y', 'yearly archives date format', 'twentytwelve' ) )  );
					else :
						_e( 'Archives', 'twentytwelve' );
					endif;
					?>
				</h1>
			</div>
		<?php if (have_posts()) : while (have_posts()) : the_post(); // Цикл записей ?>
        <div class="post_content">
            <h3 id="tit"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3><!-- Заголовок поста + ссылка на него -->
            <?php the_time('F j, Y'); // Дата создания поста?>
            <?php if ( has_post_thumbnail() ) { the_post_thumbnail(); } // Проверяем наличие миниатюры, если есть показываем ?>
            <?php the_content(''); // Выводим анонс ?>
            <?php endwhile; // Конец цикла.
            else: echo '<h2>Извините, ничего не найдено...</h2>'; endif; // Если записей нет - извиняемся ?>
            <?php // Пагинация
            global $wp_query;
            $big = 999999999;
            echo paginate_links( array(
            	'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
            	'format' => '?paged=%#%',
            	'current' => max( 1, get_query_var('paged') ),
            	'type' => 'list',
            	'prev_text'    => __('« Сюда'),
                'next_text'    => __('Туда »'),
            	'total' => $wp_query->max_num_pages
            ) );
        ?>
        </div>
      	</div>
 		<div id="side-bar">
			<?php get_sidebar(); // Подключаем сайдбар ?>
      	</div>
      	<div class="clear"></div>
    </div>
</div>
<?php get_footer(); // Подключаем футер ?>