<?php
	/*	KLYCHA WEB TECHNOLOGIES	*/
	/*	***************************	*/
	/*	Author: Sivkovich Maxim		*/
	/*	***************************	*/
	/*	Developed: from 2013		*/
	/*	***************************	*/
	
	// Settings class
	
require("BasicHelp.php");
class allpagesHelp extends BasicHelp
{
   		public $dbh;
		
		public $table;
		public $id;
		public $item;
		
		public function __construct($dbh)
		{
			parent::__construct($dbh);
			$this->dbh = $dbh;
		} 
		
		// Get All Langs
		public function getAllLangs(){
			$q = "
				SELECT * FROM [pre]languages WHERE `used` = 0 LIMIT 1000 
			";
			return $this->rs($q);
		}
		
		// Get Available Langs
		public function getAvailableLangs(){
				$query = "
					SELECT L.name, L.alias, M.block, M.id 
					FROM [pre]site_languages AS M 
					LEFT JOIN [pre]languages AS L ON L.id = M.lang_id 
					WHERE 1 $filter_and AND L.alias != '".DEF_LANG."'
					ORDER BY M.id
					LIMIT 1000
				";

				
				return $this->rs($query);
		}
		
		// Get Page item
		public function getPageItem($tablename, $lpx="", $lang_fields=array())
		{
			$result = ['cardItem'=>[], 'menuInfo'=>[]];
			
			$query = "
				SELECT M.* 
				FROM [pre]menu_pages_ref as R 
				LEFT JOIN [pre]menu AS M ON M.id = R.menu_id 
				WHERE 
					R.table_name='$tablename' 
				LIMIT 1
			";
			$result['menuInfo'] = $this->rs($query,1);
			
			$langFields = "";
			$lang_prefix = ($lpx ? $lpx."_" : "");
			
			foreach($lang_fields as $field)
			{
				$langFields .= ", M.".$lang_prefix.$field." as ".$field." ";
			}
			
			$query = "
				SELECT M.* $langFields  
				FROM `$tablename` as M 
				WHERE 
					`id`='1' 
				LIMIT 1
			";
		
			$result['cardItem'] = $this->rs($query,1);
			
			return $result;
		}
		
		// Get Faq item
		public function getFaqItem($id)
		{
			$query = "SELECT M.* FROM [pre]faq as M WHERE `id`='$id' LIMIT 1";
			$resultMassive = $this->rs($query);
			
			$result = ($resultMassive ? $resultMassive[0] : array());
			
			return $result;
		}
	
		// Get all faq
		public function getFAQ($params=array(),$typeCount=false)
		{
			// Filter params
			
			$filter_and = "";
			
			if(isset($params['filtr']['massive']))
			{
				foreach($params['filtr']['massive'] as $f_name => $f_value)
				{
					if($f_value < 0) continue;
					$filter_and .= " AND ($f_name='$f_value') ";
				}
			}
			
			// Filter like
			
			if(isset($params['filtr']['filtr_search_key']) && isset($params['filtr']['filtr_search_field']) && trim($params['filtr']['filtr_search_key']) != "")
			{
				$search_field = $params['filtr']['filtr_search_field'];
				$search_key = $params['filtr']['filtr_search_key'];
				
				$filter_and .= " AND ($search_field LIKE '%$search_key%') ";
			}
			
			// Filter sort
			
			$sort_field		= (isset($params['filtr']['sort_filtr']) ? $params['filtr']['sort_filtr'] : "M.id");
			
			$sort_vector	= (isset($params['filtr']['order_filtr']) ? $params['filtr']['order_filtr'] : "");
			
			// Order limits
			
			$limit = (isset($_COOKIE['global_on_page']) ? (int)$_COOKIE['global_on_page'] : GLOBAL_ON_PAGE);
			
			if($limit <= 0) $limit = GLOBAL_ON_PAGE;
			
			$start = (isset($params['start']) ? ($params['start']-1)*$limit : 0);
			
			if(!$typeCount)
			{
			
				$query = "SELECT M.id, M.question, M.answer, M.block, M.order_id, M.dateCreate 
			
						FROM [pre]faq as M  
						
						WHERE 1 $filter_and 
						ORDER BY $sort_field $sort_vector 
						LIMIT $start,$limit";
						
				return $this->rs($query);
				
			}else
			{
				$query = "SELECT COUNT(*)  
			
						FROM [pre]faq as M  
						
						WHERE 1 $filter_and 
						
						LIMIT 100000";
						
				$result = $this->rs($query);
				return $result[0]['COUNT(*)'];
			}
		}
		// Get Home Why Us item
		public function getNewsItem($id)
		{
			$query = "
				SELECT 
					M.* 
				FROM [pre]page_news_items as M 
				WHERE `id`='$id' 
				LIMIT 1
			";
			$resultMassive = $this->rs($query);
			
			$result = ($resultMassive ? $resultMassive[0] : array());
			$q = "
				SELECT M.id, M.file, M.order_pos, M.cateCreate
				FROM `osc_page_news_files` AS M 
				WHERE 
					M.block = 0 AND
					M.ref = '$id'
				LIMIT 1000
			";
			$news_item_gal = $this->rs($q);
			$result['gallery'] = ($news_item_gal ? $news_item_gal : array());
			
			return $result;
		}
	
