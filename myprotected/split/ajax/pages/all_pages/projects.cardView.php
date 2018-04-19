<?php 
	// Start header content

	$headParams = array( 'parent'=>$parent, 'alias'=>$alias, 'id'=>$id, 'item_id'=>$item_id, 'appTable'=>$appTable );
	
	$data['headContent'] = $zh->getCardViewHeader($headParams);
	
	// Start body content
	
	$cardItem = $zh->getProjectItem($item_id);
	

	$rootPath = ROOT_PATH;
	
	$cardTmp = array(
					 'ID'						=>	array( 'type'=>'text', 		'field'=>'id', 				'params'=>array() ),
					 'Название'					=>	array( 'type'=>'text', 		'field'=>'name', 		'params'=>array() ),
					 'Алиас'					=>	array( 'type'=>'text', 		'field'=>'alias', 			'params'=>array() ),
					 'Тип'						=>	array( 'type'=>'text', 		'field'=>'type', 			'params'=>array() ),
					 'Описание'					=>	array( 'type'=>'text', 		'field'=>'details', 		'params'=>array() ),
					 'Местоположение'			=>	array( 'type'=>'text', 		'field'=>'location', 			'params'=>array() ),
					 'Площадь'					=>	array( 'type'=>'text', 		'field'=>'area', 			'params'=>array() ),
					 'Мощность'					=>	array( 'type'=>'text', 		'field'=>'capacity', 			'params'=>array() ),
					 'Позиция'					=>	array( 'type'=>'text', 		'field'=>'pos', 			'params'=>array() ),
					 'Map LAT'					=>	array( 'type'=>'text', 		'field'=>'lat', 			'params'=>array() ),
					 'Map LNG'					=>	array( 'type'=>'text', 		'field'=>'lng', 			'params'=>array() ),
					 'Позиция'					=>	array( 'type'=>'text', 		'field'=>'pos', 			'params'=>array() ),
					 'Публикация'				=>	array( 'type'=>'text', 		'field'=>'block', 			'params'=>array( 'replace'=>array('0'=>'Да', '1'=>'Нет') ) ),
					 'Контент'					=>	array( 'type'=>'text', 		'field'=>'content', 		'params'=>array() ),
					 'Meta-title'				=>	array( 'type'=>'text', 		'field'=>'meta_title', 			'params'=>array() ),
					 'Meta-keys'				=>	array( 'type'=>'text', 		'field'=>'meta_keys', 			'params'=>array() ),
					 'Meta-desc'				=>	array( 'type'=>'text', 		'field'=>'meta_desc', 			'params'=>array() ),
					 'Дата создания'			=>	array( 'type'=>'date', 		'field'=>'created', 		'params'=>array() ),
					 'Дата редактирования'		=>	array( 'type'=>'date', 		'field'=>'modified', 		'params'=>array() ),
					 'Изображение превью'		=>	array( 'type'=>'image',		'field'=>'preview',			'params'=>array( 'path'=>RSF.'/split/files/projects/' ) ),
					 'Изображение карточки'		=>	array( 'type'=>'image',		'field'=>'card_image',			'params'=>array( 'path'=>RSF.'/split/files/projects/' ) ),
	 );



	$cardViewTableParams = array( 'cardItem'=>$cardItem, 'cardTmp'=>$cardTmp, 'rootPath'=>$rootPath );
	
	$cardViewTableStr = $zh->getCardViewTable($cardViewTableParams);
	
	// Join content
	
	$data['bodyContent'] .= "
		<div class='ipad-20' id='order_conteinter'>
			<h3>Детальный просмотр проекта #$item_id</h3>";
	
	$data['bodyContent'] .= $cardViewTableStr;
				
	$data['bodyContent'] .=	"
		</div>
	";

?>