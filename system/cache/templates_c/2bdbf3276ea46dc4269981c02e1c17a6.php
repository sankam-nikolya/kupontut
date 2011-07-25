<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php $page_type = $CI->core->core_data['data_type']; ?>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta http-equiv="Content-Language" content="ru" />
	<meta name="description" content="<?php if(isset($site_description)){ echo $site_description; } ?>" />
	<meta name="keywords" content="<?php if(isset($site_keywords)){ echo $site_keywords; } ?>" />
	<title><?php if(isset($site_title)){ echo $site_title; } ?></title>
	<link href="<?php if(isset($THEME)){ echo $THEME; } ?>/css/style.css" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="<?php if(isset($THEME)){ echo $THEME; } ?>/js/jquery-1.js"></script>
	<script type="text/javascript" src="<?php if(isset($THEME)){ echo $THEME; } ?>/js/script.js"></script>
	<!--[if IE]>
		<link rel="stylesheet" href="<?php if(isset($THEME)){ echo $THEME; } ?>/css/ie.css" type="text/css" media="screen" />
	<![endif]-->
	<!--[if lte IE 6]>
		<meta http-equiv="refresh" content="0; url=<?php if(isset($THEME)){ echo $THEME; } ?>/ie6/ie6.html" />
	<![endif]-->
</head>
<body>
<div id="content">
	<!--HEAD-->
    <div class="head">
        <div class="fix">
		<?php if($is_logged_in): ?>
			<ul class="login">
					<li><a href="/user_manager" class="user"><?php if(isset($username)){ echo $username; } ?></a></li>
					<li><a href="/user_manager">Личный кабинет</a></li>
					<li><span class="bal">Баланс: 30000 руб.</span></li>
				<li><span class="button2"><span class="l">&nbsp;</span><span class="c"><a href="/pay">Пополнить счет</a></span><span class="r">&nbsp;</span></span></li>
			</ul>
		<?php else: ?>
			<ul class="top">
				<li class="sn1">
					<span>Войти через:</span>
					<a href="#"><img src="<?php if(isset($THEME)){ echo $THEME; } ?>/images/1304064818_vk.png" alt="" /></a>
					<a href="#"><img src="<?php if(isset($THEME)){ echo $THEME; } ?>/images/1304064853_facebook.png" alt="" /></a>
					<a href="#"><img src="<?php if(isset($THEME)){ echo $THEME; } ?>/images/1304064841_twitter.png" alt="" /></a>

				</li>
				<li class="enter">
						<form method="post" action="/auth/login" name="enter">
						
							<div><input type="text" value="Эл. почта" onfocus="if (this.value == 'Эл. почта') this.value ='';" onblur="if (this.value == '') this.value='Эл. почта';" name="username" /></div>
							
							<div><input type="text" value="Пароль" onfocus="if (this.value == 'Пароль') this.value ='';" onblur="if (this.value == '') this.value='Пароль';" name="password" /></div>
							<input type="hidden" name="remember" value="1" id="remember">
							<span class="button2"><span class="l">&nbsp;</span><span class="c"><input type="submit" value="Войти" name="go" /></span><span class="r">&nbsp;</span></span>
							<?php  echo form_csrf ();  ?>
							<a href="#">Я забыл пароль</a>
						</form>
				</li>
				<li class="reg">
					<span class="button1">
						<span class="l">&nbsp;</span>
						<span class="c"><a href="#">Регистрация на сайте</a></span>
						<span class="r">&nbsp;</span>
					</span>
				</li>
			</ul>
		<?php endif; ?>
           
            <div class="logo"><a href="/"><img src="<?php if(isset($THEME)){ echo $THEME; } ?>/images/logo.png" alt="" /></a></div>
            <div class="in"><div>Предложения в<br /><span>Минске</span></div></div>
            <div class="how"><a href="/kak-eto-rabotaet">Как это работает</a></div>
            <div class="faq"><a href="/voprosy-i-podderzhka">Вопросы и поддержка</a></div>
            <div class="sn2"><a href="#"><img src="<?php if(isset($THEME)){ echo $THEME; } ?>/images/sn2.png" alt="" /></a></div>
        </div>
    </div>
	<!--END HEAD-->
    <div class="fix">
    	<div class="content">
			<?php if(isset($content)){ echo $content; } ?>
        </div>
    </div>
    <!-- footer -->
    <div id="footer">
    	<ul>
        	<li class="copy"><img src="<?php if(isset($THEME)){ echo $THEME; } ?>/images/logof.png" alt="" /><div>© 2011 KuponTut.by<br />Все права охраняются законом.</div></li>
            <li class="mn"><a href="/kak-eto-rabotaet">Как это работает?</a><br /><a href="/distributor">Поставщикам</a></li>
            <li class="mn"><a href="/voprosy-i-podderzhka">Вопрос / ответ</a><br /><a href="/payment_methods">О способах оплаты</a></li>
            <li class="sn3"><a href="/feedback">Контакты</a><br /><a href="#"><img src="<?php if(isset($THEME)){ echo $THEME; } ?>/images/1304064818_vk.png" alt="" /></a><a href="#"><img src="<?php if(isset($THEME)){ echo $THEME; } ?>/images/1304064853_facebook.png" alt="" /></a><a href="#"><img src="<?php if(isset($THEME)){ echo $THEME; } ?>/images/1304064841_twitter.png" alt="" /></a></li>
            <li class="nineseven">Разработка сайта<br />студия <a href="#">«Nineseven»</a></li>
        </ul>
    </div>
    <!-- end footer -->
</div>
</body>
</html><?php $mabilis_ttl=1311663730; $mabilis_last_modified=1311420751; //Z:\home\kupontut.il\www\/templates/kupon/main.tpl ?>