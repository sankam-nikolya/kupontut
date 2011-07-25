<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Image CMS
 */

class User_manager extends MY_Controller {

	public $min_username = 4;
	public $max_username = 20;
	public $min_password = 4;
	public $max_password = 20;
	
	function __construct()
	{
		parent::__construct();
		
		$this->load->module('core');
	}


	function index_profile($id = 0) {
		
       	 $this->load->model('dx_auth/user_profile', 'user_profile');
		 $this->load->model('dx_auth/users', 'users');
		// Load settings
        if (($this->settings = $this->cache->fetch('main_site_settings')) === FALSE) {
            $this->settings = $this->cms_base->get_settings();
            $this->cache->store('main_site_settings', $this->settings);
        }
        
        // Set site main template
        $this->config->set_item('template', $this->settings['site_template']);

        // Load Template library
        ($hook = get_hook('core_load_template_engine')) ? eval($hook) : NULL;

        $this->load->library('template');
        
        $this->load->library('DX_Auth');
        
        if ($id == 0) {
	        $user = array();
	        
	        if ($this->dx_auth->is_logged_in() == TRUE) {
	            ($hook = get_hook('core_user_is_logged_in')) ? eval($hook) : NULL;
	
	            $this->tpl_data['is_logged_in'] = TRUE;
	            $this->tpl_data['username'] = $this->dx_auth->get_username();
		        $user_id = $this->dx_auth->get_user_id();
				$user = $this->users->get_user_by_id($user_id);
	            // $this->tpl_data['user_data'] = $user->result_array();
	           	
	            
	            //print_r( $this->tpl_data['username']);
	        }
	        
	        //echo "<pre>"; print_r( $user->result_array() ); echo "-"; die();
			 
	        $this->template->add_array(array(
	            'login'      => $this->tpl_data['username'],
	            'user_data'  => $user->result_array(),
	            'album_link' => 3, 
	            'album_url'  => 4,
	            'title' 		=> 'Профиль пользователя', 
	            'current_category' => 5,));
	       // $this->core->set_meta_tags(array($album['name'])); 
	
			$user_data = $this->users->get_user_by_id($user_id)->result_array();
			
			$this->template->add_array(array(
	            'login'      => $this->tpl_data['username'],
	            'messages'	 => $messages,
	            'status' => $user_data[0]['status'],
	            'last_name' => $user_data[0]['last_name'],
	            'first_name' => $user_data[0]['first_name'],
	            'city' => $user_data[0]['city'],
	            'about' => $user_data[0]['about'],
	            'sex' => $user_data[0]['sex'],
	            'phone' => $user_data[0]['phone'],
	            'age' => $user_data[0]['age'],
	            'ava' => $user_data[0]['ava'],
	            'hobbies' => $user_data[0]['hobbies'],
				'site_title' 		=> 'Личный кабинет | Профиль пользователя', 
				'title' 		=> 'Профиль пользователя', 
			));
	       
	        $this->display_tpl('user_profile');
	        
        } else {
        	
        	$user = array();
        	$user = $this->users->get_user_by_id($id);
	        $this->template->add_array(array(
	            'login'      		=> $this->tpl_data['username'],
	            'user_data'  		=> $user->result_array(),
	            'album_link' 		=> 3,
	            'title' 	 		=> 'Профиль пользователя', 
	            'album_url'  		=> 4,
	            'current_category' 	=> 5,));
	            
			$user_data = $this->users->get_user_by_id($id)->result_array();
			
			$this->template->add_array(array(
	            'login'      => $this->tpl_data['username'],
	            'messages'	 => $messages,
	            'status' => $user_data[0]['status'],
	            'last_name' => $user_data[0]['last_name'],
	            'first_name' => $user_data[0]['first_name'],
	            'city' => $user_data[0]['city'],
	            'about' => $user_data[0]['about'],
	            'sex' => $user_data[0]['sex'],
	            'phone' => $user_data[0]['phone'],
	            'age' => $user_data[0]['age'],
	            'ava' => $user_data[0]['ava'],
	            'hobbies' => $user_data[0]['hobbies'],
				'site_title' 		=> 'Личный кабинет | Профиль пользователя', 
				'title' 		=> 'Профиль пользователя', 
			));
	            

	          $this->display_tpl('user_profile');     	
        }
	}
	
	
	function reg($email = ''){
        $this->load->library('template');
        
        $this->load->library('DX_Auth');
		
		if ($email != '') {
			
			if ($this->email_check($email)) {
				
				if ( $this->email_check($email) != 1 )  {

					echo $this->email_check($email);
				} else {
					
					
					
					$pass = '12345678';
					$login = $email;
					if ( $this->dx_auth->register($login, $pass, $login) ) {
						//$this->_email($email, $from, $subject, $message);
						if ( $this->_email('marchukilya@gmail.com', 'mi@nineseven.ru', 'тема', 'message') ) {
							
							echo 'успешно';
							
						} else {
							
							echo 'не успешно';
							
						}
					}					
				}
				
			} else {
			
				echo '-'.$email.'-';
			
			}
			/*
			check email
			
			gen pass
			get login
			
			reg user 
			
			if (send email with login pass)
				return 'проверьте своя ящик' 
			else 
				такой email уже есть
			else 
				ошибка  регистрации, сообщите администрации
			*/
		}
	}
	