		// Get all Home Why Us Items
		public function getNewsItems($params=array(),$typeCount=false)
		{
			// Filter params
			
			$filter_and = "";
			
			if(isset($params['filtr']['massive']))
			{
				foreach($params['filtr']['massive'] as $f_name => $f_value)
				{
					if($f_value < 0) continue;
					$filter_and .= " AND ($f_name='$f_value') ";
				}
			}
			
			// Filter like
			
			if(isset($params['filtr']['filtr_search_key']) && isset($params['filtr']['filtr_search_field']) && trim($params['filtr']['filtr_search_key']) != "")
			{
				$search_field = $params['filtr']['filtr_search_field'];
				$search_key = $params['filtr']['filtr_search_key'];
				
				$filter_and .= " AND ($search_field LIKE '%$search_key%') ";
			}
			
			// Filter sort
			
			$sort_field		= (isset($params['filtr']['sort_filtr']) ? $params['filtr']['sort_filtr'] : "M.id");
			
			$sort_vector	= (isset($params['filtr']['order_filtr']) ? $params['filtr']['order_filtr'] : "");
			
			// Order limits
			
			$limit = (isset($_COOKIE['global_on_page']) ? (int)$_COOKIE['global_on_page'] : GLOBAL_ON_PAGE);
			
			if($limit <= 0) $limit = GLOBAL_ON_PAGE;
			
			$start = (isset($params['start']) ? ($params['start']-1)*$limit : 0);
			
			if(!$typeCount)
			{
			
				$query = "SELECT M.*
			
						FROM [pre]page_news_items as M  
						
						WHERE 1 $filter_and 
						ORDER BY $sort_field $sort_vector 
						LIMIT $start,$limit";
						
				return $this->rs($query);
				
			}else
			{
				$query = "SELECT COUNT(*)  
			
						FROM [pre]page_news_items as M  
						
						WHERE 1 $filter_and 
						
						LIMIT 100000";
						
				$result = $this->rs($query);
				return $result[0]['COUNT(*)'];
			}
		}
		
		public function getDocs($house_id){
			$q = "SELECT M.* FROM `osc_docs_files` AS M WHERE M.house_id = '$house_id' LIMIT 200";
			return $this->rs($q);
		}
		public function getBuildingItems(){
			$q = "SELECT M.* FROM `osc_page_building_items` AS M LIMIT 1000";
			return $this->rs($q);
		}
		public function getFlatsGal($ref_id){
			$q = "SELECT M.* FROM `osc_page_flats_gallery` AS M WHERE M.ref_id = '$ref_id' LIMIT 200";
			return $this->rs($q);
		}
		public function getAboutProjectsItems(){
			$q = "SELECT M.* FROM `osc_page_about_items` AS M LIMIT 1000";
			return $this->rs($q);
		}
		
