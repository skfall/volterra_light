<?php 
	//********************
	//** WEB MIRACLE TECHNOLOGIES
	//********************
	
	// get post
	
	$appTable = $_POST['appTable'];
	
	$item_id = $_POST['item_id'];

	$lpx = $_POST['lpx'];
	$lang_prefix = ($lpx ? $lpx."_" : ""); // empty = iw
	$now = date("Y-m-d H:i:s", time());
	
	$cardUpd = array(
						$lang_prefix.'name'			=> $_POST['name'],
						$lang_prefix.'description'			=> $_POST['description'],
						'pos'			=> (int)$_POST['pos'],
						'block'			=> $_POST['block'][0],
						'modified'	=> $now
					);

	if(!$lpx) $cardUpd['alias'] = $_POST['alias'];
					

	$file_path = "../../../../split/files/services/";
	$im_1_filename = "icon";
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
				'files'			=>$im_1_filename
			  ));
		
		if($file_update){
			$cardUpd[$im_1_filename] = $file_update;
		}
	}
	$alias = $_POST['alias'];
	$q = "SELECT id FROM osc_services WHERE id != '$item_id' && alias = '$alias' LIMIT 1";

	$check_alias = $ah->rs($q);
	if (!$check_alias) {
		$query = "UPDATE `osc_services` SET ";
				
		$cntUpd = 0;
		foreach($cardUpd as $field => $itemUpd) {
			$cntUpd++;
			$query .= ($cntUpd==1 ? "`$field`='$itemUpd'" : ", `$field`='$itemUpd'");
		}
		
		$query .= " WHERE `id`=$item_id LIMIT 1";
		$ah->rs($query);
					
		$data['message'] = "Сервис успешно сохранен.";
	}else{
		$data['message'] = "Сервис с таким алиасом уже существует.";
	}
	
	
	
	