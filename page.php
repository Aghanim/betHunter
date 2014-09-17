<?php

get_header(); // Подключаем хедер?>
<div id="conteiner">
			<div class="layout">
        		<div id="content">
					<?php if ( have_posts() ) while ( have_posts() ) : the_post(); // Начало цикла ?>
				<div class="post_title">
					<img src="<?php echo get_template_directory_uri(); ?>/img/content/list.png">
					<h1><?php the_title(); // Заголовок ?></h1>
				</div>
                <div class="post_content">	<?php the_content(); // Содержимое страницы ?></div>
                <?php endwhile; // Конец цикла ?>
                <?php if ( is_front_page () ) echo
                    "<div id='banner'>
                    	<div id='bn_title'>Спортивные прогнозы<br>с гарантией проходимости</div>
        				<span id='bn_text'>Для заказа прогноза  нажмите на кнопку<br> и укажите свои контактные данные</span>
						<a href='#' class='btn btn-large' id='go_modal'>
                    		<span>Заказать прогноз</span>
                  		</a>
        		    </div>";?>
        		</div>

        		<div id="side-bar">
					<?php get_sidebar(); // Подключаем сайдбар ?>
        		</div>
        		<div class="clear"></div>
        	</div>
        </div>
<?php get_footer(); // Подключаем футер ?>