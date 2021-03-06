<?php
	/*	KLYCHA WEB TECHNOLOGIES	*/
	/*	***************************	*/
	/*	Author: Sivkovich Maxim		*/
	/*	***************************	*/
	/*	Developed: from 2013		*/
	/*	***************************	*/
	
	// Settings class
	
require("BasicHelp.php");
class Volterra extends BasicHelp {
   		public $dbh;
		
		public $table;
		public $id;
		public $item;
		
		public function __construct($dbh) {
			parent::__construct($dbh);
			$this->dbh = $dbh;
		} 


		public function getAllLangs(){
			$q = "
				SELECT * FROM [pre]languages WHERE `used` = 0 LIMIT 1000 
			";
			return $this->rs($q);
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

		public function getHomeFirstSectionItem($id, $lpx) {
			$lpx = ($lpx ? $lpx."_" : "");
			$query = "
				SELECT M.*, ".$lpx."section_caption as section_caption, ".$lpx."section_sub_caption as section_sub_caption, ".$lpx."section_content as section_content 
				FROM [pre]page_home_1 as M 
				WHERE `id`='$id' 
				LIMIT 1
			";
			$resultMassive = $this->rs($query);
			$result = ($resultMassive ? $resultMassive[0] : array());
			return $result;
		}

		public function getHomeFirstSectionItems($params=array(),$typeCount=false) {
			$filter_and = "";
			if(isset($params['filtr']['massive'])) {
				foreach($params['filtr']['massive'] as $f_name => $f_value) {
					if($f_value < 0) continue;
					$filter_and .= " AND ($f_name='$f_value') ";
				}
			}
		
			if(isset($params['filtr']['filtr_search_key']) && isset($params['filtr']['filtr_search_field']) && trim($params['filtr']['filtr_search_key']) != "") {
				$search_field = $params['filtr']['filtr_search_field'];
				$search_key = $params['filtr']['filtr_search_key'];
				$filter_and .= " AND ($search_field LIKE '%$search_key%') ";
			}

			$sort_field		= (isset($params['filtr']['sort_filtr']) ? $params['filtr']['sort_filtr'] : "M.id");
			$sort_vector	= (isset($params['filtr']['order_filtr']) ? $params['filtr']['order_filtr'] : "");
			$limit = (isset($_COOKIE['global_on_page']) ? (int)$_COOKIE['global_on_page'] : GLOBAL_ON_PAGE);
			if($limit <= 0) $limit = GLOBAL_ON_PAGE;
			$start = (isset($params['start']) ? ($params['start']-1)*$limit : 0);
			if(!$typeCount) {
				$query = "SELECT M.* 
						FROM [pre]page_home_1 as M  
						WHERE 1 $filter_and 
						ORDER BY $sort_field $sort_vector 
						LIMIT $start,$limit";
				return $this->rs($query);
				
			}else{
				$query = "SELECT COUNT(*)  
						FROM [pre]page_home_1 as M  
						WHERE 1 $filter_and 
						LIMIT 100000";
						
				$result = $this->rs($query);
				return $result[0]['COUNT(*)'];
			}
		}

		public function getHomeSecondSectionItem($id, $lpx) {
			$lpx = ($lpx ? $lpx."_" : "");
			$query = "
				SELECT M.*, ".$lpx."section_caption as section_caption, ".$lpx."section_sub_caption as section_sub_caption, ".$lpx."section_content as section_content 
				FROM [pre]page_home_2 as M 
				WHERE `id`='$id' 
				LIMIT 1
			";
			$resultMassive = $this->rs($query);
			$result = ($resultMassive ? $resultMassive[0] : array());
			return $result;
		}

		public function getHomeSecondSectionItems($params=array(),$typeCount=false) {
			$filter_and = "";
			if(isset($params['filtr']['massive'])) {
				foreach($params['filtr']['massive'] as $f_name => $f_value) {
					if($f_value < 0) continue;
					$filter_and .= " AND ($f_name='$f_value') ";
				}
			}
		
			if(isset($params['filtr']['filtr_search_key']) && isset($params['filtr']['filtr_search_field']) && trim($params['filtr']['filtr_search_key']) != "") {
				$search_field = $params['filtr']['filtr_search_field'];
				$search_key = $params['filtr']['filtr_search_key'];
				$filter_and .= " AND ($search_field LIKE '%$search_key%') ";
			}

			$sort_field		= (isset($params['filtr']['sort_filtr']) ? $params['filtr']['sort_filtr'] : "M.id");
			$sort_vector	= (isset($params['filtr']['order_filtr']) ? $params['filtr']['order_filtr'] : "");
			$limit = (isset($_COOKIE['global_on_page']) ? (int)$_COOKIE['global_on_page'] : GLOBAL_ON_PAGE);
			if($limit <= 0) $limit = GLOBAL_ON_PAGE;
			$start = (isset($params['start']) ? ($params['start']-1)*$limit : 0);
			if(!$typeCount) {
				$query = "SELECT M.* 
						FROM [pre]page_home_2 as M  
						WHERE 1 $filter_and 
						ORDER BY $sort_field $sort_vector 
						LIMIT $start,$limit";
				return $this->rs($query);
				
			}else{
				$query = "SELECT COUNT(*)  
						FROM [pre]page_home_2 as M  
						WHERE 1 $filter_and 
						LIMIT 100000";
						
				$result = $this->rs($query);
				return $result[0]['COUNT(*)'];
			}
		}

		public function getHomeThirdSection($t, $lpx){
			$lpx = ($lpx ? $lpx."_" : "");
			$q = "
				SELECT M.*, ".$lpx."section_caption as section_caption, ".$lpx."section_sub_caption as section_sub_caption, ".$lpx."section_content as section_content 
				FROM `osc_page_home_3` AS M 
				WHERE M.id = 1 
				LIMIT 1
			";
			$result = $this->rs($q, 1);
			return $result;
		}

		public function getHomeFourthSection($t = "", $lpx){
			$lpx = ($lpx ? $lpx."_" : "");
			$q = "
				SELECT M.*, ".$lpx."section_caption as section_caption, ".$lpx."section_sub_caption as section_sub_caption, ".$lpx."section_content as section_content 
				FROM `osc_page_home_4` AS M 
				WHERE M.id = 1 
				LIMIT 1
			";
			$result = $this->rs($q, 1);
			return $result;
		}

		public function getServiceItem($id, $lpx) 
		{
			$lpx = ($lpx ? $lpx."_" : "");
			$query = "
				SELECT M.*, ".$lpx."name as name, ".$lpx."description as description 
				FROM [pre]services as M 
				WHERE `id`='$id' 
				LIMIT 1
			";
			$resultMassive = $this->rs($query);
			$result = ($resultMassive ? $resultMassive[0] : array());
			return $result;
		}

		public function getServices($params=array(),$typeCount=false) {
			$filter_and = "";
			if(isset($params['filtr']['massive'])) {
				foreach($params['filtr']['massive'] as $f_name => $f_value) {
					if($f_value < 0) continue;
					$filter_and .= " AND ($f_name='$f_value') ";
				}
			}
		
			if(isset($params['filtr']['filtr_search_key']) && isset($params['filtr']['filtr_search_field']) && trim($params['filtr']['filtr_search_key']) != "") {
				$search_field = $params['filtr']['filtr_search_field'];
				$search_key = $params['filtr']['filtr_search_key'];
				$filter_and .= " AND ($search_field LIKE '%$search_key%') ";
			}

			$sort_field		= (isset($params['filtr']['sort_filtr']) ? $params['filtr']['sort_filtr'] : "M.id");
			$sort_vector	= (isset($params['filtr']['order_filtr']) ? $params['filtr']['order_filtr'] : "");
			$limit = (isset($_COOKIE['global_on_page']) ? (int)$_COOKIE['global_on_page'] : GLOBAL_ON_PAGE);
			if($limit <= 0) $limit = GLOBAL_ON_PAGE;
			$start = (isset($params['start']) ? ($params['start']-1)*$limit : 0);
			if(!$typeCount) {
				$query = "SELECT M.* 
						FROM [pre]services as M  
						WHERE 1 $filter_and 
						ORDER BY $sort_field $sort_vector 
						LIMIT $start,$limit";
				return $this->rs($query);
				
			}else{
				$query = "SELECT COUNT(*)  
						FROM [pre]services as M  
						WHERE 1 $filter_and 
						LIMIT 100000";
						
				$result = $this->rs($query);
				return $result[0]['COUNT(*)'];
			}
		}


		public function getProjectTypes(){
			$q = "SELECT M.* FROM osc_projects_types AS M WHERE M.Block = 0";
			return $this->rs($q);
		}

		public function getProjectItem($id, $lpx) {
			$lpx = ($lpx ? $lpx."_" : "");
			$query = "
				SELECT M.*, (SELECT ".$lpx."name FROM osc_projects_types WHERE id = M.type LIMIT 1) AS type, (SELECT id FROM osc_projects_types WHERE id = M.type LIMIT 1) AS type_id  , 
				".$lpx."name as name,   
				".$lpx."details as details,   
				".$lpx."content as content,   
				".$lpx."location as location,   
				".$lpx."area as area,   
				".$lpx."capacity as capacity,   
				".$lpx."meta_title as meta_title,
				".$lpx."meta_keys as meta_keys,   
				".$lpx."meta_desc as meta_desc 
				FROM [pre]projects as M 
				WHERE `id`='$id' 
				LIMIT 1
			";
			$resultMassive = $this->rs($query);
			$result = ($resultMassive ? $resultMassive[0] : array());
			return $result;
		}

		public function getProjects($params=array(),$typeCount=false) {
			$filter_and = "";
			if(isset($params['filtr']['massive'])) {
				foreach($params['filtr']['massive'] as $f_name => $f_value) {
					if($f_value < 0) continue;
					$filter_and .= " AND ($f_name='$f_value') ";
				}
			}
		
			if(isset($params['filtr']['filtr_search_key']) && isset($params['filtr']['filtr_search_field']) && trim($params['filtr']['filtr_search_key']) != "") {
				$search_field = $params['filtr']['filtr_search_field'];
				$search_key = $params['filtr']['filtr_search_key'];
				$filter_and .= " AND ($search_field LIKE '%$search_key%') ";
			}

			$sort_field		= (isset($params['filtr']['sort_filtr']) ? $params['filtr']['sort_filtr'] : "M.id");
			$sort_vector	= (isset($params['filtr']['order_filtr']) ? $params['filtr']['order_filtr'] : "");
			$limit = (isset($_COOKIE['global_on_page']) ? (int)$_COOKIE['global_on_page'] : GLOBAL_ON_PAGE);
			if($limit <= 0) $limit = GLOBAL_ON_PAGE;
			$start = (isset($params['start']) ? ($params['start']-1)*$limit : 0);
			if(!$typeCount) {
				$query = "SELECT M.* ,
						(SELECT name FROM osc_projects_types WHERE id = M.type LIMIT 1) AS type, 
						(SELECT id FROM osc_projects_types WHERE id = M.type LIMIT 1) AS type_id  
						FROM [pre]projects as M  
						WHERE 1 $filter_and 
						ORDER BY $sort_field $sort_vector 
						LIMIT $start,$limit";
				return $this->rs($query);
				
			}else{
				$query = "SELECT COUNT(*)  
						FROM [pre]projects as M  
						WHERE 1 $filter_and 
						LIMIT 100000";
						
				$result = $this->rs($query);
				return $result[0]['COUNT(*)'];
			}
		}

		public function getStagesByProject($project_id, $lpx){
			$lpx = ($lpx ? $lpx."_" : "");
			$q = "
				SELECT M.*, ".$lpx."name as name, ".$lpx."caption as caption, ".$lpx."details as details, ".$lpx."docs_caption as docs_caption, ".$lpx."docs_details as docs_details
				FROM `osc_stages` AS M 
				WHERE M.project_id = '$project_id' 
				ORDER BY M.id DESC
			";
			$stages = $this->rs($q);
			if($stages){
				foreach($stages as &$stage){
					$stage_id = $stage['id'];
					$q = "SELECT M.* FROM `osc_stage_photos` AS M WHERE M.stage_id = '$stage_id'";
					$stage["photos"] = $this->rs($q);
					$q = "SELECT M.* FROM `osc_stage_docs` AS M WHERE M.stage_id = '$stage_id'";
					$stage["docs"] = $this->rs($q);
				}

				return $stages;
			}
			return [];
		}

		public function getCFitem($id) {
			$query = "
				SELECT M.* 
				FROM [pre]contact_form as M 
				WHERE `id`='$id' 
				LIMIT 1
			";
			$resultMassive = $this->rs($query);
			$result = ($resultMassive ? $resultMassive[0] : array());
			return $result;
		}

		public function getCF($params=array(),$typeCount=false) {
			$filter_and = "";
			if(isset($params['filtr']['massive'])) {
				foreach($params['filtr']['massive'] as $f_name => $f_value) {
					if($f_value < 0) continue;
					$filter_and .= " AND ($f_name='$f_value') ";
				}
			}
		
			if(isset($params['filtr']['filtr_search_key']) && isset($params['filtr']['filtr_search_field']) && trim($params['filtr']['filtr_search_key']) != "") {
				$search_field = $params['filtr']['filtr_search_field'];
				$search_key = $params['filtr']['filtr_search_key'];
				$filter_and .= " AND ($search_field LIKE '%$search_key%') ";
			}

			$sort_field		= (isset($params['filtr']['sort_filtr']) ? $params['filtr']['sort_filtr'] : "M.id");
			$sort_vector	= (isset($params['filtr']['order_filtr']) ? $params['filtr']['order_filtr'] : "");
			$limit = (isset($_COOKIE['global_on_page']) ? (int)$_COOKIE['global_on_page'] : GLOBAL_ON_PAGE);
			if($limit <= 0) $limit = GLOBAL_ON_PAGE;
			$start = (isset($params['start']) ? ($params['start']-1)*$limit : 0);
			if(!$typeCount) {
				$query = "SELECT M.* 
						FROM [pre]contact_form as M  
						WHERE 1 $filter_and 
						ORDER BY $sort_field $sort_vector 
						LIMIT $start,$limit";
				return $this->rs($query);
				
			}else{
				$query = "SELECT COUNT(*)  
						FROM [pre]contact_form as M  
						WHERE 1 $filter_and 
						LIMIT 100000";
						
				$result = $this->rs($query);
				return $result[0]['COUNT(*)'];
			}
		}

		public function setSeen($item_id = 0, $table = ""){
			if($item_id > 0 && $table != ""){
				$item_id = (int)$item_id;
				try	{
					$q = "UPDATE $table SET seen = 1 WHERE id = ".$item_id;
					$this->rs($q);
				} catch (Exception $e){
					return "";
				}
			}
		}

		public function getCommentsItem($id) {
			$query = "SELECT M.*, 
				(SELECT U.first_name FROM `osc_users` AS U WHERE U.id = M.user_id LIMIT 1) as first_name,
				(SELECT U.last_name FROM `osc_users` AS U WHERE U.id = M.user_id LIMIT 1) as last_name,
				(SELECT S.project_id FROM `osc_stages` AS S WHERE S.id = M.stage_id LIMIT 1) as p_id,
				(SELECT S.caption FROM `osc_stages` AS S WHERE S.id = M.stage_id LIMIT 1) as stage_caption,
				(SELECT P.name FROM `osc_projects` AS P WHERE P.id = p_id LIMIT 1) as project_name
				FROM [pre]comments as M 
				WHERE `id`='$id' 
				LIMIT 1
			";
			$resultMassive = $this->rs($query);
			$result = ($resultMassive ? $resultMassive[0] : array());
			return $result;
		}

		public function getComments($params=array(),$typeCount=false) {
			$filter_and = "";
			if(isset($params['filtr']['massive'])) {
				foreach($params['filtr']['massive'] as $f_name => $f_value) {
					if($f_value < 0) continue;
					$filter_and .= " AND ($f_name='$f_value') ";
				}
			}
		
			if(isset($params['filtr']['filtr_search_key']) && isset($params['filtr']['filtr_search_field']) && trim($params['filtr']['filtr_search_key']) != "") {
				$search_field = $params['filtr']['filtr_search_field'];
				$search_key = $params['filtr']['filtr_search_key'];
				$filter_and .= " AND ($search_field LIKE '%$search_key%') ";
			}

			$sort_field		= (isset($params['filtr']['sort_filtr']) ? $params['filtr']['sort_filtr'] : "M.id");
			$sort_vector	= (isset($params['filtr']['order_filtr']) ? $params['filtr']['order_filtr'] : "");
			$limit = (isset($_COOKIE['global_on_page']) ? (int)$_COOKIE['global_on_page'] : GLOBAL_ON_PAGE);
			if($limit <= 0) $limit = GLOBAL_ON_PAGE;
			$start = (isset($params['start']) ? ($params['start']-1)*$limit : 0);
			if(!$typeCount) {
				$query = "SELECT M.*, 
						(SELECT U.first_name FROM `osc_users` AS U WHERE U.id = M.user_id LIMIT 1) as first_name,
						(SELECT U.last_name FROM `osc_users` AS U WHERE U.id = M.user_id LIMIT 1) as last_name,
						(SELECT S.project_id FROM `osc_stages` AS S WHERE S.id = M.stage_id LIMIT 1) as p_id,
						(SELECT S.caption FROM `osc_stages` AS S WHERE S.id = M.stage_id LIMIT 1) as stage_caption,
						(SELECT P.name FROM `osc_projects` AS P WHERE P.id = p_id LIMIT 1) as project_name 
						FROM [pre]comments as M  
						WHERE 1 $filter_and 
						ORDER BY $sort_field $sort_vector 
						LIMIT $start,$limit";
				return $this->rs($query);
				
			}else{
				$query = "SELECT COUNT(*)  
						FROM [pre]comments as M  
						WHERE 1 $filter_and 
						LIMIT 100000";
						
				$result = $this->rs($query);
				return $result[0]['COUNT(*)'];
			}
		}

		public function getUsers(){
			$q = "SELECT M.* FROM `osc_users` AS M";
			return $this->rs($q);
		}

		public function getStages(){
			$q = "SELECT M.*, 
			(SELECT P.name FROM `osc_projects` AS P WHERE P.id = M.project_id LIMIT 1) AS project_name 
			FROM `osc_stages` AS M";
			return $this->rs($q);
		}
		
    	public function __destruct(){}
}
