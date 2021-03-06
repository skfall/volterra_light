<?php 
	// Start header content
	$headParams = array( 'parent'=>$parent, 'alias'=>$alias, 'id'=>$id, 'item_id'=>$item_id, 'appTable'=>$appTable, 'type'=>'menuEditHeader' );
	
	$data['headContent'] = $zh->getCardEditHeader($headParams);
	
	// Start body content
	
	$cardItem = $zh->getMenuItem($item_id, $lpx);
	
	// Get formats List
	
	$parents = $zh->getMenuParents($item_id);
	
	$langs = $zh->getAvailableLangs();
	$lpx_name = strtoupper($lpx ? $lpx."_" : DEF_LANG);


	$rootPath = ROOT_PATH;
	
	$cardTmp = array(
					 'LPX'		=>	array( 'type'=>'hidden',	'field'=>'lpx', 'value'=>$lpx ),
					 'Название '.strtoupper($lpx_name)	=>	array( 'type'=>'input', 	'field'=>'name', 	'params'=>array( 'size'=>50, 'hold'=>'Название '.$lpx_name) ),
					 
					 'clear-1'				=>	array( 'type'=>'clear' ),
					 
					 // 'Алиас (URL)'			=>	array( 'type'=>'input', 	'field'=>'alias', 			'params'=>array( 'size'=>50, 'hold'=>'Alias' ) ),
					 
					
					 'clear-2'				=>	array( 'type'=>'clear' ),
					 
					 'Публикация'			=>	array( 'type'=>'block', 	'field'=>'block', 			'params'=>array( 'reverse'=>true ) ),
					 
					 'Meta data'	=>	array( 'type'=>'header'),
					 'Meta title'				=>	array( 'type'=>'input', 		'field'=>'meta_title', 		'params'=>array( 'size'=>50, 'hold'=>'Meta title' ) ),
					 'Meta keys'				=>	array( 'type'=>'input', 		'field'=>'meta_keys', 		'params'=>array( 'size'=>50, 'hold'=>'Meta keys' ) ),
					 'Meta description'				=>	array( 'type'=>'area', 		'field'=>'meta_desc', 		'params'=>array( 'size'=>50, 'hold'=>'Meta description' ) ),
					 
					 );
	$cardEditFormParams = array( 'cardItem'=>$cardItem, 'cardTmp'=>$cardTmp, 'rootPath'=>$rootPath, 'actionName'=>"editMenuItem", 'ajaxFolder'=>'edit', 'appTable'=>$appTable, 'lpx'=>$lpx, 'headParams'=>$headParams, 'langs'=>$langs );
	
	$cardEditFormStr = $zh->getCardEditForm($cardEditFormParams);
	
	// Join content
	
	$data['bodyContent'] .= "
		<div class='ipad-20' id='order_conteinter'>
			<h3 class='new-line'>Форма редактирования пункта меню #$item_id</h3>";
	
	$data['bodyContent'] .= $cardEditFormStr;
				
	$data['bodyContent'] .=	"
		</div>
	";
?>