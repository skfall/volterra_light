<?php
	/*	MIRACLE WEB TECHNOLOGIES	*/
	/*	***************************	*/
	/*	Author: Sivkovich Maxim		*/
	/*	***************************	*/
	/*	Developed: from 2013		*/
	/*	***************************	*/
	
	// Settings class
	
require("BasicHelp.php");
class settingsHelp extends BasicHelp
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
		
		public function getCatalogItemDetails($id)
		{
			$query = "SELECT * FROM [pre]shop_catalog WHERE `id`='$id' LIMIT 1";
			$resultMassive = $this->rs($query);
			
			$result = ($resultMassive ? $resultMassive[0] : array());
			
			if($result)
			{
				$result['parents'] = array();
				$result['childs'] = array();
				$result['charsGroup'] = array();
				
				if($result['parent'] > 0)
				{
					$query = "SELECT id,name,alias FROM [pre]shop_catalog WHERE `id`='".$result['parent']."' LIMIT 1";
					$parentMassive = $this->rs($query);
					
					if($parentMassive) $result['parent'] = $parentMassive[0];
				}
				
				$query = "SELECT id,name,alias FROM [pre]shop_catalog WHERE `parent`='$id' LIMIT 10000";
				$childsMassive = $this->rs($query);
				
				if($childsMassive) $result['childs'] = $childsMassive;
				
				$query = "SELECT M.id, M.name, M.alias 
							FROM [pre]shop_chars_groups as M 
							LEFT JOIN [pre]shop_cat_chars_group_ref as R on M.id = R.group_id
							WHERE R.cat_id = $id
							LIMIT 1";
				$groupMassive = $this->rs($query);
				
				if($groupMassive) $result['charsGroup'] = $groupMassive[0];
			}
			
			return $result;
		}
		
		public function getAllGlobalSettings($params = array())
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
			
			
			$query = "SELECT M.id, M.name, M.alias, M.parent, M.block, M.dateCreate, M.dateModify, 
						(SELECT P.name FROM [pre]shop_catalog as P WHERE P.id = M.parent LIMIT 1) as parent_name 
			 
						FROM [pre]shop_catalog as M
						
						WHERE 1 $filter_and 
						ORDER BY $sort_field $sort_vector 
						LIMIT $start,$limit";
			
			//echo "QUERY: ".$query;
			
			return $this->rs($query);
		}
		
		public function getCountGlobalSettings($params = array())
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
			
			$query = "SELECT COUNT(*)
			 
						FROM [pre]shop_catalog as M
						
						WHERE 1 $filter_and  
						LIMIT 100000";
			$result = $this->rs($query);
			
			return $result[0]['COUNT(*)'];
		}
		
		public function getCatalogParents($params=array())
		{
			$query = "SELECT id,name,alias FROM [pre]shop_catalog WHERE `parent`=0 ORDER BY id LIMIT 10000";
			
			return $this->rs($query);
		}
		
		public function getCharsGroups($params=array())
		{
			$query = "SELECT id,name FROM [pre]shop_chars_groups WHERE 1 ORDER BY id LIMIT 10000";
			
			return $this->rs($query);
		}
		
		// Get site configs
		
		public function getSiteConfigs($id, $lpx="")
		{
			$lpx = ($lpx ? $lpx."_" : "");
			$result = array();
			
			$query = "
				SELECT 
					M.*, ".$lpx."address as address, ".$lpx."copyright as copyright
				FROM [pre]settings AS M 
				WHERE M.id = 1 
				LIMIT 1
			";
			$resultMass = $this->rs($query);
			
			if($resultMass) $result = $resultMass[0];
			
			return $result;
		}
		
		// Get shop settings
		
		public function getShopSettings($id)
		{
			$result = array();
			
			$query = "SELECT * FROM [pre]shop_settings WHERE `id`=1 LIMIT 1";
			$resultMass = $this->rs($query);
			
			if($resultMass) $result = $resultMass[0];
			
			return $result;
		}
		// Get FAQ item
		
		public function getContactCatsItem($id, $lpx)
		{
			$lpx = ($lpx ? $lpx."_" : "");
			$query = "SELECT M.*, M.".$lpx."name as name FROM [pre]contact_categories as M WHERE `id`='$id' LIMIT 1";
			$resultMassive = $this->rs($query);
			
			$result = ($resultMassive ? $resultMassive[0] : array());
			
			return $result;
		}
	
		// Get all articles
		
		public function getContactCats($params=array(),$typeCount=false)
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
			
				$query = "SELECT M.id, M.name, M.block 
			
						FROM [pre]contact_categories as M  
						
						WHERE 1 $filter_and 
						ORDER BY $sort_field $sort_vector 
						LIMIT $start,$limit";
						
				return $this->rs($query);
				
			}else
			{
				$query = "SELECT COUNT(*)  
			
						FROM [pre]contact_categories as M  
						
						WHERE 1 $filter_and 
						
						LIMIT 100000";
						
				$result = $this->rs($query);
				return $result[0]['COUNT(*)'];
			}
		}
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
		///////////////////////////////////////////
		
		// FAQ
		
		///////////////////////////////////////////
		
		// Get FAQ item
		
		public function getTranslationsItem($id, $lpx="")
		{
			$lpx = ($lpx ? $lpx."_" : "");
			$query = "SELECT M.*, M.".$lpx."text as text FROM [pre]static_translations as M WHERE `id`='$id' LIMIT 1";
			$resultMassive = $this->rs($query);
			
			$result = ($resultMassive ? $resultMassive[0] : array());
			
			return $result;
		}
	
		// Get all articles
		
		public function getTranslations($params=array(),$typeCount=false)
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
			
			$sort_field		= (isset($params['filtr']['sort_filtr']) ? $params['filtr']['sort_filtr'] : "M.page");
			
			$sort_vector	= (isset($params['filtr']['order_filtr']) ? $params['filtr']['order_filtr'] : "");
			
			// Order limits
			
			$limit = (isset($_COOKIE['global_on_page']) ? (int)$_COOKIE['global_on_page'] : GLOBAL_ON_PAGE);
			
			if($limit <= 0) $limit = GLOBAL_ON_PAGE;
			
			$start = (isset($params['start']) ? ($params['start']-1)*$limit : 0);
			
			if(!$typeCount)
			{
			
				$query = "SELECT M.* 
			
						FROM [pre]static_translations as M  
						
						WHERE 1 $filter_and 
						ORDER BY $sort_field $sort_vector 
						LIMIT $start,$limit";
						
				return $this->rs($query);
				
			}else
			{
				$query = "SELECT COUNT(*)  
			
						FROM [pre]static_translations as M  
						
						WHERE 1 $filter_and 
						
						LIMIT 100000";
						
				$result = $this->rs($query);
				return $result[0]['COUNT(*)'];
			}
		}
		
    	public function __destruct(){}
}