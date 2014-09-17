<?php

get_header(); // Подключаем хедер?>
<div id="conteiner">
			<div class="layout">
        		<div id="content">
					<?php if (have_posts()) : while (have_posts()) : the_post(); // Цикл записей ?>
					<div class="post_title">
						<img src="<?php echo get_template_directory_uri(); ?>/img/content/list.png">
						<h1><?php the_title(); // Заголовок ?></h1>
					</div><!-- Заголовок поста + ссылка на него -->
					<?php the_time('F j, Y'); // Дата создания поста ?>
					<?php if ( has_post_thumbnail() ) { the_post_thumbnail(); } // Проверяем наличие миниатюры, если есть показываем ?>
					<div class="post_content">	<?php the_content(); // Содержимое страницы ?></div>
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
        			<div id="banner">
        				<div id="bn_title">Спортивные прогнозы<br>с гарантией проходимости</div>
        				<div id="bn_text">Для заказа прогноза нажмите на кнопку<br> и укажите свои контактные данные</div>
							<a href="#" class="btn btn-large" id="go_modal">
                    			<span>Заказать прогноз</span>
                  			</a>
        			</div>
        		</div>

        		<div id="side-bar">
					<?php get_sidebar(); // Подключаем сайдбар ?>
        		</div>
        		<div class="clear"></div>
        	</div>
        </div>

<?php get_footer(); // Подключаем футер ?>