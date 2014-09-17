

<?php
//
$CountPost = 5;
$CategoryName = 'news';
$Title = 'Новости';
$VoteTitle = 'Народный рейтинг';

wp_reset_postdata();
$first_query = new WP_Query("category_name=".$CategoryName."&showposts=3");
?>

<div class="side_title">
  <div class="align">
	<img src="<?php echo get_template_directory_uri(); ?>/img/sidebar/tv.png">
	<h2><?php echo $Title; // Заголовок категории ?></h2>
  </div>
</div>
<div class="clear"></div>
<?php while($first_query->have_posts()) : $first_query->the_post(); ?>

<div class="preview">
	<?php if ( has_post_thumbnail() ) { the_post_thumbnail(); } // Проверяем наличие миниатюры, если есть показываем?>
	<h3 id="tit"><a href="<?php the_permalink(); ?>" ><?php the_title(); ?></a></h3><!-- Заголовок поста + ссылка на него -->
	<?php the_excerpt(); ?>
	<a href="<?php the_permalink(); ?>" class="underline"><strong>Подробнее..</strong></a>
	<div class="mute"><?php the_time('j. m. y'); // Дата создания поста ?></div>
</div>
<?php endwhile; wp_reset_postdata();?>


<?php if (function_exists('vote_poll') && !in_pollarchive()): //Добавляем опросник?>
        <div class="side_title">
          <div class="align">
			<img src="<?php echo get_template_directory_uri(); ?>/img/sidebar/vote.png">
			<h2><?php echo $VoteTitle ;?></h2>
		  </div>
		</div>
		<div class="clear"></div>
			<div class="vote"><?php get_poll();?></div>
        <?php display_polls_archive_link(); ?>
<?php endif; ?>
<?php dynamic_sidebar(); ?>