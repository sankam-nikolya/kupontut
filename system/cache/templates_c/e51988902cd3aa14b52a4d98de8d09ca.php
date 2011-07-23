<div id="titleExt"><h5><?php  echo widget ('path');  ?><span class="ext">Контакты</span></h5></div>
<div id="contact">
<div class="left">

<?php if($form_errors): ?>
    <div class="errors"> 
        <?php if(isset($form_errors)){ echo $form_errors; } ?>
    </div>
<?php endif; ?>

<?php if($message_sent): ?>
     Ваше сообщение отправлено.
<?php endif; ?>

<form action="<?php  echo site_url ('feedback');  ?>" method="post">
    <div class="textbox">
    <input type="text" id="name" name="name" class="text" value="<?php if($_POST['name']): ?><?php  echo $_POST['name'];  ?><?php else: ?>Ваше Имя<?php endif; ?>" onfocus="if(this.value=='Ваше Имя') this.value='';" onblur="if(this.value=='') this.value='Ваше Имя';"/>
    </div>

    <div class="textbox">
        <input type="text" id="email" name="email" class="text" value="<?php if($_POST['email']): ?><?php  echo $_POST['email'];  ?><?php else: ?>Email<?php endif; ?>" onfocus="if(this.value=='Email') this.value='';" onblur="if(this.value=='') this.value='Email';"/>
    </div>

    <div class="textbox">
        <input type="text" id="theme" name="theme" class="text" value="<?php if($_POST['theme']): ?><?php  echo $_POST['theme'];  ?><?php else: ?>Тема<?php endif; ?>" onfocus="if(this.value=='Тема') this.value='';" onblur="if(this.value=='') this.value='Тема';"/>
    </div>

    <div class="textbox">
        <textarea cols="45" rows="10" name="message" id="message" onfocus="if(this.value=='Текст Сообщения') this.value='';" onblur="if(this.value=='') this.value='Текст Сообщения';"><?php if($_POST['message']): ?><?php  echo $_POST['message'];  ?><?php else: ?>Текст Сообщения<?php endif; ?></textarea>
    </div>
    
   	<div class="comment_form_info">
	<?php if($captcha_type =='captcha'): ?>    
    	<div class="textbox captcha">
	    <input type="text" name="captcha" id="recaptcha_response_field" value="Код протекции" onfocus="if(this.value=='Код протекции') this.value='';" onblur="if(this.value=='') this.value='Код протекции';"/>
   	</div>
	<?php endif; ?>
    <?php if(isset($cap_image)){ echo $cap_image; } ?>
    </div>
    
    <input type="submit" class="submit" value="<?php  echo lang ('lang_comment_button');  ?>" />

    <?php  echo form_csrf ();  ?>
</form>
</div>
<div class="right">
<div id="detail">
<h2 id="title">Контакты</h2>
<?php  echo widget ('contacts');  ?>
</div>
</div>
</div><?php $mabilis_ttl=1311078252; $mabilis_last_modified=1303831608; //Z:\home\kupontut.il\www\application\modules\feedback/templates/feedback.tpl ?>