	function email_check($email)	{
		($hook = get_hook('auth_email_check')) ? eval($hook) : NULL;

		$result = $this->dx_auth->is_email_available($email);
		if ( ! $result)
			$result = "Такой email уже существует.";
			
		return $result;
	}
	
	
	function developers () {
		$member = $this->authOpenAPIMember();
		
		if($member !== FALSE) {
		   echo 'Пользователь авторизирован в Open API<br />';
		  /* Пользователь авторизирован в Open API */
		} else {
		  echo 'Пользователь не авторизирован в Open API<br />';
		  /* Пользователь не авторизирован в Open API */
		}
		
		echo "<pre>"; print_r($_SESSION);echo "</pre>";
		echo "<pre>"; print_r($_COOKIE);echo "</pre>";
		echo "<pre>"; print_r($this->input->get('first_name'));echo "</pre>";
		
		echo "<pre>"; print_r($this->input->get('last_name'));echo "</pre>";
		echo "<pre>"; print_r($this->input->get('uid'));echo "</pre>";
		echo "<pre>"; print_r($this->input->get('photo'));echo "</pre>";
		echo "<pre>"; print_r($this->input->get('photo_rec'));
		echo "<pre>"; print_r($this->input->get('hash'));echo "</pre>";
		
		
	}

	function authOpenAPIMember() {
	  $session = array();
	  $member = FALSE;
	  $valid_keys = array('expire', 'mid', 'secret', 'sid', 'sig');
	  $app_cookie = $_COOKIE['vk_app_2416003'];
	  if ($app_cookie) {
	    $session_data = explode ('&', $app_cookie, 10);
	    foreach ($session_data as $pair) {
	      list($key, $value) = explode('=', $pair, 2);
	      if (empty($key) || empty($value) || !in_array($key, $valid_keys)) {
	        continue;
	      }
	      $session[$key] = $value;
	    }
	    foreach ($valid_keys as $key) {
	      if (!isset($session[$key])) return $member;
	    }
	    ksort($session);
	
	    $sign = '';
	    foreach ($session as $key => $value) {
	      if ($key != 'sig') {
	        $sign .= ($key.'='.$value);
	      }
	    }
	    $sign .= APP_SHARED_SECRET;
	    $sign = md5($sign);
	    if ($session['sig'] == $sign && $session['expire'] > time()) {
	      $member = array(
	        'id' => intval($session['mid']),
	        'secret' => $session['secret'],
	        'sid' => $session['sid']
	      );
	    }
	  }
	  return $member;
	}
	
	function _email($to, $from, $subject, $message)	{
	    $config['charset'] = 'UTF-8';
        $config['wordwrap'] = FALSE;

        $this->load->library('email');
        $this->email->initialize($config);

        $this->email->from($from, 'name');
        $this->email->to($to); 

        $this->email->subject($subject);
        $this->email->message($message);	

        return $this->email->send();
	}
	
