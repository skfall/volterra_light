<?php 
	// Start header content

	$headParams = array( 'parent'=>$parent, 'alias'=>$alias, 'id'=>$id, 'item_id'=>$item_id, 'appTable'=>$appTable );
	
	$data['headContent'] = $zh->getCardEditHeader($headParams);
	
	// Start body content
	
	$cardItem = $zh->getHomeSection($item_id);
	$cardItem['section_caption'] = strip_tags($cardItem['section_caption']);
	$slides = $zh->getHomeSlides($cardItem["section_slider_id"]);
	if ($slides) $cardItem['slides'] = $slides;

	$rootPath = ROOT_PATH;
	
	$cardTmp = array(
					'slider_id'				=>	array( 'type'=>'hidden', 		'field'=>'section_slider_id', 'params' => array('val' => $cardItem["section_slider_id"])),
					 'Заголовок'				=>	array( 'type'=>'area', 		'field'=>'section_caption', 		'params'=>array( 'size'=>100, 'hold'=>'Заголовок' ) ),
					 'Подзаголовок'				=>	array( 'type'=>'input', 		'field'=>'section_sub_caption', 		'params'=>array( 'size'=>100, 'hold'=>'Подзаголовок' ) ),
					 'clear-1'				=>	array( 'type'=>'clear' ),
					 'Контент'				=>	array( 'type'=>'summernote', 		'field'=>'section_content', 		'params'=>array( 'size'=>100, 'hold'=>'Подзаголовок' ) ),
					 'clear-2'				=>	array( 'type'=>'clear' ),
					 );

	if ($slides) {
		$cardTmp['Слайды'] =	array( 'type'=>'image_mult', 'field'=>'slides', 		'params'=>array( 'path'=>RSF."/split/files/home_slides/", 'appTable'=>$appTable, 'id'=>$item_id, 'field'=>'filename' ) );

	}

	$cardEditFormParams = array( 'cardItem'=>$cardItem, 'cardTmp'=>$cardTmp, 'rootPath'=>$rootPath, 'actionName'=>"editHomeSection", 'ajaxFolder'=>'edit', 'appTable'=>$appTable );
	
	$cardEditFormStr = $zh->getCardEditForm($cardEditFormParams);
	
	// Join content
	
	$data['bodyContent'] .= "
		<div class='ipad-20' id='order_conteinter'>
			<h3 class='new-line'>Форма редактирования секции #$item_id</h3>";
	
	$data['bodyContent'] .= $cardEditFormStr;
				
	$data['bodyContent'] .=	"
		</div>
	";

?>