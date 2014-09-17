<div id="footer">
    <div class="mask">
        <div class="layout-bot">
            	<ul>
            		<li><a href="">Главная</a></li>
            		<li><a href="">О нас</a></li>
            		<li><a href="">Статистика</a></li>
            		<li><a href="">Заказать прогноз</a></li>
            	</ul>

            	<ul>
            		<li><a href="">Гарантии</a></li>
            		<li><a href="">Sport News</a></li>
            		<li><a href="">Контакты</a></li>
            		<li><a href="">Результат опросов</a></li>
            	</ul>

            <div id="sheer">
            	<p>&copy; Все права защищены</p><br/><br/><br/>
            	<img src="<?php echo get_template_directory_uri(); ?>/img/footer/sheer.png" />
            </div>
            <div class="clear"></div>
        </div>
        <div class="clear"></div>
    </div>
</div>
 	<div id="modal_form"> <!-- Само окно -->
    	<span id="modal_close"><img src="<?php echo get_template_directory_uri(); ?>/img/head/close.png"></span> <!-- Кнопка закрыть -->
	<?php echo do_shortcode( '[contact-form-7 id="48" title="Контактная форма 1"]' ); ?>
        <!--
	    <form action="">
            <input type="text" name="name" placeholder="Имя:" required>
            <input type="text" name="tel" placeholder="Телефон:" required>
            <input type="email" name="email" placeholder="Email:" required>
            <textarea name="body" cols="20" rows="6" placeholder="Текст сообщения:" required></textarea>
            <button class="btn" type="submit">Отправить</button>
        </form>
	-->
   </div>
   <div id="overlay"></div> <!-- Подложка -->
   <script src="<?php echo get_template_directory_uri(); ?>/js/modal.js"></script>
   <script src="<?php echo get_template_directory_uri(); ?>/js/marq_init.js"></script>
<?php
	wp_footer(); // Необходимо для нормальной работы плагинов
?>
</body>
</html>