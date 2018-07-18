<?php 
	// Start header content

	$headParams = array( 'parent'=>$parent, 'alias'=>$alias, 'id'=>$id, 'item_id'=>$item_id, 'appTable'=>$appTable );
	
	$data['headContent'] = $zh->getCardEditHeader($headParams);
	
	// Start body content
	
	$langs = $zh->getAvailableLangs();
	$lpx_name = strtoupper($lpx ? $lpx."_" : DEF_LANG);

	$cardItem = $zh->getServiceItem($item_id, $lpx);

	$rootPath = ROOT_PATH;
	
	$disabled = "d";
	if($lpx) $disabled = "disabled";

	$cardTmp = array(
					'LPX'		=>	array( 'type'=>'hidden',	'field'=>'lpx', 'value'=>$lpx ),
					 'Название'				=>	array( 'type'=>'input', 		'field'=>'name', 		'params'=>array( 'size'=>50, 'hold'=>'Название', 'onchange' => 'change_alias();' ) ),
					 'Алиас'				=>	array( 'type'=>'input', 		'field'=>'alias', 		'params'=>array( 'size'=>50, 'hold'=>'Алиас', $disabled => '1' ) ),
					 'clear-1'				=>	array( 'type'=>'clear' ),
					 'Описание'				=>	array( 'type'=>'area', 		'field'=>'description', 		'params'=>array( 'size'=>100, 'hold'=>'Описание' ) ),
					 'clear-2'				=>	array( 'type'=>'clear' ),
					 'Позиция'				=>	array( 'type'=>'number', 		'field'=>'pos', 		'params'=>array( 'size'=>50, 'hold'=>'Позиция' ) ),
					 'clear-3'				=>	array( 'type'=>'clear' ),

					 'Публикация'			=>	array( 'type'=>'block', 	'field'=>'block', 			'params'=>array( 'reverse'=>true ) ),
					 'clear-4'				=>	array( 'type'=>'clear' ),

					 'Иконка'			=>	array( 'type'=>'image_mono','field'=>'icon', 		'params'=>array( 'path'=>RSF."/split/files/services/", 'appTable'=>$appTable, 'id'=>$item_id, 'lpx'=>$lpx, 'headParams'=>$headParams, 'langs'=>$langs ) ),
					 );


	$cardEditFormParams = array( 'cardItem'=>$cardItem, 'cardTmp'=>$cardTmp, 'rootPath'=>$rootPath, 'actionName'=>"editService", 'ajaxFolder'=>'edit', 'appTable'=>$appTable, 'lpx'=>$lpx, 'headParams'=>$headParams, 'langs'=>$langs  );
	
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