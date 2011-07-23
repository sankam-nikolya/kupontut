<div id="titleExt"><h5><?php  echo widget ('path');  ?><span class="ext"><?php  echo lang ('lang_login_page');  ?></span></h5></div>

<?php if(validation_errors() OR $info_message): ?>
    <div class="errors"> 
        <?php  echo validation_errors ();  ?>
        <?php if(isset($info_message)){ echo $info_message; } ?>
    </div>
<?php endif; ?>

<form action="" method="post" class="form">

	<div class="comment_form_info">
   
	<div class="textbox">
		<label for="username" class="left"><?php  echo lang ('lang_login');  ?></label>
        <input type="text" id="username" size="30" name="username" value="Введите Ваш логин" onfocus="if(this.value=='Введите Ваш логин') this.value='';" onblur="if(this.value=='') this.value='Введите Ваш логин';" />
    </div>
	
	<div class="textbox_spacer"></div>

    <div class="textbox">
        <label for="password" class="left"><?php  echo lang ('lang_password');  ?></label> 
        <input type="password" size="30" name="password" id="password" value="<?php  echo lang ('lang_password');  ?>" onfocus="if(this.value=='<?php  echo lang ('lang_password');  ?>') this.value='';" onblur="if(this.value=='') this.value='<?php  echo lang ('lang_password');  ?>';"/>
    </div>
	</div>

    <?php if($cap_image): ?>
    <div class="comment_form_info">
    <div class="textbox captcha">
        <input type="text" name="captcha" id="captcha" value="Код протекции" onfocus="if(this.value=='Код протекции') this.value='';" onblur="if(this.value=='') this.value='Код протекции';"/>
   	</div>
    <?php if(isset($cap_image)){ echo $cap_image; } ?>
    </div>
    <?php endif; ?>

    <p class="clear">
        <label for="remember" class="left">&nbsp;</label> 
        <label><input type="checkbox" name="remember" value="1" id="remember" /> <?php  echo lang ('lang_remember_me');  ?></label>
    </p>

    <input type="submit" id="submit" class="submit" value="<?php  echo lang ('lang_submit');  ?>" /> 
	
	
    <br /><br />

    <label class="left">&nbsp;</label> 
    <a href="<?php  echo site_url ( $modules['auth']  . '/forgot_password');  ?>"><?php  echo lang ('lang_forgot_password');  ?></a>
    &nbsp;
    <a href="<?php  echo site_url ( $modules['auth']  . '/register');  ?>"><?php  echo lang ('lang_register');  ?></a>

<?php  echo form_csrf ();  ?>
</form>
<?php $mabilis_ttl=1311435210; $mabilis_last_modified=1291721700; //Z:\home\kupontut.il\www\/templates/kupon/login.tpl ?>