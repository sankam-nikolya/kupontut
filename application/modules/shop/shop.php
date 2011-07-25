<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Shop Controller
 * 
 * @uses ShopController
 * @package Shop
 * @version 0.1
 * @copyright 2010 Siteimage
 * @author <dev@imagecms.net> 
 */
class Shop extends ShopController {

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Display shop main page
     */
    public function index() {
        $this->core->set_meta_tags('Главная');
        
        if ( $this->checkCurrent() ) {
	        
	        $this->render('start_page', array(
	            'hits'=>$this->_getHits(1),
	            'newest'=>$this->_getNew(6),
	        ));
	        
    	} else {
    		
    		echo 'warning error!';
    		
    	}	
    }

    
    /**
     * Get product marked as "Hit"
     *
     * @param int $limit
     * @return array|mixed|PropelObjectCollection
     */
    public function _getHits($limit = 10)
    {
        return  SProductsQuery::create()
                ->orderByCreated('DESC')
                ->filterByHit(true)
                ->filterByActive(true)
                ->filterByCategoryId(37)  // 37 - текущие в минске
                ->limit(6)
                ->find();
    }

    /**
     * Get latest created products
     *
     * @param int $limit
     * @return array|mixed|PropelObjectCollection
     */
    public function _getNew($limit = 10)
    {
        return SProductsQuery::create()
                ->orderByCreated('DESC')
                ->filterByActive(true)
                ->filterByCategoryId(37)  // 37 - текущие в минске
                ->limit(6)
                ->find();
    }
    
    function checkCurrent() {
    
    	$p = SProductsQuery::create()
                ->filterByCategoryId(37)  // 37 - текущие в минске
                ->find();
    	
        foreach ($p AS $k=>$v) {
        	if ($v->created < time()) {
        
				$this->db->where('product_id', $v->id);
				$this->db->delete('shop_product_categories');
				
				$data = array(
					'category_id'	=>	38 ,
					'product_id'	=>	$v->id,
				);
				$this->db->insert('shop_product_categories', $data);
        				
				$data = array('category_id' => 38 ); // переносим в прошедшие
		
				$this->db->where('id', $v->id);
				$this->db->update('shop_products', $data);

        	}
        }   
         //die();
        //echo "<pre>"; print_r($p); echo "</pre>"; die();
    	return true;
    	
	}
}

/* End of file shop.php */
