
<!DOCTYPE html>
<html lang="ru">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta charset="UTF-8">

<link rel="alternate" type="application/rdf+xml" title="RDF mapping" href="<?php bloginfo('rdf_url'); ?>" />
<link rel="alternate" type="application/rss+xml" title="RSS" href="<?php bloginfo('rss_url'); ?>" />
<link rel="alternate" type="application/rss+xml" title="Comments RSS" href="<?php bloginfo('comments_rss2_url'); ?>" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/style.css">

<link href="<?php echo get_template_directory_uri(); ?>/styles/main.css" rel="stylesheet" type="text/css">
<link href="<?php echo get_template_directory_uri(); ?>/styles/liMarquee.css" rel="stylesheet" type="text/css">
<?php  wp_enqueue_script("jquery"); ?>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.liMarquee.js"></script>
 <!--[if lt IE 9]>
 <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
 <![endif]-->
<title>
<?php // Генерируем тайтл в зависимости от контента с разделителем " | "
	global $page, $paged;
	wp_title( '|', true, 'right' );
	bloginfo( 'name' );
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'twentyten' ), max( $paged, $page ) );
?>
</title>
<?php
	wp_head(); // Необходимо для работы плагинов и функционала wp
?>
</head>
<body>
  	<div id="top-bar">
        <div class ="mask">
			<div class="layout-top">
                <div class="logo">

                  <a href="<?php bloginfo('url') ?>">
                    <img src="<?php echo get_template_directory_uri(); ?>/img/top-bar/logo.png" />
                  </a>
                </div>

                <div class = "link-socials">
                  <ul id="vk_mail">
            		<li><a href="<?php echo get_option('vk_link'); ?>">Группа ВК</a></li>
            		<li><a href="mailto:<?php echo get_option('mail_link'); ?>">Почта</a></li>
            	</ul>

            	<ul id="tw_fb">
            		<li><a href="<?php echo get_option('tw_link'); ?>">Твиттер</a></li>
            		<li><a href="<?php echo get_option('fb_link'); ?>">Фейсбук</a></li>
            	</ul>
                </div>
                <div class = "link-group group1">

                  <img src="<?php echo get_template_directory_uri(); ?>/img/top-bar/flag.png" />
                  <a href="<?php echo get_option('legend_one_link'); ?>">
                    <span><?php echo get_option('legend_one'); ?> делаем успешные <br> прогнозы для Вас</span>
                  </a>
                </div>
                <div class = "link-group group2">
                  <img src="<?php echo get_template_directory_uri(); ?>/img/top-bar/users.png" />
                  <a href="<?php echo get_option('legend_two_link'); ?>">
                    <span>Более <?php echo get_option('legend_two'); ?><br> уже получили прогноз</span>
                  </a>
                </div>
                <div class = "link-group group3">
                 <a href="#" class="btn" id="go_modal">
                    <span>Заказать прогноз</span>
                  </a>
                </div>

			 </div>
  		  </div>
      </div>
  		<div id="newsline">
  			<div class="layout">
  			  <div id="news-btn">Новости</div>
  			  <div class="str_run">
  			  	<?php
                    $count_post = 5;
                    $category_name = 'news';

                    wp_reset_postdata();
                    $news_query = new WP_Query("category_name=".$category_name."&showposts=".$count_post);

                    while($news_query->have_posts()) : $news_query->the_post();
                    	echo wp_trim_words( get_the_content(), 10, '..' ); ?>
                    	<a href="<?php the_permalink(); ?>"><strong>Читать..</strong></a>
                    <?php endwhile; wp_reset_postdata();?>
			   </div>
              <div class="clear"></div>
			</div>
		</div>
        <div id="head">
        	<div id="hero">
                <div class="title">
                  <p><span>Спортивные прогнозы <br/>с гарантией</span><br/> &gt;85% проходимость, 100% открытость</p>
                </div>
            </div>
        		<div class="helper"></div>
        </div>

               <?php
				$args = array( // Выводим верхнее меню
					'theme_location'=>'top',
					'container'=>'nav',
					'menu_class'=>'nav-bar',
					'depth'=> 0);
					wp_nav_menu($args);
				?>