	function save_photo_my ($upload_data, $width = 0, $height = 0, $path = './uploads/', $path_to_thumbs = './uploads/') {

		$yy = 0; // пока не используеться
	
		$data_img = $upload_data;
		
		$final_width_of_image = $width?$width:144;
		$final_height_of_image = $height?$height:94;
			
		$path_to_image_directory = $path;
		$path_to_thumbs_directory = $path_to_thumbs;
		 
		if(preg_match('/[.](jpg)$/', $data_img['file_name'])) {
			$im = imagecreatefromjpeg($path_to_image_directory . $data_img['file_name']);			
		} else if (preg_match('/[.](gif)$/', $data_img['file_name'])) {
			$im = imagecreatefromgif($path_to_image_directory . $data_img['file_name']);
		} else if (preg_match('/[.](png)$/', $data_img['file_name'])) {
			$im = imagecreatefrompng($path_to_image_directory . $data_img['file_name']);
		} else {
			$im = imagecreatefromjpeg($path_to_image_directory . $data_img['file_name']);	
		}
		
		$ox = imagesx($im); // размеры оригинала
		$oy = imagesy($im);
		
		$nx = $final_width_of_image;
		$ny = $final_height_of_image;
		
		$nm = imagecreatetruecolor($nx, $ny);
	
		imagecopyresampled($nm, $im ,0 ,0 ,0 ,$yy ,$nx ,$ny ,$ox ,$oy );
	  
		imagejpeg($nm, $path_to_thumbs_directory . $data_img['file_name']);
		
		$save_photo_inf['msg'] = 'Изображене ' . $data_img['file_name'] . ' успешно сохранено.';
		$save_photo_inf['file_name'] = $data_img['file_name'];
		return $save_photo_inf;
	}
	
