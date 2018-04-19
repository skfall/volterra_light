<?php 
	//********************
	//** WEB MIRACLE TECHNOLOGIES
	//********************
	
	// get post
	
	$appTable = $_POST['appTable'];
	
	$item_id = (isset($_POST['item_id']) ? $_POST['item_id'] : 0);
	$now = date("Y-m-d H:i:s", time());
	
	$cardUpd = array(
		'name'			=> $_POST['name'],
		'alias'			=> $_POST['alias'],
		'details'			=> $_POST['details'],
		'content'			=> $_POST['content'],
		'pos'			=> (int)$_POST['pos'],
		'lat'			=> (float)str_replace(',', '.', $_POST['lat']),
		'lng'			=> (float)str_replace(',', '.', $_POST['lng']),
		'block'			=> $_POST['block'][0],
		'meta_title'			=> $_POST['meta_title'],
		'meta_keys'			=> $_POST['meta_keys'],
		'meta_desc'			=> $_POST['meta_desc'],
		'capacity'			=> $_POST['capacity'],
		'location'			=> $_POST['location'],
		'area'			=> $_POST['area'],
		'type'			=> $_POST['type'],		
		'created'	=> $now,
		'modified'	=> $now
	);

	$file_path = "../../../../split/files/projects/";
	$im_1_filename = "preview";
	$im_1 		= false;
	$im_1_name 	= 5;
	$im_1_pre 	= "si_";
	
	if(isset($_FILES[$im_1_filename]) && $_FILES[$im_1_filename]['size'] > 0){
		$im_1 		= true;
	}
	if($im_1){
		$file_update = false;
		$file_update = $ah->mtvc_add_files_file(array(
				'path'			=>$file_path,
				'name'			=>$im_1_name,
				'pre'			=>$im_1_pre,
				'size'			=>10,
				'rule'			=>0,
				'max_w'			=>2500,
				'max_h'			=>2500,
				'files'			=>$im_1_filename,
				'resize_path'	=>$file_path."crop/",
				'resize_w'		=>600,
				'resize_h'		=>308,
				'resize_path_2'	=>"0",
				'resize_w_2'	=>0,
				'resize_h_2'	=>0
			  ));
		
		if($file_update){
			$cardUpd[$im_1_filename] = $file_update;
		}
	}

	$im_1_filename = "card_image";
	$im_1 		= false;
	$im_1_name 	= 5;
	$im_1_pre 	= "pci_";
	
	if(isset($_FILES[$im_1_filename]) && $_FILES[$im_1_filename]['size'] > 0){
		$im_1 		= true;
	}
	if($im_1){
		$file_update = false;
		$file_update = $ah->mtvc_add_files_file(array(
				'path'			=>$file_path,
				'name'			=>$im_1_name,
				'pre'			=>$im_1_pre,
				'size'			=>10,
				'rule'			=>0,
				'max_w'			=>2500,
				'max_h'			=>2500,
				'files'			=>$im_1_filename,
				'resize_path'	=>$file_path."crop/",
				'resize_w'		=>600,
				'resize_h'		=>308,
				'resize_path_2'	=>"0",
				'resize_w_2'	=>0,
				'resize_h_2'	=>0
			  ));
		
		if($file_update){
			$cardUpd[$im_1_filename] = $file_update;
		}
	}

	$alias = $_POST['alias'];
	$q = "SELECT id FROM osc_projects WHERE alias = '$alias' LIMIT 1";

	$check_alias = $ah->rs($q);
				
	if(!$check_alias) {
		$query = "INSERT INTO `osc_projects` ";
			$fieldsStr = " ( ";
			$valuesStr = " ( ";
			$cntUpd = 0;
			foreach($cardUpd as $field => $itemUpd) {
				$cntUpd++;
				$fieldsStr .= ($cntUpd==1 ? "`$field`" : ", `$field`");
				$valuesStr .= ($cntUpd==1 ? "'$itemUpd'" : ", '$itemUpd'");
			}
			$fieldsStr .= " ) ";
			$valuesStr .= " ) ";
			$query .= $fieldsStr." VALUES ".$valuesStr;
			$item_id = $ah->rs($query, 0, 1, 1);
			
			if($item_id){
				$data['message'] = "Проект успешно создан. ID: ".$item_id;
				$data['item_id'] = $item_id;
				$data['status'] = "success";
			}
	}else{
		$data['message'] = "Проект с таким алиасом уже существует.";
	}
	