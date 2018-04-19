<?php 
	// Start header content

	$headParams = array( 'parent'=>$parent, 'alias'=>$alias, 'id'=>$id, 'item_id'=>$item_id, 'appTable'=>$appTable );
	
	$data['headContent'] = $zh->getCardEditHeader($headParams);
	
	// Start body content
	
	$cardItem = $zh->getProjectItem($item_id);

	$projectTypes = $zh->getProjectTypes();
	$empty_type = array(
		"id" => 0,
		"name" => 'No type',
		"block" => 0,
		"icon" => ""
	);
	array_push($projectTypes, $empty_type);

	$rootPath = ROOT_PATH;
	
	$cardTmp = array(
					 'Название'				=>	array( 'type'=>'input', 		'field'=>'name', 		'params'=>array( 'size'=>50, 'hold'=>'Название', 'onchange' => 'change_alias();' ) ),
					 'Алиас'				=>	array( 'type'=>'input', 		'field'=>'alias', 		'params'=>array( 'size'=>50, 'hold'=>'Алиас' ) ),
					 'clear-1'				=>	array( 'type'=>'clear' ),
					 'Описание'				=>	array( 'type'=>'area', 		'field'=>'details', 		'params'=>array( 'size'=>100, 'hold'=>'Описание' ) ),
					 'clear-2'				=>	array( 'type'=>'clear' ),
					 'Позиция'				=>	array( 'type'=>'number', 		'field'=>'pos', 		'params'=>array( 'size'=>50, 'hold'=>'Позиция' ) ),
					 'Публикация'			=>	array( 'type'=>'block', 	'field'=>'block', 			'params'=>array( 'reverse'=>true ) ),
					 'clear-3'				=>	array( 'type'=>'clear' ),
					 'Местоположение'				=>	array( 'type'=>'input', 		'field'=>'location', 		'params'=>array( 'size'=>50, 'hold'=>'Местоположение' ) ),
					 'Площадь'				=>	array( 'type'=>'input', 		'field'=>'area', 		'params'=>array( 'size'=>50, 'hold'=>'Площадь' ) ),
					 'Мощность'				=>	array( 'type'=>'input', 		'field'=>'capacity', 		'params'=>array( 'size'=>50, 'hold'=>'Мощность' ) ),
					 'Тип'					=>	array( 'type'=>'select', 		'field'=>'type', 			'params'=>array( 'list'=>$projectTypes, 
					 																									 'fieldValue'=>'id', 
																														 'fieldTitle'=>'name', 
																														 'currValue'=>$cardItem['type_id'], 
																														 'onChange'=>"" 
																														 ) ),
					 
					 'clear-4'				=>	array( 'type'=>'clear' ),
					 'Lat'					=>	array( 'type'=>'input', 		'field'=>'lat', 		'params'=>array( 'size'=>50, 'hold'=>'Lat' ) ),
					 'Lng'					=>	array( 'type'=>'input', 		'field'=>'lng', 		'params'=>array( 'size'=>50, 'hold'=>'Lng' ) ),
					 'clear-5'				=>	array( 'type'=>'clear' ),

					 'Контент'				=>	array( 'type'=>'summernote', 		'field'=>'content', 		'params'=>array( 'size'=>100, 'hold'=>'Контент' ) ),
					 'clear-6'				=>	array( 'type'=>'clear' ),

					 'Изображение превью'			=>	array( 'type'=>'image_mono','field'=>'preview', 		'params'=>array( 'path'=>RSF."/split/files/projects/", 'appTable'=>$appTable, 'id'=>$item_id ) ),
					 'Изображение карточки'			=>	array( 'type'=>'image_mono','field'=>'card_image', 		'params'=>array( 'path'=>RSF."/split/files/projects/", 'appTable'=>$appTable, 'id'=>$item_id ) ),

					 'Meta data'	=>	array( 'type'=>'header'),
					 'Meta title'				=>	array( 'type'=>'input', 		'field'=>'meta_title', 		'params'=>array( 'size'=>50, 'hold'=>'Meta title' ) ),
					 'Meta keys'				=>	array( 'type'=>'input', 		'field'=>'meta_keys', 		'params'=>array( 'size'=>50, 'hold'=>'Meta keys' ) ),
					 'Meta description'				=>	array( 'type'=>'area', 		'field'=>'meta_desc', 		'params'=>array( 'size'=>50, 'hold'=>'Meta description' ) ),
					 );


	$cardEditFormParams = array( 'cardItem'=>$cardItem, 'cardTmp'=>$cardTmp, 'rootPath'=>$rootPath, 'actionName'=>"editProject", 'ajaxFolder'=>'edit', 'appTable'=>$appTable );
	
	$cardEditFormStr = $zh->getCardEditForm($cardEditFormParams);
	
	// Join content
	
	$data['bodyContent'] .= "
		<div class='ipad-20' id='order_conteinter'>
			<h3 class='new-line'>Форма редактирования сервиса #$item_id</h3>";
	
	$data['bodyContent'] .= $cardEditFormStr;
				
	$data['bodyContent'] .=	"
		</div>
	";

?>