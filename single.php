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
            <div class="post_content">	<?php the_content(); // Содержимое страницы ?>
		    	<?php echo 'Рубрики: '; the_category( ' | ' ); // Выводим категории поста ?>
		    	<?php the_tags( 'Тэги: ', ' | ', '' ); // Выводим тэги(метки) поста ?>
		    	<?php endwhile; // Конец цикла ?>
		    	<?php previous_post_link( '%link', '<span class="meta-nav">' . _x( '&larr;', 'Previous post link', 'twentyten' ) . '</span> %title' ); // Ссылка на предидущий пост?>
		    	<?php next_post_link( '%link', '%title <span class="meta-nav">' . _x( '&rarr;', 'Next post link', 'twentyten' ) . '</span>' ); // Ссылка на следующий пост?>
		    </div>
        </div>
        		<div id="side-bar">
					<?php get_sidebar(); // Подключаем сайдбар ?>
        		</div>
        		<div class="clear"></div>
        	</div>
        </div>
<?php get_footer(); // Подключаем футер ?>