	function index() {		
		// Load Model
		//$this->load->model('dx_auth/users', 'users');
		$this->load->model('dx_auth/users', 'users');
		$this->load->model('dx_auth/user_profile', 'user_profile');
		// Load Helper
		$this->load->helper('url');
		$this->load->library('Form_validation');
		$val = $this->form_validation;
		
		$username = $this->dx_auth->get_username();
		if ($query = $this->users->get_login($username) AND $query->num_rows() == 1)
			$row = $query->row();
				
		/*if ($this->input->post('go')) {
			echo '<pre>'; print_r($_POST);echo '</pre>'; die();
		}*/
			
		$this->tpl_data['is_logged_in'] = TRUE;
        $this->tpl_data['username'] = $username;
        $user_id = $this->dx_auth->get_user_id();	
        	
		if ( $this->input->post('old_password') && $this->input->post('new_password') &&  $this->input->post('confirm_new_password') ) {
			$val->set_rules('old_password', lang('lang_old_password'), 'trim|required|xss_clean|min_length['.$this->min_password.']|max_length['.$this->max_password.']');
			$val->set_rules('new_password', lang('lang_new_password'), 'trim|required|xss_clean|min_length['.$this->min_password.']|max_length['.$this->max_password.']|matches[confirm_new_password]');
			$val->set_rules('confirm_new_password', 'Проверка нового пароля', 'trim|required|xss_clean');
			if ($val->run() ) {
				
				//echo $row->password; die();
				$pass = $this->dx_auth->_encode($this->input->post('old_password'));
				
				if (crypt($pass, $row->password) === $row->password) {
				
					$change = $this->dx_auth->change_password($this->input->post('old_password'),$this->input->post('new_password') );
					if ( $change ) {
						$messages = "<span>Вы успешно сменили пароль.</span>";
					}
					
				} else {
						
					$messages .= '<p>Старый пароль не верен.</p>';
				
				}
				
			}
		}
		$val->set_rules('username', lang('lang_login'), 'trim|xss_clean|min_length['.$this->min_username.']|max_length['.$this->max_username.']|alpha_dash');
		$val->set_rules('first_name', 'Имя', 'trim|xss_clean');
		$val->set_rules('last_name', 'Фамилия', 'trim|xss_clean');
		$val->set_rules('phone', 'Телефон', 'trim|xss_clean');
		$val->set_rules('day', 'День Рождения', 'integer|trim|xss_clean');
		$val->set_rules('month', 'Месяц Рождения', 'integer|trim|xss_clean');
		$val->set_rules('year', 'Год Рождения', 'integer|trim|xss_clean');
		$val->set_rules('sex', 'Пол', 'trim|xss_clean|max_length[1]');
		$val->set_rules('city', 'Город', 'trim|xss_clean');
		$val->set_rules('about', 'О себе', 'trim|xss_clean');
		$val->set_rules('status', 'Статус', 'trim|xss_clean');
		$val->set_rules('newsletter', '  Получать рассылку ', 'trim|xss_clean|max_length[1]');
		$val->set_rules('notifications', 'Получать уведомления ', 'trim|xss_clean|max_length[1]');
		$val->set_rules('hobbies', 'Любимый спорт', 'trim|xss_clean');
		

		
		//echo "<pre>"; print_r($_POST); die();
		if ($val->run() ) {
			if ( $this->input->post('go')) {
				$update_data = array(
					'status' => $this->input->post('status'),
				    /*'old_password' =>  $this->input->post('old_password'),
				    'new_password' =>  $this->input->post('new_password'),
				    'confirm_new_password' => $this->input->post('confirm_new_password'),*/
				    'first_name' => $this->input->post('first_name'),
				    'last_name' =>  $this->input->post('last_name'),
				    'phone' =>  $this->input->post('phone'),
				   // 'age' =>  $this->input->post('age'),
				    'age' =>  mktime(0, 0, 0, $this->input->post('month'), $this->input->post('day'), $this->input->post('year') ),
				    'sex' =>  $this->input->post('sex'),
				    'city' =>  $this->input->post('city'),
				    'about' => $this->input->post('about'),
				    'hobbies' => $this->input->post('hobbies'),
				    'notifications' => $this->input->post('notifications'),
				    'newsletter' => $this->input->post('newsletter'),
				);
				if ( $this->username_check($this->input->post('username')) ) {
					$update_data['username'] =  $this->input->post('username');
				} else {
					$message .= 'логин есть такой уже';
				}
				/*
				$config['upload_path'] = './uploads/';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size']	= '2000';
				$config['max_width']  = '1024';
				$config['max_height']  = '768';
				
				$field_name = "ava";
				$this->load->library('upload', $config);
		
				if ( ! $this->upload->do_upload($field_name)) {
					
					$messages .= $this->upload->display_errors();
					
				} else {
					
					$ava = $this->save_photo_my($this->upload->data(), 140, 140);
					$update_data['ava'] = $ava['file_name'];
					
				}*/
				
				if ( $this->users->set_user( $user_id, $update_data) ) {
					$messages .= '<span>Сохраненно</span>';
				}
			}
			
		} else {
			
			$messages = validation_errors();
		
		}
		
		
		$user_data = $this->users->get_user_by_id($user_id)->result_array();
		
		//echo "<pre>"; print_r($user_data[0]); die();
		
		$this->template->add_array(array(
            'login'      => $this->tpl_data['username'],
            'messages'	 => $messages,
            'username'	 => $user_data[0]['username'],
            'email'	 => $user_data[0]['email'],
            'status' => $user_data[0]['status'],
            'last_name' => $user_data[0]['last_name'],
            'first_name' => $user_data[0]['first_name'],
            'city' => $user_data[0]['city'],
            'about' => $user_data[0]['about'],
            'sex' => $user_data[0]['sex'],
            'phone' => $user_data[0]['phone'],
            'age' => $user_data[0]['age'],
            'ava' => $user_data[0]['ava'],
            'hobbies' => $user_data[0]['hobbies'],
            'notifications' => $user_data[0]['notifications'],
            'newsletter' => $user_data[0]['newsletter'],
			'site_title' 		=> 'Личный кабинет | Редактирование профиля', 
			'title' 		=> 'Редактирование профиля', 
		));
		
		$this->display_tpl('user_profile_edit'); 
		
	}
	
