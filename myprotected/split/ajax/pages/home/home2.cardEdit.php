<?php 
	// Start header content

	$headParams = array( 'parent'=>$parent, 'alias'=>$alias, 'id'=>$id, 'item_id'=>$item_id, 'appTable'=>$appTable );
	
	$data['headContent'] = $zh->getCardEditHeader($headParams);
	
	// Start body content
	
	$langs = $zh->getAvailableLangs();
	$lpx_name = strtoupper($lpx ? $lpx."_" : DEF_LANG);


	$cardItem = $zh->getHomeSecondSectionItem($item_id, $lpx);

	$rootPath = ROOT_PATH;
	
	$cardTmp = array(
					'LPX'		=>	array( 'type'=>'hidden',	'field'=>'lpx', 'value'=>$lpx ),
					 'Заголовок'				=>	array( 'type'=>'area', 		'field'=>'section_caption', 		'params'=>array( 'size'=>100, 'hold'=>'Заголовок' ) ),
					 'Подзаголовок'				=>	array( 'type'=>'input', 		'field'=>'section_sub_caption', 		'params'=>array( 'size'=>100, 'hold'=>'Подзаголовок' ) ),
					 'clear-1'				=>	array( 'type'=>'clear' ),
					 'Контент'				=>	array( 'type'=>'summernote', 		'field'=>'section_content', 		'params'=>array( 'size'=>100, 'hold'=>'Подзаголовок' ) ),
					 'clear-2'				=>	array( 'type'=>'clear' ),
					 'Изображение'			=>	array( 'type'=>'image_mono','field'=>'filename', 		'params'=>array( 'path'=>RSF."/split/files/home_slides/", 'appTable'=>$appTable, 'id'=>$item_id ) ),
					 );

	$cardEditFormParams = array( 'cardItem'=>$cardItem, 'cardTmp'=>$cardTmp, 'rootPath'=>$rootPath, 'actionName'=>"editHome2Slide", 'ajaxFolder'=>'edit', 'appTable'=>$appTable, 'lpx'=>$lpx, 'headParams'=>$headParams, 'langs'=>$langs );
	
	$cardEditFormStr = $zh->getCardEditForm($cardEditFormParams);
	
	// Join content
	
	$data['bodyContent'] .= "
		<div class='ipad-20' id='order_conteinter'>
			<h3 class='new-line'>Форма редактирования слайда #$item_id</h3>";
	
	$data['bodyContent'] .= $cardEditFormStr;
				
	$data['bodyContent'] .=	"
		</div>
	";

?>