		// Get Home Why Us item
		public function getProgramItem($id)
		{
			$query = "
				SELECT 
					M.* 
				FROM [pre]page_program_items as M 
				WHERE `id`='$id' 
				LIMIT 1
			";
			$resultMassive = $this->rs($query);
			
			$result = ($resultMassive ? $resultMassive[0] : array());
						
			return $result;
		}
	
		// Get all Home Why Us Items
		public function getProgramItems($params=array(),$typeCount=false)
		{
			// Filter params
			
			$filter_and = "";
			
			if(isset($params['filtr']['massive']))
			{
				foreach($params['filtr']['massive'] as $f_name => $f_value)
				{
					if($f_value < 0) continue;
					$filter_and .= " AND ($f_name='$f_value') ";
				}
			}
			
			// Filter like
			
			if(isset($params['filtr']['filtr_search_key']) && isset($params['filtr']['filtr_search_field']) && trim($params['filtr']['filtr_search_key']) != "")
			{
				$search_field = $params['filtr']['filtr_search_field'];
				$search_key = $params['filtr']['filtr_search_key'];
				
				$filter_and .= " AND ($search_field LIKE '%$search_key%') ";
			}
			
			// Filter sort
			
			$sort_field		= (isset($params['filtr']['sort_filtr']) ? $params['filtr']['sort_filtr'] : "M.id");
			
			$sort_vector	= (isset($params['filtr']['order_filtr']) ? $params['filtr']['order_filtr'] : "");
			
			// Order limits
			
			$limit = (isset($_COOKIE['global_on_page']) ? (int)$_COOKIE['global_on_page'] : GLOBAL_ON_PAGE);
			
			if($limit <= 0) $limit = GLOBAL_ON_PAGE;
			
			$start = (isset($params['start']) ? ($params['start']-1)*$limit : 0);
			
			if(!$typeCount)
			{
			
				$query = "SELECT M.*
			
						FROM [pre]page_program_items as M  
						
						WHERE 1 $filter_and 
						ORDER BY $sort_field $sort_vector 
						LIMIT $start,$limit";
						
				return $this->rs($query);
				
			}else
			{
				$query = "SELECT COUNT(*)  
			
						FROM [pre]page_program_items as M  
						
						WHERE 1 $filter_and 
						
						LIMIT 100000";
						
				$result = $this->rs($query);
				return $result[0]['COUNT(*)'];
			}
		}

		public function getFreeFlatsLayouts($ids = ""){
			$ids_array = explode(',', $ids);
			$q_row = "";
			if ($ids_array) {
				foreach ($ids_array as $i => $id) {
					$q_row .= " AND M.id != '$id' ";
				}		
			}
			$q = "
				SELECT 
					M.*,
                	(SELECT `name` FROM `osc_sys_flats_rooms` WHERE `id` = M.room_id LIMIT 1) AS room_name,
                	(SELECT `name` FROM `osc_sys_houses` WHERE `id` = M.house_id LIMIT 1) AS house_name 
            	FROM `osc_sys_flats_area` AS M 
            	WHERE 
            		M.block = 0 $q_row
            	LIMIT 1000";
    		return $this->rs($q);
			
		}

		public function getUsedFlatsLayouts($ids = ""){
			$ids_array = explode(',', $ids);
			$q_row = "";
			if ($ids_array) {
				foreach ($ids_array as $i => $id) {
					$c = ($i == 0 ? " AND " : " OR ");
					$q_row .= " $c M.id = '$id' ";
				}		
			}
			$q = "
				SELECT 
					M.*,
                	(SELECT `name` FROM `osc_sys_flats_rooms` WHERE `id` = M.room_id LIMIT 1) AS room_name,
                	(SELECT `name` FROM `osc_sys_houses` WHERE `id` = M.house_id LIMIT 1) AS house_name 
            	FROM `osc_sys_flats_area` AS M 
            	WHERE 
            		M.block = 0 $q_row
            	LIMIT 1000";

    		return $this->rs($q);
		}

    	public function __destruct(){}
}