	function kupon() {
		
		$this->load->model('dx_auth/user_profile', 'user_profile');
		$this->load->model('dx_auth/users', 'users');
        $this->load->library('template');
        
        $this->load->library('DX_Auth');

    
        if ($this->dx_auth->is_logged_in() == TRUE) {
            ($hook = get_hook('core_user_is_logged_in')) ? eval($hook) : NULL;

            $this->tpl_data['is_logged_in'] = TRUE;
            $this->tpl_data['username'] = $this->dx_auth->get_username();
	        $user_id = $this->dx_auth->get_user_id();
		        	
			$username = $this->dx_auth->get_username();
			
			$query = $this->db->get_where('my_coupons', array('user_id' => $user_id));
			foreach ($query->result_array() as $row) {
			    $my_coupons[] = $row['product_id'];
			}
			
			$active = SProductsQuery::create()
	                ->filterByActive(true)
	                ->filterById($my_coupons)
	                ->filterByCategoryId(37)  // 37 - текущие в минске
	                ->limit(count($my_coupons))
	                ->find();
	        $count_active = count($active);
			
	        if ( $this->uri->segment(3) ==  'completed') {
	 			$p = SProductsQuery::create()
	                ->filterByActive(true)
	                ->filterById($my_coupons)
	                ->filterByCategoryId(38)  // 37 - текущие в минске
	                ->limit(count($my_coupons))
	                ->find();       	
	        	$site_title = 'Личный кабинет | Мои купоны | Завершенные';
	        } elseif ($this->uri->segment(3) ==  'all') {
	 			$p = SProductsQuery::create()
	                ->filterByActive(true)
	                ->filterById($my_coupons)
	                ->find();       	
	        	$site_title = 'Личный кабинет | Мои купоны | Все';	        	
	        
        	} else {
	        	$type = 'active'; // текущие
	 			$p = $active;
	             $site_title = 'Личный кабинет | Мои купоны | Активные';
	        }
               
                
            /*echo "<pre>current\r\n"; print_r($current);echo "</pre>";    
            echo "<pre>post\r\n"; print_r($past);echo "</pre>"; die();    */

			$this->template->add_array(array(
				'site_title' 		=> $site_title, 
				'title' 			=> 'Мои купоны', 
				'products'			=>	$p,
				'totalProducts'		=>	count($p),
				'count_active'		=>	$count_active,
			));
			
			$this->display_tpl('user_kupon');
        } else {
        	
        }
	}
	
	
	function account() {
		$username = $this->dx_auth->get_username();
		
		
		$this->template->add_array(array(
			'site_title' 		=> 'Личный кабинет | Лицевой счет', 
			'title' 		=> 'Лицевой счет', 
		));
		
		$this->display_tpl('user_account'); 
	}
	
	function username_check($username) {
        ($hook = get_hook('auth_username_check')) ? eval($hook) : NULL;

		$result = $this->dx_auth->is_username_available($username);
		
		if ( ! $result)
			$this->form_validation->set_message('username_check', lang('lang_login_exists'));

		return $result;
	}
    /**
     * Display template file
     */ 
	private function display_tpl($file = '') {

        $this->template->add_array(array(
                'content' => $this->fetch_tpl($file),
            ));
            
        if (file_exists(realpath(dirname(__FILE__)).'/templates/public/main.tpl')) {
            $file = realpath(dirname(__FILE__)).'/templates/public/main.tpl';  
		    $this->template->display('file:' . $file);
        } else {
            // Use main site template
            $this->template->show('profile');
            exit;
        }
	}
	
    /**
     * Fetch template file
     */ 
	private function fetch_tpl($file = '') {
        $file =  realpath(dirname(__FILE__)).'/templates/public/'.$file.'.tpl';  
		return $this->template->fetch('file:'.$file);
	}
}
/* End of file */