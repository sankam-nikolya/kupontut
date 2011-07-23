$(document).ready(function(){
	
	$(".c_b div a img").fadeTo(200,"0.5").hover(function(){
		$(this).stop().fadeTo(200,"1");
	},function(){
		$(this).stop().fadeTo(200,"0.5");
	});

	$(".kupons_more .kupon").each(function(i){
		if(i%3==2)$(this).css('margin-right','0');
	});
	
	$(".menu_lk li:last").css('border-right','0');
	$(".right_block ul.month_list li:last").css('background','none');
	$(".how_it li:last").css({
		'background':'none',
		'margin':'0',
		'padding-bottom':'0'
	});
	
	// FAQ
	$(".faq_list li p").hide();
	$(".faq_list li a").toggle(function(e){
		e.preventDefault();
		$(this).parent().children('p').slideDown(200);
	},function(e){
		e.preventDefault();
		$(this).parent().children('p').slideUp(200);
	});
	
	//ZAKAZ
	var cenaOne = parseInt($('#cena').text());
	var kolOne = $('.zakaz .cena p label input').val();
	$('#summ').text(cenaOne*kolOne);
	
	$('.zakaz .cena p label input').change(function(){
		var cena = parseInt($('#cena').text());
		var kol = $(this).val();
		$('#summ').text(cena*kol);
	});
		
	$('.zakaz .cena p a.minus').click(function(e){
		e.preventDefault();
		var cena = parseInt($('#cena').text());
		var kol = parseInt($('.zakaz .cena p label input').val());
		if(kol>0){
			kol = kol-1;
			var summ = cena*kol;
			$('.zakaz .cena p label input').val(kol);
			$('#summ').text(summ);
			
		}
	});
	$('.zakaz .cena p a.plus').click(function(e){
		e.preventDefault();
		var cena = parseInt($('#cena').text());
		var kol = parseInt($('.zakaz .cena p label input').val());
		if(kol<99){
			kol = kol+1;
			var summ = cena*kol;
			$('.zakaz .cena p label input').val(kol);
			$('#summ').text(summ);
		}
	});
	
	// WINDOW
	$('.top .reg .button1').click(function(e) {
		$('#popup').height($('#content').height()).show();
		$('#w_reg').fadeIn(300);
	});
	$('.window .close').click(function(e) {
		$('#popup').fadeOut(300);
		$('#w_reg').hide();
	});
	
	// TABLE STYLE
	$('.text table tbody tr:first').addClass('title');
	$('.text table tbody tr:not(.content table tbody tr:first):odd').addClass('next');

	/////////////////////////
	$("#mail_send").submit(function() {
		var pass='';
		if(!document.getElementById('email').value.match(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/)){
			pass = '1';
		}
		if(pass != ''){
			$('.error').stop().fadeIn(200);
			return false;
		} else {
			$('#mail_send').stop().fadeOut(200);
			$('.good').stop().delay(400).fadeIn(200);
			setTimeout( function(){ 
				return true; 
			}, 1000 );
		}
    });

	$('#email').focus(function(){
		$('.error').stop().fadeOut(200);	
	});
	
});

function send_lp() {
	var email = $('#email_').val();
	
	if (email == 'Введите сюда вашу электронную почту' || email == '') {
	
		$('#error').hide();
		$('#error').text('Введите свой email');
		$('#error').fadeIn();
		
	} else {
		var pass='';
		
		if(!document.getElementById('email_').value.match(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/)){
			pass = '1';
		}
	
		if(pass != ''){
			$('#error').hide();
			$('#error').text('Введенный email не корректен');
			$('#error').fadeIn();			
		} else {
			$.ajax({
			  url: '/user_manager/reg/' + email,
			  success: function(data) {
				if (data != '') {
					
									

					if (data != 'Такой email уже существует.') {
					
						$('#error').hide();
						$('.hidd').fadeOut();
						$('#message').hide();
						$('#message').text(data);
						$('#message').fadeIn();
						
						/*setTimeout( function() {
							$('#popup').fadeOut(600);
							$('#w_reg').hide();
						}, 2000);*/
						
					} else {
						$('#error').hide();
						$('#error').text('Такой email уже существует.');
						$('#error').fadeIn();
					}
				} else {
				
					$('#error').hide();
					$('#error').text('Неизвестная ошибка!');
					$('#error').fadeIn();
				
				}
			  }
			});			
		}
	}
}

	function convert_to_time(secs){
		secs = parseInt(secs);
		hh = secs / 3600;
		hh = parseInt(hh);
		mmt = secs - (hh * 3600);
		mm = mmt / 60;
		mm = parseInt(mm);
		ss = mmt - (mm * 60);
		
		if (hh > 23){
			dd = hh / 24;
			dd = parseInt(dd);
			hh = hh - (dd * 24);
		} else { dd = 0; }
		
		if (ss < 10) { ss = "0"+ss; }
		if (mm < 10) { mm = "0"+mm; }
		if (hh < 10) { hh = "0"+hh; }
		if (dd == 0) { 
			return ("<strong>"+hh+"</strong><font>:</font><strong>"+mm+"</strong><font>:</font><strong>"+ss+"</strong>"); 
		} else {
		
			if (dd > 1) {
				return ("<strong>"+dd+"</strong> <strong>"+hh+"</strong><font>:</font><strong>"+mm+"</strong><font>:</font><strong>"+ss+"</strong>"); 
			} else {
				return ("<strong>"+hh+"</strong><font>:</font><strong>"+mm+"</strong><font>:</font><strong>"+ss+"</strong>");
			}
		}
	}
	// Our function that will do the actual countdown
	function do_cd() {
		if (countdown < 0){
			// redirect web page
			document.location.href = "http://ruseller.com";
		} else {
			document.getElementById('cd').innerHTML = convert_to_time(countdown);
			setTimeout('do_cd()', 1000);
		}
		countdown = countdown - 1;
	}